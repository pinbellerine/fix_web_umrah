<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WisataLuarNegeriController;
use App\Http\Controllers\WisataDomestikController;
use App\Http\Controllers\JamaahUmrahController;
use App\Http\Controllers\JamaahHajiController;

use App\Models\Transaksi;
use App\Models\WisataLuarNegeri;
use App\Models\WisataDomestik;
use App\Models\jamaahumrah;
use App\Models\jamaahhaji;

use App\Http\Controllers\TransaksiController;

// Public routes accessible without login
Route::get('/', function () {
    return view('welcome');
});

Route::get('/tentang', function () {
    return view('about');
});

Route::get('/portofolio', function () {
    return view('porto');
});

// Debug route (temporary)
Route::get('/auth-debug', [AuthController::class, 'debug']);

// Debug routes for admin access issues
Route::get('/auth-debug', [AuthController::class, 'debug']);
Route::get('/admin-check', function() {
    $isAdmin = Auth::check() && (Auth::user()->role === 'admin' || Session::get('user_role') === 'admin');
    return response()->json([
        'is_authenticated' => Auth::check(),
        'is_admin' => $isAdmin,
        'auth_user' => Auth::check() ? [
            'id' => Auth::id(),
            'username' => Auth::user()->username,
            'role' => Auth::user()->role,
        ] : null,
        'session' => [
            'user_id' => Session::get('user_id'),
            'user_role' => Session::get('user_role'),
            'username' => Session::get('username'),
        ]
    ]);
});

// Try a simpler admin route for testing
Route::get('/admin-dashboard', function() {
    // Simple check directly in route
    if (Auth::check() && (Auth::user()->role === 'admin' || Session::get('user_role') === 'admin')) {
        return view('dashboard', ['dataTransaksi' => \App\Models\Transaksi::all()]);
    }
    return redirect('/login')->with('error', 'Admin access required');
})->middleware('auth');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthController::class, 'logout']);

// Profile route - accessible to all authenticated users
Route::get('/viewuserprofil', [ProfileController::class, 'show'])->name('viewuserprofil');

// This route decides where to redirect based on user role
Route::get('/profile', function() {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return redirect('/dashboard');
    }
    return redirect()->route('viewuserprofil');
})->name('profile');

// User profile routes - accessible by any authenticated user
Route::middleware(['auth'])->group(function () {
    Route::get('/viewusertrip', function () {
        return view('datausertrip');
    });

    // View trip details route
    Route::get('/viewusertrip/{journey_id?}/{journey_type?}', function($journeyId = null, $journeyType = null) {
        if (empty($journeyId) || empty($journeyType)) {
            return view('datausertrip');
        }
        
        // Get journey data based on ID and type
        $journey = null;
        
        switch ($journeyType) {
            case 'haji':
                $journey = \App\Models\JamaahHaji::find($journeyId);
                break;
            case 'umrah':
                $journey = \App\Models\JamaahUmrah::find($journeyId);
                break;
            case 'wisata_domestik':
                $journey = \App\Models\WisataDomestik::find($journeyId);
                break;
            case 'wisata_luar_negeri':
                $journey = \App\Models\WisataLuarNegeri::find($journeyId);
                break;
        }
        
        return view('datausertrip', compact('journey', 'journeyType'));
    })->name('viewusertrip');
    
    Route::get('/viewusertransaction', function () {
        return view('datausertrcs');
    });
    
    Route::get('/viewadminprofil', function () {
        return view('dataadminview');
    });

    Route::get('/admin-check', function () {
        if (Auth::check() && (Auth::user()->role === 'admin' || Session::get('user_role') === 'admin')) {
            return redirect('/dashboard');
        }
        return redirect('/viewuserprofil')->with('error', 'Anda tidak memiliki akses admin.');
    });
});

// Admin-only routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        $dataTransaksi = Transaksi::all();
        return view('dashboard', compact('dataTransaksi'));
    })->name('dashboard');

    // Dashboard data routes
    Route::get('/dashboard/datawl', function () {
        $dataWLN = WisataLuarNegeri::all();
        return view('datawl', compact('dataWLN'));
    })->name('dashboard.datawl');

    Route::get('/dashboard/datawd', function () {
        $dataWD = WisataDomestik::all();
        return view('datawd', compact('dataWD'));
    })->name('dashboard.datawd');

    Route::get('/dashboard/dataju', function () {
        $umrah = JamaahUmrah::all();
        return view('dataju', compact('umrah'));
    })->name('dashboard.dataju');

    Route::get('/dashboard/datajh', function () {
        $haji = JamaahHaji::all();
        return view('datajh', compact('haji'));
    })->name('dashboard.datajh');

    // Archive view
    Route::get('/viewdataarsip', function () {
        return view('dataarsip');
    });

    Route::get('/viewdataarsipwl', function () {
        return view('dataarsipwlview');
    });

    // Add data routes
    Route::get('/tambahdatajh', function () {
        return view('datajhadd');
    });

    Route::get('/tambahdataju', function () {
        $umrah = JamaahUmrah::all();
        return view('datajuadd', compact('umrah'));
    });

    Route::get('/tambahdatawl', function () {
        $dataWLN = WisataLuarNegeri::all();
        return view('datawladd', compact('dataWLN'));
    });

    Route::get('/tambahdatawd', function () {
        $dataWD = WisataDomestik::all();
        return view('datawdadd', compact('dataWD'));
    });

    // View data routes
    Route::get('/viewdatawl', function () {
        $dataWLN = WisataLuarNegeri::all();
        return view('datawlview', compact('dataWLN'));
    });

    Route::get('/viewdatawd', function () {
        $dataWD = WisataDomestik::all();
        return view('datawdview', compact('dataWD'));
    });

    Route::get('/viewdataju', function () {
        $umrah = JamaahUmrah::all();
        return view('datajuview', compact('umrah'));
    });

    Route::get('/viewdatajh', function () {
        return view('datajhview');
    });

    // Trip view routes
    Route::get('/viewdatajhtrip', function () {
        return view('datajhviewtrip');
    });

    Route::get('/viewdatajutrip', function () {
        return view('datajuviewtrip');
    });

    Route::get('/viewdatawltrip', function () {
        return view('datawlviewtrip');
    });

    Route::get('/viewdatawdtrip', function () {
        return view('datawdviewtrip');
    });

    // Transaction routes
    Route::get('/transaction', function () {
        return view('transaction');
    });

    Route::get('/transaction/datawl', function () {
        return view('trcswl');
    });

    Route::get('/transaction/datawd', function () {
        return view('trcswd');
    });

    Route::get('/transaction/dataju', function () {
        return view('trcsju');
    });

    Route::get('/transaction/datajh', function () {
        return view('trcsjh');
    });

    Route::get('/viewtransactionwl', function () {
        return view('trcswlview');
    });

    Route::get('/viewtransactionwd', function () {
        return view('trcswdview');
    });

    Route::get('/viewtransactionju', function () {
        return view('trcsjuview');
    });

    Route::get('/viewtransactionjh', function () {
        return view('trcsjhview');
    });

    Route::get('/changetransactionwl', function () {
        return view('trcswlchange');
    });

    Route::get('/changetransactionwd', function () {
        return view('trcswdchange');
    });

    Route::get('/changetransactionju', function () {
        return view('trcsjuchange');
    });

    Route::get('/changetransactionjh', function () {
        return view('trcsjhchange');
    });

    Route::get('/tambahdatatransaksi', function () {
        return view('trcsadd');
    });

    // Edit data routes
    Route::get('/ubahdatawl', function () {
        return view('datawlchange');
    });

    Route::get('/ubahdatawd', function () {
        return view('datawdchange');
    });

    Route::get('/ubahdataju', function () {
        return view('datajuchange');
    });

    Route::get('/ubahdatajh', function () {
        return view('datajhchange');
    });

    // Controller routes - WisataLuarNegeri
    Route::post('/wisata-luar-negeri/store', [WisataLuarNegeriController::class, 'store'])->name('wisata.store');
    Route::get('/wisata-luar-negeri', [TransaksiController::class, 'index'])->name('wisata-luar-negeri.index');
    Route::get('/wisata/create', [WisataLuarNegeri::class, 'create'])->name('wisata.create');
    Route::get('/viewdatawl/{id}', [WisataLuarNegeriController::class, 'show'])->name('datawl.view');
    Route::get('/datawl/{id}/edit', [WisataLuarNegeriController::class, 'edit'])->name('wisataluarnegeri.edit');
    Route::put('/ubahdatawl/update/{id}', [WisataLuarNegeriController::class, 'update'])->name('wisataluarnegeri.update');

    // Controller routes - WisataDomestik
    Route::post('/wisata-domestik/store', [WisataDomestikController::class, 'store'])->name('wisata-domestik.store');
    Route::get('/wisatadomestik', [wisataDomestikController::class, 'index'])->name('wisatadomestik.index');
    Route::get('/wisata-domestik/create', [WisataDomestikController::class, 'create'])->name('wisata-domestik.create');
    Route::get('/viewdatawd/{id}', [WisataDomestikController::class, 'show'])->name('datawd.view');
    Route::get('/datawd/{id}/edit', [WisataDomestikController::class, 'edit'])->name('wisatadomestik.edit');
    Route::put('/ubahdatawd/update/{id}', [WisataDomestikController::class, 'update'])->name('wisatadomestik.update');

    // Controller routes - JamaahUmrah
    Route::post('/jamaah-umrah/store', [JamaahUmrahController::class, 'store'])->name('umrah.store');
    Route::get('/jamaahumrah', [JamaahUmrahController::class, 'index'])->name('umrah.index');
    Route::get('/jamaah-umrah/create', [JamaahUmrahController::class, 'create'])->name('jamaah_umrah.create');
    Route::get('viewdataju/{id}', [JamaahUmrahController::class, 'show'])->name('dataumrah.view');
    Route::get('/dataju/{id}/edit', [JamaahUmrahController::class, 'edit'])->name('jamaahumrah.edit');
    Route::put('/ubahdataju/update/{id}', [JamaahUmrahController::class, 'update'])->name('jamaahumrah.update');
    Route::delete('/dataju/{id}', [JamaahUmrahController::class, 'destroy'])->name('jamaahumrah.destroy');

    // Controller routes - JamaahHaji
    Route::post('/jamaah-haji/store', [JamaahHajiController::class, 'store'])->name('haji.store');
    Route::get('/jamaahhaji', [JamaahHajiController::class, 'index'])->name('haji.index');
    Route::get('/jamaah-haji/create', [JamaahHajiController::class, 'create'])->name('jamaah_haji.create');
    Route::get('/viewdatajh/{id}', [JamaahHajiController::class, 'show'])->name('datahaji.view');
    Route::get('/datajh/{id}/edit', [JamaahHajiController::class, 'edit'])->name('jamaahhaji.edit');
    Route::put('/ubahdatajh/update/{id}', [JamaahHajiController::class, 'update'])->name('jamaahhaji.update');
    Route::delete('/datajh/{id}', [JamaahHajiController::class, 'destroy'])->name('jamaahhaji.destroy');

    // Controller routes - Transaksi
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
});


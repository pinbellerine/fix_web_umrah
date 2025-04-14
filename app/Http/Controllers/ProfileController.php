<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\JamaahHaji;
use App\Models\JamaahUmrah;
use App\Models\WisataDomestik;
use App\Models\WisataLuarNegeri;
use App\Models\AdminLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    /**
     * Show user profile based on user type
     */
    public function show()
    {
        // Check authentication
        $userType = Session::get('user_type');
        $userId = Session::get('user_id');
        $username = Session::get('username');
        
        Log::info("ProfileController@show - Type: $userType, ID: $userId, Username: $username");
        
        // Default empty data
        $userData = null;
        $relationships = [];
        $journeys = [];
        
        try {
            // Try to get user data based on session information
            if ($userType && $userId) {
                switch ($userType) {
                    case 'admin':
                        $userData = AdminLogin::find($userId);
                        break;
                    case 'haji':
                        $userData = JamaahHaji::find($userId);
                        break;
                    case 'umrah':
                        $userData = JamaahUmrah::find($userId);
                        break;
                    case 'wisata_domestik':
                        $userData = WisataDomestik::find($userId);
                        break;
                    case 'wisata_luar_negeri':
                        $userData = WisataLuarNegeri::find($userId);
                        break;
                }
            } 
            // If no user data yet, try to find by username
            elseif ($username) {
                $userData = $this->findUserByUsername($username);
                if ($userData) {
                    $userType = $this->determineUserType($userData);
                    Session::put('user_type', $userType);
                    Session::put('user_id', $userData->id);
                }
            }
            
            // Fix: Only redirect if userType is an actual string equal to 'admin'
            if (is_string($userType) && $userType === 'admin') {
                return redirect('/dashboard');
            }

            // If no user data was found, redirect to login
            if (!$userData) {
                Log::warning("No user data found for profile - Type: $userType, ID: $userId, Username: $username");
                return redirect('/login')->withErrors(['message' => 'Anda perlu login terlebih dahulu.']);
            }

            // Get related data if we have user data
            if ($userType && $userData) {
                // Set placeholder/default image if not provided
                if (empty($userData->foto_peserta)) {
                    $userData->foto_peserta = 'images/default-profile.jpg';
                }
                if (empty($userData->foto_ktp)) {
                    $userData->foto_ktp = 'images/default-id.jpg';
                }
                
                // Get relationships - look for family connections
                $relationships = $this->getRelationships($userData);
                
                // Get all journeys across travel types
                $journeys = $this->getAllJourneys($userData);
            }

            // Pass data to view
            return view('datauserview', compact('userData', 'relationships', 'journeys', 'userType'));
        } 
        catch (\Exception $e) {
            Log::error("Error in ProfileController: " . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            
            return view('datauserview', [
                'error' => 'Terjadi kesalahan saat memuat profil. ' . $e->getMessage(),
                'userData' => null,
                'relationships' => [],
                'journeys' => [],
                'userType' => $userType
            ]);
        }
    }

    /**
     * Find a user by username across all tables
     */
    private function findUserByUsername($username)
    {
        // Try to find the username in each table
        return AdminLogin::where('username', $username)->first()
            ?? JamaahHaji::where('username', $username)->first()
            ?? JamaahUmrah::where('username', $username)->first()
            ?? WisataDomestik::where('username', $username)->first()
            ?? WisataLuarNegeri::where('username', $username)->first();
    }

    /**
     * Determine the user type based on the model instance
     */
    private function determineUserType($user)
    {
        $class = get_class($user);
        
        if ($class == AdminLogin::class) return 'admin';
        if ($class == JamaahHaji::class) return 'haji';
        if ($class == JamaahUmrah::class) return 'umrah';
        if ($class == WisataDomestik::class) return 'wisata_domestik';
        if ($class == WisataLuarNegeri::class) return 'wisata_luar_negeri';
        
        return null; // Unknown user type
    }
    
    /**
     * Get related family/spouse relationships
     * This looks for connection between travelers using either NIK or name
     */
    private function getRelationships($userData)
    {
        if (!isset($userData->nik) || !isset($userData->nama_peserta)) {
            return [];
        }

        $relationships = [];
        $nik = $userData->nik;
        $name = $userData->nama_peserta;
        
        // Find family members in Jamaah Haji table
        $hajiRelations = JamaahHaji::whereNotNull('jenis_hubungan')
            ->where('id', '!=', $userData->id)
            ->where(function($query) use ($nik, $name) {
                $query->where('nik', 'LIKE', "%$nik%")
                      ->orWhere('nama_peserta', 'LIKE', "%$name%")
                      ->orWhere('jenis_hubungan', 'LIKE', '%Keluarga%')
                      ->orWhere('jenis_hubungan', 'LIKE', '%Suami-istri%');
            })
            ->get();
        $relationships = array_merge($relationships, $hajiRelations->toArray());

        // Find family members in Jamaah Umrah table
        $umrahRelations = JamaahUmrah::whereNotNull('jenis_hubungan')
            ->where(function($query) use ($nik, $name) {
                $query->where('nik', 'LIKE', "%$nik%")
                      ->orWhere('nama_peserta', 'LIKE', "%$name%")
                      ->orWhere('jenis_hubungan', 'LIKE', '%Keluarga%')
                      ->orWhere('jenis_hubungan', 'LIKE', '%Suami-istri%');
            })
            ->get();
        $relationships = array_merge($relationships, $umrahRelations->toArray());
        
        // Find family members in Wisata Domestik table
        $domestikRelations = WisataDomestik::whereNotNull('jenis_hubungan')
            ->where(function($query) use ($nik, $name) {
                $query->where('nik', 'LIKE', "%$nik%")
                      ->orWhere('nama_peserta', 'LIKE', "%$name%")
                      ->orWhere('jenis_hubungan', 'LIKE', '%Keluarga%')
                      ->orWhere('jenis_hubungan', 'LIKE', '%Suami-istri%');
            })
            ->get();
        $relationships = array_merge($relationships, $domestikRelations->toArray());
        
        // Find family members in Wisata Luar Negeri table
        $luarNegeriRelations = WisataLuarNegeri::whereNotNull('jenis_hubungan')
            ->where(function($query) use ($nik, $name) {
                $query->where('nik', 'LIKE', "%$nik%")
                      ->orWhere('nama_peserta', 'LIKE', "%$name%")
                      ->orWhere('jenis_hubungan', 'LIKE', '%Keluarga%')
                      ->orWhere('jenis_hubungan', 'LIKE', '%Suami-istri%');
            })
            ->get();
        $relationships = array_merge($relationships, $luarNegeriRelations->toArray());
        
        return $relationships;
    }
    
    /**
     * Get all journeys for a user across all travel types
     */
    private function getAllJourneys($userData)
    {
        $journeys = [];
        
        if (!isset($userData->nik) || !isset($userData->username)) {
            // Add current journey if we at least have some data
            if (isset($userData->jenis_perjalanan)) {
                $journeys[] = $this->formatJourneyData($userData);
            }
            return $journeys;
        }
        
        $nik = $userData->nik;
        $username = $userData->username;
        
        // Add the current journey
        $journeys[] = $this->formatJourneyData($userData);
        
        // Get journeys from Haji table
        $hajiJourneys = JamaahHaji::where('nik', $nik)
            ->orWhere('username', $username)
            ->get();
            
        foreach ($hajiJourneys as $journey) {
            if ($journey->id != ($userData->id ?? 0)) {
                $journeys[] = $this->formatJourneyData($journey, 'haji');
            }
        }
        
        // Get journeys from Umrah table
        $umrahJourneys = JamaahUmrah::where('nik', $nik)
            ->orWhere('username', $username)
            ->get();
            
        foreach ($umrahJourneys as $journey) {
            if ($journey->id != ($userData->id ?? 0)) {
                $journeys[] = $this->formatJourneyData($journey, 'umrah');
            }
        }
        
        // Get journeys from Wisata Domestik table
        $domestikJourneys = WisataDomestik::where('nik', $nik)
            ->orWhere('username', $username)
            ->get();
            
        foreach ($domestikJourneys as $journey) {
            if ($journey->id != ($userData->id ?? 0)) {
                $journeys[] = $this->formatJourneyData($journey, 'wisata_domestik');
            }
        }
        
        // Get journeys from Wisata Luar Negeri table
        $luarNegeriJourneys = WisataLuarNegeri::where('nik', $nik)
            ->orWhere('username', $username)
            ->get();
            
        foreach ($luarNegeriJourneys as $journey) {
            if ($journey->id != ($userData->id ?? 0)) {
                $journeys[] = $this->formatJourneyData($journey, 'wisata_luar_negeri');
            }
        }
        
        return $journeys;
    }
    
    /**
     * Format journey data for consistent display
     */
    private function formatJourneyData($journey, $type = null)
    {
        // If type is not provided, try to determine from the object
        if (!$type) {
            if ($journey instanceof JamaahHaji) $type = 'haji';
            elseif ($journey instanceof JamaahUmrah) $type = 'umrah';
            elseif ($journey instanceof WisataDomestik) $type = 'wisata_domestik';
            elseif ($journey instanceof WisataLuarNegeri) $type = 'wisata_luar_negeri';
            else $type = 'unknown';
        }
        
        return [
            'id' => $journey->id,
            'type' => $type,
            'jenis_perjalanan' => $journey->jenis_perjalanan ?? $type,
            'code' => $journey->kode_khusus_perjalanan ?? 'N/A',
            'registration_date' => $journey->created_at ?? now(),
            'departure_date' => $journey->date_of_issued_perjalanan ?? now(),
            'return_date' => $journey->date_of_expiry_perjalanan ?? now()->addDays(7)
        ];
    }
}

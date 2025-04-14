<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JamaahHaji;
use App\Models\JamaahUmrah;
use App\Models\WisataDomestik;
use App\Models\WisataLuarNegeri;
use App\Models\Transaksi;
use Carbon\Carbon;

class ChartController extends Controller
{
    /**
     * Get data for specific chart type
     * 
     * @param string $type
     * @return \Illuminate\Http\JsonResponse
     */
    public function getData($type)
    {
        switch ($type) {
            case 'datawl':
                return $this->getWisataLuarNegeriData();
            case 'datajh':
                return $this->getJamaahHajiData();
            case 'datawd':
                return $this->getWisataDomestikData();
            case 'dataju':
                return $this->getJamaahUmrahData();
            case 'transactions':
                return $this->getTransactionsData();
            default:
                return response()->json(['error' => 'Invalid chart type'], 400);
        }
    }
    
    /**
     * Get data for Wisata Luar Negeri chart
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    private function getWisataLuarNegeriData()
    {
        $monthlyData = $this->getMonthlyRegistrations(WisataLuarNegeri::class);
        $genderData = $this->getGenderDistribution(WisataLuarNegeri::class);
        $total = WisataLuarNegeri::count();
        
        return response()->json([
            'monthly' => $monthlyData,
            'gender' => $genderData,
            'total' => $total
        ]);
    }
    
    /**
     * Get data for Jamaah Haji chart
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    private function getJamaahHajiData()
    {
        $monthlyData = $this->getMonthlyRegistrations(JamaahHaji::class);
        $genderData = $this->getGenderDistribution(JamaahHaji::class);
        $total = JamaahHaji::count();
        
        return response()->json([
            'monthly' => $monthlyData,
            'gender' => $genderData,
            'total' => $total
        ]);
    }
    
    /**
     * Get data for Wisata Domestik chart
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    private function getWisataDomestikData()
    {
        $monthlyData = $this->getMonthlyRegistrations(WisataDomestik::class);
        $genderData = $this->getGenderDistribution(WisataDomestik::class);
        $total = WisataDomestik::count();
        
        return response()->json([
            'monthly' => $monthlyData,
            'gender' => $genderData,
            'total' => $total
        ]);
    }
    
    /**
     * Get data for Jamaah Umrah chart
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    private function getJamaahUmrahData()
    {
        $monthlyData = $this->getMonthlyRegistrations(JamaahUmrah::class);
        $genderData = $this->getGenderDistribution(JamaahUmrah::class);
        $total = JamaahUmrah::count();
        
        return response()->json([
            'monthly' => $monthlyData,
            'gender' => $genderData,
            'total' => $total
        ]);
    }
    
    /**
     * Get data for Transactions chart
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    private function getTransactionsData()
    {
        $lunas = Transaksi::where('keterangan', 'Lunas')->count();
        $belumLunas = Transaksi::where('keterangan', 'Belum Lunas')->count();
        
        $monthlyTransactions = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $monthlyTransactions[$date->format('M')] = Transaksi::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
        }
        
        return response()->json([
            'status' => [
                'lunas' => $lunas,
                'belumLunas' => $belumLunas
            ],
            'monthly' => $monthlyTransactions
        ]);
    }
    
    /**
     * Get monthly registrations for a given model
     * 
     * @param string $model
     * @return array
     */
    private function getMonthlyRegistrations($model)
    {
        $result = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $result[$date->format('M')] = $model::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
        }
        return $result;
    }
    
    /**
     * Get gender distribution for a given model
     * 
     * @param string $model
     * @return array
     */
    private function getGenderDistribution($model)
    {
        $male = $model::where('jenis_kelamin', 'L')->count();
        $female = $model::where('jenis_kelamin', 'P')->count();
        
        return [
            'male' => $male,
            'female' => $female
        ];
    }
}

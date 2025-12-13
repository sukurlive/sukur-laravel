<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Payroll;
use App\Models\Position;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {  
        // Total Karyawan
        $totalKaryawan = Employee::count();
        
        // Ambil bulan sekarang
        $bulanIni = date('Y-m');

        // Total payroll bulan ini
        $totalPayrollBulanIni = Payroll::where('bulan', $bulanIni)->sum('total_gaji');

        // Total jumlah jabatan
        $totalJabatan = Position::count();

        return view ('backend.dashboard.dashboard', compact('totalKaryawan', 'totalPayrollBulanIni', 'totalJabatan'));
    }
}

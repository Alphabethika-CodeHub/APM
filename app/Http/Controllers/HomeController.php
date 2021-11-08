<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $complaints = Complaint::get();

        $complaint_datas = Complaint::select(DB::raw("COUNT(*) as count"))
                    // ->where('status', '=', 'Completed')
                    ->groupBy(DB::raw("Month(date)"))
                    ->pluck('count');
        
        $months = Complaint::select(DB::raw("Month(date) as month"))
                ->whereYear('date', date('Y'))
                ->groupBy(DB::raw("Month(date)"))
                ->pluck('month');

        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);

        foreach($months as $index => $month)
        {
            $datas[$month] = $complaint_datas[$index];
        }
        

        // $c_data = Complaint::latest()->paginate(10);
        $users = User::all();

        return view('home', compact('complaints', 'users', 'datas'));
    }
}

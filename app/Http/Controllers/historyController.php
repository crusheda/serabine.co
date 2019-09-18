<?php

namespace App\Http\Controllers;
use App\hasil;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class historyController extends Controller
{
    //
    public function index(Request $request)
    {
        # code...
        $output = hasil::all();

        $bulan = $request->query('bulan');
        $tahun = $request->query('tahun');
        $bln = substr(Carbon::now()->toDateString(),5,2);
        $query_show = "SELECT * FROM hasil WHERE MONTH(created_at) = $bln ORDER BY created_at DESC";
        $show = DB::select($query_show);
        $total = hasil::count();

        if($bulan && $tahun){
            $query_string = "SELECT * FROM hasil WHERE YEAR(created_at) = $tahun AND MONTH(created_at) = $bulan";
            $show = DB::select($query_string);
            $total = count($show);
        }
        elseif($bulan){
            $query_string = "SELECT * FROM hasil WHERE MONTH(created_at) = $bulan";
            $show = DB::select($query_string);
            $total = count($show);
        }
        elseif($bulan){
            $query_string = "SELECT * FROM hasil WHERE YEAR(created_at) = $tahun";
            $show = DB::select($query_string);
            $total = count($show);
        }

        $data = [
            'count' => $total,
            'show' => $show,
            'output' => $output
        ];
        return view('pages.hasil')->with('list', $data);
    }
}

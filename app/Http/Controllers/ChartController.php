<?php

namespace App\Http\Controllers;

use App\User;
use App\helpers;
use ConsoleTVs\Charts\Classes\Fusioncharts\Chart;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use MongoDB\BSON\Javascript;

class ChartController extends Controller
{
    public function index(){
        return view('chart');
    }
    public function readdata(){

        $csv_data = DB::table('csv_chart')->select('MWCT_BR_001_ACT','MWCT_BR_002_ACT')->distinct()->orderBy('ID','ASC')->get();

        return Response::json(array("status" => "success", "data" =>  $csv_data));
    }
    public function dosomething(){

        if ( !empty ( $_GET['from_date'] ) &&  ( $_GET['to_date'] )) {

            $date_from =  $_GET['from_date'];
            $date_to =  $_GET['to_date'];

           // $from_split = explode(' ', $date_from, 2);
           // $from_date = $from_split[0];
           // $from_t = $from_split[0];
            $from_date = date('Y-m-d H:i:s',strtotime($date_from));

            //$to_split = explode(' ', $date_to, 2);
            //$to_date = $to_split[0];
            //$to_t = $to_split[1];
            $to_date = date('Y-m-d H:i:s',strtotime($date_to));



            $current = DB::table('csv_chart')
                ->select('MWCT_BR_001_ACT','MWCT_BR_002_ACT',DB::raw('CONCAT(Date," ",Time) as datetime'))
                ->whereBetween(DB::raw('CONCAT(Date," ",Time)'),array($from_date,$to_date))
                ->orderby('datetime')
                ->get();
            return Response::json(array("status" => "success", "data" =>  $current));
        }

        else
        {
            return redirect('chart')->with('danger', true)->with('message','Please Select Some Data to create chart');
        }
    }

}
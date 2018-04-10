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

        $csv_data = DB::table('csv')->select('MWCT_BR_001_ACT','MWCT_BR_002_ACT')->distinct()->orderBy('ID','ASC')->get();

        return Response::json(array("status" => "success", "data" =>  $csv_data));
    }
    public function dosomething(){

        $date_from =  $_GET['from_date'];
        $date_to =  $_GET['to_date'];


        $from_split = explode(' ', $date_from, 2);
        $from_date = $from_split[0];
        $from_t = $from_split[0];
        $from_time = date('H:i:s',strtotime($from_t));

        $to_split = explode(' ', $date_to, 2);
        $to_date = $to_split[0];
        $to_t = $to_split[1];
        $to_time = date('H:i:s',strtotime($to_t));

        $current = DB::table('csv')->select('MWCT_BR_001_ACT','MWCT_BR_002_ACT')
            ->distinct()->orderBy('ID','ASC')
            ->whereBetween('LocalDate',array($from_date,$to_date))
            ->whereBetween('LocalTime',array($from_time,$to_time))
            ->get();
        return Response::json(array("status" => "success", "data" =>  $current));
    }
    public function dosearch(){

        $fromDate = date('Y-m-d' . '00:00', time());
        $toDate = date('Y-m-d' . ' 22:00', time());

        $date_from = Input::get('date_from');
        echo $date_from;

        $date_to = '2016-11-25';

       // $from = date($date_from);
        //$to = date($date_to);


        //$current = DB::table('csv')->select('MWCT_BR_001_ACT','MWCT_BR_002_ACT')->distinct()->orderBy('ID','ASC')->whereBetween('LocalDate',array($from,$to))->first();
        //return Response::json(array("status" => "success", "data" =>  $current));
    }
}
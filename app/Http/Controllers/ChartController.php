<?php

namespace App\Http\Controllers;

use App\User;
use App\helpers;
use ConsoleTVs\Charts\Classes\Fusioncharts\Chart;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

        $csv_data = DB::table('csv')->select('MWAIT_BR_001_ACT','MWAIT_DS_001_ACT')->get();

        return Response::json(array("status" => "success", "data" =>  $csv_data));
    }

}
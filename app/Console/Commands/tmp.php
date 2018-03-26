<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class tmp extends Command
{


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'temp:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename)) {
            return false;
        }

        $header = null;
        $data = array();

        if (($handle = fopen($filename, 'r')) !== false)
        {

            while (($row = fgetcsv($handle, 10000, $delimiter)) !== false)
            {

                if (!$header){
                    $header = $row;

                }
                     else
                     {
                         $data[] = array_combine($header, $row);
                     }

            }
            fclose($handle);
        }

        return $data;
    }

    public function handle()
    {

        $file = public_path('csv/2.csv');

        $customerArr = $this->csvToArray($file);
        for ($i=0; $i<count($customerArr); $i++)
        {
            DB::table('csv')->insert(
                array(
                    `LocalDate_Time` =>  $customerArr[$i] ,
                    `MWAIT_BR_001_ACT` =>  $customerArr[$i],
                    `MWAIT_DS_001_ACT` => $customerArr[$i],
                    `MWCT_BR_001_ACT` =>  $customerArr[$i],
                    `MWCT_BR_002_ACT` =>  $customerArr[$i],
                    `MWCT_BR_003_ACT` =>  $customerArr[$i],
                    `MWCT_PR_001_ACT` =>  $customerArr[$i],
                    `MWCT_DS_001_ACT` =>  $customerArr[$i],
                    `MWCT_DS_002_ACT` =>  $customerArr[$i],
                    `MWCT_DS_003_ACT` =>  $customerArr[$i],
                    `MWCT_DS_004_ACT` =>  $customerArr[$i],
                    `MWCT_DS_005_ACT` =>  $customerArr[$i],
                    `MWCT_DS_006_ACT` =>  $customerArr[$i],
                    `MWFIT_BR_001_ACT` => $customerArr[$i],
                    `MWFIT_BR_002_ACT` => $customerArr[$i],
                    `MWFIT_BR_003_ACT` =>  $customerArr[$i],
                    `MWFIT_DS_001_ACT` =>  $customerArr[$i],
                    `MWFIT_DS_003_ACT` =>  $customerArr[$i],
                    `MWFIT_DS_004_ACT` =>  $customerArr[$i],
                    `MWFIT_DS_005_ACT` =>  $customerArr[$i],
                    `MWFIT_DS_006_ACT` =>  $customerArr[$i],
                    `MWFIT_DS_007_ACT` =>  $customerArr[$i],
                    `MWFIT_PR_001_ACT` =>  $customerArr[$i],
                    `MWPT_BR_001_ACT` =>   $customerArr[$i],
                    `MWPIT_BR_002_ACT` =>  $customerArr[$i],
                    `MWPT_DS_001_ACT` =>  $customerArr[$i],
                    `MWPIT_DS_002_ACT` =>  $customerArr[$i],
                    `MWPT_DS_003_ACT` =>   $customerArr[$i],
                    `MWPT_DS_004_ACT` =>  $customerArr[$i],
                    `MWPT_DS_005_ACT` =>  $customerArr[$i],
                    `MWPIT_DS_006_ACT` =>  $customerArr[$i],
                    `MWPT_DS_007_ACT` =>  $customerArr[$i],
                    `MWPT_DS_008_ACT` =>  $customerArr[$i],
                    `MWTT_BR_001_ACT` =>  $customerArr[$i],
                    `MWTT_DS_001_ACT` =>  $customerArr[$i],
                    `MWTT_DS_002_ACT` =>  $customerArr[$i],
                    `MWPMP_BR_002_ACT` =>  $customerArr[$i],
                    `MWPMP_DS_002_ACT` =>  $customerArr[$i],
                    `MWPMP_DS_004_ACT` =>  $customerArr[$i],
                    `MWOARO1_Recovery` =>  $customerArr[$i],
                    `MWOARO1_DrawDP` =>  $customerArr[$i],
                    `MWOARO1_FeedDP` =>  $customerArr[$i],
                    `MWOARO1_TMPRESS` =>  $customerArr[$i],
                    `MWOARO2_Recovery` =>  $customerArr[$i],
                    `MWOARO2_DrawDP` =>  $customerArr[$i],
                    `MWOARO2_FeedDP` =>  $customerArr[$i],
                    `MWOARO2_TMPRESS` =>  $customerArr[$i],
                    `MWRO_Recovery` =>  $customerArr[$i],
                    `MWRO_DP` =>  $customerArr[$i],
                )
            );
        }



    }

}

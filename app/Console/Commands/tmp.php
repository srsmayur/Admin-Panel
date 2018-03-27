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

            {

                while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                DB::table('csv')->insert(
                    array(
                        'LocalDate' => date('Y-m-d',strtotime($row[0])),
                        'LocalTime' => $row[1],
                        'MWAIT_BR_001_ACT' => $row[2],
                        'MWAIT_DS_001_ACT' => $row[3],
                        'MWCT_BR_001_ACT' => $row[4],
                        'MWCT_BR_002_ACT' => $row[5],
                        'MWCT_BR_003_ACT' => $row[6],
                        'MWCT_PR_001_ACT' => $row[7],
                        'MWCT_DS_001_ACT' => $row[8],
                        'MWCT_DS_002_ACT' => $row[9],
                        'MWCT_DS_003_ACT' => $row[10],
                        'MWCT_DS_004_ACT' => $row[11],
                        'MWCT_DS_005_ACT' => $row[12],
                        'MWCT_DS_006_ACT' => $row[13],
                        'MWFIT_BR_001_ACT' => $row[14],
                        'MWFIT_BR_002_ACT' => $row[15],
                        'MWFIT_BR_003_ACT' => $row[16],
                        'MWFIT_DS_001_ACT' => $row[17],
                        'MWFIT_DS_003_ACT' => $row[18],
                        'MWFIT_DS_004_ACT' => $row[19],
                        'MWFIT_DS_005_ACT' => $row[20],
                        'MWFIT_DS_006_ACT' => $row[21],
                        'MWFIT_DS_007_ACT' => $row[22],
                        'MWFIT_PR_001_ACT' => $row[23],
                        'MWPT_BR_001_ACT' => $row[24],
                        'MWPIT_BR_002_ACT' => $row[25],
                        'MWPT_DS_001_ACT' => $row[26],
                        'MWPIT_DS_002_ACT' => $row[27],
                        'MWPT_DS_003_ACT' => $row[28],
                        'MWPT_DS_004_ACT' => $row[29],
                        'MWPT_DS_005_ACT' => $row[30],
                        'MWPIT_DS_006_ACT' => $row[31],
                        'MWPT_DS_007_ACT' => $row[32],
                        'MWPT_DS_008_ACT' => $row[33],
                        'MWTT_BR_001_ACT' => $row[34],
                        'MWTT_DS_001_ACT' => $row[35],
                        'MWTT_DS_002_ACT' => $row[36],
                        'MWPMP_BR_002_ACT' => $row[37],
                        'MWPMP_DS_002_ACT' => $row[38],
                        'MWPMP_DS_004_ACT' => $row[39],
                        'MWOARO1_Recovery' => $row[40],
                        'MWOARO1_DrawDP' => $row[41],
                        'MWOARO1_FeedDP' => $row[42],
                        'MWOARO1_TMPRESS' => $row[43],
                        'MWOARO2_Recovery' => $row[44],
                        'MWOARO2_DrawDP' => $row[45],
                        'MWOARO2_FeedDP' => $row[46],
                        'MWOARO2_TMPRESS' => $row[47],
                        'MWRO_Recovery' => $row[48],
                        'MWRO_DP' => $row[49],
                    )
                );

                if (!$header){
                    $header = $row;


                }
                else{
                    $data[] = array_combine($header, $row);
                }
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

        }



    }

}

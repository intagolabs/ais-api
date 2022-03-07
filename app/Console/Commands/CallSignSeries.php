<?php

namespace App\Console\Commands;

use App\Models\Callsign;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CallSignSeries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'callsign:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Call Sign Series';

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
     * @return int
     */
    public function handle()
    {
        $callSignSeries = DB::table('callsignseries')->get();
        $countries = [];

        foreach($callSignSeries as $callSignSerie) {
            $series = explode(' - ',$callSignSerie->Series);
            $current = $series[0];
            $start = $series[0];
            $stop = $series[1];
            $country = $callSignSerie->Country;

            while($current <> $stop ) {
                $countries[$current] = $country;
                $current = ++$current;
            }
        }

        foreach($countries as $callsign => $country) {
            Callsign::create(['callsign'=>$callsign, 'country'=>$country]);
        }

    }
}

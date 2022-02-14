<?php

namespace App\Http\Controllers;

use App\Models\Ais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AISHubController extends Controller
{
    public $username, $host, $format, $output, $compress;

    public function __construct() {
        $this->username = env('AISHUB_USER');
        $this->host = 'http://data.aishub.net/ws.php?';
        $this->format = 1;
        $this->output = 'json';
        $this->compress = 0;
    }

    public function getParameters() {
        return 'username='.$this->username.'&format='.$this->format.'&output='.$this->output.'&compress='.$this->compress;
    }

    public function fetch() {
        echo "Download the latest ais.json version ".$this->host.$this->getParameters()."/r/n";
        $data = file_get_contents($this->host.$this->getParameters());
        Storage::put('ais.json',$data);
    }

    public function process() {
        echo "Open the AIS File/r/n";
        $ais_raw = json_decode(Storage::get('ais.json'));

        foreach ($ais_raw[1] as $ais_record) {
            echo "Import ".$ais_record->MMSI."/r/n";
            Ais::updateOrCreate([
                'mmsi'=>$ais_record->MMSI,
            ],
            [
                'imo'=>$ais_record->IMO,
                'name'=>$ais_record->NAME,
                'latitude'=>$ais_record->LATITUDE,
                'longitude'=>$ais_record->LONGITUDE,
                'navstat'=>$ais_record->NAVSTAT,
            ]);
        }
        echo "AIS Import Finished/r/n";
    }
}

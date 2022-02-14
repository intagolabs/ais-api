<?php

namespace App\Http\Controllers;

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
        echo $this->host.$this->getParameters();
        $data = file_get_contents($this->host.$this->getParameters());
        Storage::put('ais.json',$data);
    }

    public function process() {
        $ais_data = json_decode(Storage::get('ais.json'));
        /*foreach ($ais_data[1] as $ais) {
            if(intval($ais->MMSI) === intval($contact->mmsi)) {
                $contact->ais_latitude = $ais->LATITUDE;
                $contact->ais_longitude = $ais->LONGITUDE;
                $contact->ais_datetime = date('Y-m-d H:i:s');
                $contact->ais_destination = $ais->DEST;
                $contact->ais_current_location = $ais->DEST;
                $contact->ais_is_sailing = (intval($ais->NAVSTAT) === 0);
                $contact->save();
                echo $contact->mmsi." = ".$ais->DEST."/r/n";
            }
        }*/
    }
}

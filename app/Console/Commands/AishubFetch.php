<?php

namespace App\Console\Commands;

use App\Http\Controllers\AISHubController;
use Illuminate\Console\Command;

class AishubFetch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'aishub:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch the latest information from AISHub';

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
        $aishub = new AISHubController();
        $aishub->fetch();
    }
}

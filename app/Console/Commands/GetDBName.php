<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Nette\Schema\Helpers;
use Symfony\Component\Console\Helper\Helper;

class GetDBName extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:get_db_name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To get the current database name';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = current_url();
        // $dbName = DB::connection()->getDatabaseName();
        $this->info('Current database name is '.$name);
        // $name = DB::table('users')->get();
        // $this->info($name);
    }
}

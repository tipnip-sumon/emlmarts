<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class EmailSand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:email_sand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email Sand Command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $this->info('Hello');
        $this->info(DB::table('users')->get());
    }
}

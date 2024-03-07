<?php

namespace App\Console;

use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('get_db_name')->everyMinute();
        // $schedule->command('inspire')->everyMinute();
        // $schedule->call(function () {
        //     User::where(["is_verify"=> false])->delete();
        // })->everyMinute();
        // $schedule->command("EmailSand")->everyMinute();
        $schedule->call(function () {
            $url = current_url();
            echo"". $url ."";
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}

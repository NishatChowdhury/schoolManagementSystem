<?php

namespace App\Console;

use App\Console\Commands\AttendanceSMS;
use App\Console\Commands\DownloadAttendances;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        DownloadAttendances::class,
        AttendanceSMS::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('CronJob:DownloadAttendances')->everyFiveMinutes();
        $schedule->command('CronJob:AttendanceSMS')->everyMinute();
        $schedule->command('CronJob:GenerateAttendances')->everyMinute();
        $schedule->command('CronJob:AbsentSMS')->everyMinute();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

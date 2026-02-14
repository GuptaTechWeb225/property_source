<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\TenantRentExpirationNotice;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        TenantRentExpirationNotice::class,
    ];


    protected function schedule(Schedule $schedule)
    {
        $day_of_month = Setting('payment_due_alert_day') ?  Setting('payment_due_alert_day') : 1 ;

        // $schedule->command('rent:notice')
        // ->everyMinute();

        $schedule->command('rent:notice')
            ->monthlyOn($day_of_month);

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

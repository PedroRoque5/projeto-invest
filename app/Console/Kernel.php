<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as consoleKernel;

class Kernel extends consoleKernel
{

    protected function schedule(Schedule $schedule)
{
    // roda o comando a cada 5 minutos; ajuste conforme necessidade e limite da sua chave
    $schedule->command('smartfy:fetch-quotes')->everyFiveMinutes();
}
    
}

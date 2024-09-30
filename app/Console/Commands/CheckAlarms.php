<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CheckAlarms extends Command
{
    protected $signature = 'check-alarms';

    protected $description = 'Ejecuta el chequeo diario de alarmas';

    public function handle()
    {
        // Invoca el comando ChequeoDiario
        Artisan::call('generar:chequeoDiario');

        $this->info('Chequeo de alarmas completado.');
    }
}

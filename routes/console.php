<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

// Define um comando Artisan personalizado chamado 'inspire'
Artisan::command('inspire', function () {
    // Exibe uma citação inspiradora utilizando a classe Inspiring
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote') // Define o propósito do comando
  ->hourly(); // Define que o comando será executado a cada hora

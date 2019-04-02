<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class RelatoriosCron extends Command
{
    
    protected $signature = 'relatorios:cron';
    protected $description = 'Criar relatorios das empresas';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $controller = app()->make('App\Http\Controllers\RelatoriosFinanceirosController');
        app()->call([$controller, 'create'], []);
        
    }
}

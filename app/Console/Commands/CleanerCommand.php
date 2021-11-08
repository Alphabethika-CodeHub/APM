<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CleanerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'apm:cc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command Cleaner for Laravel';

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
        $this->info("_______ ______ ________ ______  _________ ________ __________________");
        $this->info("___    |___  / ___  __ \___  / / /___    |___  __ )___  ____/___  __/");
        $this->info("__  /| |__  /  __  /_/ /__  /_/ / __  /| |__  __  |__  __/   __  /   ");
        $this->info("_  ___ |_  /____  ____/ _  __  /  _  ___ |_  /_/ / _  /___   _  /    ");
        $this->info("/_/  |_|/_____//_/      /_/ /_/   /_/  |_|/_____/  /_____/   /_/     ");
        $this->info("");
        $this->info(" -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  - ");
        $this->info('Please Wait..');
        $this->call('cache:clear');
        $this->call('config:clear');
        $this->call('event:clear');
        $this->call('route:clear');
        $this->call('view:clear');
        $this->call('optimize:clear');
        $this->info('.');
        $this->info('.');     
        $this->info('Cleaning Complete, Have a Nice Day.');
    }
}

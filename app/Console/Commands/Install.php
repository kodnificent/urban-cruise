<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:install {--with-publishers} {--with-users}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        $this->call('app:make:settings');

        $this->call('app:make:admin');

        if ($this->option('with-publishers') || $this->option('with-users')) {
            $this->call('app:make:publishers', [
                '--with-users' => $this->option('with-users')
            ]);
        }
    }
}

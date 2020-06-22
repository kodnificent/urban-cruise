<?php

namespace App\Console\Commands;

use CategoryTableSeeder;
use Illuminate\Console\Command;
use ImageTableSeeder;
use PostTableSeeder;

class MakeDemoPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make:demo-posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create demo posts for testing purposes';

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
        $this->call('db:seed', [
            '--class' => PostTableSeeder::class
        ]);
    }
}

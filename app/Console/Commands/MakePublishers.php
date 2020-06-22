<?php

namespace App\Console\Commands;

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Console\Command;

class MakePublishers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make:publishers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create default publisher roles. Default roles are Editor and Author';

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
        // we'll create 3 editors and 10 authors
        factory(User::class, 3)->create([
            'role' => 'editor',
        ]);
        $this->comment('Attaching editor role to 3 new users');

        factory(User::class, 10)->create([
            'role' => 'author',
        ]);
        $this->comment('Attaching author role to 10 new users');
    }
}

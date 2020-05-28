<?php

namespace App\Console\Commands;

use App\Role;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a default super admin user';

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
        $role = $this->createAdminRole();

        $user = $this->createAdmin();

        $user->roles()->attach($role);

        $this->comment("{$user->email} has now been assigned the admin role");
    }

    /**
     * Create default admin role
     *
     * @return \App\Role
     */
    public function createAdminRole()
    {
        $this->comment('Attempting to create admin role');

        // first we are going to create a super admin role
        // we'll warn the console if this role already exists
        $role_name = 'Administrator';
        $role = Role::firstWhere('title', $role_name);

        if ($role) {
            $this->comment("$role_name role already exists.");
        } else {
            $role = new Role();
            $role->title = $role_name;
            $role->description = "An $role_name has all permissions make any changes to your site. Ensure you have very few of them.";
            $role->save();

            $this->comment("$role_name role created successfully!");
        }

        return $role;
    }

    /**
     * Create a default admin and return an instance of the model
     *
     * @return \App\User
     */
    protected function createAdmin()
    {
        $this->comment("Attempting to create default admin");

        $email = 'admin@example.com';
        $password = 'password';
        $user = User::firstWhere('email', $email);

        if ($user) {
            $this->comment("$email already exists");
        } else {
            $user = new User;
            $user->email = $email;
            $user->name = "Urban Cruise";
            $user->password = Hash::make($password);
            $user->email_verified_at = now();
            $user->remember_token = Str::random(10);
            $user->save();

            $this->comment("Admin created successfully! Email - $email, Password - $password");
        }

        return $user;
    }
}

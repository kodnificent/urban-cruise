<?php

namespace App\Console\Commands;

use App\Role;
use App\User;
use App\UserProfile;
use Faker\Factory;
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
        $user = $this->createAdmin();

        $this->comment("{$user->email} has now been assigned the admin role");
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
            $user->role = 'admin';
            $user->save();

            $profile = new UserProfile([
                'job_title' => 'Founder',
                'company' => 'Urban Cruise',
                'about' => Factory::create()->text(300),
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'linkedin' => 'https://linkedin.com',
                'website' => 'https://urbancruise.com',
            ]);

            $user->profile()->save($profile);

            $this->comment("Admin created successfully! Email - $email, Password - $password");
        }

        return $user;
    }
}

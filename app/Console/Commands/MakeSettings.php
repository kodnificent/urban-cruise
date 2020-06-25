<?php

namespace App\Console\Commands;

use App\AppSetting;
use Illuminate\Console\Command;

class MakeSettings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make:settings {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate the database with app settings';

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
        $setting = AppSetting::first();
        if ($setting && ! $this->option('force')) {
            return $this->comment('App Setting already exist!');
        }
        if (! $setting) {
            $setting = new AppSetting();
        }

        $setting->site_name = 'Urban Cruise';
        $setting->site_description = 'A short description';
        $setting->site_logo = '';
        $setting->facebook = 'https://fb.com';
        $setting->instagram = 'https://instagram.com';
        $setting->twitter = 'https://twitter.com';
        $setting->save();

        $this->comment('App setting created successfully!');
    }
}

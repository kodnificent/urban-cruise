<?php

namespace Tests\Utils;

trait InstallsApp
{
    protected function installApp()
    {
        $this->artisan('app:install', [
            '--with-users' => true
        ]);

        $this->artisan('db:seed');
    }
}

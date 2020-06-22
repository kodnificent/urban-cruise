<?php

namespace Tests\Utils;

trait InstallsApp
{
    protected function installApp()
    {
        $this->artisan('db:seed');

        $this->artisan('app:install');
    }
}

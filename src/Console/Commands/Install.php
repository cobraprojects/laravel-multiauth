<?php

namespace CobraProjects\Multiauth\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'multiauth:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will publishing migration and factories, running all migration and seeding initial super admin with role and permissions.';

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
        $this->publishAssets();

        $this->runMigration();

        $this->seedSuperAdmin();

        $this->publishAndCompileUI();
    }

    protected function publishAssets()
    {
        $this->warn('1. Publishing Configurations');
        Artisan::call('vendor:publish --tag=multiauth:config');
        $this->info(Artisan::output());

        $this->warn('2. Publishing Migrations');
        Artisan::call('vendor:publish --tag=multiauth:migrations');
        $this->info(Artisan::output());

        $this->warn('3. Publishing Views');
        Artisan::call('vendor:publish --tag=multiauth:views');
        $this->info(Artisan::output());
    }

    protected function runMigration()
    {
        $this->warn('4. Running Migrations');
        Artisan::call('migrate');
        $this->info(Artisan::output());
    }

    protected function seedSuperAdmin()
    {
        $this->warn('5. Seeding New Super Admin');
        Artisan::call('multiauth:seed --role=super');
        $this->info(Artisan::output());
    }

    protected function publishAndCompileUI()
    {
        if (!Route::has('login')) {
            $this->warn('6. Publishing UI bootstrap copmonent');
            Artisan::call('ui bootstrap --auth -n');
            $this->info(Artisan::output());
            $this->warn('Running npm, please wait...');
            $this->info(shell_exec('npm install && npm run dev'));
        }
    }
}

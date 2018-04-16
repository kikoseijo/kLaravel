<?php

namespace Ksoft\Klaravel\Console\Commands;

use Illuminate\Console\Command;
use Ksoft\Klaravel\Console\Helpers\Publisher;

class PublishConfig extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'ksoft:publish
                        {--k|base-krud : Will publish BaseKrudController to App/Http/Controllers}
                        {--z|settings : Will publish base settings to config/settings/***.php}
                        {--c|config : Will publish config to config/ksoft.php}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish required files: Controllers/BaseKrudController + Config';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->info('Publish config files');

        if ($this->option('base-krud') || $this->option('config') || $this->option('settings')) {
            $this->withoutUserInteraction();
        } else {
            $this->withUserInteraction();
        }
    }

    protected function withUserInteraction()
    {
        $optionSelected = $this->choice('What whould you like to publish?', ['all', 'Configuration', 'BaseKrudController'], 0);

        if ($optionSelected == 'all' || $optionSelected == 'Configuration') {
            $this->publishConfig();
            $this->info('Publish configuration file: <info>✔</info>');
        }

        if ($optionSelected == 'all' || $optionSelected == 'BaseKrudController') {
            $this->publishBaseKrud();
            $this->info('Publish BaseKrudController file: <info>✔</info>');
        }
    }

    protected function withoutUserInteraction()
    {
        if ($this->option('settings')) {
            $this->publishSettings();
            $this->info('Publish configuration file: <info>✔</info>');
        }

        if ($this->option('config')) {
            $this->publishConfig();
            $this->info('Publish configuration file: <info>✔</info>');
        }

        if ($this->option('base-krud')) {
            $this->publishBaseKrud();
            $this->info('Publish BaseKrudController file: <info>✔</info>');
        }
    }

    protected function publishConfig(){
      (new Publisher($this))->publishFile(
          KLARAVEL_PATH.'/stubs/config/ksoft.php',
          base_path('config'),
          'ksoft.php'
      );
    }

    protected function publishSettings(){
      (new Publisher($this))->publishDirectory(
          KLARAVEL_PATH.'/stubs/config/settings',
          base_path('config/klara')
      );
    }

    protected function publishBaseKrud(){
      (new Publisher($this))->publishFile(
          KLARAVEL_PATH.'/stubs/Controllers/BaseKrudController.php',
          base_path('app/Http/Controllers'),
          'BaseKrudController.php'
      );
    }
}

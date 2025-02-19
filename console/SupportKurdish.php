<?php

namespace AcornAssociated\BackendLocalization\Console;

use File;
use Winter\Storm\Console\Command;
use Illuminate\Support\Facades\Storage;




/**
 * command add support language kurdish
 * use command
 *  php artisan support:kurdish
 * @author Jaber Rasul
 * @package AcornAssociated
 */
class SupportKurdish extends Command
{
    /**
     * @var string The console command name.
     */
    protected static $defaultName = 'support:kurdish';

    /**
     * @var string The name and signature of this command.
     */
    protected $signature = 'support:kurdish';

    /**
     * @var string The console command description.
     */
    protected $description = 'No description provided yet...';

    /**
     * Execute the console command.
     * @return void
     */
    public function handle()
    {
        // add file lang ku on backend and system

        $this->MakeDirectoryKuONBackend();


        // add icon flag ku on system modules/system/assets/ui/vendor/flag-icon/flags/(4x4 and 1x1)


        $this->MakeFlagIconKuOnSystem();



        // add file lang.js to modules/system/assets/js/lang/lang.ku.js to support lang ku on datapicker
        $this->MakeLangFileJsDatePicker();

    }



    /**
     *
     * this method to add file lang.ku.js to system to support datapicker ku
     *
     *
     * @return void
     */

    public function MakeLangFileJsDatePicker(): void{

        $BackendFileJsKurdishPathOne = base_path('modules/system/assets/js/lang');
        $pluginFileJsKurdishPathOne = plugins_path("acornassociated/backendlocalization/console/file_backend_system_lang/lang.ku.js");

        File::delete(str_finish($BackendFileJsKurdishPathOne, '/lang.ku.js'));

        if (File::exists($pluginFileJsKurdishPathOne)) {
            if (!File::exists(str_finish($BackendFileJsKurdishPathOne, '/lang.ku.js'))) {

                if (!File::isDirectory($BackendFileJsKurdishPathOne)) {
                    File::makeDirectory($BackendFileJsKurdishPathOne, 0755, true);
                }
                File::copy($pluginFileJsKurdishPathOne, str_finish($BackendFileJsKurdishPathOne, '/lang.ku.js'));
                $this->info("Add File $BackendFileJsKurdishPathOne Success ");
            } else {
                $this->error("This file $BackendFileJsKurdishPathOne already exists");
            }
        } else {
            $this->error("Source file $pluginFileJsKurdishPathOne does not exist");
        }
    }


    /**
     *
     * This method for creaet ku on backend and system
     *
     * @return void
     */

    public function MakeDirectoryKuONBackend(): void
    {
        $backendPluginLangPath = plugins_path('acornassociated/backendlocalization/console/file_backend_system_lang/backend/ku');
        $backendLangPath = base_path('modules/backend/lang/ku');
        $systemPluginLangPath = plugins_path('acornassociated/backendlocalization/console/file_backend_system_lang/system/ku');
        $systemLangPath = base_path('modules/system/lang/ku');

        if (!File::exists($backendLangPath)) {
            File::makeDirectory($backendLangPath, 0755, true);
            File::copyDirectory($backendPluginLangPath, $backendLangPath);
            $this->info("Add File $backendLangPath Success ");
        } else {
            $this->error("This file $backendLangPath already exists");
        }

        if (!File::exists($systemLangPath)) {
            File::makeDirectory($systemLangPath, 0755, true);
            File::copyDirectory($systemPluginLangPath, $systemLangPath);
            $this->info("Add File $systemLangPath Success");
        } else {
            $this->error("This file $systemLangPath already exists");
        }
    }

    /**
     *
     * This method for create flag icon ku on system
     *
     * @return void
     */

    public function MakeFlagIconKuOnSystem(): void
    {

        $BackendFlagIconKurdishPathOne = base_path('modules/system/assets/ui/vendor/flag-icon/flags/1x1');
        $BackendFlagIconKurdishPathFour = base_path('modules/system/assets/ui/vendor/flag-icon/flags/4x3');
        $pluginFlagIconKurdishPathOne = plugins_path("acornassociated/backendlocalization/console/flags/1x1/ir.svg");
        $pluginFlagIconKurdishPathFour = plugins_path("acornassociated/backendlocalization/console/flags/4x3/ir.svg");

        File::delete(str_finish($BackendFlagIconKurdishPathOne, '/ir.svg'));
        File::delete(str_finish($BackendFlagIconKurdishPathFour, '/ir.svg'));

        if (File::exists($pluginFlagIconKurdishPathOne)) {
            if (!File::exists(str_finish($BackendFlagIconKurdishPathOne, '/ir.svg'))) {

                if (!File::isDirectory($BackendFlagIconKurdishPathOne)) {
                    File::makeDirectory($BackendFlagIconKurdishPathOne, 0755, true);
                }
                File::copy($pluginFlagIconKurdishPathOne, str_finish($BackendFlagIconKurdishPathOne, '/ir.svg'));
                $this->info("Add File $BackendFlagIconKurdishPathOne Success ");
            } else {
                $this->error("This file $BackendFlagIconKurdishPathOne already exists");
            }
        } else {
            $this->error("Source file $pluginFlagIconKurdishPathOne does not exist");
        }

        if (File::exists($pluginFlagIconKurdishPathFour)) {
            if (!File::exists(str_finish($BackendFlagIconKurdishPathFour, '/ir.svg'))) {

                if (!File::isDirectory($BackendFlagIconKurdishPathFour)) {
                    File::makeDirectory($BackendFlagIconKurdishPathFour, 0755, true);
                }
                File::copy($pluginFlagIconKurdishPathFour, str_finish($BackendFlagIconKurdishPathFour, '/ir.svg'));
                $this->info("Add File $BackendFlagIconKurdishPathFour Success");
            } else {
                $this->error("This file $BackendFlagIconKurdishPathFour already exists");
            }
        } else {
            $this->error("Source file $pluginFlagIconKurdishPathFour does not exist");
        }
    }

    /**
     * Provide autocomplete suggestions for the "myCustomArgument" argument
     */
    // public function suggestMyCustomArgumentValues(): array
    // {
    //     return ['value', 'another'];
    // }
}

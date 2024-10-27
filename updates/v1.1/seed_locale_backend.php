<?php

use Backend\Models\Preference;
use Illuminate\Support\Facades\Lang;
use Winter\Storm\Database\Updates\Seeder;
use Winter\Translate\Models\Locale;
use Illuminate\Support\Facades\Artisan;


class SeedLocaleBackend extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $object_preference = new Preference();
        $LocaleOptions = $object_preference->getLocaleOptions();
        if(isset($LocaleOptions) && !empty($LocaleOptions)){
            if(class_exists(Locale::class)){
                        Locale::create(['name'=> 'Arabic', 'code' => 'ar' , 'is_enabled'=>true , 'is_default' => false]);
                        Locale::create(['name'=> 'Kurdish', 'code' => 'ku' , 'is_enabled'=>true , 'is_default' => false]);
            }
        }

        // exec('php artisan support:kurdish');

    }
}

<?php

namespace Acorn\BackendLocalization;

use Backend;
use Backend\Controllers\Preferences;
use Backend\Models\Preference;
use System\Classes\PluginBase;
use Flash;
use Winter\Translate\Models\Locale;
use Lang;
use Session;
use Cache;
use Config;
use Illuminate\Support\Facades\URL;

/**
 * localization Plugin Information File
 * @author Jaber Rasul
 * @package Acorn
 */
class Plugin extends PluginBase
{

    public $require = ['Winter.Translate'];

    /**
     * Returns information about this plugin.
     */
    public function pluginDetails(): array
    {
        return [
            'name'        => 'acorn.backendlocalization::lang.plugin.name',
            'description' => 'acorn.backendlocalization::lang.plugin.description',
            'author'      => 'Acorn',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     */
    public function register()
    {
        $this->registerConsoleCommand('support:kurdish', \Acorn\BackendLocalization\Console\SupportKurdish::class);
    }

    /**
     * Boot method, called right before the request route.
     */
    public function boot(): void
    {
        // Extend the Locale model to make 'name', 'code', 'is_default', and 'is_enabled' attributes fillable.

        $this->extendAttributesFillable();

        // Extend the Preference model to update session locale and fallback_locale after saving.

        $this->extendPreferenceModelAfterSaving();


        // Extend the Preferences controller to add custom JavaScript and a dynamic method for resetting the default locale.

        $this->extendPreferencesControllerDefaultLocale();



        // Extend the form fields of the Preferences controller to customize the 'locale' and 'timezone' fields.
        $this->extendFieldsPreferencesController();
    }

    /**
     *
     * Extend the Locale model to make 'name', 'code', 'is_default', and 'is_enabled' attributes fillable.
     *
     * @return void
     */
    private function extendAttributesFillable(): void
    {
        Locale::extend(function ($model) {
            $model->addFillable(['name', 'code', 'is_default', 'is_enabled']);
        });
    }

    /**
     *
     *  Extend the Preference model to update session locale and fallback_locale after saving.
     *
     * @return void
     */
    private function extendPreferenceModelAfterSaving(): void
    {

        // Preference::extend(function ($model) {

        //     // Bind an event that triggers after the model is saved.
        //     $model->bindEvent('model.afterSave', function () use ($model) {
        //         Session::put('locale', $model->value['locale']);
        //         Session::put('fallback_locale', $model->value['fallback_locale']);

        //         // Update the Locale model to set the new default locale.
        //         $local = $model->value['locale'];
        //         $object_locale = new Locale();
        //         $object_locale::clearCache();
        //         $object_locale::query()->update(['is_default' => false]);

        //         // Set the specified locale as default. If update fails, set 'en' as default.
        //         if (!($object_locale::query()->where('code', $local)->update(['is_default' => true]))) {
        //             $object_locale::query()->where('code', 'en')->update(['is_default' => true]);
        //         }
        //     });
        // });
    }

    /**
     *
     * Extend the Preferences controller to add custom JavaScript and a dynamic method for resetting the default locale.
     *
     * @return void
     */
    private function extendPreferencesControllerDefaultLocale(): void
    {
        // Preferences::extend(function ($controller) {

        //     // Add custom JavaScript file to the controller.
        //     $controller->addJs(URL::asset('plugins/acorn/backendlocalization/assets/js.js'));

        //     // Add a dynamic method 'onNewResetDefault' to reset the default locale to 'en'.
        //     $controller->addDynamicMethod('onNewResetDefault', function () use ($controller) {
        //         $model = $controller->formFindModelObject();
        //         $model->resetDefault();

        //         // Update the Locale model to set 'en' as default.
        //         $object_locale = new Locale();
        //         $object_locale::clearCache();
        //         $object_locale::query()->update(['is_default' => false]);
        //         if (!($object_locale::query()->where('code', 'en')->update(['is_default' => true]))) {
        //             $object_locale::query()->where('code', 'en')->update(['is_default' => true]);
        //         }

        //         // Display success message.
        //         Flash::success(Lang::get('backend::lang.form.reset_success'));

        //         return Backend::redirect('backend/preferences');
        //     });
        // });
    }

    /**
     *
     * Extend the form fields of the Preferences controller to customize the 'locale' and 'timezone' fields.
     *
     * @return void
     */
    private function extendFieldsPreferencesController(): void
    {
        Preferences::extendFormFields(function ($form, $model, $context) {

            // Check if the model is an instance of Preference.
            if (!$model instanceof Preference) {
                return;
            }

            // Remove the existing 'locale' field and add a new one with specific options.
            $form->removeField('locale');
            $form->addTabFields([
                'locale' => [
                    'label' => "backend::lang.backend_preferences.locale",
                    'comment' => "backend::lang.backend_preferences.locale_comment",
                    'type' => 'dropdown',
                    'options' => '\Acorn\Backendlocalization\Plugin::getAcornOptions',
                    'tab'   => "backend::lang.backend_preferences.region",
                    'span' => 'left',
                ]
            ]);


            // Remove the existing 'timezone' field and add a new one with the default options.
            $form->removeField('timezone');
            $form->addTabFields([
                'timezone' => [
                    'label' => "backend::lang.backend_preferences.timezone",
                    'comment' => "backend::lang.backend_preferences.timezone_comment",
                    'type' => 'dropdown',
                    'tab'   => "backend::lang.backend_preferences.region",
                    'span' => 'left',
                ]
            ]);
        });
    }

    public static function getAcornOptions(){
        $localeOptions = [
            'ar'    => [Lang::get('system::lang.locale.ar'),    'flag-sa'],
            'en'    => [Lang::get('system::lang.locale.en'),    'flag-us'],
            'ku'    => [Lang::get('acorn.backendlocalization::lang.plugin.kurdish'),    'flag-ir'],
        ];

        $locales = Config::get('app.localeOptions', $localeOptions);

        // Sort locales alphabetically
        asort($locales);

        return $locales;
    }
}

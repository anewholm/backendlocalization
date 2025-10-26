<?php

namespace Acorn\Backendlocalization\Class;

use Lang;
use Request;
use \Acorn\BackendRequestController;
use Exception;
use Illuminate\Support\Str;

/**
 * It does this algorithmically by dynamically translating the fields 
 * using the winter package winter/wn-translate-plugin
 *
 * @requires
 * Install Winter Translate
 *
 * 1- composer require winter/wn-translate-plugin
 * 2- php artisan winter:up
 * Or
 * @see https://github.com/wintercms/wn-translate-plugin
 *
 * @use
 *  public $implement = ['Winter.Translate.Behaviors.TranslatableModel'];
 *  public $translatable = ['name'];
 *
 *  use Acorn\Backendlocalization\Class\TranslateBackend;
 *
 * @author Jaber Rasul
 * @package Acorn
 *
 */
// TODO: Input Language control dropdown => backend users locale

trait TranslateBackend
{
    /**
     * Summary of __get
     * @param mixed $name
     * @return mixed
     */
     public function __get($name)
     {
         // FormField::getFieldNameFromData() uses 2 ways:
         //   Storm\Model::__isset(key) 
         //     => HasAttributes::getAttribute(key) 
         //     => HasAttributes::getAttributeValue(key)
         //     this works: $name = $result->getAttribute($key);
         //   AA\Model::__get(key) 
         //     => TranslatableBehavior::getAttributeTranslated(key, locale) 
         //     => TranslatableBehavior::getAttributeFromData(data, key) where data is 
         //     this $this->model->attributes, not the target model
         //
         // TODO: Use BackendRequestController::isUpdate(); with the requested controller
         // This does not work: BackendRequestController::isUpdate();
         // because findController() will only return the existing controller
         // which is apparently NULL for updates. Why??
         $isUpdate = strstr(Request::url(), '/update/'); 
         if (!$isUpdate && in_array($name, $this->translatable)) {
            // Seems to forget this further down the chain...
            $this->translateContext(Lang::getLocale());

            if ($this->hasGetMutator($name)) {
               // Copied from hasGetMutator()
               $method = 'get'.Str::studly($name).'Attribute';
               $value  = $this->$method();
            } else if ($this->hasAttributeMutator($name)) {
               throw new Exception("TranslateBackend: AttributeMutator not supported for __get($name)");
            } else if ($this->isClassCastable($name)) {
               throw new Exception("TranslateBackend: ClassCastable not supported for __get($name)");
            } else {
               $value = $this->getAttributeTranslated($name);
            }
         } else {
            $value = parent::__get($name);
         }

         return $value;
     }
}

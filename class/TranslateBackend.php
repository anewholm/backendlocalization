<?php

namespace Acorn\Backendlocalization\Class;

use Lang;
use Request;
use \Acorn\BackendRequestController;

/**
 *
 * It does this algorithmically by dynamically translating the fields using the winter package winter/wn-translate-plugin
 *
 * @requires
 * Install Winter Translate
 *
 * 1- composer require winter/wn-translate-plugin
 * 2- php artisan winter:up
 * Or
 * @see https://github.com/wintercms/wn-translate-plugin
 *
 *
 *
 * @use
 *
 *  public $implement = ['Winter.Translate.Behaviors.TranslatableModel'];
 *  public $translatable = ['name'];
 *
 *  use Acorn\Backendlocalization\Class\TranslateBackend;
 *
 *
 *
 * @author Jaber Rasul
 * @package Acorn
 *
 */

trait TranslateBackend
{
    /**
     * Summary of __get
     * @param mixed $name
     * @return mixed
     */
     public function __get($name)
     {
         // FormField::getFieldNameFromData():
         // 2 ways:
         // Storm\Model::__isset(key) 
         // => HasAttributes::getAttribute(key) 
         // => HasAttributes::getAttributeValue(key)
         // This works: $name = $result->getAttribute($key);
         // 
         // AA\Model::__get(key) 
         // => TranslatableBehavior::getAttributeTranslated(key, locale) 
         // => TranslatableBehavior::getAttributeFromData(data, key) where data is 
         //   this $this->model->attributes, not the target model
         // TODO: Apply to 1-1 relations
         if (in_array($name, $this->translatable)) {
            // TODO: Initialise the Translateable control to the backend users locale
            $value = $this->getAttributeTranslated($name, Lang::getLocale());
         } else {
            $value = parent::__get($name);
         }

         return $value;
     }
}

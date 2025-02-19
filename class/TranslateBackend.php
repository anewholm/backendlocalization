<?php

namespace AcornAssociated\Backendlocalization\Class;

use Lang;
use Request;
use \AcornAssociated\BackendRequestController;

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
 *  use AcornAssociated\Backendlocalization\Class\TranslateBackend;
 *
 *
 *
 * @author Jaber Rasul
 * @package AcornAssociated
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
         if (in_array($name, $this->translatable)) {
            if (BackendRequestController::isUpdate()) {
                // TODO: Shouldn't this be the default locale?
                return $this->getAttributeTranslated($name, 'en');
            } else {
                return $this->getAttributeTranslated($name, Lang::getLocale());
            }
         }
         return parent::__get($name);
     }
}

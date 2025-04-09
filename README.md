# BackendLocalization plugin

This plugin integrates the Winter package wn-translate-plugin  with the backend


## Installation

You can install the plugin using gitlab acornassociated.

# Install wn-translate-plugin
```bash
composer require winter/wn-translate-plugin; php artisan winter:up;
```

# Install BackendLocalization

```bash
cd plugins/ ; mkdir -p acornassociated ; cd acornassociated ; git clone git@gitlab.acornassociated.org:office/backendlocalization.git ; cd ../../;
```
## TranslateBackend Class

1. Include the Trait

    Add the TranslateBackend trait to your models that require dynamic translation. This trait integrates with the Winter Translate plugin to handle translations for specified fields.

    Example:

    ```sh  <?php

    namespace AcornAssociated\Backendlocalization\Models;

    use Model;
    use AcornAssociated\Backendlocalization\Class\TranslateBackend;

    class YourModel extends Model
    {
        use TranslateBackend;

        // Specify the fields that should be translated
        public $translatable = ['name', 'description'];

        // Implement the TranslatableModel behavior from Winter Translate
        public $implement = ['Winter.Translate.Behaviors.TranslatableModel'];
    }
    ```
2. Define Translatable Fields

   In your model, define which fields should be translatable by setting the $translatable property. This should be an array containing the names of the fields you want to translate.

   Example:

   ```sh
   public $translatable = ['name', 'description'];
   ```

3. Implement TranslatableModel Behavior

   Ensure that your model implements the TranslatableModel behavior provided by the Winter Translate plugin. This behavior enables automatic handling of translations for the specified fields.

   ```sh
   public $implement = ['Winter.Translate.Behaviors.TranslatableModel'];
   ```



## SupportKurdish Command

The SupportKurdish command is part of the BackendLocalization plugin, designed to add support for the Kurdish language to the WinterCMS backend. This command performs the following actions:

Copies the Kurdish language files to the backend and system modules.
Adds Kurdish flag icons to the system module.

## Usage
To execute the command, run the following in your terminal:
```sh
php artisan support:kurdish
```

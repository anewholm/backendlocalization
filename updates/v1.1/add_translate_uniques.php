<?php namespace Acorn\Calendar\Updates;

use DB;
use Schema;
use \Acorn\Migration as AcornMigration;

class AddTranslateUniques extends AcornMigration
{
    public function up()
    {
        Schema::table('winter_translate_attributes', function(\Winter\Storm\Database\Schema\Blueprint $table) {
            $this->addUniqueConstraint($table->name(), ['model_id', 'model_type', 'locale'], 'model_locale');
        });
        Schema::table('winter_translate_messages', function(\Winter\Storm\Database\Schema\Blueprint $table) {
            $this->addUniqueConstraint($table->name(), ['code']);
            $this->addUniqueConstraint($table->name(), ['message_data']);
        });
    }

    public function down()
    {
        Schema::table('acorn_user_users', function(\Winter\Storm\Database\Schema\Blueprint $table) {
            if (Schema::hasColumn($table->getTable(), 'acorn_imap_username')) $table->dropColumn('acorn_imap_username');
        });
    }
}

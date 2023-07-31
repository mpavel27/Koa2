<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIconCategory extends Migration
{
    protected $connection = 'mysql_ishop';

    public function up()
    {
        Schema::table('Categories', function (Blueprint $table) {
            $table->string('icon');
        });
    }

    public function down()
    {
        Schema::table('Categories', function(Blueprint $table) {
            $table->dropColumn('icon');
        });
    }
}

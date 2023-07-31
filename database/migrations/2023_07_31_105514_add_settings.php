<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSettings extends Migration
{
    protected $connection = 'mysql_settings';

    public function up()
    {
        Schema::create('Settings', function (Blueprint $table) {
            $table->id();
            $table->string('variable');
            $table->string('value');
        });
    }

    public function down()
    {
        Schema::dropIfExists('Settings');
    }
}

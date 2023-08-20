<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEventsTable extends Migration
{
    protected $connection = 'mysql_settings';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->datetime('event_date');
            $table->integer('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Events');
    }
}

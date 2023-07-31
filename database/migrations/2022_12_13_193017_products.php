<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    protected $connection = 'mysql_ishop';

    public function up()
    {
        Schema::create('Products', function (Blueprint $table) {
            $table->id();
            $table->integer('vnum')->default(0);
            $table->string('name');
            $table->string('description');
            $table->string('bonuses');
            $table->integer('category_id')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('Products');
    }
}

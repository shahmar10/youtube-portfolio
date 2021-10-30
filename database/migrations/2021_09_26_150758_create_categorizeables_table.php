<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorizeablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorizeables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');  //3 //2
            $table->unsignedBigInteger('categorizeable_id');   // 4 5 blog_id ve ya protekt_id
            $table->string('categorizeable_type');   // App\Models\Blog ve ya App\Models\Project
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
        Schema::dropIfExists('categorizeables');
    }
}

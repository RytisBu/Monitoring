<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systems', function (Blueprint $table) {
            $table->id()->autoIncrement()->nullable(false);
            $table->string('name')->nullable(false);
            $table->timestamps();
            $table->foreignId('created_by')->nullable(false);
            $table->foreignId('updated_by')->nullable(false);
            $table->foreignId('assigned_user_id');
            $table->string('status')->default('Active')->nullable(false);
            $table->boolean('deleted')->nullable(false);
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('systems');
    }
}

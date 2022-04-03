<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement()->nullable(false);
            $table->string('name')->nullable(false);
            $table->timestamps();
            $table->foreignId('created_by_user')->nullable(false)->constrained('users', 'id');
            $table->foreignId('updated_by_user')->nullable(false)->constrained('users', 'id');
            $table->set('category', ['System not working', 'Need permissions', 'Found bug', 'API', 'Other'])->default('Other')->nullable(false);
            $table->set('status', ['Registered', 'Solving', 'Resolved', 'Spam', 'Inform client'])->default('Registered')->nullable(false);
            $table->set('priority', ['Normal', 'Critical', 'Low'])->default('Normal')->nullable(false);
            $table->foreignId('assigned_user_id')->nullable(true)->constrained('users', 'id');
            $table->foreignId('system_id')->nullable(true)->constrained('systems', 'id');
            $table->text('description')->nullable(true);
            $table->set('deleted', [0, 1])->nullable(false)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaints');
    }
}

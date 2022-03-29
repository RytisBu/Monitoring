<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersAdditionalInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('users') === true) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('language')->default('LT')->nullable(false);
                $table->string('timezone')->default('+2')->nullable(false);
                $table->boolean('is_admin')->default(false);
                $table->string('address_street')->nullable();
                $table->string('address_state')->nullable();
                $table->string('address_country')->nullable();
                $table->string('address_city')->nullable();
                $table->integer('phone_mobile')->nullable();
                $table->integer('work_mobile')->nullable();
                $table->boolean('deleted')->default(false);
            });
        };
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumns('users', [
            'language',
            'timezone',
            'is_admin',
            'address_street',
            'address_state',
            'address_country',
            'address_city',
            'phone_mobile',
            'work_mobile',
            'deleted',
        ]);
    }
}

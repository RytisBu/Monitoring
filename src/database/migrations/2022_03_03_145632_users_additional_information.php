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
                $table->string('language')->default('LT');
                $table->string('timezone');
                $table->boolean('is_admin')->default(false);
                $table->string('address_street');
                $table->string('address_state');
                $table->string('address_country');
                $table->string('address_city');
                $table->integer('phone_mobile');
                $table->integer('work_mobile');
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

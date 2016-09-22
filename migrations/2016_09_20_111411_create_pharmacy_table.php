<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmacyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection($this->connection)->create('pharmacy', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('name');
            $table->string('address');
            $table->string('town');
            $table->string('state');
            $table->string('country');
            $table->string('status');
        });



        DB::connection($this->connection)->table('pharmacy')
            ->insert(
                [
                    'id'               => 1,
                    'name'             => 'realty-and-mortgage',
                    'address'          => '3928 E. Beverly Rd',
                    'town'             => 'Chandler',
                    'state'            => 'AZ',
                    'country'          => 'US',
                    'registeredStatus' => 'notregistered',
                ]
            );

        DB::connection($this->connection)->table('pharmacy')
            ->insert(
                [
                    'id'               => 2,
                    'name'             => '3d-hypnosis-center',
                    'address'          => '545 W Mariposa St',
                    'town'             => 'Mesa',
                    'state'            => 'NJ',
                    'country'          => 'US',
                    'registeredStatus' => 'registered',

                ]
            );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection($this->connection)->drop('pharmacy');
    }
}

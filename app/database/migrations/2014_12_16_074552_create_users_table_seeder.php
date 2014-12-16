<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTableSeeder extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::table('users')->insert(
            [
                [
                    'email'     =>'admin@gmail.com',
                    'password'  => \Hash::make('password'),
                    'activated' => 1,
                ],
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
        \DB::table('users')->delete();
    }


}

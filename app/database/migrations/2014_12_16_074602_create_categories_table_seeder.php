<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTableSeeder extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::table('categories')->insert(
            [
                [
                    'name'     =>'Phones',
                    'slug'  => 'phones',
                    'thumbnail' => 'packages/img/categories/K9CIdNOHUI1q8CUTXHu6SILIVtOHQD.jpg',
                    'meta_title'=> 'Phones',
                    'meta_description' =>'phones description',
                    'meta_keywords' =>'',
                ],
                [
                    'name'     =>'Cell phones',
                    'slug'  => 'cell-phones',
                    'thumbnail' => 'packages/img/categories/kh2PVfl3z1dzngAQczNfTGZMvry6m5.jpg',
                    'meta_title'=> 'Cell Phones',
                    'meta_description' =>'cheap phones',
                    'meta_keywords' =>'buy phones',
                ],
                [
                    'name'     =>'Smart phones',
                    'slug'  => 'smart-phones',
                    'thumbnail' => 'packages/img/categories/sILCwST6mAPQC4SsOI5jcojOUF7w44.jpg',
                    'meta_title'=> 'Smart Phones',
                    'meta_description' =>'category description',
                    'meta_keywords' =>'',
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
        \DB::table('categories')->delete();
    }

}

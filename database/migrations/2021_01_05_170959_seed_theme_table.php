<?php

use App\Theme;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedThemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('themes', function (Blueprint $table) {
            $data = [
                [
                    'name' => 'Green',
                    'top_bar_background' => '#49688e',
                    'top_bar_color' => '#ffffff',
                    'header_background' => 'rgb(17, 201, 93)',
                    'header_color' => '#22246C',
                    'menu_background' => '#101250',
                    'menu_color' => '#ffffff',
                    'submenu_background' => '#ffffff',
                    'submenu_color' => '#212529',
                    'inner_background' => '#294a70',
                    'inner_color' => '#FFFFFF',
                    'footer_background' => '#121416',
                    'footer_color' => '#FFFFFF',
                ],[
                    'name' => 'Blue',
                    'top_bar_background' => '#49688e',
                    'top_bar_color' => '#ffffff',
                    'header_background' => '#ffffff',
                    'header_color' => 'rgb(34, 36, 108)',
                    'menu_background' => '#101250',
                    'menu_color' => '#ffffff',
                    'submenu_background' => '#ffffff',
                    'submenu_color' => 'rgb(33, 37, 41)',
                    'inner_background' => '#294a70',
                    'inner_color' => 'rgb(255, 255, 255)',
                    'footer_background' => '#121416',
                    'footer_color' => 'rgba(255, 255, 255, 0.5)',
                ]
            ];

            foreach ($data as $d) {
                Theme::query()->create($d);
            }

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('themes', function (Blueprint $table) {
            //
        });
    }
}

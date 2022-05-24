<?php

use App\City;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cities', function (Blueprint $table) {
            $cities = ['Barguna','Barishal','Bhola','Jhalokati','Patuakhali','Pirojpur','Bandarban','Brahmanbaria','Chandpur','Chattogram','Cumilla','Cox\'s Bazar','Feni','Khagrachhari','Lakshmipur','Noakhali','Rangamati','Dhaka','Faridpur','Gazipur','Gopalganj','Kishoreganj','Madaripur','Manikganj','Munshiganj','Narayanganj','Narsingdi','Rajbari','Shariatpur','Tangail','Bagerhat','Chuadanga','Jashore','Jhenaidah','Khulna','Kushtia','Magura','Meherpur','Narail','Satkhira','Jamalpur','Mymensingh','Netrokona','Sherpur','Bogura','Joypurhat','Naogaon','Natore','Chapainawabganj','Pabna','Rajshahi','Sirajganj','Dinajpur','Gaibandha','Kurigram','Lalmonirhat','Nilphamari','Panchagarh','Rangpur','Thakurgaon','Habiganj','Moulvibazar','Sunamganj','Sylhet'];
            foreach($cities as $city){
                City::query()->create(['name'=>$city]);
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
        Schema::table('cities', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedBloodGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blood_groups', function (Blueprint $table) {
            $bloodGroups = ['A+','A-','B+','B-','O+','O-','AB+','AB-'];
            foreach($bloodGroups as $grp){
                \App\BloodGroup::query()->create(['name'=>$grp]);
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
        Schema::table('blood_groups', function (Blueprint $table) {
            //
        });
    }
}

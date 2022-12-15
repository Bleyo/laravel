<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->primary(['picuniqueid'], 'uid');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
{
    "uid": "nanstis",
    "picuniqueid": "0",
    "picuniverse": "PCO",
    "cn": "ANSTIS Nicholas",
    "managerId": "xcherbuin",
    "temOu": "Release Management & Cut-Over",
    "temId": "12",
    "untOu": "Governance & Support",
    "untId": "000KFD",
    "divId": "00043",
    "mail": "nanstis@pictet.com",
    "city": "GVA",
    "position": "Developer Junior",
    "telephoneNumber": "8543",
    "cordless": "75395",
    "employeeType": "INT",
    "employeeNumber": "4904",
    "lastLogin": "Tue Dec 13 10:25:52 CET 2022",
    "authCount": "0",
    "addr": "ACE 06",
    "title": "Officer",
    "status": "working",
    "company": "Banque Pictet & Cie SA"
}
     */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};

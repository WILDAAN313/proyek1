<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('accounts', function (Blueprint $table) {
        $table->string('phone')->nullable();
        $table->date('birthdate')->nullable();
        $table->integer('weight')->nullable();
        $table->integer('height')->nullable();
        $table->string('photo')->nullable()->change();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('accounts', function (Blueprint $table) {
            //
        });
    }
};

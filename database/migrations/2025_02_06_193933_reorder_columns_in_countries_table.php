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
    DB::statement('
        ALTER TABLE countries
        MODIFY COLUMN country_code VARCHAR(10) AFTER name,
        MODIFY COLUMN phone_code VARCHAR(10) AFTER country_code
    ');
}

public function down()
{
    DB::statement('
        ALTER TABLE countries
        MODIFY COLUMN country_code VARCHAR(10) AFTER id,
        MODIFY COLUMN phone_code VARCHAR(10) AFTER name
    ');
}

};

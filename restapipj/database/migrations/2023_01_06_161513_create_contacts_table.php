<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable(false);
            $table->tinyInteger('gender')->nullable(false)->unsigned();
            $table->string('email')->nullable(false);
            $table->char('postcode',8)->nullable(false);
            $table->string('address')->nullable(false);
            $table->string('building_name');
            $table->text('opinion')->nullable(false);
            $table
                ->timestamp('created_at')
                ->useCurrent()
                ->nullable();
            $table
                ->timestamp('updated_at')
                ->useCurrent()
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}

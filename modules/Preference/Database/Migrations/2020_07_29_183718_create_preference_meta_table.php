<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreferenceMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('crmomni-migration.table_name.preference.meta'), function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('key')->unique();
            $table->string('industry_key')->nullable();         //From Global Lookup Value - Key (Industry Types)
            $table->string('type_key')->nullable();             //From Global Lookup Value - Key  (Data Types)          
            $table->string('display_value')->nullable();
            $table->string('description')->nullable();

            $table->boolean('is_minimum')->default(false);      //Minimum data type
            $table->boolean('is_maximum')->default(false);      //Maximum data type
            $table->text('filter_json')->nullable();
            $table->text('data_json')->nullable();
            $table->boolean('is_multiple')->default(false);     //Allows multiple selection
            $table->string('keywords')->nullable();
            $table->integer('order')->default(1);
            $table->boolean('is_active')->default(true);

            //Audit Log Fields
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('crmomni-migration.table_name.preference.meta'));
    }
}
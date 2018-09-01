<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * @var string
     */
    protected $tableName;

    public function __construct()
    {
        $this->tableName = mockaroo_prefix('locations');
    }
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable($this->tableName)) {
            Schema::create($this->tableName, function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('country_id')->nullable();
                $table->string('name');
                $table->timestamps();
                $table->softDeletes();

                $table->foreign('country_id')->references('id')->on(mockaroo_prefix('countries'))->onDelete('set null')->onUpdate('casade');
            });
        } else {
            console_write($this->tableName . ' already exists and so hasn\'t been created');
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}

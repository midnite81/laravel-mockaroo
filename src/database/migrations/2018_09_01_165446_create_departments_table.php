<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * @var string
     */
    protected $tableName;

    public function __construct()
    {
        $this->tableName = mockaroo_prefix('departments');
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
                $table->unsignedInteger('location_id')->nullable();
                $table->string('name');
                $table->timestamps();

                $table->foreign('location_id')->references('id')->on('locations')->onDelete('set null')->onUpdate('cascade');
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

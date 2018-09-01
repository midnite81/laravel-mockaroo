<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * @var string
     */
    protected $tableName;

    public function __construct()
    {
        $this->tableName = mockaroo_prefix('employees');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('gender_id')->nullable();
            $table->unsignedInteger('title_id')->nullable();
            $table->unsignedInteger('manager_id')->nullable();
            $table->string('country_id')->nullable();
            $table->string('first_name');
            $table->string('middle_names')->nullable();
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->string('national_insurance_no');
            $table->string('address_line_1');
            $table->string('address_line_2');
            $table->string('city');
            $table->string('county_state');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('title_id')->references('id')->on('titles')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('manager_id')->references('id')->on($this->tableName)->onDelete('set null')->onUpdate('cascade');
        });
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

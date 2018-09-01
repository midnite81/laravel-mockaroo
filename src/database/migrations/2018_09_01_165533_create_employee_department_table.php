<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeDepartmentTable extends Migration
{
    /**
     * @var string
     */
    protected $tableName;

    public function __construct()
    {
        $this->tableName = mockaroo_prefix('employee_department');
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
                $table->unsignedInteger('employee_id');
                $table->unsignedInteger('department_id');

                $table->foreign('employee_id')->references('id')->on(mockaroo_prefix('employees'))->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('department_id')->references('id')->on(mockaroo_prefix('departments'))->onDelete('cascade')->onUpdate('cascade');
                $table->unique(['employee_id', 'department_id']);
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

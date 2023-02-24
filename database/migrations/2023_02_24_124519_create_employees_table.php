<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('position_id')
                ->constrained('positions')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('name');
            $table->string('slug');
            $table->string('fullname');
            $table->string('idCard');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('pic');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};

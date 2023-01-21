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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('type_id')
                ->constrained('types')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table
                ->foreignId('carosery_id')
                ->constrained('caroseries')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table
                ->foreignId('flag_id')
                ->constrained('flags')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table
                ->foreignId('group_id')
                ->constrained('groups')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('color')->nullable();
            $table->string('vin')->nullable();
            $table->string('engine_numb')->nullable();
            $table->year('year')->nullable();
            $table->string('pic')->nullable();
            $table->string('fuel')->nullable();
            $table->string('cylinder')->nullable();
            $table->string('status')->default('nonaktif');
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
        Schema::dropIfExists('units');
    }
};

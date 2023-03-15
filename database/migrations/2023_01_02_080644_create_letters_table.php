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
        Schema::create('letters', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('category_letter_id')
                ->constrained('category_letters')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table
                ->foreignId('unit_id')
                ->constrained('units')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('regNum')->unique();
            $table->string('slug')->unique();
            $table->string('owner');
            $table->text('owner_add');
            $table->year('reg_year');
            $table->string('loc_code');
            $table->string('lpc')->nullable();
            $table->string('vodn')->nullable();
            $table->date('tax')->nullable();
            $table->date('expire_date');

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
        Schema::dropIfExists('letters');
    }
};

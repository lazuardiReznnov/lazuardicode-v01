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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('sparepart_id')
                ->constrained('spareparts')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table
                ->foreignId('supplier_id')
                ->constrained('suppliers')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->date('tgl');
            $table->string('inv');
            $table->string('slug')->unique();
            $table->string('payment');
            $table->integer('qty');
            $table->integer('price');
            $table->string('pic')->nullable();

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
        Schema::dropIfExists('stocks');
    }
};

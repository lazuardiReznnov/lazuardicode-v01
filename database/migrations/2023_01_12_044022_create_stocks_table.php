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
                ->foreignId('inv_stock_id')
                ->constrained('inv_stocks')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->date('tgl');
            $table->string('slug')->unique();

            $table->integer('qty');
            $table->integer('price');

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

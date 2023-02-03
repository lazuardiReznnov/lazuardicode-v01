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
        Schema::create('mspareparts', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('maintenance_id')
                ->constrained('maintenances')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table
                ->foreignId('sparepart_id')
                ->constrained('spareparts')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('slug');
            $table->string('qty');
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
        Schema::dropIfExists('mspareparts');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->unsignedBigInteger('rombel_id')->nullable()->after('id'); // Add the rombel_id column

            $table->foreign('rombel_id') // Set the foreign key constraint
                ->references('id')
                ->on('rombels')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->dropForeign(['rombel_id']); // Drop the foreign key
            $table->dropColumn('rombel_id');    // Drop the rombel_id column
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgentIdToTicketsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->unsignedBigInteger('agent_id')->nullable(); // Add agent_id column

            $table->foreign('agent_id') // Add foreign key constraint
                ->references('id')->on('agents')
                ->onDelete('set null'); // Optional: Set null when agent is deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign(['agent_id']); // Drop foreign key constraint
            $table->dropColumn('agent_id'); // Drop agent_id column
        });
    }
}

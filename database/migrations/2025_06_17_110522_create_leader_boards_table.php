<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaderboardsTable extends Migration
{
    public function up()
    {
        Schema::create('leaderboards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('leader_id');
            $table->string('leader_type');
            $table->integer('points')->default(0);
            $table->timestamps();
            $table->index(['leader_id', 'leader_type']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('leaderboards');
    }
}

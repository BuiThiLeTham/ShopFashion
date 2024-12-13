<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
   public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); // Sử dụng id() theo quy ước Laravel
            $table->string('name');
            $table->string('brand')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->nullable();
            $table->string('brand')->nullable();
            $table->string('categories')->nullable();
            $table->string('products')->nullable();
            $table->string('slider')->nullable();
            $table->string('coupons')->nullable();
            $table->string('shipping')->nullable();
            $table->string('orders')->nullable();
            $table->string('reports')->nullable();
            $table->string('users')->nullable();
            $table->string('returns')->nullable();
            $table->string('reviews')->nullable();
            $table->string('adminuserrole')->nullable();
            $table->string('blog')->nullable();
            $table->integer('type')->nullable();

            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('admins');
    }
};

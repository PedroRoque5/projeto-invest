<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(){
        schema::create('quotes', function(Blueprint $table){
            $table->id();
            $table->string('symbol')->unique();
            $table->decimal('price', 20,6)->nullable();
            $table->decimal('change', 20,6)->nullable();
            $table->string('change_percent')->nullable();
            $table->timestamp('fetched_at')->nullable();
            $table->timestamps();
        });
        }
    public function down(){
        schema::dropIfExists('quotes');
    }
};


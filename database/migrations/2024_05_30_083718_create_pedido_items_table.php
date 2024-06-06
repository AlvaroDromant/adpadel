<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoItemsTable extends Migration
{
    public function up()
    {
        Schema::create('pedido_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pedido_id');
            $table->unsignedBigInteger('pala_id');
            $table->integer('cantidad');
            $table->decimal('precio', 8, 2);
            $table->timestamps();

            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
            $table->foreign('pala_id')->references('id')->on('palas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedido_items');
    }
}


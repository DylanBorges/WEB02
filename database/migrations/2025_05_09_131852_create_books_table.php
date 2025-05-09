<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // id: chave primária auto-incremento
            $table->string('title'); // título do livro
            $table->unsignedBigInteger('author_id'); // chave estrangeira para a tabela authors
            $table->unsignedBigInteger('category_id'); // chave estrangeira para a tabela categories
            $table->unsignedBigInteger('publisher_id'); // chave estrangeira para a tabela publishers
            $table->timestamps(); // created_at e updated_at automáticos

            // Definição das chaves estrangeiras com deleção em cascata
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};

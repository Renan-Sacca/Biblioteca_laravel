<?php

namespace App\Jobs;

use App\Models\Livro;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AumentarPrecoLivro implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $livros = Livro::all();

        foreach ($livros as $livro) {
            $novoPreco = $livro->preco * 1.10; // Aumenta o preço em 10%
            $livro->update(['preco' => $novoPreco]);
        }
    }
}
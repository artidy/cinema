<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Support\Import\ImportRepository;

class AddFilm implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private readonly string $imdbId)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @param ImportRepository $repository
     * @return void
     */
    public function handle(ImportRepository $repository): void
    {
        $data = $repository->getFilms($this->imdbId);

        if ($data) {
            SaveFilm::dispatch($data);
        }
    }
}

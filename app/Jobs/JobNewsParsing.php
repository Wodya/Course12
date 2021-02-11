<?php

namespace App\Jobs;

use App\Service\NewsService;
use App\Service\NewsUpdateService;
use App\Service\ParsingService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class JobNewsParsing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $service;

	/**
	 * Create a new job instance.
	 *
	 * @param NewsUpdateService $service
	 */
    public function __construct(NewsUpdateService $service)
    {
        $this->service = $service;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
		$this->service->UpdateNews();
    }
}

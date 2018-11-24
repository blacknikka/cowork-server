<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Util\Scraping\ScrapingManager;
use App\Services\WebDataService;

class ScrapingWebPage extends Command
{
    /**
     * DIされるWebDataService
     *
     * @var WebDataService
     */
    private $webDataService;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exec:scraping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute scraping';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(WebDataService $s)
    {
        parent::__construct();
        $this->webDataService = $s;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // exec scraping.
        $s = new ScrapingManager();
        $result = $s->exec();
        // $this->line(json_encode($result, JSON_UNESCAPED_UNICODE));

        var_dump($this->webDataService->setWebDataToStore($result));
    }
}

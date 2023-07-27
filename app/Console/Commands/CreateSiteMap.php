<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\categories;
use App\Models\countries;
use App\Models\episodes;
use App\Models\genres;
use App\Models\movies;
use App\Models\times;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Spatie\Sitemap\Tags\Url;






class CreateSiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
     
    }
}

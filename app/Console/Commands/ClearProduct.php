<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Product;
use Carbon;

class ClearProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear Expired Product';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Product::where('sundul_at', '<', Carbon::now()->subMonth())->delete();
    }
}

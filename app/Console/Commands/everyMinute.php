<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class everyMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'discount:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will update discount tables';

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
     * @return int
     */
    public function handle()
    {
        //return 0;

        DB::table('deals')->where('end_date','<',now())->update(['status' => 0]);
        DB::table('offers')->where('end_date','<',now())->update(['status' => 0]);
        DB::table('general_discounts')->where('end_date','<',now())->update(['status' => 0]);

        echo 'Discount updated successfully';
    }
}

<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class reset_counter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:reset_counter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        User::where('login_attempt', '>', '0')->update(['login_attempt' => 0]);
    }
}

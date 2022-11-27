<?php

namespace App\Console\Commands;

use Apel\Rexoit\Models\Wallet;
use App\Models\User;
use Illuminate\Console\Command;


class Salary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rexoit:salary {--salary_amount=}{--cash_amount=}{--status=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rexio IT Salary Command';

   
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $count = User::all()->toArray();
        for($i = 0; $i<count($count); $i++){
            $salary_amount = $this->option('salary_amount');
            $cash_amount = $this->option('cash_amount');
            $status = $this->option('status');
            Wallet::create([
                'salary_amount'=>$salary_amount,
                'cash_amount'=>$cash_amount,
                'status'=>$status,
                'user_id'=>$count[0]['id']
            ]);
        }
    }
}
?>
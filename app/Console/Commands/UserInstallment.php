<?php

namespace App\Console\Commands;

use App\Models\Admin\WalletType;
use App\Models\User;
use Illuminate\Console\Command;

class UserInstallment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monthly:installment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Give monthly investor profit';

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
        WalletType::insert([
            'name' => 'test',
        ]);
        $this->info('test success');
    }
}

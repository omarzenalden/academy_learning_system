<?php

namespace App\Console\Commands;

use App\Models\ResetPassword;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class DeleteExpiredResetCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset_password:cleanup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete expired reset password codes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $count = ResetPassword::query()
            ->where('expires_at','<', Carbon::now())
            ->delete();
        $this->info('Deleted  ' . $count . ' expired reset password codes');
    }
}

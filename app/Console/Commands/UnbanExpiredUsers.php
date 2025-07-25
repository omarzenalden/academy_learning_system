<?php

namespace App\Console\Commands;

use App\Models\BannedUser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class UnbanExpiredUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:unban-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Unban users whose temporary ban has expired';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expired = BannedUser::whereNotNull('expires_at')
            ->where('expires_at', '<=', now())
            ->get();

        foreach ($expired as $ban) {
            Log::info("Unbanning user {$ban->user_id}");
            $ban->delete();
        }

        $this->info("Expired bans cleared: " . $expired->count());
        return 0;    }
}

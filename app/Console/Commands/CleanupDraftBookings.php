<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CleanupDraftBookings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cleanup:drafts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Menghapus data booking draft yang sudah kadaluarsa';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // UBAH 60 MENJADI 1 UNTUK TESTING
        $deleted = \App\Models\Booking::where('status', 'draft')
            ->where('created_at', '<', now()->subMinutes(60))
            ->delete();

        $this->info("Berhasil menghapus $deleted data.");
    }
}

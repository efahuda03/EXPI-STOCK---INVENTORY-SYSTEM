<?php

namespace App\Console\Commands;

use App\Models\AlertConfigurationModel;
use App\Models\BatchModel;
use App\Models\NotificationModel;
use App\Notifications\ExpiryAlertNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str; // Tambah ini

class CheckExpiryAlert extends Command
{
    // Tukar signature kepada nama yang lebih senang dipanggil
    protected $signature = 'check:expiry-alert';

    protected $description = 'Menyemak batch yang bakal tamat tempoh dan menghantar notifikasi.';

    public function handle()
    {
        // Gunakan eager loading 'user' untuk elakkan isu N+1 query
        $configs = AlertConfigurationModel::with('user')->get();

        foreach ($configs as $config) {
            $today = now()->format('Y-m-d');
            $targetDate = now()->addDays((int)$config->day_left)->format('Y-m-d');
            
            $this->info("Mencari batch dari $today hingga $targetDate...");

            // Gunakan whereBetween untuk cari semua dalam lingkungan tarikh tersebut
            $expiringBatches = BatchModel::with('product')
                ->whereBetween('expiry_date', [$today, $targetDate])
                ->get();

            foreach ($expiringBatches as $batch) {
                // SEMAKAN ANTI-SPAM: 
                // Jangan hantar jika notifikasi untuk batch & user ini sudah wujud hari ini
                $alreadyNotified = NotificationModel::where('user_id', $config->user_id)
                    ->where('description', 'LIKE', "%{$batch->batch_number}%")
                    ->whereDate('created_at', now()->today())
                    ->exists();
                
                $daysLeft = (int) today()->diffInDays($batch->expiry_date, false);
                $daysLeftText = $daysLeft <= 0 ? "today" : "in $daysLeft days";

                if (!$alreadyNotified) {
                    // Simpan dalam database (BI version)
                    NotificationModel::create([
                        'uuid' => (string) \Str::uuid(),
                        'user_id' => $config->user_id,
                        'status' => 'unread',
                        'description' => "Product {$batch->product->name} (Batch: {$batch->batch_number}) will expire {$daysLeftText} on {$batch->expiry_date}.",
                    ]);

                    // Hantar emel dengan data tambahan daysLeft
                    $config->user->notify(new ExpiryAlertNotification($batch, $daysLeft));
                    
                    $this->info("Notification sent for batch: {$batch->batch_number}");
                }
            }
        }
    }
}
<?php

namespace App\Notifications;

use App\Models\BatchModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ExpiryAlertNotification extends Notification
{
    use Queueable;

    public $batch;
    protected $daysLeft;

    /**
     * Create a new notification instance.
     */
    public function __construct(BatchModel $batch, $daysLeft)
    {
        $this->batch = $batch;
        $this->daysLeft = $daysLeft;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        // Tentukan ayat countdown
        $countdown = $this->daysLeft <= 0 ? "today!" : "in {$this->daysLeft} days.";

        return (new MailMessage)
                ->subject('Urgent: Product Expiry Alert!')
                ->greeting('Hello ' . $notifiable->name . ',')
                ->line('This is an automated alert to inform you that a product batch is reaching its expiration date.')
                // Gunakan Markdown (**) untuk menonjolkan maklumat penting
                ->line('**Product:** ' . $this->batch->product->name)
                ->line('**Batch No:** ' . $this->batch->batch_number)
                ->line('**Expiry Date:** ' . $this->batch->expiry_date)
                ->line('**Status:** This batch will expired ' . $countdown)
                ->action('Check Batch', url('/batch'))
                ->line('Please take immediate action to manage this batch.')
                ->line('Thank you for using the EXPI-STOCK system.'); // Ganti footer() kepada line()
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'batch_uuid' => $this->batch->uuid,
            'product_name' => $this->batch->product->name,
            'expiry_date' => $this->batch->expiry_date,
        ];
    }
}

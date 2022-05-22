<?php

namespace App\Notifications;

use App\Channels\Messages\WhatsAppMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Channels\WhatsAppChannel;
use App\Models\Order;


class OrderProcessed extends Notification
{
    use Queueable;


    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [WhatsAppChannel::class];
    }

    public function toWhatsApp($notifiable)
    {
        $orderUrl = url("/orders/{$this->order->id}");
        $company = 'Boossto';
        $deliveryDate = $this->order->created_at->addDays(4)->toFormattedDateString();


        return (new WhatsAppMessage)
            ->content("Your order number {$this->order->order_number} has been placed and should be delivered on {$deliveryDate}.");
    }
}

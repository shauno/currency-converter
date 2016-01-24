<?php

namespace Mukuru\Repositories;

use Illuminate\Mail\Mailer;
use Mukuru\Interfaces\OrderRepositoryInterface;
use Mukuru\Models\Order;

class GbpOrderRepository extends OrderRepository implements OrderRepositoryInterface
{
    protected $mailer;

    public function __construct(Order $order, Mailer $mailer)
    {
        parent::__construct($order);

        $this->mailer = $mailer;
    }

    public function postSave()
    {
        $this->mailer->send('emails.order-notification', [], function($message) {
            $message->from(env('ORDER_NOTIFICATION_FROM'));
            $message->to(env('ORDER_NOTIFICATION_TO'));
            $message->subject('Order notification');

        });

        return true;
    }
}
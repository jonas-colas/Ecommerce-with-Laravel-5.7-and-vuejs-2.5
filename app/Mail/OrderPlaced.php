<?php

namespace App\Mail;
use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    public $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, $status)
    {
        $this->order  = $order;

        $this->status  = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      if($this->status === 'refund'){
        return $this->to($this->order->billing_email, $this->order->billing_name)
                    ->subject('Order from MaTele')
                    ->view('emails.orders.refund');
      }elseif($this->status === 'sent'){
        return $this->to($this->order->billing_email, $this->order->billing_name)
                    ->subject('Order from MaTele')
                    ->view('emails.orders.sent');
      }elseif($this->status === 'placed'){
        return $this->to($this->order->billing_email, $this->order->billing_name)
                    ->subject('Order from MaTele')
                    ->view('emails.orders.placed');
      }else{
        return $this->to($this->order->billing_email, $this->order->billing_name)
                    ->subject('Order from MaTele')
                    ->view('emails.orders.status');  
      }
    }
}

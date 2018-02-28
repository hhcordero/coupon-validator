<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Coupon;

class CouponDownload extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The coupon instance.
     *
     * @var Order
     */
    public $coupon;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your HSBC Singapore Rugby 7s Voucher')->view('emails.coupons.download');
        //return $this->view('emails.coupons.download');
    }
}

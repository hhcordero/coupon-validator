<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCoupon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Coupon;
use App\CouponInventory;
use App\Mail\CouponDownloadLink;
use App\Mail\CouponDownload;
use Anam\Captcha\Captcha;

class CouponController extends Controller
{
    /**
     * Show the form for coupon validation request.
     *
     * @return Response
     */
    public function create()
    {
        return view('coupon.create');
    }

    /**
     * Create a new coupon validation request.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(StoreCoupon $request, Captcha $captcha)
    {
        $response = $captcha->check($request);

        if (! $response->isVerified()) {
            //dd($response->errors());
            redirect()->route('coupon')->withErrors($response);
        }

		$coupon = new Coupon;
		$coupon->uuid			= (string) Str::uuid();
		$coupon->ticket_number 	= $request->ticket_number;
		$coupon->email 			= $request->email;
		$coupon->first_name 	= $request->first_name;
		$coupon->last_name 		= $request->last_name;
		$coupon->save();

		$coupon->download_link	= route('coupon.download', [
									'id' 	=> $coupon->id,
									'hash' 	=> $coupon->uuid]);

		Mail::to($request->email)
			->send(new CouponDownloadLink($coupon));

		return redirect()->route('coupon')
			->with('success', 'Success! Please check your email.');
    }

    /**
     * Send coupon validation request.
     *
     * @param  id	$id
     * @param  hash $hash
     * @return Response
     */
    public function download($id, $hash)
    {
		$coupon = Coupon::findOrFail($id);

		if (strcmp($coupon->uuid, $hash) === 0) {

			// Generate image

			Mail::to($coupon->email)
				->send(new CouponDownload($coupon));

			/*
			return redirect()->route('coupon')
				->with('success', 'Coupon was sent. Please check your email.');
			*/
			return redirect()->to('http://www.singapore7s.sg/home/benefits');

		} else {
			return redirect()->route('coupon')
				->with('danger', 'Invalid link.');
		}
	}
}

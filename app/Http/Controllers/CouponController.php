<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCoupon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Coupon;
use App\CouponInventory;
use App\Mail\CouponDownloadLink;

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
    public function store(StoreCoupon $request)
    {
		$coupon = new Coupon;
		$coupon->ticket_number 	= $request->ticket_number;
		$coupon->email 			= $request->email;
		$coupon->first_name 	= $request->first_name;
		$coupon->last_name 		= $request->last_name;
		$coupon->save();

		$coupon->download_link	= route('coupon.download', [
									'id' => $coupon->id,
									'hash' => urlencode(Hash::make($request->ticket_number . '|' . $request->email))]);

		Mail::to($request->email)
			->send(new CouponDownloadLink($coupon));

		return redirect()->route('coupon')
			->with('success', 'Download link was sent. Please check your email.');
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

		if (Hash::check($coupon->ticket_number . '|' . $coupon->email, urldecode($hash))) {
			// Generate image

			// Send email
			/*
			Mail::to($request->email)
				->send(new CouponDownload($coupon));
			*/

			return redirect()->route('coupon')
				->with('success', 'Coupon was sent. Please check your email.');

		} else {
			return redirect()->route('coupon')
				->with('danger', 'Invalid link.');
		}
	}
}

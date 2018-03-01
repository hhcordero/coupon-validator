<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HSBC Singapore Rugby 7s Benefits</title>
  </head>
  <body class="bg-light">
    <div class="container">
      <p>Hi {{ $coupon->first_name }},</p>
      <p>Thank you for joining us!  Your voucher will be sent to your email by clicking below:</p>
      <div>
        <a href="{{ $coupon->download_link }}">{{ $coupon->download_link }}</a>
      </div>
    </div>
  </body>
</html>

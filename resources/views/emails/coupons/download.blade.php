<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Coupon Download - Coupon Validator</title>
  </head>
  <body class="bg-light">
    <div class="container">
      <p>Hi {{ $coupon->first_name }},</p>
      <p>Here's your coupon.</p>
      <div>
        <img src="{{ $message->embed('dummy-blank-coupon.jpg') }}">
      </div>
    </div>
  </body>
</html>

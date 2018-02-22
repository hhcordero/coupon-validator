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
      <p>Below are the information you provided.</p>
      <div>
        <ul>
            <li>Ticket number   : {{ $coupon->ticket_number }}</li>
            <li>Email           : {{ $coupon->email }}</li>
            <li>First Name      : {{ $coupon->first_name }}</li>
            <li>Last Name       : {{ $coupon->last_name }}</li>
        </ul>
      </div>
      <p>Attached is your coupon.</p>
      <div>
        <img src="{{ $message->embed('dummy-blank-coupon.jpg') }}">
      </div>
    </div>
  </body>
</html>

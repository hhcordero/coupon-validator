<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') - Coupon Validator</title>

    <!--<link rel="icon" href="../../../../favicon.ico">-->

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Form Validation CSS -->
    <link rel="stylesheet" href="css/form-validation.css">
  </head>
  <body class="bg-light">
    @includeIf ('layouts.nav')

    <div class="container">
      @includeIf ('layouts.sidebar')

      @yield ('content')
    </div>

    @includeIf ('layouts.footer')
  </body>
</html>

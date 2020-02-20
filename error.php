<?php
  //if cookie exists
  if (isset($_COOKIE['fe-test-cart'])) {
    $array_cart = explode('˧', $_COOKIE['fe-test-cart']);
    $total_cart = 0;
    $text_style = 'style="display:inline-block;"';

    for ($i = 0; $i < count($array_cart); $i++) {
      $cart_detail = explode('˥', $array_cart[$i]);

      $total_cart = $total_cart + $cart_detail[3];
    }  //end of for
  }
  //if cookie doesn't exist
  else {
    $total_cart = 0;
    $text_style = '';
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>FE TEST - Page Not Found</title>
    <link href="img/favicon.png" rel="shortcut icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/main.js" type="text/javascript"></script>
  </head>

  <body>

    <!-- header -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index">FE TEST</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="cart" onclick="return false;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge" data="<?php echo $total_cart; ?>" <?php echo $text_style; ?>><?php echo $total_cart; ?></span></a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- content body -->
    <div class="container">
      <div class="spacer-90"></div>
      <h1 class="text-center">404</h1>
      <h4 class="text-center">Page Not Found</h4>
    </div>

    <!-- footer -->
    <div class="footer">
      <p>&copy 2020 FE TEST - All Right Reserved - Proudly built by <a href="http://drafour.com" target="_blank">Drafour</a></p>
    </div>

  </body>
</html>

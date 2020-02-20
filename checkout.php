<?php
  //if cookie exists
  if (isset($_COOKIE['fe-test-cart'])) {
    $array_cart = explode('˧', $_COOKIE['fe-test-cart']);
?>
    <!DOCTYPE html>
    <html>
      <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>FE TEST - Checkout</title>
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
                <li><a href="#" class="cart" onclick="return false;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge" data="0">0</span></a></li>
              </ul>
            </div>
          </div>
        </nav>

        <!-- content body -->
        <div class="container">
          <div class="spacer-90"></div>

          <div class="row">
            <div class="col-md-6"><h1 class="title">CHECKOUT</h1></div>
            <div class="col-md-6 text-right"><button type="button" class="btn btn-primary" onclick="window.location.href='index'"><i class="fa fa-reply" aria-hidden="true"></i> Back</button></div>
          </div>

          <div class="spacer-25"></div>

          <div class="continer-order-detail">
            <div class="row">
              <div class="col-md-6" style="padding-left:55px;"><b>Product</b></div>
              <div class="col-md-2 text-center"><b>Price</b></div>
              <div class="col-md-2 text-center"><b>Quantity</b></div>
              <div class="col-md-2 text-center"><b>Total</b></div>
              <div class="clear-float-left"></div>
              <div class="spacer-15"></div>
              <?php
                $result_quantity = 0;
                $result_total    = 0;

                //if array cart exists
                if ($array_cart) {
                  for ($i = 0; $i < count($array_cart); $i++) {
                    $cart_detail      = explode('˥', $array_cart[$i]);
                    $product_id       = $cart_detail[0];
                    $product_name     = $cart_detail[1];
                    $product_price    = $cart_detail[2];
                    $product_quantity = $cart_detail[3];

                    $result_quantity = $result_quantity + $product_quantity;
                    $total_price     = $product_quantity * $product_price;
                    $result_total    = $result_total + $total_price;
              ?>
                    <div class="col-md-6"><div class="product-photo" style="background-image:url('img/default-image.png')"></div><div class="product-name"><?php echo $product_name; ?></div></div>
                    <div class="col-md-2 text-center">Rp <?php echo number_format($product_price, 0, '.', '.'); ?></div>
                    <div class="col-md-2 text-center"><?php echo number_format($product_quantity, 0, '.', '.'); ?></div>
                    <div class="col-md-2 text-center">Rp <?php echo number_format($total_price, 0, '.', '.'); ?></div>
                    <div class="clear-float-left"></div>
                    <div class="spacer-5"></div>
              <?php
                  }  //end of for
                }

                //if total quantity more than 1
                if ($result_quantity > 1) {
                  $text_total_quantity = number_format($result_quantity, 0, '.', '.').' products';
                }
                //if total quantity less than 2
                else {
                  $text_total_quantity = number_format($result_quantity, 0, '.', '.').' product';
                }
              ?>

              <div class="col-md-10 text-right"><h5>Order total (<?php echo $text_total_quantity; ?>) :</h5></div>
              <div class="col-md-2 text-center"><h5>Rp <?php echo number_format($result_total, 0, '.', '.'); ?></h5></div>
            </div>
          </div>

          <div class="spacer-30"></div>

          <div class="continer-shopping-summary">
            <div class="row">
              <div class="col-md-8">
                <div>
                  <h5>Total Price (<?php echo $text_total_quantity; ?>)</h5>
                  <h5>Rp <?php echo number_format($result_total, 0, '.', '.'); ?></h5>
                </div>
                <div class="spacer-10"></div>
                <div>
                  <h5>Total Payment</h5>
                  <h5 class="total-payment">Rp <?php echo number_format($result_total, 0, '.', '.'); ?></h5>
                </div>
              </div>
              <div class="col-md-4">
                <button type="button" class="btn btn-primary" onclick="createOrder(); return false;">Create Order</button>
              </div>
            </div>
          </div>
        </div>

        <!-- footer -->
        <div class="footer">
          <p>&copy 2020 FE TEST - All Right Reserved - Proudly built by <a href="http://drafour.com" target="_blank">Drafour</a></p>
        </div>

        <div class="modal fade" id="modal-alert" tabindex="-1" role="dialog" aria-labelledby="modal-alert-label">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-body"></div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
              </div>
            </div>
          </div>
        </div>

        <div id="preloader"><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></div>

      </body>
    </html>
<?php
  }
  //if cookie doesn't exist
  else {
    header('Location: index');

    die();
  }
?>

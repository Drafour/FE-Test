<?php
  //if cookie exists
  if (isset($_COOKIE['fe-test-cart'])) {
    $array_cart = explode('˧', $_COOKIE['fe-test-cart']);
    $data_id    = '';
    $data_cart  = '';
    $total_cart = 0;
    $text_style = 'style="display:inline-block;"';

    for ($i = 0; $i < count($array_cart); $i++) {
      $cart_detail = explode('˥', $array_cart[$i]);

      $total_cart = $total_cart + $cart_detail[3];

      //if data id is empty
      if ($data_id == '') {
        $data_id = '['.$cart_detail[0].']';
      }
      //if data id exists
      else {
        $data_id = $data_id.',['.$cart_detail[0].']';
      }

      //if data cart is empty
      if ($data_cart == '') {
        $data_cart = $cart_detail[0].'˥'.$cart_detail[1].'˥'.$cart_detail[2].'˥'.$cart_detail[3];
      }
      //if data cart exists
      else {
        $data_cart = $data_cart.'˧'.$cart_detail[0].'˥'.$cart_detail[1].'˥'.$cart_detail[2].'˥'.$cart_detail[3];
      }
    }  //end of for
  }
  //if cookie doesn't exist
  else {
    $data_id    = '';
    $data_cart  = '';
    $total_cart = 0;
    $text_style = '';
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>FE TEST - Product</title>
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

      <div class="row">
        <div class="col-md-12"><h1 class="title">PRODUCT</h1></div>
      </div>

      <div class="spacer-25"></div>

      <div class="row">
        <div class="col-md-12">
          <table id="product-list" data-id="<?php echo $data_id; ?>" data-cart="<?php echo $data_cart; ?>">
            <thead>
              <tr>
                <th class="photo"></th>
                <th class="text-left">Product</th>
                <th class="price">Price</th>
                <th>Quantity</th>
                <th class="price">Total</th>
              </tr>
            </thead>
            <tbody>

              <tr id="product-1">
                <td>
                  <div class="photo-product" style="background-image:url('img/default-image.png')"></div>
                </td>
                <td class="product-name">Delectus Aut Autem</td>
                <td class="text-center product-price">Rp 100.000</td>
                <td class="noselect text-center">
                  <div class="minus" onclick="reduceQuantity(this); return false;"><i class="fa fa-minus" aria-hidden="true"></i></div>
                  <input class="product-quantity" type="text" value="0" data-temp="">
                  <div class="plus" onclick="addQuantity(this); return false;"><i class="fa fa-plus" aria-hidden="true"></i></div>
                </td>
                <td class="text-center product-total">Rp 0</td>
              </tr>

              <tr id="product-2">
                <td>
                  <div class="photo-product" style="background-image:url('img/default-image.png')"></div>
                </td>
                <td class="product-name">Quis Ut Nam Facilis Et Officia Qui</td>
                <td class="text-center product-price">Rp 75.000</td>
                <td class="noselect text-center">
                  <div class="minus" onclick="reduceQuantity(this); return false;"><i class="fa fa-minus" aria-hidden="true"></i></div>
                  <input class="product-quantity" type="text" value="0" data-temp="">
                  <div class="plus" onclick="addQuantity(this); return false;"><i class="fa fa-plus" aria-hidden="true"></i></div>
                </td>
                <td class="text-center product-total">Rp 0</td>
              </tr>

              <tr id="product-3">
                <td>
                  <div class="photo-product" style="background-image:url('img/default-image.png')"></div>
                </td>
                <td class="product-name">Fugiat Veniam Minus</td>
                <td class="text-center product-price">Rp 30.000</td>
                <td class="noselect text-center">
                  <div class="minus" onclick="reduceQuantity(this); return false;"><i class="fa fa-minus" aria-hidden="true"></i></div>
                  <input class="product-quantity" type="text" value="0" data-temp="">
                  <div class="plus" onclick="addQuantity(this); return false;"><i class="fa fa-plus" aria-hidden="true"></i></div>
                </td>
                <td class="text-center product-total">Rp 0</td>
              </tr>

              <tr id="product-4">
                <td>
                  <div class="photo-product" style="background-image:url('img/default-image.png')"></div>
                </td>
                <td class="product-name">Et Porro Tempora</td>
                <td class="text-center product-price">Rp 12.500</td>
                <td class="noselect text-center">
                  <div class="minus" onclick="reduceQuantity(this); return false;"><i class="fa fa-minus" aria-hidden="true"></i></div>
                  <input class="product-quantity" type="text" value="0" data-temp="">
                  <div class="plus" onclick="addQuantity(this); return false;"><i class="fa fa-plus" aria-hidden="true"></i></div>
                </td>
                <td class="text-center product-total">Rp 0</td>
              </tr>

              <tr id="product-5">
                <td>
                  <div class="photo-product" style="background-image:url('img/default-image.png')"></div>
                </td>
                <td class="product-name">Laboriosam Mollitia Et Enim Quasi Adipisci Quia Provident Illum</td>
                <td class="text-center product-price">Rp 80.000</td>
                <td class="noselect text-center">
                  <div class="minus" onclick="reduceQuantity(this); return false;"><i class="fa fa-minus" aria-hidden="true"></i></div>
                  <input class="product-quantity" type="text" value="0" data-temp="">
                  <div class="plus" onclick="addQuantity(this); return false;"><i class="fa fa-plus" aria-hidden="true"></i></div>
                </td>
                <td class="text-center product-total">Rp 0</td>
              </tr>

              <tr id="product-6">
                <td>
                  <div class="photo-product" style="background-image:url('img/default-image.png')"></div>
                </td>
                <td class="product-name">Qui Ullam Ratione Quibusdam Voluptatem Quia Omnis</td>
                <td class="text-center product-price">Rp 4.000</td>
                <td class="noselect text-center">
                  <div class="minus" onclick="reduceQuantity(this); return false;"><i class="fa fa-minus" aria-hidden="true"></i></div>
                  <input class="product-quantity" type="text" value="0" data-temp="">
                  <div class="plus" onclick="addQuantity(this); return false;"><i class="fa fa-plus" aria-hidden="true"></i></div>
                </td>
                <td class="text-center product-total">Rp 0</td>
              </tr>

              <tr id="product-7">
                <td>
                  <div class="photo-product" style="background-image:url('img/default-image.png')"></div>
                </td>
                <td class="product-name">Illo Expedita Consequatur Quia In</td>
                <td class="text-center product-price">Rp 50.000</td>
                <td class="noselect text-center">
                  <div class="minus" onclick="reduceQuantity(this); return false;"><i class="fa fa-minus" aria-hidden="true"></i></div>
                  <input class="product-quantity" type="text" value="0" data-temp="">
                  <div class="plus" onclick="addQuantity(this); return false;"><i class="fa fa-plus" aria-hidden="true"></i></div>
                </td>
                <td class="text-center product-total">Rp 0</td>
              </tr>

              <tr id="product-8">
                <td>
                  <div class="photo-product" style="background-image:url('img/default-image.png')"></div>
                </td>
                <td class="product-name">Quo Adipisci Enim Quam Ut Ab</td>
                <td class="text-center product-price">Rp 16.500</td>
                <td class="noselect text-center">
                  <div class="minus" onclick="reduceQuantity(this); return false;"><i class="fa fa-minus" aria-hidden="true"></i></div>
                  <input class="product-quantity" type="text" value="0" data-temp="">
                  <div class="plus" onclick="addQuantity(this); return false;"><i class="fa fa-plus" aria-hidden="true"></i></div>
                </td>
                <td class="text-center product-total">Rp 0</td>
              </tr>

              <tr id="product-9">
                <td>
                  <div class="photo-product" style="background-image:url('img/default-image.png')"></div>
                </td>
                <td class="product-name">Molestiae Perspiciatis Ipsa</td>
                <td class="text-center product-price">Rp 94.000</td>
                <td class="noselect text-center">
                  <div class="minus" onclick="reduceQuantity(this); return false;"><i class="fa fa-minus" aria-hidden="true"></i></div>
                  <input class="product-quantity" type="text" value="0" data-temp="">
                  <div class="plus" onclick="addQuantity(this); return false;"><i class="fa fa-plus" aria-hidden="true"></i></div>
                </td>
                <td class="text-center product-total">Rp 0</td>
              </tr>

              <tr id="product-10">
                <td>
                  <div class="photo-product" style="background-image:url('img/default-image.png')"></div>
                </td>
                <td class="product-name">Illo Est Ratione Doloremque Quia Maiores Aut</td>
                <td class="text-center product-price">Rp 275.000</td>
                <td class="noselect text-center">
                  <div class="minus" onclick="reduceQuantity(this); return false;"><i class="fa fa-minus" aria-hidden="true"></i></div>
                  <input class="product-quantity" type="text" value="0" data-temp="">
                  <div class="plus" onclick="addQuantity(this); return false;"><i class="fa fa-plus" aria-hidden="true"></i></div>
                </td>
                <td class="text-center product-total">Rp 0</td>
              </tr>

            </tbody>
          </table>
          <div class="wrapper-total">
            <p>Subtotal</p>
            <div class="price" id="total-price">Rp 0</div>
            <button type="button" class="btn btn-primary" onclick="checkout(); return false;">Preceed to checkout</button>
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

    <?php
      //if cookie exists
      if (isset($_COOKIE['fe-test-cart'])) {
    ?>
        <script>
          $(document).ready(function(){
            var data_cart  = '<?php echo $_COOKIE['fe-test-cart']; ?>';
            var array_cart = data_cart.split('˧');

            total = 0;

            for (var i = 0; i < array_cart.length; i++) {
              var cart_detail   = array_cart[i].split('˥');
              var product_total = parseInt(cart_detail[2]) * parseInt(cart_detail[3]);

              total = total + parseInt(product_total);

              $('#product-'+cart_detail[0]).find('.product-quantity').val(cart_detail[3]);
              $('#product-'+cart_detail[0]).find('.product-total').html('Rp '+maskMoney(product_total));
            }  //end of for

            $('#total-price').html('Rp '+maskMoney(total));
          });
        </script>
    <?php
      }
    ?>

  </body>
</html>

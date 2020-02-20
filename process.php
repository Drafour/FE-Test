<?php
  try {
    //if data cart exists
    if (isset($_POST['data_cart'])) {
      $cookie_name  = 'fe-test-cart';
      $cookie_value = $_POST['data_cart'];

      //create cookie
      setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/');  //86400 = 1 day

      $dataJson['t'] = '1';

      echo json_encode($dataJson);
    }
    //if data order exists
    elseif (isset($_POST['data_order'])) {
      //delete cookie
      setcookie('fe-test-cart', '', time() - (86400), '/');  //86400 = 1 day

      $dataJson['t'] = '1';

      echo json_encode($dataJson);
    }
    //if there is no data cart or data order
    else {
      header('Location: index');

      die();
    }
  }
  catch (PDOException $e) {
    //do nothing
  }
?>

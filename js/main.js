$(document).ready(function(){
  data_id   = $('#product-list').attr('data-id');
  data_cart = $('#product-list').attr('data-cart');

  $('.product-quantity').on('keydown',function(e) {
    //allow: delete, backspace, tab, escape, and f5
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 116]) !== -1 ||
      //allow: Ctrl+A, Command+A
      (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
      //allow: Ctrl+C, Command+C
      (e.keyCode === 67 && (e.ctrlKey === true || e.metaKey === true)) ||
      //allow: Ctrl+V, Command+V
      (e.keyCode === 86 && (e.ctrlKey === true || e.metaKey === true)) ||
      //allow: Ctrl+X, Command+X
      (e.keyCode === 88 && (e.ctrlKey === true || e.metaKey === true)) ||
      //allow: home, end, left, right, down, up
      (e.keyCode >= 35 && e.keyCode <= 40)) {
      //let it happen, don't do anything
      return;
    }

    //ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
      e.preventDefault();
    }
  });
});

function addQuantity(obj) {
  var cart        = $('.badge').attr('data');
  var id          = $(obj).parents('tr').attr('id').replace('product-', '');
  var name        = $(obj).parents('tr').find('.product-name').html();
  var price       = $(obj).parent('td').prev('.product-price').html().replace('Rp ', '').replace(/\./g, '');
  var quantity    = $(obj).prev('.product-quantity').val();
  var temp_qty    = $(obj).prev('.product-quantity').attr('data-temp');
  var result_qty  = parseInt(quantity) + 1;
  var result_prc  = result_qty * parseInt(price);
  var result_cart = parseInt(cart) + 1;
  var total       = $('#total-price').html().replace('Rp ', '').replace(/\./g, '');
  var result_tot  = parseInt(total) + parseInt(price);

  //if result cart more than 99
  if (parseInt(result_cart) > 99) {
    $('.badge').html('99+').attr('data', result_cart).show();
  }
  //if result cart less than 99
  else {
    $('.badge').html(result_cart).attr('data', result_cart).show();
  }

  $(obj).prev('.product-quantity').val(result_qty);
  $(obj).parent('td').next('.product-total').html('Rp '+maskMoney(result_prc));
  $('#total-price').html('Rp '+maskMoney(result_tot));

  //if data exists
  if (data_id.indexOf(',['+id+'],') >= 0 || data_id.indexOf(',['+id+']') >= 0 || data_id.indexOf('['+id+'],') >= 0 || data_id.indexOf('['+id+']') >= 0) {
    var cart_array = data_cart.split('˧');
    var cart_index = cart_array.indexOf(id+'˥'+name+'˥'+price+'˥'+temp_qty);

    //if there is matching data
    if (cart_index > -1) {
      cart_array.splice(cart_index, 1);

      data_cart = arrayToString(cart_array);
    }

    //if data cart is empty
    if (data_cart == '') {
      data_cart = id+'˥'+name+'˥'+price+'˥'+result_qty;
    }
    //if data cart exists
    else {
      data_cart = data_cart+'˧'+id+'˥'+name+'˥'+price+'˥'+result_qty;
    }
  }
  //if data does not exist
  else {
    //if data id is empty
    if (data_id == '') {
      data_id = '['+id+']';
    }
    //if data id exists
    else {
      data_id = data_id + ',['+id+']';
    }

    //if data cart is empty
    if (data_cart == '') {
      data_cart = id+'˥'+name+'˥'+price+'˥'+result_qty;
    }
    //if data cart exists
    else {
      data_cart = data_cart+'˧'+id+'˥'+name+'˥'+price+'˥'+result_qty;
    }
  }

  $(obj).prev('.product-quantity').attr('data-temp', result_qty);
}

function reduceQuantity(obj) {
  var cart        = $('.badge').attr('data');
  var id          = $(obj).parents('tr').attr('id').replace('product-', '');
  var name        = $(obj).parents('tr').find('.product-name').html();
  var price       = $(obj).parent('td').prev('.product-price').html().replace('Rp ', '').replace(/\./g, '');
  var quantity    = $(obj).next('.product-quantity').val();
  var temp_qty    = $(obj).next('.product-quantity').attr('data-temp');
  var result_qty  = parseInt(quantity) - 1;
  var result_prc  = result_qty * parseInt(price);
  var result_cart = parseInt(cart) - 1;
  var total       = $('#total-price').html().replace('Rp ', '').replace(/\./g, '');
  var result_tot  = parseInt(total) - parseInt(price);

  //if quantity more than 0
  if (parseInt(quantity) > 0) {
    //if result cart more than 99
    if (parseInt(result_cart) > 99) {
      $('.badge').html('99+').attr('data', result_cart).show();
    }
    //if result cart less than 99
    else if (parseInt(result_cart) < 1) {
      $('.badge').html(result_cart).attr('data', result_cart).hide();
    }
    //if result cart is 0
    else {
      $('.badge').html(result_cart).attr('data', result_cart).show();
    }

    $(obj).next('.product-quantity').val(result_qty);
    $(obj).parent('td').next('.product-total').html('Rp '+maskMoney(result_prc));
    $('#total-price').html('Rp '+maskMoney(result_tot));

    var cart_array = data_cart.split('˧');
    var cart_index = cart_array.indexOf(id+'˥'+name+'˥'+price+'˥'+temp_qty);

    //if there is matching data
    if (cart_index > -1) {
      cart_array.splice(cart_index, 1);

      data_cart = arrayToString(cart_array);
    }

    //if result qty less than 1
    if (parseInt(result_qty) < 1) {
      if (data_id.indexOf(',['+id+'],') >= 0) {
        data_id = data_id.replace(',['+id+'],', '');
      }
      else if (data_id.indexOf(',['+id+']') >= 0) {
        data_id = data_id.replace(',['+id+']', '');
      }
      else if (data_id.indexOf('['+id+'],') >= 0) {
        data_id = data_id.replace('['+id+'],', '');
      }
      else if (data_id.indexOf('['+id+']') >= 0) {
        data_id = data_id.replace('['+id+']', '');
      }
    }
    //if result qty more than 0
    else {
      //if data cart is empty
      if (data_cart == '') {
        data_cart = id+'˥'+name+'˥'+price+'˥'+result_qty;
      }
      //if data cart exists
      else {
        data_cart = data_cart+'˧'+id+'˥'+name+'˥'+price+'˥'+result_qty;
      }
    }

    $(obj).next('.product-quantity').attr('data-temp', result_qty);
  }
}

checkout_status = 0;

function checkout() {
  //if checkout status is 0
  if (checkout_status == 0) {
    //if data id is empty
    if (data_id == '') {
      $('#modal-alert .modal-body').html('Please select at least 1 product!');
      $('#modal-alert').modal('show');

      setTimeout(function(){
        $('#modal-alert').modal('hide');
      }, 3000);
    }
    //if data id exists
    else {
      checkout_status = 1;

      $.ajax({
        type       : 'POST',
        dataType   : 'JSON',
        data       : { data_cart : data_cart },
        url        : 'process',
        beforeSend  : function(data){
          $('#preloader').show();
        },
        success     : function(data){
          checkout_status = 0;

          $('#preloader').removeAttr('style');

          window.location.href = 'checkout';
        }
      });
    }
  }
}

order_status = 0;

function createOrder() {
  //if order status is 0
  if (order_status == 0) {
    order_status = 1;

    $.ajax({
      type       : 'POST',
      dataType   : 'JSON',
      data       : { data_order : '1' },
      url        : 'process',
      beforeSend  : function(data){
        $('#preloader').show();
      },
      success     : function(data){
        order_status = 0;

        $('#preloader').removeAttr('style');

        window.location.href = 'index';
      }
    });
  }
}

function maskMoney(value) {
  var reverse = value.toString().split('').reverse().join(''),
      result  = reverse.match(/\d{1,3}/g);
      result  = result.join('.').split('').reverse().join('');

  return result;
}

function arrayToString(array) {
  let str = '';

  array.forEach(function(i, index) {
    str += i;

    if (index != (array.length - 1)) {
      str += '˧';
    };
  });

  return str;
}

/* Search */
var products = new Bloodhound({
   datumTokenizer: Bloodhound.tokenizers.whitespace,
   queryTokenizer: Bloodhound.tokenizers.whitespace,
   remote: {
      wildcard: '%QUERY',
      url: path + '/search/typeahead?query=%QUERY'
   }
});

products.initialize();

$("#typeahead").typeahead({
   // hint: false,
   highlight: true
},{
   name: 'products',
   display: 'title',
   limit: 10,
   source: products
});

$('#typeahead').bind('typeahead:select', function(ev, suggestion) {
   // console.log(suggestion);
   window.location =  '/search/?s=' + encodeURIComponent(suggestion.title);
});

// CART
$('body').on('click', '.add-to-cart-link', function (e) {
   e.preventDefault();
   var id = $(this).data('id');
   var qty = $('#quantity').val() ? $('#quantity').val() : 1,
   mod = $('.available select').val();
   console.log(qty, mod);
   $.ajax({
      url: '/cart/add',
      data: {id:id, qty: qty, mod:mod},
      type: 'GET',
      success: function (res) {
            showCart(res);
      },
      error: function () {
         console.log('Ошибка! Попробуйте позже');
      }
   });
});
function showCart(cart) {
   if(cart==="<h3>Корзина пуста</h3>") {
      $('#cart  .modal-footer a, .clear-cart').css('display', 'none');
   }else {
      $('#cart  .modal-footer a, .clear-cart').css('display', 'inline-block');
   }
   $('#cart .modal-body').html(cart);
   if( $('#cart .cart-sum').text() ) {
         $('#cartTotal').html($('#cart .cart-sum').text());
   } else {
      $('#cartTotal').html('');
   }
   $('#cart').modal();
}

function getCart() {
   $.ajax({
      url: '/cart/show',

      type: 'GET',
      success: function (res) {
         showCart(res);
      },
      error: function () {
         console.log('Ошибка! Попробуйте позже');
      }
   });
}

$('#cart').on('click','.del-item',function (e) {
   var id= $(this).data('id');
   console.log(id);
   $.ajax({
      url: '/cart/delete',
      data: {id:id},
      type: 'GET',
      success: function (res) {
         showCart(res);
      },
      error: function () {
         console.log('Ошибка! Попробуйте позже');
      }
   });
});

function clearCart() {
   $.ajax({
      url: '/cart/destroy',
      type: 'GET',
      success: function (res) {
         showCart(res);
      },
      error: function () {
         console.log('Ошибка! Попробуйте позже');
      }
   });
}
//CART

$('#currency').change(function () {
   window.location = '/currency/change?curr='+$(this).val();
});
$('.available select').on('change', function () {
   var modId = $(this).val();
   var color = $(this).find('option').filter(':selected').data('title');
   var price = $(this).find('option').filter(':selected').data('price');

   if(price) {
      $('#productPrice').text(price);
   }else {
      price = $('#productPrice').data('basePrice');

      $('#productPrice').text(price);
   }

});
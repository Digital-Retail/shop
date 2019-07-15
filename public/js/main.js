$('#currency').change(function () {
   window.location = '/currency/change?curr='+$(this).val();
});
$('.available select').on('change', function () {
   var modId = $(this).val();
   var color = $(this).find('option').filter(':selected').data('title');
   var price = $(this).find('option').filter(':selected').data('price');
   console.log(modId, color, price);
   if(price) {
      $('#productPrice').text(price);
   }else {
      price = $('#productPrice').data('basePrice');

      $('#productPrice').text(price);
   }

});
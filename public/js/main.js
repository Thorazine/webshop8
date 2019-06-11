$.ajax({
    url: asset('api/cart.php'),
}).done(function(data) {
    console.log(data);
    $('#cart').html(data);
});

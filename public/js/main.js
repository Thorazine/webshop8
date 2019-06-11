$.ajax({
    url: asset('api/cart.php'),
}).done(function(data) {
    $('#cart').html(data);
});


$('#order').click(function(event) {
    event.preventDefault();
    $.ajax({
        url: $(this).attr('href'),
    }).done(function(data) {
        $('#cart').html(data);
    });
});

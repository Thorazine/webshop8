// Get the cart from the server when the page is loaded
$(document).ready(function() {
    $.ajax({
        url: asset('api/cart.php'),
    })
    .done(function(data) {
        $('#cart').html(data);
    });
});

// When an order button is clicked: get url from element and run the action
$('.order').click(function(event) {
    // normaly an a link redirects page to the given url. We need to prevent that
    event.preventDefault();

    // Run the url provided in the a link
    $.ajax({
        url: $(this).attr('href'),
    })
    .done(function(data) {
        // if the action was succesfull, update the cart with the server data
        $('#cart').html(data);

        // open the cart for the user so he can see an item was added
        $('.cart').css('right', 0);

        // close the cart after x milliseconds to get it out of the way
        setTimeout(function() {
            $('.cart').css('right', -385);
        }, 3000);
    });
});

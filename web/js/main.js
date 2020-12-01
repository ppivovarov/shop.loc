jQuery(document).ready(function ($) {

    $(".scroll").click(function (event) {
        event.preventDefault();
        $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
    });

    var navoffeset = $(".agileits_header").offset().top;
    $(window).scroll(function () {
        var scrollpos = $(window).scrollTop();
        if (scrollpos >= navoffeset) {
            $(".agileits_header").addClass("fixed");
        } else {
            $(".agileits_header").removeClass("fixed");
        }
    });

    $(".dropdown").hover(
        function () {
            $('.dropdown-menu', this).stop(true, true).slideDown("fast");
            $(this).toggleClass('open');
        },
        function () {
            $('.dropdown-menu', this).stop(true, true).slideUp("fast");
            $(this).toggleClass('open');
        }
    );

    $().UItoTop({easingType: 'easeOutQuart'});

    $('#example').okzoom({
        width: 150,
        height: 150,
        border: "1px solid black",
        shadow: "0 0 5px #000"
    });

});


$(window).load(function () {
    $('.flexslider').flexslider({
        animation: "slide",
        start: function (slider) {
            $('body').removeClass('loading');
        }
    });
});


paypal.minicart.render();

paypal.minicart.cart.on('checkout', function (evt) {
    var items = this.items(),
        len = items.length,
        total = 0,
        i;

    // Count the number of each item in the cart
    for (i = 0; i < len; i++) {
        total += items[i].get('quantity');
    }

    if (total < 3) {
        alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
        evt.preventDefault();
    }
});

/* Cart */
/**
 * Show modal window of the cart
 * @param cart
 */
function showCart(cart) {
    $('#modal-cart .modal-body').html(cart);
    $('#modal-cart').modal();
    let cartSum = $('#cart-sum').text() ? $('#cart-sum').text() : '$0';
    if (cartSum) {
        $('.cart-sum').text(cartSum);
    }
}

/**
 * Handler click on button to show the cart
 */
function getCart() {
    $.ajax({
        url: 'cart/show',
        type: 'GET',
        success: res => {
            if (!res) {
                alert('Ошибка добавления в корзину товара');
            } else {
                showCart(res);
            }
        },
        error: () => alert('Error add to cart!')
    });
}

/**
 * Handler for button to delete the product from the cart
 */
$('#modal-cart .modal-body').on('click', '.del-item', function () {
    let id = $(this).data('id');
    $.ajax({
        url: 'cart/del-item',
        data: {'id': id},
        type: 'GET',
        success: res => {
            if (!res) {
                alert('Ошибка удаления из корзину товара');
            } else {
                showCart(res);
            }
        },
        error: () => alert('Error del from cart!')
    });
});

/**
 * Handler for button to add the product to the cart
 */
$('.add-to-cart').on('click', function () {
    let id = $(this).data('id');
    $.ajax({
        url: 'cart/add',
        data: {'id': id},
        type: 'GET',
        success: res => {
            if (!res) {
                alert('Ошибка добавления в корзину товара');
            }
            showCart(res);

        },
        error: () => alert('Error add to cart!')
    });
    return false;
})

/**
 * Clear the product's cart
 */
function clearCart() {
    $.ajax({
        url: 'cart/clear',
        type: 'GET',
        success: res => {
            if (!res) {
                alert('Ошибка очистки корзины');
            }
            showCart(res);
        },
        error: () => alert('Error clear cart!')
    });
}

/* Cart */
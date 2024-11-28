
(function ($) {
    "use strict";

    /*Phần Load page 
    ===========================================================*/
    // $(".animsition").animsition({
    //     inClass: 'fade-in',
    //     outClass: 'fade-out',
    //     inDuration: 1500,
    //     outDuration: 800,
    //     linkElement: '.animsition-link',
    //     loading: true,
    //     loadingParentElement: 'html',
    //     loadingClass: 'animsition-loading-1',
    //     loadingInner: '<div class="loader05"></div>',
    //     timeout: false,
    //     timeoutCountdown: 5000,
    //     onLoadEvent: true,
    //     browser: [ 'animation-duration', '-webkit-animation-duration'],
    //     overlay : false,
    //     overlayClass : 'animsition-overlay-slide',
    //     overlayParentElement : 'html',
    //     transition: function(url){ window.location.href = url; }
    // });

    /*[ Back to top ]
    ===========================================================*/
    var windowH = $(window).height()/2;

    $(window).on('scroll',function(){
        if ($(this).scrollTop() > windowH) {
            $("#myBtn").css('display','flex');
        } else {
            $("#myBtn").css('display','none');
        }
    });

    $('#myBtn').on("click", function(){
        $('html, body').animate({scrollTop: 0}, 300);
    });
// Xóa người dùng
function removeRow(userId, url) {
    if (confirm("Bạn có chắc chắn muốn xóa người dùng này?")) {
        $.ajax({
            url: url + '/' + userId, // Cập nhật URL chính xác
            type: 'DELETE',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content') // CSRF Token
            },
            success: function(response) {
                if (!response.error) {
                    alert(response.message); // Thông báo thành công
                    // Xóa dòng khỏi bảng
                    $('tr').filter(function() {
                        return $(this).find('td').first().text() == userId;
                    }).remove();
                } else {
                    alert('Lỗi khi xóa người dùng');
                }
            },
            error: function(xhr, status, error) {
                alert('Có lỗi xảy ra!');
            }
        });
    }
}

    
    
    /*==================================================================
    [ Fixed Header ]*/
    var headerDesktop = $('.container-menu-desktop');
    var wrapMenu = $('.wrap-menu-desktop');

    if($('.top-bar').length > 0) {
        var posWrapHeader = $('.top-bar').height();
    }
    else {
        var posWrapHeader = 0;
    }


    if($(window).scrollTop() > posWrapHeader) {
        $(headerDesktop).addClass('fix-menu-desktop');
        $(wrapMenu).css('top',0);
    }
    else {
        $(headerDesktop).removeClass('fix-menu-desktop');
        $(wrapMenu).css('top',posWrapHeader - $(this).scrollTop());
    }

    $(window).on('scroll',function(){
        if($(this).scrollTop() > posWrapHeader) {
            $(headerDesktop).addClass('fix-menu-desktop');
            $(wrapMenu).css('top',0);
        }
        else {
            $(headerDesktop).removeClass('fix-menu-desktop');
            $(wrapMenu).css('top',posWrapHeader - $(this).scrollTop());
        }
    });


    /*==================================================================
    [ Menu mobile ]*/
    $('.btn-show-menu-mobile').on('click', function(){
        $(this).toggleClass('is-active');
        $('.menu-mobile').slideToggle();
    });

    var arrowMainMenu = $('.arrow-main-menu-m');

    for(var i=0; i<arrowMainMenu.length; i++){
        $(arrowMainMenu[i]).on('click', function(){
            $(this).parent().find('.sub-menu-m').slideToggle();
            $(this).toggleClass('turn-arrow-main-menu-m');
        })
    }

    $(window).resize(function(){
        if($(window).width() >= 992){
            if($('.menu-mobile').css('display') == 'block') {
                $('.menu-mobile').css('display','none');
                $('.btn-show-menu-mobile').toggleClass('is-active');
            }

            $('.sub-menu-m').each(function(){
                if($(this).css('display') == 'block') { console.log('hello');
                    $(this).css('display','none');
                    $(arrowMainMenu).removeClass('turn-arrow-main-menu-m');
                }
            });

        }
    });


    /*==================================================================
    [ Show / hide modal search ]*/
    $('.js-show-modal-search').on('click', function(){
        $('.modal-search-header').addClass('show-modal-search');
        $(this).css('opacity','0');
    });

    $('.js-hide-modal-search').on('click', function(){
        $('.modal-search-header').removeClass('show-modal-search');
        $('.js-show-modal-search').css('opacity','1');
    });

    $('.container-search-header').on('click', function(e){
        e.stopPropagation();
    });


    /*==================================================================
    [ Isotope ]*/
    var $topeContainer = $('.isotope-grid');
    var $filter = $('.filter-tope-group');

    // filter items on button click
    $filter.each(function () {
        $filter.on('click', 'button', function () {
            var filterValue = $(this).attr('data-filter');
            $topeContainer.isotope({filter: filterValue});
        });

    });

    // init Isotope
    $(window).on('load', function () {
        var $grid = $topeContainer.each(function () {
            $(this).isotope({
                itemSelector: '.isotope-item',
                layoutMode: 'fitRows',
                percentPosition: true,
                animationEngine : 'best-available',
                masonry: {
                    columnWidth: '.isotope-item'
                }
            });
        });
    });

    var isotopeButton = $('.filter-tope-group button');

    $(isotopeButton).each(function(){
        $(this).on('click', function(){
            for(var i=0; i<isotopeButton.length; i++) {
                $(isotopeButton[i]).removeClass('how-active1');
            }

            $(this).addClass('how-active1');
        });
    });

    /*==================================================================
    [ Filter / Search product ]*/
    $('.js-show-filter').on('click',function(){
        $(this).toggleClass('show-filter');
        $('.panel-filter').slideToggle(400);

        if($('.js-show-search').hasClass('show-search')) {
            $('.js-show-search').removeClass('show-search');
            $('.panel-search').slideUp(400);
        }
    });

    $('.js-show-search').on('click',function(){
        $(this).toggleClass('show-search');
        $('.panel-search').slideToggle(400);

        if($('.js-show-filter').hasClass('show-filter')) {
            $('.js-show-filter').removeClass('show-filter');
            $('.panel-filter').slideUp(400);
        }
    });




    /*==================================================================
    [ Cart ]*/
    $('.js-show-cart').on('click',function(){
        $('.js-panel-cart').addClass('show-header-cart');
    });

    $('.js-hide-cart').on('click',function(){
        $('.js-panel-cart').removeClass('show-header-cart');
    });

    /*==================================================================
    [ Cart ]*/
    $('.js-show-sidebar').on('click',function(){
        $('.js-sidebar').addClass('show-sidebar');
    });

    $('.js-hide-sidebar').on('click',function(){
        $('.js-sidebar').removeClass('show-sidebar');
    });

    /*==================================================================
    /* [+/- num product] */
    $('.btn-num-product-down').on('click', function () {
        var numProductInput = $(this).next(); // Get the input field
        var numProduct = Number(numProductInput.val());
        if (numProduct > 0) {
            numProductInput.val(numProduct - 1);
            updateCartQuantity(numProductInput.data('product-id'), numProduct - 1); // Send updated quantity
        }
    });

    $('.btn-num-product-up').on('click', function () {
        var numProductInput = $(this).prev(); // Get the input field
        var numProduct = Number(numProductInput.val());
        numProductInput.val(numProduct + 1);
        updateCartQuantity(numProductInput.data('product-id'), numProduct + 1); // Send updated quantity
    });

    // Function to send Ajax request to update cart quantity
    function updateCartQuantity(productId, quantity) {
        $.ajax({
            url: '/update-cart',  // Replace with your route
            method: 'POST',
            data: {
                product_id: productId,
                quantity: quantity,
                _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
            },
            success: function (data) {
                if (data.success) {
                    updateCartDisplay(data.cart);  // Update the cart display with new data
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Could not update cart'
                    });
                }
            },
            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred. Please try again!'
                });
            }
        });
    }

    // Function to update the cart display
    function updateCartDisplay(cart) {
        const cartItemsContainer = document.querySelector('.header-cart-wrapitem');
        cartItemsContainer.innerHTML = ''; // Clear current items

        let sumPriceCart = 0;
        cart.forEach(product => {
            const price = product.price_sale !== 0 ? product.price_sale : product.price;
            sumPriceCart += price * product.qty; // Assuming qty is available

            const li = document.createElement('li');
            li.className = 'header-cart-item flex-w flex-t m-b-12';
            li.innerHTML = `
                <div class="header-cart-item-img">
                    <img src="${product.thumb}" alt="IMG">
                </div>
                <div class="header-cart-item-txt p-t-8">
                    <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">${product.name}</a>
                    <span class="header-cart-item-info">${price} x ${product.qty}</span>
                </div>
            `;
            cartItemsContainer.appendChild(li);
        });

        // Update the total price display
        document.querySelector('.header-cart-total').textContent = `Total: ${sumPriceCart.toLocaleString()}`;
    }
    /*==================================================================
    [ Rating ]*/
    $('.wrap-rating').each(function(){
        var item = $(this).find('.item-rating');
        var rated = -1;
        var input = $(this).find('input');
        $(input).val(0);

        $(item).on('mouseenter', function(){
            var index = item.index(this);
            var i = 0;
            for(i=0; i<=index; i++) {
                $(item[i]).removeClass('zmdi-star-outline');
                $(item[i]).addClass('zmdi-star');
            }

            for(var j=i; j<item.length; j++) {
                $(item[j]).addClass('zmdi-star-outline');
                $(item[j]).removeClass('zmdi-star');
            }
        });

        $(item).on('click', function(){
            var index = item.index(this);
            rated = index;
            $(input).val(index+1);
        });

        $(this).on('mouseleave', function(){
            var i = 0;
            for(i=0; i<=rated; i++) {
                $(item[i]).removeClass('zmdi-star-outline');
                $(item[i]).addClass('zmdi-star');
            }

            for(var j=i; j<item.length; j++) {
                $(item[j]).addClass('zmdi-star-outline');
                $(item[j]).removeClass('zmdi-star');
            }
        });
    });

    /*==================================================================
    [ Show modal1 ]*/
    $('.js-show-modal1').on('click',function(e){
        e.preventDefault();
        $('.js-modal1').addClass('show-modal1');
    });

    $('.js-hide-modal1').on('click',function(){
        $('.js-modal1').removeClass('show-modal1');
    });
     /*==================================================================
    [ Add to Cart Button Event ]
    ===========================================================*/
    document.getElementById('add-to-cart-btn').addEventListener('click', function (e) {
        e.preventDefault();

        const form = document.getElementById('add-cart-form');
        const formData = new FormData(form);

        fetch('/add-cart', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update the cart display
                updateCartDisplay(data.products);

                Swal.fire({
                    icon: 'success',
                    title: 'Thành công',
                    text: data.message,
                    timer: 1500,
                    showConfirmButton: false
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi',
                    text: data.message
                });
            }
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: 'Đã xảy ra lỗi, vui lòng thử lại!'
            });
            console.error('Error:', error);
        });
    });

    function updateCartDisplay(products) {
        const cartItemsContainer = document.querySelector('.header-cart-wrapitem');
        if (!cartItemsContainer) return;  // Ensure the cart container exists

        cartItemsContainer.innerHTML = ''; // Clear current items

        let sumPriceCart = 0;

        products.forEach(product => {
            const price = product.price_sale != 0 ? product.price_sale : product.price;
            sumPriceCart += price * product.qty; // Assuming qty is available

            const li = document.createElement('li');
            li.className = 'header-cart-item flex-w flex-t m-b-12';
            li.innerHTML = `
                <div class="header-cart-item-img">
                    <img src="${product.thumb}" alt="IMG">
                </div>
                <div class="header-cart-item-txt p-t-8">
                    <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">${product.name}</a>
                    <span class="header-cart-item-info">${price}</span>
                </div>
            `;
            cartItemsContainer.appendChild(li);
        });

        // Update total price display
        document.querySelector('.header-cart-total').textContent = `Total: ${sumPriceCart.toLocaleString()}`;
    }
})(jQuery);



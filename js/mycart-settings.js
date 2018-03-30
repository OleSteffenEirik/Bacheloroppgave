$(function () {

    var goToCartIcon = function($addTocartBtn){
      var $cartIcon = $(".my-cart-icon");
    }

    $('.my-cart-btn').myCart({
      currencySymbol: '$',
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      classProductQuantity: 'my-product-quantity',
      classProductRemove: 'my-product-remove',
      classCheckoutCart: 'my-cart-checkout',
      affixCartIcon: true,
      showCheckoutModal: true,
      numberOfDecimals: 2,
      cartItems: [],
      clickOnAddToCart: function($addTocart){
        goToCartIcon($addTocart);
      },
      afterAddOnCart: function(products, totalQuantity) {
        console.log("afterAddOnCart", products, totalQuantity);
      },
      clickOnCartIcon: function($cartIcon, products, totalQuantity) {
        console.log("cart icon clicked", $cartIcon, products, totalQuantity);
      },
      checkoutCart: function(products, totalQuantity) {
        var checkoutString = "Total Quantity: " + totalQuantity;
        checkoutString += "\n\n id \t name \t summary \t quantity";
        $.each(products, function(){
          checkoutString += ("\n " + this.id + " \t " + this.name + " \t " + this.summary + " \t " + this.quantity);
        });
        alert(checkoutString)
        console.log("checking out", products, totalQuantity);
      },
    });

  });
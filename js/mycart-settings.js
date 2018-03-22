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
      cartItems: [
        /*{id: 1, name: 'product 1', summary: 'summary 1', quantity: 1},
        {id: 2, name: 'product 2', summary: 'summary 2', quantity: 1},
        {id: 3, name: 'product 3', summary: 'summary 3', quantity: 1}*/
      ],
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
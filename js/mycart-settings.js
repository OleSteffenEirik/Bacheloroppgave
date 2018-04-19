$(function () {

  var goToCartIcon = function ($addTocartBtn) {
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
    clickOnAddToCart: function ($addTocart) {
      goToCartIcon($addTocart);
    },
    afterAddOnCart: function (products, totalQuantity) {
      console.log("afterAddOnCart", products, totalQuantity);
    },
    clickOnCartIcon: function ($cartIcon, products, totalQuantity) {
      console.log("cart icon clicked", $cartIcon, products, totalQuantity);
    },
    checkoutCart: function (products, totalQuantity) {
      var checkoutString = new Array();
      var fritekst = document.getElementById('fritekst').value;
      $.each(products, function (index) {
        checkoutString.push({
          "id": this.id,
          "name": this.name,
          "quantity": this.quantity
        });
      });


      console.log(fritekst);
      console.log(checkoutString);
      alert("hei");
      $.ajax({
        url: "../php/includes/mailing.php",
        type: "POST",
        data: {
          "checkoutString": JSON.stringify(checkoutString),
          "fritekst" : fritekst
        },
        complete: function (data, status) {
          console.log(data);
          alert(status);
        }
      });

      //her skal mail sendes(?) / funksjon for mail kjøres

    },
  });

});
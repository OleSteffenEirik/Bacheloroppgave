/*
 * jQuery myCart - v1.7 - 2018-03-07
 * http://asraf-uddin-ahmed.github.io/
 * Copyright (c) 2017 Asraf Uddin Ahmed; Licensed None
 */

(function ($) {

  "use strict";

  var OptionManager = (function () {
    var objToReturn = {};

    var _options = null;
    var DEFAULT_OPTIONS = {
      currencySymbol: '$',
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      classProductQuantity: 'my-product-quantity',
      classProductRemove: 'my-product-remove',
      classCheckoutCart: 'my-cart-checkout',
      affixCartIcon: true,
      showCheckoutModal: true,
      numberOfDecimals: 2,
      cartItems: null,
      clickOnAddToCart: function ($addTocart) {},
      afterAddOnCart: function (products, totalQuantity) {},
      clickOnCartIcon: function ($cartIcon, products, totalQuantity) {},
      checkoutCart: function (products, totalQuantity) {
        return false;
      },
    };


    var loadOptions = function (customOptions) {
      _options = $.extend({}, DEFAULT_OPTIONS);
      if (typeof customOptions === 'object') {
        $.extend(_options, customOptions);
      }
    };
    var getOptions = function () {
      return _options;
    };

    objToReturn.loadOptions = loadOptions;
    objToReturn.getOptions = getOptions;
    return objToReturn;
  }());

  var MathHelper = (function () {
    var objToReturn = {};
    var getRoundedNumber = function (number) {
      if (isNaN(number)) {
        throw new Error('Parameter is not a Number');
      }
      number = number * 1;
      var options = OptionManager.getOptions();
      return number.toFixed(options.numberOfDecimals);
    };
    objToReturn.getRoundedNumber = getRoundedNumber;
    return objToReturn;
  }());

  var ProductManager = (function () {
    var objToReturn = {};

    /*
    PRIVATE
    */
    localStorage.products = localStorage.products ? localStorage.products : "";
    var getIndexOfProduct = function (id) {
      var productIndex = -1;
      var products = getAllProducts();
      $.each(products, function (index, value) {
        if (value.id == id) {
          productIndex = index;
          return;
        }
      });
      return productIndex;
    };
    var setAllProducts = function (products) {
      localStorage.products = JSON.stringify(products);
    };
    var addProduct = function (id, name, summary, quantity) {
      var products = getAllProducts();
      products.push({
        id: id,
        name: name,
        summary: summary,
        quantity: quantity,
      });
      setAllProducts(products);
    };

    /*
    PUBLIC
    */
    var getAllProducts = function () {
      try {
        var products = JSON.parse(localStorage.products);
        return products;
      } catch (e) {
        return [];
      }
    };
    var updatePoduct = function (id, quantity) {
      var productIndex = getIndexOfProduct(id);
      if (productIndex < 0) {
        return false;
      }
      var products = getAllProducts();
      products[productIndex].quantity = typeof quantity === "undefined" ? products[productIndex].quantity * 1 + 1 : quantity;
      setAllProducts(products);
      return true;
    };
    var setProduct = function (id, name, summary, quantity) {
      if (typeof id === "undefined") {
        console.error("id required");
        return false;
      }
      if (typeof name === "undefined") {
        console.error("name required");
        return false;
      }
      if (!$.isNumeric(quantity)) {
        console.error("quantity is not a number");
        return false;
      }
      summary = typeof summary === "undefined" ? "" : summary;

      if (!updatePoduct(id)) {
        addProduct(id, name, summary, quantity);
      }
    };
    var clearProduct = function () {
      setAllProducts([]);
    };
    var removeProduct = function (id) {
      var products = getAllProducts();
      products = $.grep(products, function (value, index) {
        return value.id != id;
      });
      setAllProducts(products);
    };
    var getTotalQuantity = function () {
      var total = 0;
      var products = getAllProducts();
      $.each(products, function (index, value) {
        total += value.quantity * 1;
      });
      return total;
    };

    objToReturn.getAllProducts = getAllProducts;
    objToReturn.updatePoduct = updatePoduct;
    objToReturn.setProduct = setProduct;
    objToReturn.clearProduct = clearProduct;
    objToReturn.removeProduct = removeProduct;
    objToReturn.getTotalQuantity = getTotalQuantity;
    return objToReturn;
  }());


  var loadMyCartEvent = function (targetSelector) {

    var options = OptionManager.getOptions();
    var $cartIcon = $("." + options.classCartIcon);
    var $cartBadge = $("." + options.classCartBadge);
    var classProductQuantity = options.classProductQuantity;
    var classProductRemove = options.classProductRemove;
    var classCheckoutCart = options.classCheckoutCart;

    var idCartModal = 'my-cart-modal';
    var idCartTable = 'my-cart-table';
    var idEmptyCartMessage = 'my-cart-empty-message';
    var classProductTotal = 'my-product-total';
    var classAffixMyCartIcon = 'my-cart-icon-affix';


    if (options.cartItems && options.cartItems.constructor === Array) {
      ProductManager.clearProduct();
      $.each(options.cartItems, function () {
        ProductManager.setProduct(this.id, this.name, this.summary, this.quantity);
      });
    }

    $cartBadge.text(ProductManager.getTotalQuantity());

    if (!$("#" + idCartModal).length) {
      $('body').append(
        '<div class="modal fade bd-example-modal-lg" id="' + idCartModal + '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +
          '<div class="modal-dialog modal-lg modal-dialog-centered" role="document">' +
            '<div class="modal-content">' +
              '<div class="modal-header">' +
                '<h5 class="modal-title text-tronrud-primary" id="orderModalLabel">Your order</h5>' +
                '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
                  '<span aria-hidden="true"><i class="fas fa-times"></i></span>' +
                '</button>' +
              '</div>' +

              '<div class="modal-body">' +
                '<div class="container-fluid">' +
                  '<div class="row">' +
                    '<div class="col-md-6 order-md-2 table-responsive">' +
                      '<h4 class="d-flex justify-content-between align-items-center mb-3">' +
                          '<span class="text-muted">Your cart</span>' +
                          '<span class="badge badge-pill badge-tronrud-secondary my-cart-badge"></span>' +
                      '</h4>' +
                      '<ul class="list-group mb-3">' +
                          '<table class="table table-hover table-striped border" id="' + idCartTable + '"></table>' +
                      '</ul>' +
                    '</div>' +
              
                    '<div class="col-md-6 order-md-1">' +
                      '<h4 class="mb-3">Billing address</h4>' +
                      '<div class="mb-3">' +
                        '<label for="firstName">Company</label>' +
                        '<input type="text" class="form-control" id="firstName" disabled="disabled" value="' + companySession + '">' +
                      '</div>' +
                      '<div class="row">' +
                        '<div class="col-md-8 mb-3">' +
                          '<label for="email">E-mail</label>' +
                          '<input type="email" class="form-control" id="email" disabled="disabled" value="' + emailSession + '">' +
                        '</div>' +
                        '<div class="col-md-4 mb-3">' +
                          '<label for="zip">Phone</label>' +
                            '<input type="text" class="form-control" id="phone" disabled="disabled" value="' + phoneSession + '">' +
                        '</div>' +
                      '</div>' +
  
                      '<div class="row">' +
                          '<div class="col-md-8 mb-3">' +
                              '<label for="address">Address</label>' +
                              '<input type="text" class="form-control" id="address" disabled="disabled" value="' + adressSession + '">' +
                          '</div>' +
                          '<div class="col-md-4 mb-3">' +
                              '<label for="zip">Zip</label>' +
                              '<input type="text" class="form-control" id="zip" disabled="disabled" value="' + zipSession + '">' +
                          '</div>' +
                      '</div>' +
                    '</div>' +
                  '</div>' +
                '</div>' +
              '</div>' +

              '<div class="modal-footer">' +
                '<a href="" class="btn btn-success ' + classCheckoutCart + '">' +
                  '<i class="fas fa-check fa-lg align-middle mr-1"></i><b>Checkout</b>' +
                '</a>' +
              '</div>' +
            '</div>' +
          '</div>' +
        '</div>'
      );
    }

    var drawTable = function () {
      var $cartTable = $("#" + idCartTable);
      $cartTable.empty();

      var products = ProductManager.getAllProducts();
      $.each(products, function () {
        $cartTable.append(
          '<tr title="' + this.summary + '" data-id="' + this.id + '">' +
          '<td class="col-10 align-middle">' + this.name + '</td>' +
          '<td class="col-1 align-middle" title="Quantity"><input id="numberQ" type="number" min="1" style="width:40px;" class="' + classProductQuantity + '" value="' + this.quantity + '"/></td>' +
          '<td class="col-1 align-middle" title="Remove from Cart" class="text-center"><a href="javascript:void(0);" class="btn btn-xs btn-rounded my-0 btn-danger ' + classProductRemove + '"><i class="fas fa-times"></i></a></td>' +
          '</tr>'
        );
      });

      $cartTable.append(products.length ?
        '<tr>' +
        '/<tr>' :
        '<div class="alert alert-danger" role="alert" id="' + idEmptyCartMessage + '">Your cart is empty</div>'
      );

    };
    var showModal = function () {
      drawTable();
      $("#" + idCartModal).modal('show');
    };
    var updateCart = function () {
      $.each($("." + classProductQuantity), function () {
        var id = $(this).closest("tr").data("id");
        ProductManager.updatePoduct(id, $(this).val());
      });
    };

    /*
    EVENT
    */
    if (options.affixCartIcon) {
      var cartIconBottom = $cartIcon.offset().top * 1 + $cartIcon.css("height").match(/\d+/) * 1;
      var cartIconPosition = $cartIcon.css('position');
      $(window).scroll(function () {
        $(window).scrollTop() >= cartIconBottom ? $cartIcon.addClass(classAffixMyCartIcon) : $cartIcon.removeClass(classAffixMyCartIcon);
      });
    }

    $cartIcon.click(function () {
      options.showCheckoutModal ? showModal() : options.clickOnCartIcon($cartIcon, ProductManager.getAllProducts(), ProductManager.getTotalQuantity());
    });

    $(document).on("input", "." + classProductQuantity, function () {
      var id = $(this).closest("tr").data("id");
      var quantity = $(this).val();

      $(this).parent("td").next("." + classProductTotal).text(options.currencySymbol);
      ProductManager.updatePoduct(id, quantity);

      $cartBadge.text(ProductManager.getTotalQuantity());
    });

    $(document).on('keypress', "." + classProductQuantity, function (evt) {
      if (evt.keyCode == 38 || evt.keyCode == 40) {
        return;
      }
      evt.preventDefault();
    });

    $(document).on('click', "." + classProductRemove, function () {
      var $tr = $(this).closest("tr");
      var id = $tr.data("id");
      $tr.hide(500, function () {
        ProductManager.removeProduct(id);
        drawTable();
        $cartBadge.text(ProductManager.getTotalQuantity());
      });
    });

    $(document).on('click', "." + classCheckoutCart, function () {
      var products = ProductManager.getAllProducts();
      if (!products.length) {
        $("#" + idEmptyCartMessage).fadeTo('fast', 0.5).fadeTo('fast', 1.0);
        return;
      }
      updateCart();
      var isCheckedOut = options.checkoutCart(ProductManager.getAllProducts(), ProductManager.getTotalQuantity());
      if (isCheckedOut !== false) {
        ProductManager.clearProduct();
        $cartBadge.text(ProductManager.getTotalQuantity());
        $("#" + idCartModal).modal("hide");
      }
    });

    $(document).on('click', targetSelector, function () {
      var $target = $(this);
      options.clickOnAddToCart($target);

      var id = $target.data('id');
      var name = $target.data('name');
      var summary = $target.data('summary');
      var quantity = $target.data('quantity');

      ProductManager.setProduct(id, name, summary, quantity);
      $cartBadge.text(ProductManager.getTotalQuantity());

      options.afterAddOnCart(ProductManager.getAllProducts(), ProductManager.getTotalQuantity());
    });

  };


  $.fn.myCart = function (userOptions) {
    OptionManager.loadOptions(userOptions);
    loadMyCartEvent(this.selector);
    return this;
  };


})(jQuery);
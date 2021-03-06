/* PART SEARCH */

const table = document.getElementById('item-table');
const form = document.getElementById('search-form');
const inputVal = document.getElementById('search-bar');


//let addToCartButton = '<button class="btn btn-success btn-rounded btn-sm my-0 my-cart-btn font-weight-bold" data-id="' + Item_id + '" data-name="' + name + '" data-summary="summary 2" data-quantity="1"><i class="fas fa-shopping-cart fa-lg align-middle mr-1"></i>Add to cart</button>'

form.addEventListener('submit', function (e) {

  console.log(inputVal.value);

  getItems();
  e.preventDefault();
})



/* function */
function getItems() {
  let searchterm = inputVal.value;
  console.log(searchterm);
  $.ajax({
    type: "GET",
    dataType: "json",
    url: "../php/includes/search.php?searchterm=" + searchterm,
    success: callBack
  });

  function callBack(response) {



    if (response.length <= 0) {
      alert("No result");
      return;
    }
    clearTable();
    for (let i = 0; i < response.length; i++) {
      let Item_Id = response[i].Item_Id;
      let name = response[i].name;

      let row = table.insertRow(i);
      //let cell1 = row.insertCell(0);
      let cell2 = row.insertCell(0);
      let cell3 = row.insertCell(1);
      let cell4 = row.insertCell(2);

      //cell1.appendChild(document.createTextNode(i + 1));
      cell2.appendChild(document.createTextNode(name));
      cell3.appendChild(document.createTextNode(Item_Id));
      //$(cell1).addClass('cell1');
      $(cell2).addClass('cell2');
      $(cell3).addClass('cell3');

      var button = $('<button><i class="fas fa-shopping-cart fa-lg align-middle mr-1"></i>Add to cart</button>');
      button.addClass("btn-addToCart btn btn-success btn-rounded btn-sm my-0 my-cart-btn font-weight-bold");
      button.attr("data-summary", "test");
      button.attr("data-quantity", 1);
      button.attr("data-id", Item_Id);
      button.attr("data-name", name);

      $(cell4).addClass('cell4 text-center').append(button)
    }
  }
}

function clearTable() {
  $("#item-table tr").remove();
}
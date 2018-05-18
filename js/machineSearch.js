/* MACHINE SEARCH */

const tableMachine = document.getElementById('item-table-machine');
const formMachine = document.getElementById('searchFormMachine');
const inputValMachine = document.getElementById('searchBarMachine');

formMachine.addEventListener('submit', function (e) {

  console.log(inputValMachine.value);

  getItemsMachine();
  e.preventDefault();
})


function getItemsMachine() {
  let searchtermMachine = inputValMachine.value;
  console.log(searchtermMachine);
  $.ajax({
    type: "GET",
    dataType: "json",
    url: "../php/includes/searchMachine.php?searchtermMachine=" + searchtermMachine,
    success: callBackMachine
  });

  function callBackMachine(response) {

    if (response.length <= 0) {
      alert("No result");
      return;
    }
    clearTableMachine();
    for (let i = 0; i < response.length; i++) {
      let ID = response[i].ID;
      let Name = response[i].Name;

      let row = tableMachine.insertRow(i);
      //let cell1 = row.insertCell(0);
      let cell2 = row.insertCell(0);
      let cell3 = row.insertCell(1);
      let cell4 = row.insertCell(2);

      //cell1.appendChild(document.createTextNode(i + 1));
      cell2.appendChild(document.createTextNode(ID));
      cell3.appendChild(document.createTextNode(Name));
      //$(cell1).addClass('cell1');
      $(cell2).addClass('cell2');
      $(cell3).addClass('cell3');

      var button = $('<div class="custom-control custom-checkbox text-center align-middle">' +
      '<input type="checkbox" class="custom-control-input" id="customCheck1">' +
      '<label class="custom-control-label" for="customCheck1"></label>' +
      '</div>');
      //button.addClass("btn-addToCart btn btn-success btn-rounded btn-sm my-0 my-cart-btn font-weight-bold");
      //button.attr("data-summary", "test");
      //button.attr("data-quantity", 1);
      //button.attr("data-id", Item_Id);
      //button.attr("data-name", name);

      $(cell4).addClass('cell4 text-center align-middle').append(button)
    }
  }
}

function clearTableMachine() {
  $("#item-table-machine tr").remove();
}
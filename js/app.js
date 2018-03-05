const table = document.getElementById('item-table');
const form = document.getElementById('search-form');
const inputVal = document.getElementById('search-bar');

form.addEventListener('submit', function(e){

  console.log(inputVal.value);

  getItems();
  
  e.preventDefault();
})



/* function */
function getItems() {
    let name = inputVal.value;
    console.log(name);
    clearTable();
    $.ajax({
      type: "GET",
      url: "../php/includes/search.php",
      dataType: "json",
      data: { "name" : name },
      success: function(data, status) {
        if (data == false ) {
          clearTable();
        } else {
          for(let i = 0; i < data.length; i++) {
            createRow(i, data[i].name, data[i].Item_Id);
          }
        }
      },
      complete: function(data, status) {
        console.log(status);
      }
    });  
}

function createRow(id, name, Item_Id){
  let row = table.insertRow(id);

  let cell1 = row.insertCell(0);
  let cell2 = row.insertCell(1);
  let cell3 = row.insertCell(2);

  cell1.appendChild(document.createTextNode(id));
  cell2.appendChild(document.createTextNode(name));
  cell3.appendChild(document.createTextNode(Item_Id));
}


function clearTable() {
  $("#item-table tr").remove(); 

}
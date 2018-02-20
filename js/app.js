const searchBar = document.getElementById('searchBar');
const table = document.getElementById('itemTable');
/* event listener */
searchBar.addEventListener('input', getItems);

/* function */
function getItems() {
  if(searchBar.value = "") {
    
  } else {
    let name = this.value;
    console.log(name);

    $.ajax({
      type: "GET",
      url: "php/search.php",
      dataType: "json",
      data: { "name" : name },
      success: function(data, status) {
        if (data == false ) {
          clearTable();
        } else {
          for(let i = 0; i < data.length; i++) {
            clearTable();
            createRow(i, data[i].name, data[i].Item_Id);
          }
        }
      },
      complete: function(data, status) {
        console.log(status);
      }
    });
  }
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
}
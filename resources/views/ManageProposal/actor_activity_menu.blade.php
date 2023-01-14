@extends('layouts.app')

@section('content')
<title>Proposals Submitted </title>
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8"> 
        <h3 style="text-align:center;font-weight: bold;">Select the Chararcter. </h3><br>

            <br>
            <div class="text-center">

              <a href="{{ url('/committee/proposal/menu') }}" class="col-2 btn btn-success" title="Committee Menu">Committee</a>
              <a href="{{ url('/coordinator/proposal/menu') }}" class="col-2 btn btn-primary" title="Coordinator Menu">Coordinator</a>
              <a href="{{ url('/dean/proposal/menu')  }}" class="col-2 btn btn-secondary" title="Dean Menu">Dean</a>

            </div>
            
        </div>
    </div>
</div>

<script>
function proposalSearchFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("proposalInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("proposalTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}   

function sortProposalTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("proposalTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("td")[n];
      y = rows[i + 1].getElementsByTagName("td")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>

@endsection
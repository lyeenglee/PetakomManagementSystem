@extends('layouts.lecturernav')
@include('flash-message')
@section('content')

<title>BULLETIN</title>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <h3 style="text-align:center;font-weight: bold;">BULLETIN (LECTURER)</h3><br>
            <div class="input-group rounded">
                <input type="search" id="bulletinInput" class="form-control rounded" onkeyup="activitySearchFunction()" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </span>
            </div>
            <br>
            <div class="card">
                <div class="card-header" style="font-size:30px">{{ __('Bulletins List') }} 
                </div>
                <br>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="bulletinTable">
                            <thead>
                                <tr class="text-center">
                                <th onclick='sortActivityTable(0)'>#</th>
                                <th class="col-6 " onclick='sortActivityTable(1)'>Bulletin
                                    <svg xmlns="htt://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-up" viewBox="0 0 16 16">
                                        <path d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707V12.5zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                                    </svg>
                                </th>
                                <th class="col-2" onclick='sortActivityTable(2)'>Date
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-up" viewBox="0 0 16 16">
                                        <path d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707V12.5zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                                    </svg>
                                </th>
                                <th class="col-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($bulletins as $item)
                                <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->bulletinTitle }}</td>
                                <td>{{ $item->bulletinDate }}</td>
                                <td >   
                                    <a href="{{ url('/bulletin/' . $item->bulletinID) }}" target="_blank" title="View Bulletin"><button class="btn btn-primary "><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                    </form>                             
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                           
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

<script>
function activitySearchFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("bulletinInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("bulletinTable");
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

function sortActivityTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("bulletinTable");
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
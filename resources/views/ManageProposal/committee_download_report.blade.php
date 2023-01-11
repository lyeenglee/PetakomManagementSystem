@extends('layouts.app')

@section('content')

</div>
<div class="container">
    <div class="row justify-content-center">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report of Proposals Lists</title>
    <link 
    rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>

<body>
    <header>
    <img src="{{ URL::to('/assets/img/logo.png') }}">

        <h1 style="text-align: center">PETAKOM </h1> <br>
    </header>

    <div class="container mt-3 ml-3"> 

    <div class="row ">
      @csrf
    <div class=" float-right col-lg-12">
        <a class="btn btn-danger btn-lg font-weight-bold ml-2 float-right  mt-3" href="{{ URL::to('users/view-pdf') }}" method="post" target="_blank">Report</a>                  
    </div>

    </form>


        <?php
            #to display the current date, time of the generated report
            $current_date_time = \Carbon\Carbon::now()->toDateTimeString(); 
            echo "<div style='font-size: 20px;'> Date/Time : ".$current_date_time."</div>";
            $proposalCount = 1 ;
        ?>
        <br><div class="float-left">Proposal List</div><br>
        
        <table class="table table-bordered  table-striped mt-2 " id="proposalTable">
            <tr style="background-color: #9fe3de; color: #404040" >
                <th width="40px">No.</th>
                <th width="200px">Proposal Title</th>
                <th width="40px">Proposed Date</th>
                <th width="40px">First Name</th>
                <th width="40px">Last Name</th>
            </tr>
            @foreach($proposals as $item)
                <tr>
                    <td style="font-size: 12px;">{{ $loop->iteration }}</td>
                    <td>{{ $item->proposalTitle }}</td>
                    <td>{{ $item->date }}</td>
                    <td style="font-size: 14px;">{{ $item->firstName }}</td>
                    <td style="font-size: 14px;">{{ $item->lastName }}</td>

                </tr>
                <?php 
                    $proposalCount = $proposalCount + 1;
                ?>
            @endforeach

        </table>
        <?php
            #to display the total number of rooms in the list
            $totalProposal = $proposalCount - 1;
            echo "Total Number of Proposals Proposed: ".$totalProposal;
        ?>

    </div>
    </div>

    </div>
</body>

</html>

<script>
function activitySearchFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("activityInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("activityTable");
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
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Download Sale</title>
    <!-- Fonts CSS -->
    {{-- <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('../assets/css/app-light.css') }}" id="lightTheme"> --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <style type="text/css">

    td, th{
      border: 1px solid black;
    }

    th, td{
    padding: 0px 30px 0px 30px;
    }
      /* Regular styles here */
      
      /* Styles for print output */
      @media print {
          /* Define styles here */
          .print-button {
              display: none;
          }
      }

  </style>
  </head>
  <body>

    <h3>Sales Report</h3>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th class="text-center w-5" scope="col">SL.</th>
          <th class="text-center w-10" scope="col">Invoice</th>
          <th class="text-center w-10" scope="col">Date</th>
          <th class="text-center w-20" scope="col">Customer Name</th>
          <th class="text-center w-10" scope="col">Grand Total</th>
          <th class="text-center w-10" scope="col">Paid Amount</th>
          <th class="text-center w-10" scope="col">Due Amount</th>
        </tr>
      </thead>
      <tbody>
        @php
          $sl = 1;
        @endphp
        @foreach($filtersale as $sale)
        <tr>
          <td>{{$sl++}}</td>
          <td>{{$sale->invoice}}</td>
          <td>{{$sale->sale_date}}</td>
          <td>{{$sale->customer->customer_name}}</td>
          <td>{{$sale->grand_total}}</td>
          <td>{{$sale->p_paid_amount}}</td>
          <td>{{$sale->due_amount}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </body>
</html>
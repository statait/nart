<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Schedule Invoice</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 13px;
    }
    .authority {
        /*text-align: center;*/
        float: right
    }

    .authority1 {
        /*text-align: center;*/
        float: left
    }
    .authority h5 {
        margin-top: -10px;
        color: #037c09;
        /*text-align: center;*/
        margin-left: 35px;
    }

    .authority1 h5 {
        margin-top: -10px;
        color: #037c09;
        /*text-align: center;*/
        margin-left: 35px;
    }
    
    .thanks p {
        color: #136108;;
        font-size: 16px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }

    .t {
  border: 1px solid black;
  border-collapse: collapse;
}

</style>

</head>
<body>

  <table width="100%" style="background: #f7f7f7; padding:0 10px 0 10px;">
    <tr>
        <td valign="top">
          
        <td align="right">
            <pre class="font" >
              STATA IT LIMITED 
               Email:statabangladesh@gmail.com
               <br>
               Mob: 88 09678200509 
            </pre>
        </td>
    </tr>
  </table>


  <table width="100%" style="background:white; padding:2px;"></table>
  <table width="100%" style="background: #F7F7F7; padding:0 5px 0 5px;" class="font">
    <tr>
        <td>
         
        </td>
    </tr>
  </table>
  <br/>
<h3>Product List</h3>
  <table class="t" width="100%">
    <thead style="background-color: #17810e; color:#FFFFFF;">
      <tr class="font">
        <th class="t">SL.</th>
        <th class="t">Product Name</th>
        <th class="t">Code</th>
        <th class="t">Unit Price </th>
        <th class="t">Quantity</th>
        <th class="t">Discount </th>
        <th class="t">Total </th>
      </tr>
    </thead>
    <tbody>
        @php
             $sl = 1;
        @endphp
    @foreach ($filterschedule as $item)
      <td>{{$item->schedule_date}}</td>
    @endforeach
      
    </tbody>
  </table>
  <br>
  <table width="100%" style=" padding:0 10px 0 10px;">
    <tr>
        <td align="right" >
         
          <hr>  
          <h3><span style="color: #11790d;">Sub Total </span> <span style="font-size: 12px"></span></h3>
          <h3><span style="color: #169211;">Discount </span>
            
          
          </h3>
          <h3><span style="color: #26810f;">Total Tax </span> <span style="font-size: 12px"> TK 0.00</span></h3>

           
            {{-- <h2><span style="color: green;">Full Payment PAID</h2> --}}
            <hr>
         
          
        </td>

    </tr>
    <br>
    <tr>
       <td><b> Quotation Details : </b></td> 
    </tr>
  </table>
  
  {{-- <div class="thanks mt-3">
    <p>Thanks For Buying Products..!!</p>
  </div> --}}
  <div class="authority1 float-left" style="margin-top:150px">
  <p>-----------------------------------</p>
  <h5>Customer Signature:</h5>
  </div>
  <div class="authority float-right">
    <div class="seal">
      <img width="110" height="112" src="frontend/assets/img/auth_seal.png" alt="">
    </div>
    <br>
      <p>-----------------------------------</p>
      <h5>Authority Signature:</h5>
  </div>
</body>
</html> 
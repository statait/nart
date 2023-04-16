<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Download Chalan</title>
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('../assets/css/app-light.css') }}" id="lightTheme">

    <style type="text/css">
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
  <body class="vertical light">
    <div class="wrapper">

      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
              <div class="row align-items-center mb-4">
                <div class="col">
                </div>
                <div class="col-auto">
                  <button class="print-button" onclick="window.print()" class="btn btn-secondary">Print</button>
                </div>
              </div>
              <div class="card shadow" style="background-image: url('/backend/images/logo/watermark.png'); background-size: 50%; background-position: center; background-repeat: no-repeat; align-items: center; justify-content: center;">
                <div class="card-body p-5">
                  <div class="row mb-5">
                    <div class="col-12 text-center mb-4">
                      <h3 class="mb-0 text-uppercase">Delivery Chalan</h3>
                      <img src="/backend/images/logo/chalan_logo.png" alt="">
                    
                      <p><strong> Head Office : West Wind Point, Cha-89/4-5, Progoti Sarani, North Badda, Bir Uttam Rafikul Islam Avenue, Commercial Level 2, Dhaka, Bangladesh<br />
                      Factory :BSCIC Industrial Estate, Kanaipur, Faridpur<br />Tel : 9347568, Mobile : 01711-381694</strong></p>
                    </div>
                    <div class="col-md-7">
                      <p class="small  text-uppercase mb-2"><strong><u> Chalan To</u></strong></p>
                      <p class="mb-4">
                        <strong>{{$chalan->customer->customer_name}}<br />{{$chalan->company}}<br />{{$chalan->address}}</strong>
                      </p>
                      <p>
                        <span class="small text-uppercase"><strong><u> Chalan </u></strong></span><br />
                        <strong>{{$chalan->chalan_no}}</strong>
                      </p>
                    </div>
                    <div class="col-md-5">
                      <p class="small  text-uppercase mb-2"><strong><u> Chalan Date</u></strong></p>
                      <p class="mb-4">
                        <strong>{{$chalan->chalan_date}}</strong>
                      </p>
                      <p>
                        <span class="small text-uppercase"><strong><u> Driver Name</u></strong></span><br>
                        <strong>{{$chalan->t_driver}}</strong>
                      </p>
                      <p>
                        <span class="small text-uppercase"><strong><u> Truck No</u></strong> </span><br>
                        <strong>{{$chalan->t_no}}</strong>
                      </p>
                    </div>
                  </div> <!-- /.row -->

                  <div class="row justify-content-center">
                    <div class="col-12 col-lg-10 col-xl-8">

                      <div class="row">
                        <div class="col"> <h5>Sl.</h5></div>
                        <div class="col"> <h5>Description Of Goods</h5></div>
                        <div class="col"> <h5>QTY/MT</h5></div>
                      </div>

                      <div class="row">
                        <div class="col"> <p><strong> 1</strong></p></div>
                        <div class="col"> <p><strong> Sulphuric Acid</strong></p></div>
                        <div class="col"> <p><strong> {{$chalan->qty}}</strong></p></div>
                      </div>
                    </div>
                      
                </div>

                  <div class="row mt-5">
                    <div class="col-2 text-center">
                      <span class="small"><strong> ---------------------</strong></span>
                      <p class="small">
                        <p><strong> Signature of the <br />Receiver</strong></p>
                    </div>
                    <div class="col-md-5">
                 
                    </div>
                    <div class="col-md-5">
                      <div class="text-center mr-2">
                        <span class="small"><strong> ---------------------</strong></span>
                        <p class="small">
                         <p><strong> Authorized<br />Signature</strong></p>
                      </div>
                    </div>
                  </div> <!-- /.row -->
                </div> <!-- /.card-body -->
              </div> <!-- /.card -->
            </div> <!-- /.col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->


      </main> <!-- main -->
    </div> <!-- .wrapper -->
  
  </body>
</html>
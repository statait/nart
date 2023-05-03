<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>A simple, clean, and responsive HTML invoice template</title>

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

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
        text-align: center;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
        text-align: center;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
    
    <div>
      <button style="margin: auto; display:grid" class="print-button" onclick="window.print()">Print</button>
    </div>

    <br>

	@php
			$sites = App\Models\Site::latest()->first();
	@endphp

		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="3">
						<table>
							<tr>
								<td class="title">
									<img src=" {{ asset($sites->logo) }}" style="max-width: 80px; height:auto" />
								</td>
              
								<td>
									<strong>Invoice #: </strong>{{$sale->invoice}}<br />
									<strong>Sale Date: </strong>{{$sale->sale_date}}<br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="3">
						<table>
							<tr>
								<td>
								<b>	{{ $sites->name }}</b><br />
									{{ $sites->address }}
								</td>

								<td>
									<strong>{{$sale->customer->customer_name}}</strong><br />
									{{$sale->customer->address}}<br />
									{{$sale->customer->phone}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
      </table>


      <table width="150px">
				<tr class="heading">
					<td>No.</td>
					<td>Product Name</td>
					<td>Quantity</td>
					<td>Price</td>
					<td>Total</td>
				</tr>

        @php
        $sl = 1;
      @endphp

        @foreach ($salesItems as $item)
				<tr class="item">
					<td>{{$sl++}}</td>   
					<td>{{$item->product->product_name}}({{$item->product->product_code}})</td>
					<td>{{$item->qty}}</td>
					<td>{{$item->rate}}</td>
					<td>{{$item->amount}}</td>
				</tr>
        @endforeach
		<tr>
			<td></td>
		</tr>
		<tr class="item">
			<td></td>   
			<td></td>
			<td></td>
			<td><strong> Grand Total</strong></td>
			<td>{{$sale->grand_total}}</td>
		</tr>
		<tr class="item">
			<td></td>   
			<td></td>
			<td></td>
			<td><strong>Paid</strong></td>
			<td>{{$sale->p_paid_amount}}</td>
		</tr>
		<tr class="item">
			<td></td>   
			<td></td>
			<td></td>
			<td><strong>Due</strong></td>
			<td>{{$sale->due_amount}}</td>
		</tr>
			</table>

<br><br>

      <div>
        <p style="float:right; font-size:small;"><strong>Powered By <span style="color: rgb(71, 207, 71)">STATA IT Limited</span></strong></p>
        <br>
      </div>
		</div>
	</body>
</html>

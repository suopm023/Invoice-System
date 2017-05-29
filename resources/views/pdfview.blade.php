<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bulma.css')}}">
	
</head>
<body>
	<div class="container">
		<div class="section">
			<div class="field is-horizontal">
		    	<b>Invoice Name :</b>
		    	{{$invoice->invoice_name}} 
			</div>
			<table class="table is-striped">
			    <thead>
			      <tr>
			        <th>Item Name</th>
			        <th>#of Items</th>
			        <th>Price</th>
			        <th>Total</th>
			      </tr>
			    </thead>
			    <tbody id="tb">
			    @foreach($invoice->items as $it)
			    	<tr class="toadd">
			    		<td>{{$it->item_name}}</td>
						<td>{{$it->no_items}}</td>
						<td>{{$it->price}}</td>
						<td>{{$it->no_items*$it->price}}</td>
						
					</tr>
				@endforeach
				</tbody>
			</table>
			<div class="field is-horizontal is-right">	
		    	<b>Sub Total :</b>
		    	{{ $invoice->subtotal() }}
			</div>
			<div class="field is-horizontal is-right">	
		    	<b>Tax :</b>
				{{$invoice->tax}}
			</div>
			<div class="field is-horizontal is-right">	
		    	<b>Total :</b>
		    	{{ $invoice->total() }}
			</div>
		</div>
	</div>	
	</form>
</body>
</html>

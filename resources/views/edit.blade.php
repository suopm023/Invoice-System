@extends('layout.master')
@section('title','Invoice')
@section('content')
	<form method="post" action="<?= URL::to('update')?>">
		{{ csrf_field()}}
		<input type="hidden" name="_method" value="PATCH">
    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="container">
		<h1><b>Edit Invoice</b></h1>
		<div class="section">
			<div class="field is-horizontal is-left">
		  		<div class="field-label is-left">
		    		<label class="label">Invoice Name</label>
		  		</div>
			  	<div class="field-body">
			    	<div class="field is-grouped">
			      		<p class="control has-icons-left">
			      			<input type="hidden" name="inv_id" value="{{$invoice->id}}">
					        <input class="input" type="text" name="invoice_name" value="{{$invoice->invoice_name}}" required>
			      		</p>
			    	</div>
			    </div>
			</div>
			<table class="table is-striped">
			    <thead>
			      <tr>
			        <th>Item Name</th>
			        <th>#of Items</th>
			        <th>Price</th>
			        <th>Total</th>
			        <th>Operation</th>
			      </tr>
			    </thead>
			    <tbody id="tb">
			    @foreach($invoice->items as $it)
			    	<tr class="toadd">
			    		<input type="hidden" name="item_id[]" value="{{$it->id}}">
			    		<td><input class="input" type="text" name="item_name[]" id="item_name" value="{{$it->item_name}}" required></td>
						<td><input class="input" type="text" name="no_items[]" id="no_items" value="{{$it->no_items}}" required></td>
						<td><input class="input" type="text" name="price[]" id="price" value="{{$it->price}}" required></td>
						<td><input class="input itotal" type="text" name="itotal" id="itotal" value="{{$it->no_items*$it->price}}"></td>
						<td><a class="button is-primary is-right" id="delete" onclick="deleteRow(this)" >Delete</a></td>
					</tr>
				@endforeach
				</tbody>
			</table>
			<div class="field">
				<a class="button is-primary is-right" id="add" > + Add Item</a>
			</div>
			<div class="field is-horizontal is-right">
		  		<div class="field-label is-rights">
		    		<label class="label">Sub Total</label>
		  		</div>
		    	<div class="field is-grouped">
		      		<p class="control has-icons-right">
				        <input class="input" type="text" name="sub_total" id="subtotal">
		      		</p>
		    	</div>
			</div>
			<div class="field is-horizontal is-right">
		  		<div class="field-label is-rights">
		    		<label class="label">Tax</label>
		  		</div>
		    	<div class="field is-grouped">
		      		<p class="control has-icons-right">
		      			<input type="hidden" value="{{$invoice->id}}">
				        <input class="input" type="text" id="tax" name="tax" value="{{$invoice->tax}}" required>
		      		</p>
		    	</div>
			</div>
			<div class="field is-horizontal is-right">
		  		<div class="field-label is-rights">
		    		<label class="label">Total</label>
		  		</div>
		    	<div class="field is-grouped">
		      		<p class="control has-icons-right">
				        <input class="input" type="text" id="total" name="total" value="" >
		      		</p>
		    	</div>
			</div>
			<div class="field">
				<button class="button is-info" type="submit">Update</button> 
			</div>
			<div class="field has-addons has-addons-right">
				<a href="<?= URL::to('/')?>">Go To List</a>
			</div>
		</div>
	</div>	
	</form>
@endsection
<script src="{{asset('js/jquery.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){	
	subtotal();
});
</script>

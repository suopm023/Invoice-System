@extends('layout.master')
@section('title','Invoice')
@section('content')
<form method="post" action="<?= URL::to('create')?>">
	{{ csrf_field()}}
	@include('layout.errors')
<div class="container">
	<h1><b>New Invoice</b></h1>
	<div class="section">
		<div class="field is-horizontal">
	  		<div class="field-label is-left">
	    		<label class="label">Invoice Name</label>
	  		</div>
		  	<div class="field-body">
		    	<div class="field is-grouped">
		      		<p class="control has-icons-left">
				        <input class="input" type="text" name="invoice_name" required>
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
		    	<tr class="toadd">
		    		<td><input class="input" type="text" name="item_name[]" id="item_name" required></td>
					<td><input class="input" type="text" name="no_items[]" id="no_items" required></td>
					<td><input class="input" type="text" name="price[]" id="price" required></td>
					<td><input class="input itotal" type="text" name="itotal" id="itotal" readonly></td>
					<td><a class="button is-primary is-right" id="delete" onclick="deleteRow(this)" >Delete</a></td>
				</tr>
			
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
			        <input class="input" type="text" name="sub_total" id="subtotal" readonly>
	      		</p>
	    	</div>
		</div>
		<div class="field is-horizontal is-right">
	  		<div class="field-label is-rights">
	    		<label class="label">Tax</label>
	  		</div>
	    	<div class="field is-grouped">
	      		<p class="control has-icons-right">
			        <input class="input" type="text" id="tax" name="tax" value="" required>
	      		</p>
	    	</div>
		</div>
		<div class="field is-horizontal is-right">
	  		<div class="field-label is-rights">
	    		<label class="label">Total</label>
	  		</div>
	    	<div class="field is-grouped">
	      		<p class="control has-icons-right">
			        <input class="input" type="text" id="total" name="total" value="" readonly="">
	      		</p>
	    	</div>
		</div>
		<div class="field">
			<button class="button is-info" type="submit">Create</button> 
		</div>
		<div class="field has-addons has-addons-right">
			<a href="<?= URL::to('/')?>">Go To List</a>
		</div>
	</div>
</div>	
</form>
@endsection
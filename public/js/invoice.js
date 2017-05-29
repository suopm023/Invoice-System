$(document).ready(function(){
	$("#add").click(function(){
		$('#tb').append('<tr><td><input class="input" type="text" name="item_name[]" required></td><td><input class="input" type="text" name="no_items[]" id="no_items" value="" required></td><td><input class="input" type="text" name="price[]" id="price" value="" required></td><td><input class="input itotal" type="text" name="itotal[]" id="itotal" value="" readonly></td><td><a class="button is-primary is-right" id="remove" onclick="deleteRow(this)">Delete</a></td></tr>');
	})
	
	$('body').delegate('#no_items,#price,#tax','keyup',function(){
		
		var tr = $(this).parent().parent();
		var item = tr.find('#no_items').val();
		var price = tr.find('#price').val();
		var	amount = item*price;
		tr.find('#itotal').val(amount);
		subtotal();      
    })
});
function subtotal(){
	var stotal = 0;
    $('.itotal').each(function(k,v){
    	var total = $(this).val()-0;
    	stotal += total;
    })
    $('#subtotal').val(stotal); 
    var tax =  $('#tax').val()-0;
    var total = ((stotal/100)*tax)+stotal;
	$('#total').val(total);

}
function deleteRow(btn) {
	var row = btn.parentNode.parentNode;
	row.parentNode.removeChild(row);
	subtotal();
}

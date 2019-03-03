<?php
	$this->layout = "fontend";
?>
		<h2 style="color: #1798A5;" class="col-lg-12">Shopping Cart</h2>
<div class="col-lg-9">
	<table class="table table-bordered">
		<tr>
			<th width="25%">Name</th>
			<th width="15%">Price</th>
			<th width="8%">Quantity</th>
			<th width="15%">Total</th>
			<th width="7%">Action</th>
		</tr>
		<!-- <?php if(isset($_COOKIE['cart'])) { ?>
		<?php foreach ($cart_data as $key => $value) : ?> -->
			<tr class="cart_product">
				<!-- <td><?= $value['name'] ?></td>
				<td><?= number_format($value['price']).'VNĐ' ?></td>
				<td><input type="number" id="quantity" name="quantity" value="<?= $value['quantity'] ?>"></td>
				<td><?= number_format($value['price']*$value['quantity']).'VNĐ' ?></td> -->
				<!-- <td class="product_name"></td>
				<td class="product_price"></td>
				<td class="product_quantity"></td>
				<td class="total_price_product"></td> -->
				<td><button type="button" class="btn btn-danger btn-remove-cart" data-id="<?= $value['id'] ?>"><i class="fas fa-trash-alt"></i></button></td>
			</tr>
		<!-- <?php endforeach; } ?> -->
	</table>
</div>
<div class="col-lg-3">
	<table class="table table-bordered">
		<tr>
			 <th>Total Product</th>
		</tr>
		<tr>
			<td id="total_product"></td>
		</tr>
		<tr>
			 <th>Total Price</th>
		</tr>
		<tr>
			<td id="total_price"></td>
		</tr>
		<tr>
			<th><button class="btn btn-primary">Payment</button></th>
		</tr>
	</table>
</div>

</div>
</div>
<script type="text/javascript">
	function addCommas(nStr)
	{
	    nStr += '';
	    x = nStr.split('.');
	    x1 = x[0];
	    x2 = x.length > 1 ? '.' + x[1] : '';
	    var rgx = /(\d+)(\d{3})/;
	    while (rgx.test(x1)) {
	        x1 = x1.replace(rgx, '$1' + ',' + '$2');
	    }
	    return x1 + x2;
	}
	$(document).ready(function() {
		var cookie_data = Cookies.get('cart');
		var data = JSON.parse(cookie_data);
		var total_product = 0;
		var total_price = 0; 
		for(key in data) {
			total_product += parseInt(data[key]['quantity']);
			total_price += parseInt(data[key]['price'] * data[key]['quantity']);
			$.each($('.cart_product'), function(item, value) {
				console.log(data[key]['name']);
			});
		}.
		$('#total_product').html(addCommas(total_product));
		$('#total_price').html(addCommas(total_price+'VNĐ'));

		$('#quantity').change(function(){
			var product_quantity = $(this).val();
		});

		$('.btn-remove-cart').click(function() {
			var product_id = $(this).attr("data-id");

			var current_cart = Cookies.get('cart');
			var cart = JSON.parse(current_cart);
			for(key in cart) {
				if(product_id === cart[key]['id']) {
					cart.splice(cart.indexOf("cart[key]['id']"), 1);
				}
			}

			Cookies.set('cart', cart);
		});
	})
</script>
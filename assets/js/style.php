<script type="text/javascript">
		$(document).ready(function cart(){

			$(".add_cart").click(function(){
				var id    = $(this).data("id");
				var name  = $(this).data("name");
				var price = $(this).data("price");
				var quantity     = $('#' + id).val();
				$.ajax({
					url : "<?= base_url(); ?>cart/add_to_cart",
					method : "POST",
					data : {id: id, name: name, price: price, quantity: quantity},
					success: function(data){
						$('#detail_cart').html(data);
					}
				});
			});
			$('#detail_cart').load("<?= base_url(); ?>cart/load_cart");
		});
	</script>
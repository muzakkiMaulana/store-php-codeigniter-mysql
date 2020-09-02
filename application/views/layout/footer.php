<nav class="navbar navbar-expand-sm fixed-bottom" id="detail_cart">

</nav>

<script src="<?=base_url()?>assets/jquery/jquery-3.5.1.slim.min.js"></script>
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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

			$(document).on("click", ".remove_cart", function(){
				var row_id = $(this).attr("id");
				$.ajax({
					url : "<?= base_url(); ?>cart/remove_cart",
					method : "POST",
					data : {row_id:row_id},
					success : function(data){
						$('#detail_cart').html(data);
					}
				});
			});
		});
	</script>

</body>
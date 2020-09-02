<div class="container mt-4">

	<div class="row"><!--row 1 start-->

		<div class="col-6 rounded px-md-1 py-md-3 bg-white text-dark">
			<!-- cart start-->
			<div class="row pt-2 pb-3">
				<div class="col d-flex justify-content-center"><h5><?= $products['name']?><h5></div>
			</div>
			<div class="row py-3">
				<div class="col-4 pl-5"><h5>Price</h5></div>
				<div class="col-4 d-flex justify-content-left">Rp. <?= number_format($products['price']); ?></div>
			</div>
			<div class="row py-3">
				<div class="col-4 pl-5"><h5>Stok</h5></div>
				<div class="col-4 d-flex justify-content-left">15</div>
			</div>
			<div class="row py-3">
				<div class="col-4 pl-5"><h5>Info Product</h5></div>
				<div class="col-4 d-flex justify-content-left">15</div>
			</div>
			<div class="row py-3">
				<div class="col-4 pl-5"><h5>Quantity</h5></div>
				<div class="col-4 d-flex justify-content-center">
				<div class="input-group input-group-sm">
					<input class="form-control" name="quantity" id="<?= $products['id']; ?>" type="number" min="1" value="1">
						<div class="input-group-append">
						<?php if(count($this->session->userdata()) > 1) {
							echo '<button href="#"class="add_cart btn btn-outline-primary" data-id="'.$products['id'].'"
							data-name="'.$products['name'].'" data-price="'.$products['price'].'" >Add To Cart</button>';
						} else {
							echo '<a href="'.base_url('home').'" class="add_cart btn btn-outline-primary"
							data-toggle="modal" data-target="#exampleModalLong">Add To Cart</a>
							
						<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
										<form class="px-4 py-3" method="POST" action="'.base_url('auth').'">
										<div class="form-group">
										<label for="exampleDropdownFormEmail1">Email address</label>
										<input type="email" name="email"class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
										</div>
										<div class="form-group">
										<label for="exampleDropdownFormPassword1">Password</label>
										<input type="password" name="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
										</div>
										<div class="form-group">
										<div class="form-check">
											<input type="checkbox" class="form-check-input" id="dropdownCheck">
											<label class="form-check-label" for="dropdownCheck">
											Remember me
											</label>
										</div>
										</div>
										<button type="submit" class="btn btn-primary">Sign in</button>
									</form>
								</div>
						</div>
						</div>
						</div>';
						} ?>
						
						</div>
				</div>
				</div>
			</div>
			<!-- cart end-->
				<div class="border-bottom"></div>
					
		</div>

		<div class="col-6 align-middle"><!-- col 2 start-->

		<!-- carousel start-->
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width:100%;">
				<ol class="carousel-indicators">
					<?php
					foreach ($images_products as $key => $value) {
						if ($value['id_products'] == $products['id']) {
						$active = ($key == 0) ? 'active' : '';
						echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $key . '" 
						class="' . $active . '"></li>';
						}
					}
					?>
				</ol>
				<div class="carousel-inner">
					<?php
						foreach ($images_products as $key => $value) {
							if ($value['id_products'] == $products['id']) {
						$active = ($key == 0) ? 'active' : '';
							echo '<div class="carousel-item ' . $active . '">
								<img class="rounded d-block w-100" src="' . base_url() . 'assets/images/'. $value['images'] . '" 
								alt="' . base_url() . 'assets/images/alt_image.png">
							</div>';
							}
						}
					?>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div><!-- carousel end-->

		</div><!-- col 2 end-->

	</div><!--row 1 end-->

	<div class="row mt-5"><!-- row2 start-->

			<div class="col-8 " data-spy="scroll" data-target="#navbar-example2" data-offset="0">
			
				<div id="fat"><p>...</p><br><br><p>...</p><br><br><p>...</p><br><br></div>
				
				<div id="mdo">@mdo</div>
				

			</div>

			<div class="col-4">
			
				<div class="card sticky-top">
					<br><br><br><br><br><br><br><br><br><br><br><br>
				</div>

			</div>
	</div><!-- row 2 end-->

</div><!-- container-->

<div class="container">

<?= $this->session->flashdata('login');?>

	<div class="row">
	<?php foreach($products as $row) : ?>

		<div class="card-deck col-sm-6 col-md-3 mt-3">
  				<a class="card btn-custom" href="<?= base_url() ?>home/detail/<?= $row['id']; ?>">
      				<img src="<?=base_url()?>assets/images/<?= $row['image']; ?>" class="card-img-top">
      					<div class="card-body">
        					<h5 class="card-title text-center"><?= $row['name']; ?></h5>
						</div>
						<div class="card-footer bg-light">
							<small>Rp. <?= number_format($row['price']); ?></small>
						</div>
				</a>
		</div>
	<?php endforeach; ?>
	</div>
	<?php var_dump($this->session->userdata());
	 ?>
</div>
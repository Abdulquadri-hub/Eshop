 <?php $this->View("includes/header",$data) ?>
 <?php $this->View("includes/nav",$data) ?>
 
	<div class="container position-relative text-center">
		<header class="position-relative text-center text-white mb-5">
			<img src="<?=get_image($image->crop("assets/images/mbanner.jpg", 1920, 1280))?>" alt="Banner" class="w-100">
			<div class="position-absolute top-50 start-50 translate-middle-x w-100 px-3">
				<h1 class="display-4">
					Spring Collection 2022
				</h1>
				<a href="<?=ROOT?>/products" class="btn btn-light">
					Explore New Arrivals
				</a>
			</div>
		</header>

		<h2 class="display-6 py-5">
			Most Popular
		</h2>

		<div class="d-flex justify-content-between align-items-center flex-column flex-lg-row my-5">
			<?php if(isset($popularproducts) && $popularproducts):?>
			<?php foreach($popularproducts as $key => $row):?>
			    <div class="card m-2">
				<a href="<?=ROOT?>/product/<?=$row->slug?>/<?=$row->product_id?>">
				    <img src="<?=get_image($row->image)?>" class="card-img-top"  alt="Product">
			    </a>
				<div class="card-body">
					<p class="card-text fw-bold">
						<?=esc($row->product)?>
					</p>
					<small class="text-secondary">
						<?=esc($row->price)?>  Naira
					</small>
				</div>
			    </div>
			<?php endforeach;?>
			<?php endif; ?>
		</div>

		<a href="<?=ROOT?>/products" class="btn btn-outline-dark my-5">
			View All Products
		</a>

		<!-- Menus -->
		<div class="d-flex justify-content-between align-items-center flex-column flex-lg-row my-5">
		    <?php if(isset($productsWithCategory) && $productsWithCategory):?>
			<?php foreach($productsWithCategory as $row):?>			 
			    <div class="position-relative m-2">
				    <img src="<?=get_image($row->image)?>" height="300" alt="">    
				    <a href="<?=ROOT?>/product-category/<?=$row->category_slug?>/<?=$row->category_id?>" class="btn btn-light position-absolute start-0 bottom-0 ms-2 mb-2 d-block">
				    	<?=esc($row->category)?>
				    </a>
			    </div>
			<?php endforeach;?>
			<?php endif; ?>
		</div>
		<!-- menu ends -->

		<div class="row text-start align-items-center gy-5 my-5">
			<div class="col-12 col-md-6">
				<img src="<?=get_image("assets/images/img11.jpg")?>" alt="" class="w-100 h-100">
			</div>
			<div class="col-12 col-md-6">
				<div>
					<h2 class="display-4">Brand</h2>
					<p>
						Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum perspiciatis et dicta ad ratione? Est pariatur perferendis ea tempore quidem, rem eos aspernatur doloremque perspiciatis deleniti, iusto error fugit expedita?
					</p>
				</div>
			</div>
		</div>

		<div class="row text-start align-items-center gy-5 my-5 bg-light">
			<div class="col-12 col-md-6">
				<div>
					<h2 class="display-4">
						Awards
					</h2>
				    <p>
						Lorem ipsum dolor sit amet,consectetur adipisicing elit.Quia iste porro officiis sintdebitis suscipit quis odio,architecto cumque cupiditateofficia adipisci delectus utcommodi tenetur maiores quodinventore. Ex.
					</p>
				</div>
			</div>
			<div class="col-12 col-md-6">
				<img src="<?=get_image("assets/images/img11.jpg")?>" alt="" class="w-100 h-100">
			</div>
		</div>

		<section class="my-5 mx-auto py-5" style="max-width: 25em;">
		    <h2>Subscribe To Our Newletter</h2>
			<form action="" class="d-flex my-4">
				<input class="form-control me-2" type="search" placeholder="Your E-mail">
				<button class="btn btn-outline-dark" type="submit">
					Subscribe
				</button>
			</form>
	    </section>

		<?php $this->view("includes/footer",$data) ?>

    </div>
</body>
</html>

<script src="<?=ROOT?>/assets/js/bootstrap.bundle.js"></script>

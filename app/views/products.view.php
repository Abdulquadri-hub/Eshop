<?php $this->View("includes/header",$data) ?>
 <?php $this->View("includes/nav",$data) ?>
 
	<div class="container position-relative text-center">
		<header class="position-relative text -center text-white mb-5">
			<img src="<?=get_image($image->crop("assets/images/mbanner.jpg", 1920, 1280))?>" alt="Banner" class="w-100">
			<div class="position-absolute top-50 start-50 translate-middle-x w-100 px-3">
				<h1 class="display-4">
					New Arrivals
				</h1>
			</div>
		</header>

        <div class="row">
            <div class="col col-lg-4 text-start">
                <h3>Category</h3>
                <ul class="nav flex-column">
                <?php if(isset($categorys) && $categorys):?>
                <?php foreach($categorys as $row):?>
                    <li class="nav-item">
                        <a href="<?=ROOT?>/product-category/<?=$row->category_slug?>/<?=$row->category_id?>" class="nav-link text-muted">
                            <?=esc($row->category)?>
                        </a>
                    </li>
                <?php endforeach; ?>
                <?php endif; ?>
                </ul>
                <h3>Brand</h3>
                <ul class="nav flex-column">
                <?php if(isset($brands) && $brands):?>
                <?php foreach($brands as $row):?>
                    <li class="nav-item">
                        <a href="<?=ROOT?>/product-brand/<?=$row->brand_slug?>/<?=$row->category_id?>" class="nav-link text-muted">
                            <?=esc($row->brand)?>
                        </a>
                    </li>
                <?php endforeach; ?>
                <?php endif; ?>
                </ul>
            </div>

            <div class="col col-lg-8 d-flex justify-content-between align-items-center flex-column flex-lg-row">
                <?php if(isset($products) && $products):?>
			    <?php foreach($products as $key => $row):?>
                    <div class="card m-2">
                    <a href="<?=ROOT?>/product/<?=$row->slug?>/<?=$row->product_id?>">
                       <img src="<?=get_image($row->image)?>" class="card-img-top" alt="">
                    </a>
                    <div class="card-body">
                        <p class="card-text fw-bold">
                            <?=esc($row->product)?>
                        </p>
                        <small class="text-secondary">
                            <?=esc($row->price)?> Naira 
                        </small>
                    </div>
                    </div>
                <?php endforeach;?>
			    <?php endif; ?>
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

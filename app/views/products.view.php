<?php $this->View("includes/header",$data) ?>
 <?php $this->View("includes/nav",$data) ?>

 <style>

    .eshop-section-title {
        padding: 5px 10px;
        background-color: #fff;
        margin: auto;
        width: 200px;
        opacity: 0.8;
        margin-top: 35px;
    }

    .eshop-section-title h1{
        font-size: 28px;
        font-weight: 700;
        color: #201f1fd9;
    }

    
    .eshop-category-title {
        color: #201f1fd9;
        font-family: sans-serif;
        font-weight: 500;
        font-size: 24px;
    }
    .eshop-category-list,
    .eshop-brand-list {
        width: 200px;
    }

    .eshop-category-list,
    .eshop-brand-list, .nav-item {
        font-family: sans-serif;
        font-size: 18px;
        color: #201f1fd9;
        font-weight: 10;
    }

    .card {
        vertical-align: top;
    }


 </style>
 
	<div class="container position-relative text-center">
		<header class="position-relative text-center text-white mb-5">
			<div class="eshop-section-title d-flex align-items-center justify-content-center">
				<h1>
					New Arrivals
				</h1>
			</div>
		</header>

        <div class="row">
            <div class="col-lg-2 text-start">
                <h3 class="eshop-category-title">Category</h3>
                <ul class="nav flex-column eshop-category-list">

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
                <ul class="nav flex-column eshop-brand-list">
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

            <div class="col-md-10 col-lg-10 d-flex align-items-center flex-column flex-lg-row">
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

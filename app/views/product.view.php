<?php $this->View("includes/header",$data) ?>
 <?php $this->View("includes/nav",$data) ?>
 
<?php if(isset($row) && $row): ?>
	<div class="container position-relative text-center">

        <div class="row py-5 g-5">
            <div class="col-12 col-lg-6">
                <img src="<?=get_image($row->image)?>" alt="" class="m-1 w-100 sliderMainImage" data-bs-toggle="modal" data-bs-target="#imageModal">

                <div>
                    <img src="<?=get_image($row->image)?>" width="60" alt="" class="m-1 sliderThumb">
    
                    <img src="<?=get_image($row->image)?>" width="60" alt="" class="m-1 sliderThumb">
                </div>
            </div>

            <div class="col-12 col-lg-6">

                <h2 id="productName">
                   <?=esc($row->product)?>
                </h2>
    
                <small class="text-muted">
                Barcode: <?=esc($row->barcode)?>
                </small>
    
                <h4 class="my-4">
                Naira
                <span id="price"><?=esc($row->price)?></span>
                </h4>
    
                <form action="" method="post">
                    <label for="selectSize" class="text-muted">
                        Size:
                    </label>   
        
                    <select name="selectSize" id="size" class="form-select">
                        <option selected value="">S</option>
                        <option selected value="1">M</option>
                        <option selected value="2">L</option>
                        <option selected value="3">XL</option>
                    </select>
        
                    <div class="d-grid my-4">
                        <button class="btn btn-lg btn-dark"  id="bagBtn" type="submit">
                            Add to Bag
                        </button>
                    </div>
                </form>

                <div class="accordion">

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button"  data-bs-toggle = "collapse" 
                            data-bs-target="#collapseOne"
                            arial-expanded="true" aria-controls="collapse">
                               <strong>Description</strong>
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse show" id="collapseOne" aria-labelledby="headingOne">
                            <div class="accordion-body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque molestiae quis odio perspiciatis voluptatem, et porro vero quae fuga officia.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button"  data-bs-toggle = "collapse" 
                            data-bs-target="#collapseTwo"
                            arial-expanded="true" aria-controls="collapse">
                               <strong>Availabilty In Store</strong>
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse" id="collapseTwo" aria-labelledby="headingOne">
                            <div class="accordion-body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque molestiae quis odio perspiciatis voluptatem, et porro vero quae fuga officia.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button"  data-bs-toggle = "collapse" 
                            data-bs-target="#collapseThree"
                            arial-expanded="true" aria-controls="collapse">
                               <strong>Delivery And Return</strong>
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse" id="collapseThree" aria-labelledby="headingOne">
                            <div class="accordion-body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque molestiae quis odio perspiciatis voluptatem, et porro vero quae fuga officia.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button"  data-bs-toggle = "collapse" 
                            data-bs-target="#collapseFour"
                            arial-expanded="true" aria-controls="collapse">
                               <strong>Reviews</strong>
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse" id="collapseFour" aria-labelledby="headingOne">
                            <div class="accordion-body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque molestiae quis odio perspiciatis voluptatem, et porro vero quae fuga officia.
                            </div>
                        </div>
                    </div>           
                   
                </div>
            </div>
        </div>

        <h2 class="display-6 py-5 text-center">
            You May Also Like
        </h2>

        <div class="d-flex justify-content-between align-items-center flex-column flex-lg-row">
            <div class="card m-2">
                <a href="<?=ROOT?>/product">
                   <img src="<?=get_image()?>" class="card-img-top" height="300" alt="">
                </a>
                <div class="card-body">
                        <p class="card-text fw-bold">
                            Tara Dress
                        </p>
                        <small class="text-secondary">
                            USD 334$
                        </small>
                </div>
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
<?php else: ?>
<?php endif;?>
</body>
</html>

<script src="<?=ROOT?>/assets/js/bootstrap.bundle.js"></script>

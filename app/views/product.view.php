<?php $this->View("includes/header",$data) ?>
 <?php $this->View("includes/nav",$data) ?>

 <style>

 </style>
 
	<div class="container position-relative text-center">

        <div class="row py-5 g-5 js-product">
            <!-- product -->
            
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
    </div>
</body>
</html>

<script>

    fetch({
        'data_type': "read",
        'text': ""
    });

    var PRODUCT = [];

    function fetch(data)
    {
        
        var currentUrl = window.location.href;
        var url = new URL(currentUrl);

        var params = url.searchParams;

        var pathSegments = url.pathname.split("/");

        pathSegments = pathSegments.filter(function(segment) {
            return segment !== "";
        });

        if(typeof pathSegments == "undefined")
        {
            console.log(pathSegments[2]);
        }

        data.urlparams = pathSegments;
        

        var ajax = new XMLHttpRequest();
        ajax.addEventListener("readystatechange", function (e){
            if(ajax.readyState == 4)
            {
                if(ajax.status == 200)
                {
                    handle_result(ajax.responseText);
                }
            }
        });

        ajax.open("POST", "<?=ROOT?>/product/single", true);
        ajax.send(JSON.stringify(data));
    }

    function handle_result(result)
    {
        //console.log(result);
        var obj = JSON.parse(result);

        if(typeof obj != "undefined")
        {
            if(obj.data_type == "read")
            {
                
                refresh_product(obj);
            }else
            if(obj.data_type == "add_to_cart")
            {
                var item_count = document.querySelector(".js-bag-count");
                item_count.innerHTML = obj.item_count;
                alert(obj.status);
            }
        }
    }

    function refresh_product(obj){

        var product_div = document.querySelector(".js-product");
        product_div.innerHTML = ""; 
        SINGLE_PRODUCT = [];
        if(typeof obj.data == "object")
        { 
            SINGLE_PRODUCT.push(obj.data);
            PRODUCT = SINGLE_PRODUCT;
            for(var i = 0; i <  PRODUCT.length; i++)
            {  
                product_div.innerHTML += product_html(obj.data, i);  
            }
        }
    }

    function add_item(e){
        if(e.target.tagName == "BUTTON")
        {
            var item_count = document.querySelector(".js-bag-count");
            // item_count.innerHTML = PRODUCT.length;

            PRODUCT.quantity = 1;
            var obj = {
                'data_type': "add_to_cart",
                'text': PRODUCT
            }
            fetch(obj);
            
        }
    }

    function product_html(row, index)
    {
        
        return `
            <div class="col-md-12 col-lg-6">
                <img src="<?php echo ROOT?>/${row.image}" alt="" class="m-1 w-100 sliderMainImage shadow" data-bs-toggle="modal" data-bs-target="#imageModal">

                <div>
                    <img src="<?php echo ROOT?>/${row.image}" width="60" alt="" class="m-1 sliderThumb">
    
                    <img src="<?php echo ROOT?>/${row.image}" width="60" alt="" class="m-1 sliderThumb">
                </div>
            </div>

            <div class="col-12 col-lg-6">

                <h2 id="productName">
                ${row.product}
                </h2>
    
                <small class="text-muted">
                Barcode: ${row.barcode}
                </small>
    
                <h4 class="my-4">
                Naira
                <span id="price">${row.price}</span>
                </h4>
    
                <form>
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
                        <button index = ${index} onclick="add_item(event)" class="btn btn-lg btn-dark .js-bagbtn"  id="bagBtn" type="button">
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
                            ${row.description}
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
        `;
    }

</script>

<script src="<?=ROOT?>/assets/js/bootstrap.bundle.js"></script>


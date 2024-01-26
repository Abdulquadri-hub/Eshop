<div class="row w-100 h-100">

    <div class="col-12 col-md-6">
        <div class="card-body">
        <h5 class="dislplay-6 card-title">Order Summary</h5>
            <?php if(isset($carts) && $carts): ?>
            <?php foreach($carts as $cart): ?>
            <div class="d-flex m-3 bg-white">
                <img src="<?=get_image($cart->image)?>" width="70" class="img-thumbnail"  alt="">
                
                <div class="row m-2">
                    <h6 class="text-muted"><?=esc($cart->product)?></h6>
                    <h6 class="text-muted"><?=esc($cart->price)?> Naira</h6>
                    <div class="col-sm-10">
                        <form action="" method="post">
                            <div class="input-group mb-3" style="width: 200px;">
                              <input type="text"   name="cart_id" hidden value="<?=$cart->cart_id?>"  class="form-control">
                              <input type="text" name="quantity" class="form-control" value="" placeholder="Quantity">
                              <button class="input-group-text btn btn-outline-dark" name="update" type="submit">
                                <i class="fa fa-pencil"></i>
                              </button>
                            </div>
                        </form>
                    </div>
                </div> 
                <form action="" method="post">
                <div class="col-sm-2 mt-3 me-5">
                    <input type="text" name="cart_id" hidden value="<?=$cart->cart_id?>"  class="form-control">
                    <button class="btn btn-outline-danger" name="delete" type="submit"><i class="fa fa-trash"></i></button>
                </div>
                </form>

            </div>
            <?php endforeach; ?>
            <?php else: ?>
                <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <span class="text-muted  pt-2 ps-1">You Have <span class="text-danger">No</span> Item In Your Cart <span></span>
                    </div>
                  </div>
            <?php endif; ?>
        </div>

        <div class="row my-3">
            <div class="col-4">
                <h6 class="text-muted"><strong class="card-title">SubTotal Price: <?= $subtotalprice ?? $totalprice ?>N</strong></h6>
            </div>
            <div class="col-4">
                <h6 class="text-muted"><strong class="card-title">Cart Items (<?=(new \Model\Cart)->showCartItemsInBag();?>)</strong> </h6>
            </div>
            <div class="col-4">
            <span><a href="<?=ROOT?>/products">Continue Shopping</a></span>    
            </div>

            <div class="col-6 text-center mt-2">
              <p class="text-dark">Please,before placing order finalize your orders, Thank You.</a>   
            </div>

            <div class="col-6 text-center mt-3">
              <a href="<?=ROOT?>/carts/place-order">
                <button class="btn btn-sm btn-outline-dark">
                  Place Order
                </button>    
              </a>
            </div>
        </div>
        
    </div>

    <?php  if($mode == "place-order"):?>
    <div class="col-12 col-md-6 border-e">
        <div class="">
            <div class="card-body">
              <h5 class="card-title">Make Your Payment</h5>

              <!-- Floating Labels Form -->
              <form method="POST" class="row g-3" action="" id="paymentForm">

                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" name="fullname" class="form-control" id="full-name" value="<?=ucfirst($ses->user('name'))?>" placeholder="Your Full Name">
                    <label for="floatingName">Your Full-Name</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="email" id="email-address" name="email" value="<?=ucfirst($ses->user('email'))?>" class="form-control"  placeholder="Your Email">
                    <label for="floatingEmail">Your Email</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="tel" id="amount"class="form-control" name="amount" readonly value="<?= $subtotalprice ?? $totalprice?>" placeholder="Amount">
                    <label for="floatingPassword">Amount</label>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" onclick="payWithPaystack()" name="createorder" class="btn  btn-outline-dark">
                    Pay
                  </button>
                </div>

              </form><!-- End floating Labels Form -->
              <script src="https://js.paystack.co/v1/inline.js"></script>
            </div>
        </div>
    </div>
    <?php endif; ?>

</div>

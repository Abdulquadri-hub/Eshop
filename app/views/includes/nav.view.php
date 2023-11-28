<nav class="navbar navbar-expand-lg navbar-light bg-white position-fixed top-0 start-0 w-100" style="z-index: 997;">
		<div class="container">
			<a href="<?=ROOT?>" class="navbar-brand d-lg-none">ESHOP</a>
			<button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarcontent">
				<span class="navbar-toggler-icon"></span>
			</button>
            <div class="collapse navbar-collapse p-2 flex-column" id="navbarcontent">
                <div class="d-flex justify-content-center justify-content-lg-between flex-column flex-lg-row w-100">
                    <form action="" class="d-flex">
                        <input type="text" class="form-control me-2" type
                    ="search" placeholder="Search">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                    </form>
                    <a href="<?=ROOT?>" class="navbar-brand d-none d-lg-block">
                        ESHOP
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item d-flex align-items-center">
                            <a href="<?=ROOT?>/customer/account/<?=$ses->user('user_id')?>" class="nav-link mx-2">
                                <i class="fas fa-user"></i>
                                My Account  
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a href="<?=ROOT?>/carts" class="nav-link mx-2">
                                <i class="fas fa-shopping-bag"></i>
                                Bag 
                            </a>
							<span class="badge rounded-pill bg-secondary">
								<?php  
								    $cart = new \Model\Cart;
									echo $cart->showCartItemsInBag();
								?>
							</span>
                        </li>
                    </ul> 
                </div>
				<div class="d-block w-100">
					<ul class="navbar-nav d-flex justify-content-center align-items-center pt-3">
					<?php if(isset($categorys) && $categorys):?>
                    <?php foreach($categorys as $row):?>
						<li class="nav-item mx-2">
							<a href="<?=ROOT?>/product-category/<?=$row->category_slug?>/<?=$row->category_id?>" class="nav-link">
								<?=esc($row->category)?>
							</a>
						</li>
					<?php endforeach; ?>
                    <?php endif; ?>

						<li class="nav-item mx-2">
							<a href="<?=ROOT?>/about" class="nav-link">
								About
							</a>
						</li>
						<li class="nav-item mx-2">
							<a href="<?=ROOT?>/Blog" class="nav-link">
								Blog
							</a>
						</li>
						<li class="nav-item mx-2">
							<a href="<?=ROOT?>/contact" class="nav-link">
								Contact
							</a>
						</li>
					</ul>
				</div>	
            </div>
		</div>
	</nav>

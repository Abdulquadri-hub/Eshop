<?php $this->view("includes/a-header",$data) ?>
<?php $this->view("includes/a-body-header",$data) ?>
<?php $this->view("includes/a-sidebar",$data) ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1><?=$title?></h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=ROOT?>/admin">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active"><?=$title?></li>
          </ol>
        </nav>
    </div>
    
    <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">

                <form action="" class="d-flex my-4">
                    <input type="text" class="form-control me-2" style="width: 400px;" type="search" placeholder="Search">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                <h5 class="card-title">All <?=$title?>
                    <!-- <a href="<?=ROOT?>/admin/products/add">
                        <button class="btn btn-sm btn-primary float-end"><i class="bi bi-plus"></i>Add New Product</button>
                    </a> -->
                </h5>

              <!-- message -->
              <?php if(!empty(message())): ?>
                    <div class="d-flex justify-content-center align=items-center alert alert-success">
                      <?=message('', true)?>
                    </div>
                <?php endif; ?>

                <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Order By</td>
                                <td>SubTotal Price</td>
                                <td>SubTotal Quantity</td>
                                <td>Status</td>
                                <td>Date</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($completedOrders) && $completedOrders):?>
                            <?php foreach($completedOrders as $key => $row):?>
                                <tr>
                                    <td><?=$key + 1?></td>
                                    <td><?=esc($row->name)?></td>
                                    <td><?=esc($row->subtotalprice)?></td>
                                    <td><?=esc($row->totalquantity)?></td>
                                    <td><?=esc($row->status)?></td>
                                    <td><?=get_date($row->date_created)?></td>
                                    <td class="d-flex">
                                        <a href="<?=ROOT?>/admin/products/edit/<?=$row->order_id?>">
                                            <button class="btn btn-sm btn-info me-2"><i class="bi bi-pencil"></i></button>
                                        </a>
                                        <a href="<?=ROOT?>/admin/products/delete/<?=$row->order_id?>">
                                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            <?php else:?>
                                <p class="d-flex justify-content-center align items-center alert alert-light">No products Found! Kindly Add a New Product</p>
                            <?php endif;?>
                        </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>

</main>


<?php $this->view("includes/a-footer",$data) ?>
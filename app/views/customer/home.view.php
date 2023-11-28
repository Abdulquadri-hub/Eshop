<?php $this->View("includes/header",$data) ?>
<?php $this->View("includes/nav",$data) ?>
<?php $this->View("includes/c-sidebar",$data) ?>

<main id="main" class="main" style="margin-top: 0;">

    <div class="pagetitle">
        <h1><?=$title?></h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=ROOT?>/customer">Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active"><?=$title?></li>
          </ol>
        </nav>
    </div>
    
    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Hi, <?=ucfirst($ses->user('name'))?> <span>| Welcome To Your Dashboard</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <span class="text-muted  pt-2 ps-1">You Have <span class="text-danger">20</span> Pending Orders <span><a href="">Check It Out</a></span></span>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->


          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">
            <!--  -->
        </div><!-- End Right side columns -->

      </div>
    </section>

</main>



<?php $this->view("includes/a-footer",$data) ?>
 
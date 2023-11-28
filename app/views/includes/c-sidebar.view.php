
<style>
    .toggle-sidebar-btn{
        font-size: 32px;
        cursor: pointer;
        color: #012970;
    }
</style>

 <div class="d-flex align-items-center justify-content-between " style="margin-left:300px">
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div>

<aside id="sidebar" class="sidebar" style="margin-top: 68px;">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
          <a class="nav-link " href="<?=ROOT?>/customer">
            <i class="bi bi-grid"></i>
            <span><?=APP_NAME?> CUSTOMER DASHBARD</span>
          </a>
        </li>
    
        <li class="nav-heading">Pages</li>
    
        <li class="nav-item">
          <a class="nav-link collapsed" href="<?=ROOT?>/customer/account">
            <i class="bi bi-person"></i>
            <span>Account</span>
          </a>
        </li>
    
        <li class="nav-item">
          <a class="nav-link collapsed" href="<?=ROOT?>/customer/wishlists">
            <i class="bi bi-person"></i>
            <span>Wishlists</span>
          </a>
        </li>
    

    <?php if($ses->is_logged_in()): ?>

        <li class="nav-item">
          <a class="nav-link collapsed" href="<?=ROOT?>/logout">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>       
    <?php else: ?>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?=ROOT?>/register">
              <i class="bi bi-card-list"></i>
              <span>Register</span>
            </a>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="<?=ROOT?>/login">
            <i class="bi bi-box-arrow-in-right"></i>
            <span>Login</span>
          </a>
        </li>
    <?php endif; ?>

        <!-- orders -->
        <li class="nav-heading">Orders</li>

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#payment-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Orders</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="payment-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="<?=ROOT?>/customer/myorders">
                <i class="bi bi-circle"></i><span>My Orders</span>
              </a>
            </li>
            <li>
              <a href="<?=ROOT?>/customer/pendingorders">
                <i class="bi bi-circle"></i><span>Pending Orders</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- payments -->
        <li class="nav-heading">Payments</li>

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#payment-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Payments</span><i class="bi bi-chevron-down     ms-auto"></i>
          </a>
          <ul id="payment-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="<?=ROOT?>/customer/payments/completed">
                <i class="bi bi-circle"></i><span>Completed</span>
              </a>
            </li>
            <li>
              <a href="<?=ROOT?>/customer/payments/pending">
                <i class="bi bi-circle"></i><span>Pending</span>
              </a>
            </li>
          </ul>
        </li>

    </ul>

</aside>
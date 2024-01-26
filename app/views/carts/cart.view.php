<?php $this->View("includes/header",$data) ?>
<?php $this->View("includes/nav",$data) ?>

<style>
  .title{
    margin-bottom: 5vh;
  }
  .card{
    margin: auto;
    max-width: 950px;
    width: 90%;
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-radius: 1rem;
    border: transparent;
    margin-top: 10px;
  }
  @media(max-width:767px){
    .card{
        margin: 3vh auto;
    }
  }
  .cart{
    background-color: #fff;
    padding: 4vh 5vh;
    border-bottom-left-radius: 1rem;
    border-top-left-radius: 1rem;
  }
  @media(max-width:767px){
    .cart{
        padding: 4vh;
        border-bottom-left-radius: unset;
        border-top-right-radius: 1rem;
    }
  }
  .summary{
    background-color: #ddd;
    border-top-right-radius: 1rem;
    border-bottom-right-radius: 1rem;
    padding: 4vh;
    color: rgb(65, 65, 65);
  }
  @media(max-width:767px){
    .summary{
    border-top-right-radius: unset;
    border-bottom-left-radius: 1rem;
    }
  }
  .summary .col-2{
    padding: 0;
  }
  .summary .col-10
  {
    padding: 0;
  }.row{
      margin: 0;
  }
  .title b{
      font-size: 1.5rem;
  }
  .main{
      margin: 0;
      padding: 2vh 0;
      width: 100%;
  }
  .col-2, .col{
      padding: 0 1vh;
  }
  .href{
      padding: 0 1vh;
  }
  .close{
      margin-left: auto;
      font-size: 0.7rem;
  }
  img{
      width: 3.5rem;
  }
  .back-to-shop{
      margin-top: 4.5rem;
  }
  h5{
      margin-top: 4vh;
  }
  hr{
      margin-top: 1.25rem;
  }
  .form{
      padding: 2vh 0;
  }
  .select{
      border: 1px solid rgba(0, 0, 0, 0.137);
      padding: 1.5vh 1vh;
      margin-bottom: 4vh;
      outline: none;
      width: 100%;
      background-color: rgb(247, 247, 247);
  }
  .code-input{
      border: 1px solid rgba(0, 0, 0, 0.137);
      padding: 1vh;
      margin-bottom: 4vh;
      outline: none;
      width: 100%;
      background-color: rgb(247, 247, 247);
  }
  .code-input:focus::-webkit-input-placeholder
  {
        color:transparent;
  }
  .checkout-btn{
      background-color: #000;
      border-color: #000;
      color: white;
      width: 100%;
      font-size: 0.7rem;
      margin-top: 4vh;
      padding: 1vh;
      border-radius: 0;
  }
  .checkout-btn:focus{
      box-shadow: none;
      outline: none;
      box-shadow: none;
      color: white;
      -webkit-box-shadow: none;
      /* -webkit-user-select: none; */
      transition: none; 
  }
  .checkout-btn:hover{
      color: white;
  }
  .href{
      color: black; 
  }
  .href:hover{
      color: black;
      text-decoration: none;
  }
   #code{
      background-image: linear-gradient(to left, rgba(255, 255,   255, 0.253) , rgba(255, 255, 255, 0.185)), url("https://  img.icons8.com/small/16/000000/long-arrow-right.png");
      background-repeat: no-repeat;
      background-position-x: 95%;
      background-position-y: center;
  }
</style>

<div class="card">
    <div class="row">
      <div class="col-md-8 cart">
      <div class="title">
          <div class="row">
                <div class="col"><h4><b>Shopping Cart</b></h4></div>
                <div class="col align-self-center text-right text-muted js-item-count">items</div>
              </div>
           </div>
        <!-- cart items -->
        <div class="js-cartitems">

        </div>
        <!-- items ends -->

           <div class="back-to-shop"><a class="href" href="#">&leftarrow;</a><span class="text-muted">Back to shop</span>
          </div>
      </div>

      <div class="col-md-4 summary js-item-summary">
        <!-- items summary -->
      </div>
    </div>         
</div>


<script>
fetch_data({
  'data_type': "read",
  'text': ""
}); 

var PRODUCTS = [];
var ITEMS = [];

function fetch_data(data) 
{
  var ajax = new XMLHttpRequest();

  ajax.addEventListener('readystatechange', function(e) {

    if(ajax.readyState == 4) 
    {
      if(ajax.status == 200)
      {

        handle_result(ajax.responseText);

      } else {

        console.log("An Error Occured. " + ajax.status + " Error Message: "+ ajax.statusText);
      }
    }
  })
  ajax.open("POST", "<?=ROOT?>/carts/carts_ajax", true);
  ajax.send(JSON.stringify(data));
}

function handle_result(result) 
{
  console.log(result);
  var obj = JSON.parse(result);

  if(typeof obj != "undefined") 
  {
    if(obj.data_type == "read")
    {
      referesh_cart_items(obj);
    }
  }
}


function referesh_cart_items(obj)
{
  var item_count = document.querySelector(".js-item-count");
  var item_summary_count = document.querySelector(".js-summary-count");

  var cartDiv = document.querySelector(".js-cartitems");
  cartDiv.innerHTML = "";

  var item_summary = document.querySelector(".js-item-summary");
  item_summary.innerHTML = "";

  ITEMS = [];

  if(typeof obj.data == "object")
  {
    
    ITEMS = obj.data;
    item_count.innerHTML = ITEMS.length + " items";
    // item_summary_count.innerHTML = 'ITEMS ' + ITEMS.length;

    for (var i = obj.data.length - 1; i >= 0; i--)
    {
      cartDiv.innerHTML += item_html(obj.data[i],i);
      item_summary.innerHTML += item_summary_html(obj.data[i],i);
    } 
  }
}

function change_qty(direction,e)
{
  var index = e.currentTarget.getAttribute("index");
  var item_qty = document.querySelector("#js-quantity");

  if(direction == "up")
  {
    
    ITEMS[index].quantity += 1;
    item_qty.innerHTML = ITEMS[index].quantity;

  }else
  if(direction == "down")
  {
    ITEMS[index].quantity -= 1
    item_qty.innerHTML = ITEMS[index].quantity;

  }

  if(ITEMS[index].quantity < 1)
  {
    ITEMS[index].quantity = 1;
  }

  if(item_qty.innerHTML == 0)
  {
    item_qty.innerHTML = 1;
  }

  // var item_summary
  // var grand = dou
}




function item_html(row,index) 
{
  return `   

           <div class="row">
              <div class="row main align-items-center">
                  <div class="col-2"><img class="img-fluid" src="${row.image}"></div>

                  <div class="col">
                    <div class="row text-muted">
                      ${row.product}
                    </div>
                      
                  </div>

                  <div class="col">
                    <span index=${index} onclick="change_qty('down',event)" class="href btn btn-sm btn-dark text-white fw-5">-</span>

                      <span class="href btn btn-sm btn-white text-dark fw-5" id="js-quantity">
                        ${row.quantity} 
                      </span>

                    <span index=${index} onclick="change_qty('up',event)" class="href btn btn-sm btn-dark text-white fw-5">+</span>
                  </div>

                  <div class="col">NG ${row.price}<span class="close btn btn-sm btn-danger js-cancel-item">&#10005;</span></div>
              </div>
           </div>
  `;
}

function item_summary_html(row,index) 
{
  return `   
  <div>
    <h5><b>Summary</b></h5>
  </div>
   <hr>
  <div class="row">
      <div class="col js-summary-count" style="padding-left:0;"></div>
      <div class="col text-right">NG ${row.price}</div>
  </div>

  <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
    <div class="col">TOTAL PRICE</div>
    <div class="col text-right">&euro; 137.00</div>
  </div>
  <button class="btn checkout-btn">CHECKOUT</button>
  `;
}
  
</script>

<!-- <script>
  const paymentForm = document.getElementById('paymentForm');
  paymentForm.addEventListener("submit", payWithPaystack, false);

  function payWithPaystack(e) {
  e.preventDefault();

  let handler = PaystackPop.setup({
    key: 'pk_test_af2a316d1768e7b776a1dec5cfa7f89e9e541cf1', // Replace with your public key
    // email: document.getElementById("first-name").value,
    // email: document.getElementById("last-name").value,
    email: document.getElementById("email-address").value,
    amount: document.getElementById("amount").value * 100,
    ref: 'ESHOP'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
      window.location = "http://localhost/E-shop/carts?transaction=cancelled";
      alert('Transaction was not completed! Window Close.');
    },
    callback: function(response){
      let message = 'Payment complete! Reference: ' + response.reference;
      alert(message);
      window.location = "http://localhost/E-shop/transaction/verify/"+ response.reference
    }
  });

  handler.openIframe();
  }
</script> -->


<?php 
session_start();
include 'connection.php';
if (isset($_POST['orderid'])) {
    $orderid = $_POST['orderid'];
    $_SESSION['order_id'] = $orderid;    
}
  
$sql="SELECT date_format(o.order_date,'%d %b %Y') as tanggal , o.order_id , p.product_name, if(substr(po.product_id, 5, 1) = '0' , 'All Size',substr(po.product_id, 5, 1)) as size, pa.payment_method, format(o.grand_total,0) as grand_total, ca.category_name,format(o.total_potongan,0) as total_potongan ,format(convert((5/100)*o.GRAND_TOTAL,int),0) as pajak, format(p.product_price,0) as product_price, po.qty ,d.delivery_name, format(d.delivery_cost,0) as delivery_cost, a.address ,format((o.grand_total - o.total_potongan + convert((5/100)*o.GRAND_TOTAL,int) +d.delivery_cost),0) as total, p.product_url from `order` o, product_order po , product p , delivery d, address a, category ca, payment pa where o.order_id = po.order_id and po.product_id = p.product_id and d.delivery_id = o.delivery_id and a.CUSTOMER_ID = o.CUSTOMER_ID and ca.CATEGORY_ID = p.CATEGORY_ID and pa.payment_id = o.payment_id and po.order_id  = '" . $_SESSION['order_id'] . "' order by o.order_date desc";



$result=$conn->query($sql);

if($result->num_rows > 0){
$response=array();
while ($row=$result->fetch_assoc()){
    $dt['tanggal']= $row["tanggal"];
    $dt['order_id']= $row["order_id"];
    $dt['product_name']= $row["product_name"];
    $dt['size']= $row["size"];
    $dt['grand_total']= $row["grand_total"];
    $dt['payment_method']= $row["payment_method"];
    $dt['category_name']= $row["category_name"];
    $dt['total_potongan']= $row["total_potongan"];
    $dt['pajak']= $row["pajak"];
    $dt['product_price']= $row["product_price"];
    $dt['qty']= $row["qty"];
    $dt['delivery_name']= $row["delivery_name"];
    $dt['delivery_cost']= $row["delivery_cost"];
    $dt['address']= $row["address"];
    $dt['total']= $row["total"];
    $dt['product_url']= $row["product_url"];
    array_push($response,$dt);
}

$hasil_json=json_encode($response);
$data = json_decode($hasil_json,true);

?>
<!-- popup -->

    <div class="popup-inner">
    <a href="#" class="box-close"><button onclick="document.querySelector('.popup').style.display = 'none'" style="border:none;color: #EEA2A2;background-color: #fff; cursor: pointer;">×</button>
    </a>
    <h2 class="pl-20 pt-20 pr-20 pb-20">Order Detail</h2>

    <section class="vh-100">
        <div class="container py-5 h-100 pl-20 pt-20 pr-20 pb-20">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
            <div class="card card-stepper text-black" style="border-radius: 16px;">

                <div class="card-body p-5">

                <div class="d-flex justify-content-between align-items-center mb-5" style="justify-content: space-between;">
                    <div>
                    <h5 class="mb-0">INVOICE <span class="font-weight-bold;" style="color:#EEA2A2;">INV/<?php echo $_SESSION['order_id'] ?></span></h5>
                    </div>
                    <div class="text-end">
                    <p class="mb-0">Expected Arrival <span>09 Apr 2023</span></p>
                    </div>
                </div>

                <ul id="progressbar-2" class="d-flex justify-content-between mx-0 mt-0 mb-5 px-0 pt-0 pb-2">
                    <li class="step0 active text-center" id="step1"></li>
                    <li class="step0 active text-center" id="step2"></li>
                    <li class="step0 active text-center" id="step3"></li>
                    <li class="step0 text-muted text-end" id="step4"></li>
                </ul>

                <div class="d-flex justify-content-between" style="justify-content: space-between;align-items: flex-end;">
                    <div class="d-lg-flex align-items-center">
                    <svg class="fa-3x me-lg-4 mb-3 mb-lg-0" xmlns="http://www.w3.org/2000/svg" width="50px" style="padding:10px;" viewBox="0 0 384 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) -->
                        <path d="M336 64h-80c0-35.3-28.7-64-64-64s-64 28.7-64 64H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM96 424c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm96-192c13.3 0 24 10.7 24 24s-10.7 24-24 24-24-10.7-24-24 10.7-24 24-24zm128 368c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16z" />
                    </svg>
                    <div>
                        <p class="fw-bold mb-1">Order</p>
                        <p class="fw-bold mb-0">Processed</p>
                    </div>
                    </div>
                    <div class="d-lg-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="65px" style="padding:10px;" viewBox="0 0 640 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) -->
                        <path d="M425.7 256c-16.9 0-32.8-9-41.4-23.4L320 126l-64.2 106.6c-8.7 14.5-24.6 23.5-41.5 23.5-4.5 0-9-.6-13.3-1.9L64 215v178c0 14.7 10 27.5 24.2 31l216.2 54.1c10.2 2.5 20.9 2.5 31 0L551.8 424c14.2-3.6 24.2-16.4 24.2-31V215l-137 39.1c-4.3 1.3-8.8 1.9-13.3 1.9zm212.6-112.2L586.8 41c-3.1-6.2-9.8-9.8-16.7-8.9L320 64l91.7 152.1c3.8 6.3 11.4 9.3 18.5 7.3l197.9-56.5c9.9-2.9 14.7-13.9 10.2-23.1zM53.2 41L1.7 143.8c-4.6 9.2.3 20.2 10.1 23l197.9 56.5c7.1 2 14.7-1 18.5-7.3L320 64 69.8 32.1c-6.9-.8-13.5 2.7-16.6 8.9z" />
                    </svg>
                    <i class="fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                    <div>
                        <p class="fw-bold mb-1">Order</p>
                        <p class="fw-bold mb-0">Shipped</p>
                    </div>
                    </div>
                    <div class="d-lg-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="65px" style="padding:10px;" viewBox="0 0 640 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) -->
                        <path d="M624 352h-16V243.9c0-12.7-5.1-24.9-14.1-33.9L494 110.1c-9-9-21.2-14.1-33.9-14.1H416V48c0-26.5-21.5-48-48-48H112C85.5 0 64 21.5 64 48v48H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h272c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H40c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h208c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h208c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H64v128c0 53 43 96 96 96s96-43 96-96h128c0 53 43 96 96 96s96-43 96-96h48c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zM160 464c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm320 0c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm80-208H416V144h44.1l99.9 99.9V256z" />
                    </svg>
                    <i class="fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                    <div>
                        <p class="fw-bold mb-1">Order</p>
                        <p class="fw-bold mb-0">En Route</p>
                    </div>
                    </div>
                    <div class="d-lg-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="65px" style="padding:10px;" viewBox="0 0 576 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) -->
                        <path d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z" />
                    </svg>
                    <i class="fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                    <div>
                        <p class="fw-bold mb-1">Order</p>
                        <p class="fw-bold mb-0">Arrived</p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>

        <div class="card shadow-0 border mb-4" style="margin:35px;">
        <div class="card-body">
            <div class="row" style="justify-content: space-between;">
            <div class="col-md-2">
                <img src="<?php echo $data[0]["product_url"]; ?>" class="img-fluid" alt="Item 1" style="height:100%">
            </div>
            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                <p class="text-muted mb-0"><?php echo $data[0]["product_name"]; ?></p>
            </div>
            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                <p class="text-muted mb-0 small"><?php echo $data[0]["category_name"]; ?></p>
            </div>
            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                <p class="text-muted mb-0 small"><?php echo $data[0]["size"]; ?></p>
            </div>
            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                <p class="text-muted mb-0 small"><?php echo $data[0]["qty"]; ?></p>
            </div>
            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                <p class="text-muted mb-0 small">IDR <?php echo $data[0]["product_price"]; ?></p>
            </div>
            </div>
        </div>
        </div>
    </section>

    <div class="pl-35 pr-35">
        <div class="d-flex justify-content-between pt-2" style="justify-content: space-between;">
        <p class="text-muted mb-0" style="font-weight: bold;">Invoice Date : <?php echo $data[0]["tanggal"]; ?></p>
        </div>

        <div class="d-flex justify-content-between" style="justify-content: space-between;">
        <p class="text-muted mb-0">Payment : <?php echo $data[0]["payment_method"]; ?></p>
        <p class="text-muted mb-0"><span class="fw-bold me-4">Total</span> <?php echo $data[0]["grand_total"]; ?></p>
        </div>

        <div class="d-flex justify-content-between pt-2" style="justify-content: space-between;">
        <p class="text-muted mb-0">Discount</p>
        <p class="text-muted mb-0"> IDR <?php echo $data[0]["total_potongan"]; ?></p>
        </div>

        <div class="d-flex justify-content-between" style="justify-content: space-between;">
        <p class="text-muted mb-0">Tax 5%</p>
        <p class="text-muted mb-0"> IDR <?php echo $data[0]["pajak"]; ?></p>
        </div>

        <div class="d-flex justify-content-between mb-5" style="justify-content: space-between;">
        <p class="text-muted mb-0">Delivery Charges</p>
        <p class="text-muted mb-0"> <?php echo $data[0]["delivery_cost"]; ?></p>
        </div>

    </div>
    <div class="card-footer border-0 px-4 py-5" style="background-color: #EEA2A2; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">
        <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Total
        paid: <span class="h2 mb-0 ms-2"> IDR <?php echo $data[0]["total"]; ?></span></h5>
    </div>
    </div>




<?php }?>
          
<?php
include '../session_check.php';
include '../page_includes/dashboard_header.php';
include '../db.php';
$user_id=$_SESSION['login_user_id'];
//$product_select_query="SELECT * FROM product WHERE user_id='$user_id'";
$product_select_query="SELECT p.name AS p_name, c.name AS category_name,p.price AS price,p.image AS product_image,p.status AS p_status ,p.description AS p_description  FROM product p INNER JOIN Category c ON p.category_id = c.id WHERE user_id=$user_id";
$products=mysqli_query($dbconnect,$product_select_query);
// foreach($products as $product){
//     print_r($product);
// }
// die();

?>
<div class="main-content">
  <div class="header p-0 p-md-3">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center">
          <div class="col d-flex align-items-center">
            <a href="#" class="back-arrow bg-white circle circle-sm shadow-dark-80 rounded mb-0"><img src="../assets/svg/icons/chevrons-left1.svg" alt="Chevrons"></a>
            <div class="ps-0 ps-md-3">
              <h1 class="h4 mb-0">
                Show Product
              </h1>
            </div>
          </div>
          <div class="col-auto d-flex flex-wrap align-items-center">
            <a href="#" class="text-dark h5 mb-0 notification dnd"><img src="../assets/svg/icons/notification.svg" style="width:20px;" alt="Notification"></a>
            <a href="#" class="text-dark ms-4 h5 mb-0 ps-2"><img src="../assets/svg/icons/setting1.svg" alt="Setting"></a>
            <a href="#" class="text-dark ms-4 h5 mb-0 ps-2"><img src="../assets/svg/icons/hamburger1.svg" alt="Hamburger"></a>
            <div class="dropdown d-none d-md-inline-block ps-2">
              <a href="#" class="avatar avatar-sm avatar-circle avatar-border-sm ms-4" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownMenuButton">
                <img class="avatar-img" src="../assets/img/templates/avatar1.svg" alt="Avatar">
                <span class="avatar-status avatar-sm-status avatar-danger">&nbsp;</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="../login/logout.php">Logout</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr class="my-3 bg-gray-200">
 
<div class="container">
  <!-- Muse Section, Py 4, Py Md 5 -->
 
  <!-- Muse Section, Pt 4 -->
  <section class="muse-section pt-4">
    <div class="row">
      <div class="col-lg-12">
         <div class="bg-white rounded-12 shadow-dark-80 mb-3" data-aos="fade-up" data-aos-delay="100">
            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $key=>$product){?>

                    <tr>
                        <td><?=$key+1?></td>
                        <td><img src="../images/product/<?=$product['product_image']?>" width="50px" height="50px" alt="<?=$product['product_image']?>"></td>
                        <td><?=$product['p_name']?></td>
                        <td><?=$product['category_name']?></td>
                        <td><?=$product['price']?></td>
                        <td><?=$product['p_description']?></td>
                        <?php if($product['p_status']==1) {?>
                        <td><a href="" class="btn btn-success">Live</a></td>
                        <?php } else {?>
                        <td><a href="" class="btn btn-danger">Offline</a></td>
                        <?php }?>
                        <td><a href="" class="btn btn-secondary"> Actions</a></td>
                    </tr>
                    <?php } ?>
                </tbody>

            </table>
        
         </div>   
       </div>
    </div>
  </section>
</div>













<?php
include '../page_includes/dashboard_footer.php';

?>
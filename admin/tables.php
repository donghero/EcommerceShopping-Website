<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dj - Tables</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <style>

        td.first_img{
            width: 10%;
            height: 30%;
        }
    </style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
      <?php include ("includes/sidebar.php")?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
          <?php include ("includes/topbar.php");?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">数据加载</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>图片1</th>
                      <th>图片2</th>
                      <th>图片3</th>
                      <th>标题</th>
                      <th>描述</th>
                      <th>keywords</th>
                      <th>数量</th>
                      <th>价格</th>
                      <th>更改</th>
                      <th>删除</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>图片1</th>
                        <th>图片2</th>
                        <th>图片3</th>
                        <th>标题</th>
                        <th>描述</th>
                        <th>keywords</th>
                        <th>数量</th>
                        <th>价格</th>
                        <th>更改</th>
                        <th>删除</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                  $select_products="select *from products";
                  $run_products=mysqli_query($conn,$select_products);
                  while($row_products=mysqli_fetch_array($run_products)){
                      $product_no=$row_products['p_no'];
                      $product_img1 = $row_products['product_img1'];
                      $product_img2 = $row_products['product_img2'];
                      $product_img3 = $row_products['product_img3'];
                      $product_title=$row_products['product_title'];
                      $product_desc=$row_products['product_desc'];
                      $product_keywords=$row_products['product_keywords'];
                      $product_price=$row_products['product_price'];


                      echo"
                      <tr>
                      <td class='first_img'><img src='../product_images/$product_img1' alt='...' class='img-thumbnail'></td>
                      <td class='first_img'><img src='../product_images/$product_img2' alt='...' class='img-thumbnail'></td>
                      <td class='first_img'><img src='../product_images/$product_img3' alt='...' class='img-thumbnail'></td>
                      <td>$product_title</td>
                      <td>$product_desc</td>
                      <td>$product_keywords</td>
                      <td></td>
                      <td>$product_price</td>
                        
                         <td>
                         <a data-toggle='modal' data-target='#updateModal'>
                         <button class='btn btn-success' id='edit' data-id='$product_no'>修改</button>
                         </a>
                         </td>
                  
                         
                      <td><button class='btn btn-danger' id='delete' data-id='$product_no'>删除</button></td>
                      </tr>
                      ";
                  }
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Tokyo 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php include("includes/logout_modal.php")?>
  <!-- Update Modal-->
  <?php include("includes/update_modal.php")?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <script>
      //get_record
      $(document).ready(function() {
          $(document).on('click','#edit',function () {
              let id=$(this).attr('data-id');
              // console.log(id);
              $.ajax({
                  url:'get_record.php',
                  method:'post',
                  data:{
                      p_no:id
                  },
                  dataType:'JSON',
                  success:function (data) {
                        // $('#body').html(data);
                      $('#title').val(data[0]);
                      $('#desc').val(data[1]);
                      $('#keywords').val(data[2]);
                      // $('#quantity').val(data[3]);
                      $('#price').val(data[4]);
                  }

              });
          });
      });

       //delete_record
      $(document).ready(function () {
          $(document).on('click','#delete',function () {
              let id=$(this).attr('data-id');
              console.log(id);
              $.ajax({
                  url:'delete.php',
                  method: 'post',
                  data:{
                      p_no:id
                  },
                  success:function(data){
                      alert(data);
                  }
              })
          })
      })

  </script>
</body>


</html>

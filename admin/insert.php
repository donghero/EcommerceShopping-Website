<?php
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert Products </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
    <script>tinymce.init({selector: 'textarea'});</script>

</head>
<body>
<div class="container-fluid pl-0">
    <div class="row">
        <div class="col-md-3">
			<?php include("includes/sidebar.php") ?>
        </div>
        <div class="col-md-9">

            <div class="col-lg-12"><!-- col-lg-12 Begin -->


                <div class="panel panel-default"><!-- panel panel-default Begin -->

                    <div class="panel-body"><!-- panel-body Begin -->
                        <form action="insert_post.php" method="post" class="form-horizontal"
                              enctype="multipart/form-data"><!-- form-horizontal Begin -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><!-- form-group Begin -->

                                        <label class="col-md-12 control-label">宝贝名</label>

                                        <div class="col-md-12"><!-- col-md-6 Begin -->

                                            <input name="product_title" type="text" class="form-control" required>

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->
                                    <div class="form-group"><!-- form-group Begin -->

                                        <label class="col-md-12 control-label">商品类型</label>

                                        <div class="col-md-12"><!-- col-md-6 Begin -->

                                            <select name="product_cat" class="form-control"><!-- form-control Begin -->

                                                <option>请选择</option>

												<?php

												$get_p_cats = "select * from product_categories";
												$run_p_cats = mysqli_query($conn, $get_p_cats);

												while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {

													$p_cat_id = $row_p_cats['p_cat_id'];
													$p_cat_title = $row_p_cats['p_cat_title'];

													echo "
                                      
                                      <option value='$p_cat_id'> $p_cat_title </option>
                                      
                                      ";
												}

												?>

                                            </select><!-- form-control Finish -->

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->
                                    <div class="form-group"><!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> 适合群类 </label>

                                        <div class="col-md-12"><!-- col-md-6 Begin -->

                                            <select name="cat" class="form-control"><!-- form-control Begin -->

                                                <option>请选择</option>

												<?php

												$get_cat = "select * from categories";
												$run_cat = mysqli_query($conn, $get_cat);

												while ($row_cat = mysqli_fetch_array($run_cat)) {

													$cat_id = $row_cat['cat_id'];
													$cat_title = $row_cat['cat_title'];

													echo "
                                      
                                      <option value='$cat_id '> $cat_title </option>
                                      
                                      ";

												}

												?>

                                            </select><!-- form-control Finish -->

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group"><!-- form-group Begin -->
                                        <div class="form-group"><!-- form-group Begin -->
                                            <label class="col-md-12 control-label">宝贝图1</label>

                                            <div class="col-md-12"><!-- col-md-6 Begin -->

                                                <input name="product_img1" type="file" class="form-control"
                                                       required>

                                            </div><!-- col-md-6 Finish -->

                                        </div><!-- form-group Finish -->

                                        <label class="col-md-12 control-label">宝贝图2</label>

                                        <div class="col-md-12"><!-- col-md-6 Begin -->

                                            <input name="product_img2" type="file" class="form-control" required>

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->
                                    <div class="form-group"><!-- form-group Begin -->

                                        <label class="col-md-12 control-label">宝贝图3</label>

                                        <div class="col-md-12"><!-- col-md-6 Begin -->

                                            <input name="product_img3" type="file"
                                                   class="form-control form-height-custom" required>

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><!-- form-group Begin -->

                                        <label class="col-md-12 control-label">价格</label>

                                        <div class="col-md-12"><!-- col-md-6 Begin -->

                                            <input name="product_price" type="text" class="form-control" required>

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> 关键字 </label>

                                        <div class="col-md-12"><!-- col-md-6 Begin -->

                                            <input name="product_keywords" type="text" class="form-control" required>

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->
                                </div>
                            </div>

                            <div class="form-group mb-0"><!-- form-group Begin -->

                                <label class="col-md-12 control-label">商品描述:</label>

                                <div class="col-md-12"><!-- col-md-6 Begin -->

                                    <textarea name="product_desc" cols="19" rows="6" class="form-control"></textarea>

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group mt-3"><!-- form-group Begin -->


                                <div class="col-md-12"><!-- col-md-6 Begin -->

                                    <input name="submit" value="添加商品" type="submit"
                                           class="btn btn-primary form-control">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                        </form><!-- form-horizontal Finish -->
                    </div><!-- panel-body Finish -->
                </div><!-- panel panel-default Finish -->

            </div><!-- col-lg-12 Finish -->


        </div>
    </div>
</div>
</body>
</html>

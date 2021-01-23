<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><?= $page_title ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('products') ?>">Manage Product</a></li>
            <li class="breadcrumb-item active">Edit Product</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Edit Product</h3>
          </div>
          <!-- /.card-header -->
          <form role="form" action="<?php base_url('products/update') ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">

              <span class="text-danger"><?php echo $this->session->flashdata('upload_error'); ?>
                <?php echo validation_errors(); ?></span>

              <div class="form-group">
                <label>Image Preview: </label>
                <img src="<?php echo base_url() . $product_data['image'] ?>" width="150" height="150" class="img-circle">
              </div>

              <div class="form-group">
                <label for="product_image">Image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="product_image" name="product_image">
                    <label class="custom-file-label" for="product_image">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
                <small>Max size: 2MB</small>
              </div>

              <div class="form-group">
                <label for="product_name">Product name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" value="<?php echo $product_data['name']; ?>" autocomplete="off" />
              </div>

              <div class="form-group">
                <label for="sku">SKU</label>
                <input type="text" class="form-control" id="sku" name="sku" placeholder="Enter sku" value="<?php echo $product_data['sku']; ?>" autocomplete="off" />
              </div>

              <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Enter price" value="<?php echo $product_data['price']; ?>" autocomplete="off" step="0.0001" />
              </div>

              <div class="form-group">
                <label for="qty">Qty</label>
                <input type="number" class="form-control" id="qty" name="qty" placeholder="Enter Qty" value="<?php echo $product_data['qty']; ?>" autocomplete="off" />
              </div>

              <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter 
                  description" autocomplete="off">
                    <?php echo $product_data['description']; ?>
                  </textarea>
              </div>

              <?php $attribute_id = json_decode($product_data['attribute_value_id']); ?>
              <?php if ($attributes) : ?>
                <?php foreach ($attributes as $k => $v) : ?>
                  <div class="form-group">
                    <label for="groups"><?php echo $v['attribute_data']['name'] ?></label>
                    <select class="form-control select_group" id="attributes_value_id" name="attributes_value_id[]" multiple="multiple">
                      <?php foreach ($v['attribute_value'] as $k2 => $v2) : ?>
                        <option value="<?php echo $v2['id'] ?>" <?php if (in_array($v2['id'], $attribute_id)) {
                                                                  echo "selected";
                                                                } ?>><?php echo $v2['value'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                <?php endforeach ?>
              <?php endif; ?>

              <div class="form-group">
                <label for="brands">Brands</label>
                <?php $brand_data = json_decode($product_data['brand_id']); ?>
                <select class="form-control select_group" id="brands" name="brands[]" multiple="multiple">
                  <?php foreach ($brands as $k => $v) : ?>
                    <option value="<?php echo $v['id'] ?>" <?php if (in_array($v['id'], $brand_data)) {
                                                              echo 'selected="selected"';
                                                            } ?>><?php echo $v['name'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group">
                <label for="category">Category</label>
                <?php $category_data = json_decode($product_data['category_id']); ?>
                <select class="form-control select_group" id="category" name="category[]" multiple="multiple">
                  <?php foreach ($category as $k => $v) : ?>
                    <option value="<?php echo $v['id'] ?>" <?php if (in_array($v['id'], $category_data)) {
                                                              echo 'selected="selected"';
                                                            } ?>><?php echo $v['name'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group">
                <label for="store">Store</label>
                <select class="form-control select_group" id="store" name="store">
                  <?php foreach ($stores as $k => $v) : ?>
                    <option value="<?php echo $v['id'] ?>" <?php if ($product_data['store_id'] == $v['id']) {
                                                              echo "selected='selected'";
                                                            } ?>><?php echo $v['name'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group">
                <label for="store">Availability</label>
                <select class="form-control" id="availability" name="availability">
                  <option value="1" <?php if ($product_data['availability'] == 1) {
                                      echo "selected='selected'";
                                    } ?>>Yes</option>
                  <option value="2" <?php if ($product_data['availability'] != 1) {
                                      echo "selected='selected'";
                                    } ?>>No</option>
                </select>
              </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Save Changes</button>
              <a href="<?php echo base_url('products') ?>" class="btn btn-warning">Back</a>
            </div>

          </form>
        </div>
        <!-- /.card -->

      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->


  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function() {
    $(".select_group").select2();
    $("#description").wysihtml5({
      toolbar: {
        "font-styles": false,
        "emphasis": false,
        "lists": false,
        "html": false,
        "link": false,
        "image": false,
        "color": false,
        "blockquote": false
      }
    });

    $("#mainProductNav > a").addClass('active');
    $("#mainProductNav").addClass('menu-open');
    $("#manageProductNav > a").addClass('active');

    // initialize bs-custom-file-input
    bsCustomFileInput.init();

  });
</script>
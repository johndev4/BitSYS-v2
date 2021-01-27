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
            <li class="breadcrumb-item active">Add Product</li>
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
            <h3 class="card-title">Add Product</h3>
          </div>
          <!-- /.card-header -->
          <form role="form" action="<?php base_url('products/create') ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">

              <span class="text-danger"><?php echo $this->session->flashdata('upload_error'); ?>
                <?php echo validation_errors(); ?></span>

              <div class="form-group">
                <img src="<?= base_url(DEFAULT_IMAGE) ?>" width="150" height="150" class="img-circle" id="preview_image" role="button">
                <button type="button" class="btn btn-light rounded-circle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position: relative; top: 55px; right: 45px;">
                  <i class="fas fa-camera"></i>
                </button>
                <div class="dropdown-menu">
                  <input type="file" class="d-none" id="image_upload" name="image_upload" accept="image/x-png,image/jpeg">
                  <a class="dropdown-item" role="button" id="upload_image">
                    <i class="fas fa-cloud-upload-alt"></i> Upload photo</a>
                  <a class="dropdown-item" role="button" id="remove_image">
                    <i class="fas fa-trash-alt"></i> Remove photo</a>
                </div>
                <div><br>
                  <small>MAX SIZE: 2MB</small> |
                  <small>MAX DIMENSION: 250 x 250</small> |
                  <small>RATIO: 1:1</small> |
                  <small>FILETYPE: JPG, PNG</small>
                </div>
              </div>

              <div class="form-group">
                <label for="product_name">Product name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" autocomplete="off" />
              </div>

              <div class="form-group">
                <label for="sku">SKU</label>
                <input type="text" class="form-control" id="sku" name="sku" placeholder="Enter sku" autocomplete="off" />
              </div>

              <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Enter price" autocomplete="off" step="0.0001" />
              </div>

              <div class="form-group">
                <label for="qty">Qty</label>
                <input type="number" class="form-control" id="qty" name="qty" placeholder="Enter Qty" autocomplete="off" />
              </div>

              <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter description" autocomplete="off"></textarea>
              </div>

              <?php if ($attributes) : ?>
                <?php foreach ($attributes as $k => $v) : ?>
                  <div class="form-group">
                    <label for="groups"><?php echo $v['attribute_data']['name'] ?></label>
                    <select class="form-control select_group" id="attributes_value_id" name="attributes_value_id[]" multiple="multiple">
                      <?php foreach ($v['attribute_value'] as $k2 => $v2) : ?>
                        <option value="<?php echo $v2['id'] ?>"><?php echo $v2['value'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                <?php endforeach ?>
              <?php endif; ?>

              <div class="form-group">
                <label for="brands">Brands</label>
                <select class="form-control select_group" id="brands" name="brands[]" multiple="multiple">
                  <?php foreach ($brands as $k => $v) : ?>
                    <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control select_group" id="category" name="category[]" multiple="multiple">
                  <?php foreach ($category as $k => $v) : ?>
                    <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group">
                <label for="store">Store</label>
                <select class="form-control select_group" id="store" name="store">
                  <?php foreach ($stores as $k => $v) : ?>
                    <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group">
                <label for="store">Availability</label>
                <select class="form-control" id="availability" name="availability">
                  <option value="1">Yes</option>
                  <option value="2">No</option>
                </select>
              </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Save Changes</button>
              <a href="<?php echo base_url('products/') ?>" class="btn btn-warning">Back</a>
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

    $("#mainProductNav > a").addClass('active');
    $("#mainProductNav").addClass('menu-open');
    $("#addProductNav > a").addClass('active');

    // upload image
    $("#upload_image").click(function() {
      $("#image_upload").click();
    });

    // remove image
    $("#remove_image").click(function() {
      if ($("#preview_image").attr('src') != "<?= base_url(DEFAULT_IMAGE); ?>") {
        $("#preview_image").attr('src', '<?= base_url(DEFAULT_IMAGE); ?>');
        $("form[action='<?php base_url('company/index') ?>']").attr('action', '<?php base_url('company/index') ?>?remove_image=true');
        $("#image_upload").val('');
      }
    });

    // sync image on preview
    $("#image_upload").on('input', function() {
      var file = $("#image_upload").get(0).files[0];

      if (file) {
        var reader = new FileReader();

        reader.onload = function() {
          $("#preview_image").attr("src", reader.result);
        }

        reader.readAsDataURL(file);
      } else {
        $("#preview_image").attr("src", '<?= base_url(DEFAULT_IMAGE); ?>');
      }
    });

  });
</script>
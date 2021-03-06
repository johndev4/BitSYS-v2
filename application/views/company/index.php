<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><?= $page_title ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Company</li>
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

        <?php if ($this->session->flashdata('success')) : ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <span><strong> <i class="fas fa-check-circle"></i> <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php elseif ($this->session->flashdata('error')) : ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <span><strong> <i class="fas fa-times-circle"></i> </strong></span> <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Manage Company Information</h3>
          </div>
          <!-- /.card-header -->
          <form role="form" action="<?php base_url('company/') ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">

              <span class="text-danger"><?php echo $this->session->flashdata('upload_error'); ?>
                <?php echo validation_errors(); ?></span>

              <div class="form-group">
                <img src="<?= base_url() . $company_data['image'] ?>" width="150" height="150" class="img-circle" id="preview_image" role="button">
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
                <label for="company_name">Company Name</label>
                <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter company name" value="<?php echo $company_data['company_name'] ?>" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="service_charge_value">Charge Amount (%)</label>
                <input type="number" class="form-control" id="service_charge_value" name="service_charge_value" placeholder="Enter charge amount %" value="<?php echo $company_data['service_charge_value'] ?>" autocomplete="off" step="0.0001">
              </div>
              <div class="form-group">
                <label for="vat_charge_value">Vat Charge (%)</label>
                <input type="number" class="form-control" id="vat_charge_value" name="vat_charge_value" placeholder="Enter vat charge %" value="<?php echo $company_data['vat_charge_value'] ?>" autocomplete="off" step="0.0001">
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" value="<?php echo $company_data['address'] ?>" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone" value="<?php echo $company_data['phone'] ?>" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" id="country" name="country" placeholder="Enter country" value="<?php echo $company_data['country'] ?>" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="permission">Company Description</label>
                <textarea class="form-control" id="company_description" name="company_description" placeholder="Enter company description"><?php echo $company_data['company_description'] ?></textarea>
              </div>
              <div class="form-group">
                <label for="currency">Currency</label>
                <?php ?>
                <select class="form-control" id="currency" name="currency">
                  <option value="">~~SELECT~~</option>

                  <?php foreach ($currency_dataset as $k => $v) : ?>
                    <option value="<?php echo trim($k); ?>" <?php if ($company_data['currency'] == $k) {
                                                              echo "selected";
                                                            } ?>><?php echo $k ?></option>
                  <?php endforeach ?>
                </select>
              </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Save Changes</button>
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
    $("#companyNav > a").addClass('active');

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
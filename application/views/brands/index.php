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
            <li class="breadcrumb-item active">Brands</li>
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

        <div id="messages"></div>

        <?php if (in_array('createBrand', $user_permission)) : ?>
          <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add Brand</button>
          <br /> <br />
        <?php endif; ?>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Brand Entries</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Brand Name</th>
                  <th>Status</th>
                  <?php if (in_array('updateBrand', $user_permission) || in_array('deleteBrand', $user_permission)) : ?>
                    <th>Action</th>
                  <?php endif; ?>
                </tr>
              </thead>

            </table>
          </div>
          <!-- /.card-body -->
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

<?php if (in_array('createBrand', $user_permission)) : ?>
  <!-- create brand modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="addModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Brand</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>

        <form role="form" action="<?php echo base_url('brands/create') ?>" method="post" id="createForm">

          <div class="modal-body">

            <div class="form-group">
              <label for="brand_name">Brand Name</label>
              <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Enter brand name" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="active">Status</label>
              <select class="form-control" id="active" name="active">
                <option value="1">Active</option>
                <option value="2">Inactive</option>
              </select>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>

        </form>


      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<?php endif; ?>

<?php if (in_array('updateBrand', $user_permission)) : ?>
  <!-- edit brand modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Brand</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>

        <form role="form" action="<?php echo base_url('brands/update') ?>" method="post" id="updateForm">

          <div class="modal-body">
            <div id="messages"></div>

            <div class="form-group">
              <label for="edit_brand_name">Brand Name</label>
              <input type="text" class="form-control" id="edit_brand_name" name="edit_brand_name" placeholder="Enter brand name" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="edit_active">Status</label>
              <select class="form-control" id="edit_active" name="edit_active">
                <option value="1">Active</option>
                <option value="2">Inactive</option>
              </select>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>

        </form>


      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<?php endif; ?>

<?php if (in_array('deleteBrand', $user_permission)) : ?>
  <!-- remove brand modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title">Remove Brand</h4>
        </div>
        <form role="form" action="<?php echo base_url('brands/remove') ?>" method="post" id="removeForm">
          <div class="modal-body">
            <p>Do you really want to remove?</p>
            <button type="submit" class="btn btn-primary">Confirm</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </div>
        </form>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<?php endif; ?>



<script type="text/javascript">
  var manageTable;

  $(document).ready(function() {

    $("#brandNav > a").addClass('active');

    // initialize the datatable 
    manageTable = $('#manageTable').DataTable({
      "ajax": 'fetchBrandData',
      "responsive": true,
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],
      "autoWidth": false,
      "paging": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "buttons": ["csv", "excel", "pdf", "colvis"],
      "dom": 'Bflrtip'
    });

    // submit the create form 
    $("#createForm").unbind('submit').on('submit', function() {
      var form = $(this);

      // remove the text-danger
      $(".text-danger").remove();

      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: form.serialize(), // /converting the form data into array and sending it to server
        dataType: 'json',
        success: function(response) {

          manageTable.ajax.reload(null, false);

          if (response.success === true) {
            $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
              '<strong> <i class="fas fa-check-circle"></i> </strong>' + response.messages +
              '</div>');


            // hide the modal
            $("#addModal").modal('hide');
            // scroll to top
            $(window).scrollTop(0);
            // reset the form
            $("#createForm")[0].reset();
            $("#createForm .form-group").removeClass('has-error').removeClass('has-success');

          } else {

            if (response.messages instanceof Object) {
              $.each(response.messages, function(index, value) {
                var id = $("#" + index);

                id.closest('.form-group')
                  .removeClass('has-error')
                  .removeClass('has-success')
                  .addClass(value.length > 0 ? 'has-error' : 'has-success');

                id.after(value);

              });
            } else {
              $("#messages").html('<div class="alert alert-error alert-dismissible" role="alert">' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                '<strong> <i class="fas fa-times-circle"></i> </strong>' + response.messages +
                '</div>');

              // hide the modal
              $("#addModal").modal('hide');
              // scroll to top
              $(window).scrollTop(0);
              // reset the form
              $("#createForm")[0].reset();
              $("#createForm .form-group").removeClass('has-error').removeClass('has-success');
            }
          }
        }
      });

      return false;
    });


  });

  function editFunc(id) {
    $.ajax({
      url: 'fetchBrandDataById/' + id,
      type: 'post',
      dataType: 'json',
      success: function(response) {

        $("#edit_brand_name").val(response.name);
        $("#edit_active").val(response.active);

        // submit the edit form 
        $("#updateForm").unbind('submit').bind('submit', function() {
          var form = $(this);

          // remove the text-danger
          $(".text-danger").remove();

          $.ajax({
            url: form.attr('action') + '/' + id,
            type: form.attr('method'),
            data: form.serialize(), // /converting the form data into array and sending it to server
            dataType: 'json',
            success: function(response) {

              manageTable.ajax.reload(null, false);

              if (response.success === true) {
                $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                  '<strong> <i class="fas fa-check-circle"></i> </strong>' + response.messages +
                  '</div>');


                // hide the modal
                $("#editModal").modal('hide');
                // scroll to top
                $(window).scrollTop(0);
                // reset the form 
                $("#updateForm .form-group").removeClass('has-error').removeClass('has-success');

              } else {

                if (response.messages instanceof Object) {
                  $.each(response.messages, function(index, value) {
                    var id = $("#" + index);

                    id.closest('.form-group')
                      .removeClass('has-error')
                      .removeClass('has-success')
                      .addClass(value.length > 0 ? 'has-error' : 'has-success');

                    id.after(value);

                  });
                } else {
                  $("#messages").html('<div class="alert alert-error alert-dismissible" role="alert">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                    '<strong> <i class="fas fa-times-circle"></i> </strong>' + response.messages +
                    '</div>');

                  // hide the modal
                  $("#editModal").modal('hide');
                  // scroll to top
                  $(window).scrollTop(0);
                  // reset the form 
                  $("#updateForm .form-group").removeClass('has-error').removeClass('has-success');
                }
              }
            }
          });

          return false;
        });

      }
    });
  }

  function removeFunc(id) {
    if (id) {
      $("#removeForm").on('submit', function() {

        var form = $(this);

        // remove the text-danger
        $(".text-danger").remove();

        $.ajax({
          url: form.attr('action'),
          type: form.attr('method'),
          data: {
            brand_id: id
          },
          dataType: 'json',
          success: function(response) {

            manageTable.ajax.reload(null, false);

            if (response.success === true) {
              $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                '<strong> <i class="fas fa-check-circle"></i> </strong>' + response.messages +
                '</div>');

              // hide the modal
              $("#removeModal").modal('hide');
              // scroll to top
              $(window).scrollTop(0);

            } else {

              $("#messages").html('<div class="alert alert-error alert-dismissible" role="alert">' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                '<strong> <i class="fas fa-times-circle"></i> </strong>' + response.messages +
                '</div>');

              // hide the modal
              $("#removeModal").modal('hide');
              // scroll to top
              $(window).scrollTop(0);
            }
          }
        });

        return false;
      });
    }
  }
</script>
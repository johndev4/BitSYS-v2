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
            <li class="breadcrumb-item active">Manage Orders</li>
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

        <?php if ($this->session->flashdata('success')) : ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <span><strong> <i class="fas fa-check-circle"></i> </strong></span> <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php elseif ($this->session->flashdata('error')) : ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <span><strong> <i class="fas fa-times-circle"></i> </strong></span> <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>

        <?php if (in_array('createOrder', $user_permission)) : ?>
          <a href="<?php echo base_url('orders/create') ?>" class="btn btn-primary">Add Order</a>
          <br /> <br />
        <?php endif; ?>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Order Entries</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Bill no</th>
                  <th>Customer Name</th>
                  <th>Customer Phone</th>
                  <th>Date Time</th>
                  <th>Total Products</th>
                  <th>Total Amount</th>
                  <th>Paid status</th>
                  <?php if (in_array('updateOrder', $user_permission) || in_array('viewOrder', $user_permission) || in_array('deleteOrder', $user_permission)) : ?>
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

<?php if (in_array('deleteOrder', $user_permission)) : ?>
  <!-- remove order modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title">Remove Order</h4>
        </div>
        <form role="form" action="<?php echo base_url('orders/remove') ?>" method="post" id="removeForm">
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
  var base_url = "<?php echo base_url(); ?>";

  $(document).ready(function() {

    $("#mainOrdersNav > a").addClass('active');
    $("#mainOrdersNav").addClass('menu-open');
    $("#manageOrdersNav > a").addClass('active');

    // initialize the datatable 
    manageTable = $('#manageTable').DataTable({
      "ajax": base_url + 'orders/fetchOrdersData',
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

  });

  // remove functions 
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
            order_id: id
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

              $("#messages").html('<div class="alert alert-danger alert-dismissible" role="alert">' +
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
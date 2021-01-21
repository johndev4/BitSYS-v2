<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><?= $page_title?></h1>
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

        <h1>Do you really want to remove ?</h1>

        <form action="<?php echo base_url('users/delete/' . $id) ?>" method="post">
          <input type="submit" class="btn btn-primary" name="confirm" value="Confirm">
          <a href="<?php echo base_url('users') ?>" class="btn btn-warning">Cancel</a>
        </form>

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
    $("#mainUserNav > a").addClass('active');
    $("#mainUserNav").addClass('menu-open');
    $("#manageUserNav > a").addClass('active');
  });
</script>
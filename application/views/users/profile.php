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
            <li class="breadcrumb-item active">Profile</li>
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
            <h3 class="card-title">Profile Information</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-condensed table-hovered">
              <tr>
                <th>Username</th>
                <td><?php echo $user_data['username']; ?></td>
              </tr>
              <tr>
                <th>Email</th>
                <td><?php echo $user_data['email']; ?></td>
              </tr>
              <tr>
                <th>First Name</th>
                <td><?php echo $user_data['firstname']; ?></td>
              </tr>
              <tr>
                <th>Last Name</th>
                <td><?php echo $user_data['lastname']; ?></td>
              </tr>
              <tr>
                <th>Gender</th>
                <td>
                  <?php
                  if ($user_data['gender'] == 1) :
                    echo 'Male';
                  elseif ($user_data['gender'] == 2) :
                    echo 'Female';
                  else :
                    echo '';
                  endif;
                  ?>
                </td>
              </tr>
              <tr>
                <th>Phone</th>
                <td><?php echo $user_data['phone']; ?></td>
              </tr>
              <tr>
                <th>Group</th>
                <td><span class="badge badge-primary"><?php echo $user_group['group_name']; ?></span></td>
              </tr>
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

<script type="text/javascript">
  $(document).ready(function() {
    $("#profileNav > a").addClass('active');
  });
</script>
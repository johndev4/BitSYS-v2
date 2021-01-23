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
            <li class="breadcrumb-item"><a href="<?= base_url('users') ?>">Manage Users</a></li>
            <li class="breadcrumb-item active">Add User</li>
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
            <h3 class="card-title">Add User</h3>
          </div>
          <!-- /.card-header -->
          <form role="form" action="<?php base_url('users/create') ?>" method="post">
            <div class="card-body">

              <span class="text-danger"><?php echo validation_errors(); ?></span>

              <div class="form-group">
                <label for="groups">Groups</label>
                <select class="form-control select2bs4" id="groups" name="groups">
                  <option value="">Select Groups</option>
                  <?php foreach ($group_data as $k => $v) : ?>
                    <option value="<?php echo $v['id'] ?>"><?php echo $v['group_name'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off">
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
              </div>

              <div class="form-group">
                <label for="cpassword">Confirm password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off">
              </div>

              <div class="form-group">
                <label for="fname">First name</label>
                <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" autocomplete="off">
              </div>

              <div class="form-group">
                <label for="lname">Last name</label>
                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" autocomplete="off">
              </div>

              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" autocomplete="off">
              </div>

              <div class="form-group">
                <label for="gender">Gender</label>
                <div class="radio">
                  <label>
                    <input type="radio" name="gender" id="male" value="1">
                    Male
                  </label>
                  <label>
                    <input type="radio" name="gender" id="female" value="2">
                    Female
                  </label>
                </div>
              </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Save Changes</button>
              <a href="<?php echo base_url('users/') ?>" class="btn btn-warning">Back</a>
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
    $("#groups").select2();

    $("#mainUserNav > a").addClass('active');
    $("#mainUserNav").addClass('menu-open');
    $("#createUserNav > a").addClass('active');

  });
</script>
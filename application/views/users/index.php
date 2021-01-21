<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><?= $page_title?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Manage Users</li>
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
            <span><strong> <i class="fas fa-check-circle"></i> </strong></span> <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php elseif ($this->session->flashdata('error')) : ?>
          <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <span><strong> <i class="fas fa-times-circle"></i> </strong></span> <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>

        <?php if (in_array('createUser', $user_permission)) : ?>
          <a href="<?php echo base_url('users/create') ?>" class="btn btn-primary">Add User</a>
          <br /> <br />
        <?php endif; ?>


        <div class="card">
          <div class="card-header">
            <h3 class="card-title">User Entries</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="userTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Group</th>

                  <?php if (in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)) : ?>
                    <th>Action</th>
                  <?php endif; ?>
                </tr>
              </thead>
              <tbody>
                <?php if ($user_data) : ?>
                  <?php foreach ($user_data as $k => $v) : ?>
                    <tr>
                      <td><?php echo $v['user_info']['username']; ?></td>
                      <td><?php echo $v['user_info']['email']; ?></td>
                      <td><?php echo $v['user_info']['firstname'] . ' ' . $v['user_info']['lastname']; ?></td>
                      <td><?php echo $v['user_info']['phone']; ?></td>
                      <td><?php echo $v['user_group']['group_name']; ?></td>

                      <?php if (in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)) : ?>

                        <td>
                          <?php if (in_array('updateUser', $user_permission)) : ?>
                            <a href="<?php echo base_url('users/edit/' . $v['user_info']['id']) ?>" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                          <?php endif; ?>
                          <?php if (in_array('deleteUser', $user_permission)) : ?>
                            <a href="<?php echo base_url('users/delete/' . $v['user_info']['id']) ?>" class="btn btn-default"><i class="fa fa-trash"></i></a>
                          <?php endif; ?>
                        </td>
                      <?php endif; ?>
                    </tr>
                  <?php endforeach ?>
                <?php endif; ?>
              </tbody>
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
    $('#userTable').DataTable({
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

    $("#mainUserNav > a").addClass('active');
    $("#mainUserNav").addClass('menu-open');
    $("#manageUserNav > a").addClass('active');
  });
</script>
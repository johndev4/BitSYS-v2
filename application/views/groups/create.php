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
            <li class="breadcrumb-item"><a href="<?= base_url('groups') ?>">Manage Groups</a></li>
            <li class="breadcrumb-item active">Add Group</li>
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
            <h3 class="card-title">Add Group</h3>
          </div>
          <!-- /.card-header -->
          <form role="form" action="<?php base_url('groups/create') ?>" method="post">
            <div class="card-body">

              <span class="text-danger"><?php echo validation_errors(); ?></span>

              <div class="form-group">
                <label for="group_name">Group Name</label>
                <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter group name">
              </div>
              <div class="form-group">
                <label for="permission">Permission</label>

                <table class="table table-responsive">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Create</th>
                      <th>Update</th>
                      <th>View</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Users</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createUser" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateUser" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewUser" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteUser" class="minimal"></td>
                    </tr>
                    <tr>
                      <td>Groups</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createGroup" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateGroup" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewGroup" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteGroup" class="minimal"></td>
                    </tr>
                    <tr>
                      <td>Brands</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createBrand" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateBrand" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewBrand" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteBrand" class="minimal"></td>
                    </tr>
                    <tr>
                      <td>Category</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createCategory" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateCategory" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewCategory" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteCategory" class="minimal"></td>
                    </tr>
                    <tr>
                      <td>Stores</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createStore" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateStore" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewStore" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteStore" class="minimal"></td>
                    </tr>
                    <tr>
                      <td>Attributes</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createAttribute" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateAttribute" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewAttribute" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteAttribute" class="minimal"></td>
                    </tr>
                    <tr>
                      <td>Products</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createProduct" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateProduct" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewProduct" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteProduct" class="minimal"></td>
                    </tr>
                    <tr>
                      <td>Orders</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createOrder" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateOrder" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewOrder" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteOrder" class="minimal"></td>
                    </tr>
                    <tr>
                      <td>Reports</td>
                      <td> - </td>
                      <td> - </td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewReports" class="minimal"></td>
                      <td> - </td>
                    </tr>
                    <tr>
                      <td>Company</td>
                      <td> - </td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateCompany" class="minimal"></td>
                      <td> - </td>
                      <td> - </td>
                    </tr>
                    <tr>
                      <td>Profile</td>
                      <td> - </td>
                      <td> - </td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewProfile" class="minimal"></td>
                      <td> - </td>
                    </tr>
                    <tr>
                      <td>Setting</td>
                      <td>-</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateSetting" class="minimal"></td>
                      <td> - </td>
                      <td> - </td>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Save Changes</button>
              <a href="<?php echo base_url('groups/') ?>" class="btn btn-warning">Back</a>
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
    $("#mainGroupNav > a").addClass('active');
    $("#mainGroupNav").addClass('menu-open');
    $("#addGroupNav > a").addClass('active');

    $('input[type="checkbox"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
  });
</script>
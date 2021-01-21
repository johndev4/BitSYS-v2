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
            <li class="breadcrumb-item active">Edit Group</li>
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
            <h3 class="card-title">Edit Group</h3>
          </div>
          <!-- /.card-header -->
          <form role="form" action="<?php base_url('groups/update') ?>" method="post">
            <div class="card-body">

              <span class="text-danger"><?php echo validation_errors(); ?></span>

              <div class="form-group">
                <label for="group_name">Group Name</label>
                <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter group name" value="<?php echo $group_data['group_name']; ?>">
              </div>
              <div class="form-group">
                <label for="permission">Permission</label>

                <?php $serialize_permission = unserialize($group_data['permission']); ?>

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
                      <td><input type="checkbox" class="minimal" name="permission[]" id="permission" class="minimal" value="createUser" <?php if ($serialize_permission) {
                                                                                                                                          if (in_array('createUser', $serialize_permission)) {
                                                                                                                                            echo "checked";
                                                                                                                                          }
                                                                                                                                        } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateUser" <?php
                                                                                                                        if ($serialize_permission) {
                                                                                                                          if (in_array('updateUser', $serialize_permission)) {
                                                                                                                            echo "checked";
                                                                                                                          }
                                                                                                                        }
                                                                                                                        ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewUser" <?php
                                                                                                                      if ($serialize_permission) {
                                                                                                                        if (in_array('viewUser', $serialize_permission)) {
                                                                                                                          echo "checked";
                                                                                                                        }
                                                                                                                      }
                                                                                                                      ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteUser" <?php
                                                                                                                        if ($serialize_permission) {
                                                                                                                          if (in_array('deleteUser', $serialize_permission)) {
                                                                                                                            echo "checked";
                                                                                                                          }
                                                                                                                        }
                                                                                                                        ?>></td>
                    </tr>
                    <tr>
                      <td>Groups</td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createGroup" <?php
                                                                                                                          if ($serialize_permission) {
                                                                                                                            if (in_array('createGroup', $serialize_permission)) {
                                                                                                                              echo "checked";
                                                                                                                            }
                                                                                                                          }
                                                                                                                          ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateGroup" <?php
                                                                                                                          if ($serialize_permission) {
                                                                                                                            if (in_array('updateGroup', $serialize_permission)) {
                                                                                                                              echo "checked";
                                                                                                                            }
                                                                                                                          }
                                                                                                                          ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewGroup" <?php
                                                                                                                        if ($serialize_permission) {
                                                                                                                          if (in_array('viewGroup', $serialize_permission)) {
                                                                                                                            echo "checked";
                                                                                                                          }
                                                                                                                        }
                                                                                                                        ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteGroup" <?php
                                                                                                                          if ($serialize_permission) {
                                                                                                                            if (in_array('deleteGroup', $serialize_permission)) {
                                                                                                                              echo "checked";
                                                                                                                            }
                                                                                                                          }
                                                                                                                          ?>></td>
                    </tr>
                    <tr>
                      <td>Brands</td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createBrand" <?php if ($serialize_permission) {
                                                                                                                            if (in_array('createBrand', $serialize_permission)) {
                                                                                                                              echo "checked";
                                                                                                                            }
                                                                                                                          } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateBrand" <?php if ($serialize_permission) {
                                                                                                                            if (in_array('updateBrand', $serialize_permission)) {
                                                                                                                              echo "checked";
                                                                                                                            }
                                                                                                                          } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewBrand" <?php if ($serialize_permission) {
                                                                                                                          if (in_array('viewBrand', $serialize_permission)) {
                                                                                                                            echo "checked";
                                                                                                                          }
                                                                                                                        } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteBrand" <?php if ($serialize_permission) {
                                                                                                                            if (in_array('deleteBrand', $serialize_permission)) {
                                                                                                                              echo "checked";
                                                                                                                            }
                                                                                                                          } ?>></td>
                    </tr>
                    <tr>
                      <td>Category</td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createCategory" <?php if ($serialize_permission) {
                                                                                                                              if (in_array('createCategory', $serialize_permission)) {
                                                                                                                                echo "checked";
                                                                                                                              }
                                                                                                                            } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateCategory" <?php if ($serialize_permission) {
                                                                                                                              if (in_array('updateCategory', $serialize_permission)) {
                                                                                                                                echo "checked";
                                                                                                                              }
                                                                                                                            } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewCategory" <?php if ($serialize_permission) {
                                                                                                                            if (in_array('viewCategory', $serialize_permission)) {
                                                                                                                              echo "checked";
                                                                                                                            }
                                                                                                                          } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteCategory" <?php if ($serialize_permission) {
                                                                                                                              if (in_array('deleteCategory', $serialize_permission)) {
                                                                                                                                echo "checked";
                                                                                                                              }
                                                                                                                            } ?>></td>
                    </tr>
                    <tr>
                      <td>Stores</td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createStore" <?php if ($serialize_permission) {
                                                                                                                            if (in_array('createStore', $serialize_permission)) {
                                                                                                                              echo "checked";
                                                                                                                            }
                                                                                                                          } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateStore" <?php if ($serialize_permission) {
                                                                                                                            if (in_array('updateStore', $serialize_permission)) {
                                                                                                                              echo "checked";
                                                                                                                            }
                                                                                                                          } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewStore" <?php if ($serialize_permission) {
                                                                                                                          if (in_array('viewStore', $serialize_permission)) {
                                                                                                                            echo "checked";
                                                                                                                          }
                                                                                                                        } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteStore" <?php if ($serialize_permission) {
                                                                                                                            if (in_array('deleteStore', $serialize_permission)) {
                                                                                                                              echo "checked";
                                                                                                                            }
                                                                                                                          } ?>></td>
                    </tr>
                    <tr>
                      <td>Attributes</td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createAttribute" <?php if ($serialize_permission) {
                                                                                                                                if (in_array('createAttribute', $serialize_permission)) {
                                                                                                                                  echo "checked";
                                                                                                                                }
                                                                                                                              } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateAttribute" <?php if ($serialize_permission) {
                                                                                                                                if (in_array('updateAttribute', $serialize_permission)) {
                                                                                                                                  echo "checked";
                                                                                                                                }
                                                                                                                              } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewAttribute" <?php if ($serialize_permission) {
                                                                                                                              if (in_array('viewAttribute', $serialize_permission)) {
                                                                                                                                echo "checked";
                                                                                                                              }
                                                                                                                            } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteAttribute" <?php if ($serialize_permission) {
                                                                                                                                if (in_array('deleteAttribute', $serialize_permission)) {
                                                                                                                                  echo "checked";
                                                                                                                                }
                                                                                                                              } ?>></td>
                    </tr>
                    <tr>
                      <td>Products</td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createProduct" <?php if ($serialize_permission) {
                                                                                                                              if (in_array('createProduct', $serialize_permission)) {
                                                                                                                                echo "checked";
                                                                                                                              }
                                                                                                                            } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateProduct" <?php if ($serialize_permission) {
                                                                                                                              if (in_array('updateProduct', $serialize_permission)) {
                                                                                                                                echo "checked";
                                                                                                                              }
                                                                                                                            } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewProduct" <?php if ($serialize_permission) {
                                                                                                                            if (in_array('viewProduct', $serialize_permission)) {
                                                                                                                              echo "checked";
                                                                                                                            }
                                                                                                                          } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteProduct" <?php if ($serialize_permission) {
                                                                                                                              if (in_array('deleteProduct', $serialize_permission)) {
                                                                                                                                echo "checked";
                                                                                                                              }
                                                                                                                            } ?>></td>
                    </tr>
                    <tr>
                      <td>Orders</td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createOrder" <?php if ($serialize_permission) {
                                                                                                                            if (in_array('createOrder', $serialize_permission)) {
                                                                                                                              echo "checked";
                                                                                                                            }
                                                                                                                          } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateOrder" <?php if ($serialize_permission) {
                                                                                                                            if (in_array('updateOrder', $serialize_permission)) {
                                                                                                                              echo "checked";
                                                                                                                            }
                                                                                                                          } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewOrder" <?php if ($serialize_permission) {
                                                                                                                          if (in_array('viewOrder', $serialize_permission)) {
                                                                                                                            echo "checked";
                                                                                                                          }
                                                                                                                        } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteOrder" <?php if ($serialize_permission) {
                                                                                                                            if (in_array('deleteOrder', $serialize_permission)) {
                                                                                                                              echo "checked";
                                                                                                                            }
                                                                                                                          } ?>></td>
                    </tr>
                    <tr>
                      <td>Reports</td>
                      <td> - </td>
                      <td> - </td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewReports" <?php if ($serialize_permission) {
                                                                                                                            if (in_array('viewReports', $serialize_permission)) {
                                                                                                                              echo "checked";
                                                                                                                            }
                                                                                                                          } ?>></td>
                      <td> - </td>
                    </tr>
                    <tr>
                      <td>Company</td>
                      <td> - </td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateCompany" <?php if ($serialize_permission) {
                                                                                                                              if (in_array('updateCompany', $serialize_permission)) {
                                                                                                                                echo "checked";
                                                                                                                              }
                                                                                                                            } ?>></td>
                      <td> - </td>
                      <td> - </td>
                    </tr>
                    <tr>
                      <td>Profile</td>
                      <td> - </td>
                      <td> - </td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewProfile" <?php if ($serialize_permission) {
                                                                                                                            if (in_array('viewProfile', $serialize_permission)) {
                                                                                                                              echo "checked";
                                                                                                                            }
                                                                                                                          } ?>></td>
                      <td> - </td>
                    </tr>
                    <tr>
                      <td>Setting</td>
                      <td>-</td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateSetting" <?php if ($serialize_permission) {
                                                                                                                              if (in_array('updateSetting', $serialize_permission)) {
                                                                                                                                echo "checked";
                                                                                                                              }
                                                                                                                            } ?>></td>
                      <td> - </td>
                      <td> - </td>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update Changes</button>
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
    $("#manageGroupNav > a").addClass('active');

    $('input[type="checkbox"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
  });
</script>
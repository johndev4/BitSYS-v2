<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a class="brand-link" role="button">
    <img src="<?= base_url(BITSYS_LOGO);?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">BitSYS</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <!-- Dashboard -->
        <li id="dashboardMainMenu" class="nav-item">
          <a href="<?php echo base_url('dashboard') ?>" class="nav-link">
            <i class="fas fa-tachometer-alt nav-icon"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <?php if ($user_permission) : ?>

          <!-- Users -->
          <?php if (in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)) : ?>
            <li class="nav-item" id="mainUserNav">
              <a href="#" class="nav-link">
                <i class="fa fa-users nav-icon"></i>
                <p>
                  Users
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <?php if (in_array('createUser', $user_permission)) : ?>
                  <li id="createUserNav" class="nav-item">
                    <a href="<?php echo base_url('users/create') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Add User
                      </p>
                    </a>
                  </li>
                <?php endif; ?>

                <?php if (in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)) : ?>
                  <li id="manageUserNav" class="nav-item">
                    <a href="<?php echo base_url('users') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Manage User
                      </p>
                    </a>
                  </li>
                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>

          <!-- Groups -->
          <?php if (in_array('createGroup', $user_permission) || in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)) : ?>
            <li class="nav-item" id="mainGroupNav">
              <a href="#" class="nav-link">
                <i class="fa fa-user-tag nav-icon"></i>
                <p>
                  Groups
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <?php if (in_array('createGroup', $user_permission)) : ?>
                  <li id="addGroupNav" class="nav-item">
                    <a href="<?php echo base_url('groups/create') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Add Group
                      </p>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if (in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)) : ?>
                  <li id="manageGroupNav" class="nav-item">
                    <a href="<?php echo base_url('groups') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Manage Group
                      </p>
                    </a>
                  </li>
                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>

          <!-- Brands -->
          <?php if (in_array('createBrand', $user_permission) || in_array('updateBrand', $user_permission) || in_array('viewBrand', $user_permission) || in_array('deleteBrand', $user_permission)) : ?>
            <li id="brandNav" class="nav-item">
              <a href="<?php echo base_url('brands/') ?>" class="nav-link">
                <i class="fas fa-tags nav-icon"></i>
                <p>
                  Brands
                </p>
              </a>
            </li>
          <?php endif; ?>

          <!-- Categories -->
          <?php if (in_array('createCategory', $user_permission) || in_array('updateCategory', $user_permission) || in_array('viewCategory', $user_permission) || in_array('deleteCategory', $user_permission)) : ?>
            <li id="categoryNav" class="nav-item">
              <a href="<?php echo base_url('category/') ?>" class="nav-link">
                <i class="fa fa-th-list nav-icon"></i>
                <p>
                  Categories
                </p>
              </a>
            </li>
          <?php endif; ?>

          <!-- Stores -->
          <?php if (in_array('createStore', $user_permission) || in_array('updateStore', $user_permission) || in_array('viewStore', $user_permission) || in_array('deleteStore', $user_permission)) : ?>
            <li id="storeNav" class="nav-item">
              <a href="<?php echo base_url('stores/') ?>" class="nav-link">
                <i class="fa fa-store nav-icon"></i>
                <p>
                  Store
                </p>
              </a>
            </li>
          <?php endif; ?>

          <!-- Attributes -->
          <?php if (in_array('createAttribute', $user_permission) || in_array('updateAttribute', $user_permission) || in_array('viewAttribute', $user_permission) || in_array('deleteAttribute', $user_permission)) : ?>
            <li id="attributeNav" class="nav-item">
              <a href="<?php echo base_url('attributes/') ?>" class="nav-link">
                <i class="fa fa-tag nav-icon"></i>
                <p>
                  Attributes
                </p>
              </a>
            </li>
          <?php endif; ?>

          <!-- Products -->
          <?php if (in_array('createProduct', $user_permission) || in_array('updateProduct', $user_permission) || in_array('viewProduct', $user_permission) || in_array('deleteProduct', $user_permission)) : ?>
            <li class="nav-item" id="mainProductNav">
              <a href="#" class="nav-link">
                <i class="fa fa-cube nav-icon"></i>
                <p>
                  Products
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <?php if (in_array('createProduct', $user_permission)) : ?>
                  <li id="addProductNav" class="nav-item">
                    <a href="<?php echo base_url('products/create') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Add Product
                      </p>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if (in_array('updateProduct', $user_permission) || in_array('viewProduct', $user_permission) || in_array('deleteProduct', $user_permission)) : ?>
                  <li id="manageProductNav" class="nav-item">
                    <a href="<?php echo base_url('products') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Manage Products
                      </p>
                    </a>
                  </li>
                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>

          <!-- Orders -->
          <?php if (in_array('createOrder', $user_permission) || in_array('updateOrder', $user_permission) || in_array('viewOrder', $user_permission) || in_array('deleteOrder', $user_permission)) : ?>
            <li class="nav-item" id="mainOrdersNav">
              <a href="#" class="nav-link">
                <i class="fa fa-file-invoice-dollar nav-icon"></i>
                <p>
                  Orders
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <?php if (in_array('createOrder', $user_permission)) : ?>
                  <li id="addOrderNav" class="nav-item">
                    <a href="<?php echo base_url('orders/create') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Add Order
                      </p>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if (in_array('updateOrder', $user_permission) || in_array('viewOrder', $user_permission) || in_array('deleteOrder', $user_permission)) : ?>
                  <li id="manageOrdersNav" class="nav-item">
                    <a href="<?php echo base_url('orders') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Manage Orders
                      </p>
                    </a>
                  </li>
                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>

          <!-- Reports -->
          <?php if (in_array('viewReports', $user_permission)) : ?>
            <li id="reportNav" class="nav-item">
              <a href="<?php echo base_url('reports/') ?>" class="nav-link">
                <i class="fas fa-chart-line nav-icon"></i>
                <p>
                  Reports
                </p>
              </a>
            </li>
          <?php endif; ?>

          <!-- Company -->
          <?php if (in_array('updateCompany', $user_permission)) : ?>
            <li id="companyNav" class="nav-item">
              <a href="<?php echo base_url('company/') ?>" class="nav-link">
                <i class="fa fa-building nav-icon"></i>
                <p>
                  Company
                </p>
              </a>
            </li>
          <?php endif; ?>

          <!-- Profile -->
          <?php if (in_array('viewProfile', $user_permission)) : ?>
            <li id="profileNav" class="nav-item">
              <a href="<?php echo base_url('users/profile/') ?>" class="nav-link">
                <i class="fa fa-user nav-icon"></i>
                <p>
                  Profile
                </p>
              </a>
            </li>
          <?php endif; ?>

          <!-- Setting -->
          <?php if (in_array('updateSetting', $user_permission)) : ?>
            <li id="settingNav" class="nav-item">
              <a href="<?php echo base_url('users/setting/') ?>" class="nav-link">
                <i class="fa fa-wrench nav-icon"></i>
                <p>
                  Setting
                </p>
              </a>
            </li>
          <?php endif; ?>

        <?php endif; ?>

        <!-- user permission info -->
        <li class="nav-item">
          <a href="<?php echo base_url('auth/logout') ?>" class="nav-link">
            <i class="fas fa-sign-out-alt nav-icon"></i>
            <p>
              Logout
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
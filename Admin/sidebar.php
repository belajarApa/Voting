 <!-- Main Sidebar Container -->  
 </style>
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <li class="brand-link">
      <img src="dist/img/user2-160x160.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Voting</span>
    </li>
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="form-inline mt-3">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="createTitle.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Voting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="createToken.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Token</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="createDate.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Date</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="tablesTitle.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tables Title</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tablesVote.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tables Voting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tablesDate.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tables Date</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tablesToken.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tables Token</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tablesUser.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tables User</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
                <a href="logout.php" class="nav-link">
                <i class="fa-solid fa-right-from-bracket" style="margin-left: 7px;"></i>
                  <p class="logout m-sm-2" style="margin-left: 7px;">Logout</p>
                </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
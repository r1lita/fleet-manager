<template>
    <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <!-- <img src="bower_components/admin-lte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <span class="brand-text font-weight-bold">Manager</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <!-- Vehicules  -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-car text-danger"></i>
              <p>
                Véhicules
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!-- <a href="/calls/list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tous les véhicules</p>
                </a> -->
                <router-link 
                  to="/vehicules"
                  class="nav-link"
                >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tous les véhicules</p>
                </router-link>
              </li>
              <li class="nav-item">
                <!-- <a href="/calls/list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tous les véhicules</p>
                </a> -->
                <router-link 
                  to="/vehicules/add"
                  class="nav-link"
                >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajouter un véhicule</p>
                </router-link>
              </li>
              <li class="nav-item">
                <a href="/callers" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Constructeurs</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Contacts -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users text-danger"></i>
              <p>
                Utilisateurs
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/calls/list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tous les utilisateurs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/callers" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Groupes</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</template>

<script>
export default {
    name: 'LeftSideBar'
}
</script>
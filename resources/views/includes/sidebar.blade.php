<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-text mx-3">MAROON</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="{{ url('/') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('activities.calendar') }}">
        <i class="fa fa-calendar"></i>
        <span>Calendar</span>
      </a>
    </li>

    @can('isAdmin')
       <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Interface
    </div>
        <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('users.index') }}">
        <i class="fas fa-users-cog"></i>
        <span>Kelola User</span>
      </a>
    </li>
    @elsecan('isKetua')
          <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Interface
    </div>
        <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('users.index') }}">
        <i class="fas fa-users-cog"></i>
        <span>Kelola User</span>
      </a>
    </li>
    @endcan

    @can('isBider')
      <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('kader.index') }}">
        <i class="fas fa-fw fa-cog"></i>
        <span>Kelola Kader</span>
      </a>
    </li>
    @elsecan('isKetua')
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('kader.index') }}">
        <i class="fas fa-fw fa-cog"></i>
        <span>Kelola Kader</span>
      </a>
    </li>
    @endcan

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapseTwo">
        <i class="far fa-calendar-alt"></i>
        <span>Activitiy</span>
      </a>
      <div id="collapse1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Custom Activity:</h6>
          <a class="collapse-item" href="{{ route('activities.index') }}">Lihat Data</a>
          <a class="collapse-item" href="{{ route('activities.create') }}">Tambah Data</a>
        </div>
      </div>
    </li>

    
   
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapseTwo">
        <i class="far fa-images"></i>
        <span>Gallery</span>
      </a>
      <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Custom gallery:</h6>
          <a class="collapse-item" href="{{ route('galleries.index') }}">Lihat Data</a>
          <a class="collapse-item" href="{{ route('galleries.create') }}">Tambah Data</a>
        </div>
      </div>
    </li>

    
   
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->
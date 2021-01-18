<div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{url('destinasi')}}" class="nav-link {{Request::is('destinasi') || Request::is('destinasi/create') || Request::is('destinasi/edit')? 'active' : ''}}">
                <i class="nav-icon fas fa-map-marked-alt"></i>
                    <p>Destinasi</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('paket')}}" class="nav-link {{Request::is('paket') || Request::is('paket/create') || Request::is('paket/edit')? 'active' : ''}}">
                <i class="nav-icon fas fa-archive"></i>
                    <p>Paket Destinasi</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('transaksi')}}" class="nav-link {{Request::is('transaksi') || Request::is('transaksi/create') || Request::is('transaksi/edit') ? 'active' : ''}}">
                <i class="nav-icon far fa-credit-card"></i>
                    <p>Transaksi</p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
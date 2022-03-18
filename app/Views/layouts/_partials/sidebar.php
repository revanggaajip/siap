    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
      <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
          <use xlink:href="assets/brand/coreui.svg#full"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
          <use xlink:href="assets/brand/coreui.svg#signet"></use>
        </svg>
      </div>
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="index.html">
          <i class="fas fa-home nav-icon"></i> Home</a>
        </li>
        <li class="nav-title">Master</li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('akun') ?>">
            <i class="fas fa-dollar-sign nav-icon"></i>Akun
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('barang') ?>">
            <i class="fas fa-box nav-icon"></i>Barang
          </a>
        </li>
        <li class="nav-title">Transaksi</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
            </svg> Notifications</a>
          <ul class="nav-group-items">
            <li class="nav-item"><a class="nav-link" href="notifications/alerts.html"><span class="nav-icon"></span> Alerts</a></li>
            <li class="nav-item"><a class="nav-link" href="notifications/badge.html"><span class="nav-icon"></span> Badge</a></li>
            <li class="nav-item"><a class="nav-link" href="notifications/modals.html"><span class="nav-icon"></span> Modals</a></li>
            <li class="nav-item"><a class="nav-link" href="notifications/toasts.html"><span class="nav-icon"></span> Toasts</a></li>
          </ul>
        </li>
        <li class="nav-divider"></li>
        <li class="nav-title">Support</li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('pengguna'); ?>">
            <i class="fas fa-users nav-icon"></i>
            Pengguna
          </a>
        </li>
      </ul>
            <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
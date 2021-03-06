    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
      <div class="sidebar-brand d-none d-md-flex logo">
        <strong>SIAP</strong>
      </div>
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="<?= base_url('/'); ?>">
          <i class="fas fa-home nav-icon"></i> Home</a>
        </li>
        <?php if(session('hak_akses_pengguna') == 'Admin') :?>
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
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('pelanggan') ?>">
            <i class="fas fa-users nav-icon"></i>Pelanggan
          </a>
        </li>   
        <li class="nav-title">Transaksi</li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('transaksi-tunai') ?>">
            <i class="fas fa-money-bill nav-icon"></i>Transaksi Tunai
          </a>
        </li>   
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('transaksi-kredit') ?>">
            <i class="fas fa-credit-card nav-icon"></i>Transaksi Kredit
          </a>
        </li>   
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('angsuran') ?>">
            <i class="fas fa-hand-holding-usd nav-icon"></i>Angsuran
          </a>
        </li>
        <li class="nav-divider"></li>
        <?php endif; ?>
        <li class="nav-title">Laporan</li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('laporan-penjualan') ?>">
            <i class="fas fa-receipt nav-icon"></i>Laporan Penjualan
          </a>
        </li>   
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('laporan-piutang') ?>">
            <i class="fas fa-money-check nav-icon"></i>Laporan Piutang
          </a>
        </li>   
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('jurnal-umum') ?>">
            <i class="fas fa-file-invoice-dollar nav-icon"></i>Jurnal Umum
          </a>
        </li>   
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('buku-besar') ?>">
            <i class="fas fa-book nav-icon"></i>Buku Besar
          </a>
        </li>   
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('neraca') ?>">
            <i class="fas fa-balance-scale nav-icon"></i>Neraca
          </a>
        </li>
        <?php if(session('hak_akses_pengguna') == 'Pemilik') : ?>   
        <li class="nav-divider"></li>
        <li class="nav-title">Support</li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('pengguna'); ?>">
            <i class="fas fa-user nav-icon"></i>
            Pengguna
          </a>
        </li>
        <?php endif; ?>
      </ul>
            <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
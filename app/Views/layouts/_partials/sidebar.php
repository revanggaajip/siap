    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
        <div class="sidebar-brand d-none d-md-flex logo">
            <strong> <?= config('App')->name; ?></strong>
        </div>
        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
            <li class="nav-item"><a class="nav-link" href="<?= base_url('/'); ?>">
                    <i class="fas fa-home nav-icon"></i> Home</a>
            </li>
            <li class="nav-title">Obat</li>
            <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                    <i class="fas fa-capsules nav-icon"></i> Master Obat</a>
                <ul class="nav-group-items">
                    <li class="nav-item"><a class="nav-link" href="<?= route_to('obat.index') ?>"> Obat</a></li>
                    <?php if(session('hak_akses_pengguna') == 'Admin') :?>
                    <li class="nav-item"><a class="nav-link" href="<?= route_to('jenis.index') ?>"> Jenis Obat</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= route_to('kategori.index') ?>"> Kategori Obat</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="<?= route_to('golongan.index') ?>"> Golongan Obat</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="<?= route_to('satuan.index') ?>"> Satuan Obat</a>
                    </li>
                    <?php endif ?>
                </ul>
            </li>
            <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                    <i class="fas fa-shopping-cart nav-icon"></i> Pengeluaran Obat</a>
                <ul class="nav-group-items">
                    <li class="nav-item"><a class="nav-link" href="<?= route_to('penjualan.create') ?>"> Input
                            Pengeluaran</a></li>
                    <?php if(session('hak_akses_pengguna') == 'Admin') :?>
                    <li class="nav-item"><a class="nav-link" href="<?= route_to('penjualan.index') ?>"> Data
                            Pengeluaran</a></li>
                    <?php endif ?>
                </ul>
            </li>
            <?php if(session('hak_akses_pengguna') == 'Admin') :?>
            <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                    <i class="fas fa-book nav-icon"></i> Penerimaan Obat</a>
                <ul class="nav-group-items">
                    <li class="nav-item"><a class="nav-link" href="<?= route_to('penerimaan.create') ?>"> Input
                            Penerimaan</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= route_to('penerimaan.index') ?>"> Data
                            Penerimaan</a></li>
                </ul>
            </li>
            <?php endif ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= route_to('opname.index') ?>">
                    <i class="fas fa-pencil-alt nav-icon"></i>Stok Opname
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= route_to('riwayat.index') ?>">
                    <i class="fas fa-history nav-icon"></i>Riwayat Stok
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= route_to('darurat.index') ?>">
                    <i class="fas fa-exclamation-triangle nav-icon"></i>Stok Darurat
                </a>
            </li>
            <li class="nav-divider"></li>
            <li class="nav-title">Penunjang</li>
            <?php if (session('hak_akses_pengguna') == 'Admin') { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= route_to('instansi.index') ?>">
                    <i class="fas fa-building nav-icon"></i>Instansi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('pengguna') ?>">
                    <i class="fas fa-users nav-icon"></i>Pengguna
                </a>
            </li>
            <?php } ?>
            <!-- <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                    <i class="fas fa-box nav-icon"></i> Non Medis</a>
                <ul class="nav-group-items">
                    <li class="nav-item"><a class="nav-link" href="<?= route_to('pengadaan.index') ?>"> Pengadaan</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="<?= route_to('knm.index') ?>">
                            Kategori</a></li>
                </ul>
            </li> -->
        </ul>
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
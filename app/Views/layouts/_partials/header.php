<header class="header header-sticky mb-4">
    <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
        <svg class="icon icon-lg">
            <use xlink:href="<?= base_url('vendors/@coreui/icons/svg/free.svg#cil-menu')?>"></use>
        </svg>
        </button><a class="header-brand d-md-none" href="#">
        <svg width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="assets/brand/coreui.svg#full')?>"></use>
        </svg></a>
        <ul class="header-nav ms-3">
        <li class="nav-item mt-2"><?= session("nama_pengguna"); ?>&nbsp;</li>    
        <li class="nav-item dropdown">
            <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-md"><img class="avatar-img" src="<?= base_url('assets/img/user.png') ?>" alt="user@email.com"></div>
            </a>
            <div class="dropdown-menu dropdown-menu-end pt-0">
                <div class="dropdown-header bg-light py-2">
                    <div class="fw-semibold">Account</div>
                </div>
                <a class="dropdown-item" href="<?= base_url('edit-password/'.session('id_pengguna')); ?>">
                    <i class="fas fa-key icon me-2"></i> Ubah Password
                </a>
                <a class="dropdown-item" href="<?= base_url('logout'); ?>">
                    <i class="fas fa-arrow-circle-left icon me-2"></i> Logout
                </a>
            </div>
        </li>
        </ul>
    </div>
    <div class="header-divider"></div>
    <?= $this->include('layouts/_partials/breadcrumb'); ?>
</header>
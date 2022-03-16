<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
            <a href="<?= $breadcrumb['mainUrl']; ?>" style="text-decoration: none;"><span><?= $breadcrumb['mainName']; ?></span></a>
            </li>
            <?php if(isset($breadcrumb['selectedMenu'])) : ?>
            <li class="breadcrumb-item active"><span><?= $breadcrumb['selectedMenu']; ?></span></li>
            <?php endif ?>
        </ol>
    </nav>
</div>
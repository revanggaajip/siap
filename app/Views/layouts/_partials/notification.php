<?php if (!empty(session()->getFlashdata('success'))) : ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashData('success') ?>
    <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<?php if (!empty($errors = session()->getFlashdata('errors'))) : ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <ul>
    <?php foreach ($errors as $error) : ?>
        <li><?= esc($error); ?></li>
    <?php endforeach; ?>
    </ul>
    <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<?php if (!empty(session()->getFlashdata('danger'))) : ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= session()->getFlashData('danger') ?>
    <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>
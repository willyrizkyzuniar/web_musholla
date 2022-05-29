<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">My Profile</h1>

    <div class="row g-0">
        <div class="col-md-2">
            <img src="<?= base_url('/img/' . user()->user_image); ?>" class="img-fluid rounded-circle" alt="<?= user()->username; ?>">
        </div>
        <div class="col-md-6">
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h4><?= user()->username ?></h4>
                    </li>
                    <?php if (user()->fullname) : ?>
                        <li class="list-group-item"><?= user()->fullname ?></li>
                    <?php endif; ?>

                    <li class="list-group-item"><?= user()->email ?></li>

                </ul>

            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>
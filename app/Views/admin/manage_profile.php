<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Manage Profile</h1>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th class=" bg-info text-white" scope="col">No</th>
                <th class=" bg-info text-white" scope="col">User Name</th>
                <th class=" bg-info text-white" scope="col">Email</th>
                <th class=" bg-info text-white" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($user as $user) : ?>
                <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $user->username; ?></td>
                    <td><?= $user->email; ?></td>
                    <td>
                        <a href="<?= base_url('admin/' . $user->userid); ?>" class="btn btn-info">detail</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>
<?= $this->endSection(); ?>
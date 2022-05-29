<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <?php if (in_groups('admin')) : ?>
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-primary" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>

        <a href="/kegiatan/create" class="btn btn-primary btn-icon-split mb-3">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Kegiatan</span>
        </a>
    <?php endif; ?>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th class=" bg-info text-white" scope="col">No</th>
                <th class=" bg-info text-white" scope="col">Nama Kegiatan</th>
                <th class=" bg-info text-white"="col">Waktu</th>
                <th class=" bg-info text-white" scope="col">Pengisi Acara</th>
                <?php if (in_groups('admin')) : ?>
                    <th href="<?= base_url('admin'); ?>" class=" bg-info text-white" scope="col">Action</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($kegiatan as $k) : ?>
                <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $k['nama_kegiatan']; ?></td>
                    <td><?= $k['waktu']; ?></td>
                    <td><?= $k['pengisi_acara']; ?></td>
                    <?php if (in_groups('admin')) : ?>
                        <td>
                            <a href="/kegiatan/<?= $k['id']; ?>" class="btn btn-success">
                                <span class="icon text-white-50">
                                    <i class="fas fa-info"></i>
                                </span>
                                <span class="text">Detail</span>
                            </a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>

</div>
<?= $this->endSection(); ?>
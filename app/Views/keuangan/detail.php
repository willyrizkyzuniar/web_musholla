<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><b>
                    <center><?= $keuangan['keterangan']; ?></center>
                </b></h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Waktu : <?= $keuangan['tgl']; ?></li>
                <li class="list-group-item"> Masuk : <?= $keuangan['masuk']; ?></li>
                <li class="list-group-item"> Keluar : <?= $keuangan['keluar']; ?></li>
                <li class="list-group-item"> Jenis : <?= $keuangan['jenis']; ?></li>
            </ul>
            <a href="/keuangan/edit/<?= $keuangan['id']; ?>" class="btn btn-warning">Ubah</a>

            <form action="/keuangan/<?= $keuangan['id']; ?>" method="post" class="d-inline">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus keuangan ini dari daftar?');">Hapus</button>
            </form>

            <a href="<?= base_url('/keuangan'); ?>" class="btn btn-info">Kembali</a>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>
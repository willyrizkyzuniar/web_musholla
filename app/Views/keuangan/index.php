<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="icon fa fa-money-check"></i><b> Total Kas : </b></h5>
                    <?php
                    $koneksi = new mysqli("localhost", "root", "", "web_musholla");
                    $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas where jenis='Masuk'");
                    while ($data = $sql->fetch_assoc()) {
                        $masuk = $data['tot_masuk'];
                    } ?>

                    <?php
                    $koneksi = new mysqli("localhost", "root", "", "web_musholla");
                    $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas where jenis='Keluar'");
                    while ($data = $sql->fetch_assoc()) {
                        $keluar = $data['tot_keluar'];
                    } ?>

                    <h2>
                        <?php
                        $saldo = $masuk - $keluar;
                        echo 'Rp. ' . $saldo;
                        ?>
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-dollar-sign"></i><b> Total Pemasukan : </b></h5>
                    <?php
                    $koneksi = new mysqli("localhost", "root", "", "web_musholla");
                    $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas where jenis='Masuk'");
                    while ($data = $sql->fetch_assoc()) {
                    ?>
                        <h2>
                        <?php echo 'Rp. ' . $data['tot_masuk'];
                    } ?>
                        </h2>
                </div>
            </div>
        </div>


        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-file-invoice-dollar"></i><b> Total Pengeluaran : </b></h5>
                    <?php
                    $koneksi = new mysqli("localhost", "root", "", "web_musholla");
                    $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas where jenis='Keluar'");
                    while ($data = $sql->fetch_assoc()) {
                    ?>
                        <h2>
                        <?php echo 'Rp. ' . $data['tot_keluar'];
                    } ?>
                        </h2>
                </div>
            </div>
        </div>
    </div>

    <?php if (in_groups('admin')) : ?>

        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-primary mt-3" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>

        <a href="/keuangan/create" class="btn btn-primary btn-icon-split mb-3 mt-3">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Data</span>
        </a>
    <?php endif; ?>

    <table class="table table-striped table-hover mt-3">
        <thead>
            <tr>
                <th class=" bg-info text-white" scope="col">No</th>
                <th class=" bg-info text-white" scope="col">Tangal</th>
                <th class=" bg-info text-white" scope="col">Keterangan</th>
                <th class=" bg-info text-white" scope="col">Masuk</th>
                <th class=" bg-info text-white" scope="col">Keluar</th>
                <?php if (in_groups('admin')) : ?>
                    <th class=" bg-info text-white" scope="col">Jenis</th>
                    <th class=" bg-info text-white" scope="col">Action</th>
                <?php endif; ?>
            </tr>

        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($keuangan as $keuangan) : ?>
                <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $keuangan['tgl']; ?></td>
                    <td><?= $keuangan['keterangan']; ?></td>
                    <td><?= $keuangan['masuk']; ?></td>
                    <td><?= $keuangan['keluar']; ?></td>
                    <?php if (in_groups('admin')) : ?>
                        <td><?= $keuangan['jenis']; ?></td>
                        <td>
                            <a href="/keuangan/<?= $keuangan['id']; ?>" class="btn btn-success">
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
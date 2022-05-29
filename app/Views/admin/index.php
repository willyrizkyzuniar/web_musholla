<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

    <div class="alert alert-info alert-dismissible" role="alert">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <marquee direction="left" scrollamount="6">
            <h4>Selamat Datang di Sistem Informasi Musholla Alhamdulillah</h4>
        </marquee>
    </div>


    <div class="container">
        <div class="row justify-content-evenly">
            <div class="col-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-primary text-uppercase">
                                    Daftar Kegiatan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">

                                </div>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url('/kegiatan'); ?>">
                                    <i class="fas fa-calendar-check fa-3x text-gray-300"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-primary text-uppercase">
                                    Daftar Keuangan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">

                                </div>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url('/keuangan'); ?>">
                                    <i class="icon fa fa-money-check fa-3x text-gray-300"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>
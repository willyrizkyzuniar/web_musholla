<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<h2 class="ml-3 mb-3">Form Ubah Daftar Kegiatan</h2>

<div class="container-fluid">
    <div class="col">

        <form class="ml-2" action="/kegiatan/update/<?= $kegiatan['id']; ?>" method="post">
            <?= csrf_field(); ?>

            <div class="row mb-3">
                <label for="nama_kegiatan" class="col-sm-2 col-form-label">Nama Kegiatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('nama_kegiatan')) ? 'is-invalid' : '' ?>" id="nama_kegiatan" name="nama_kegiatan" autofocus value="<?= $kegiatan['nama_kegiatan']; ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('nama_kegiatan'); ?>
                    </div>
                </div>
            </div>


            <div class=" row mb-3">
                <label for="pengisi_acara" class="col-sm-2 col-form-label">Pengisi Acara</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('pengisi_acara')) ? 'is-invalid' : '' ?>" id="pengisi_acara" name="pengisi_acara" value="<?= $kegiatan['pengisi_acara']; ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('pengisi_acara'); ?>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="waktu" class="col-sm-2 col-form-label">Waktu Kegiatan</label>
                <div class="col-sm-10">
                    <input type="datetime-local" class="form-control" id="waktu" name="waktu" value="<?= $kegiatan['waktu']; ?>">
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<h2 class="ml-2">Form Tambah Data Kas</h2>

<div class="container-fluid">
    <div class="col">

        <form class="ml-2" action="/keuangan/save" method="post">
            <?= csrf_field(); ?>

            <div class="row mb-3">
                <label for="tgl" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control <?= ($validation->hasError('tgl')) ? 'is-invalid' : '' ?>" id="tgl" name="tgl" autofocus value="<?= old('tgl'); ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('tgl'); ?>
                    </div>
                </div>
            </div>


            <div class=" row mb-3">
                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : '' ?>" id="keterangan" name="keterangan" value="<?= old('keterangan'); ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('keterangan'); ?>
                    </div>
                </div>
            </div>

            <div class=" row mb-3">
                <label for="masuk" class="col-sm-2 col-form-label">Masuk</label>
                <div class="col-sm-10">
                    <input type="int" class="form-control <?= ($validation->hasError('masuk')) ? 'is-invalid' : '' ?>" id="masuk" name="masuk" value="<?= old('masuk'); ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('masuk'); ?>
                    </div>
                </div>
            </div>

            <div class=" row mb-3">
                <label for="keluar" class="col-sm-2 col-form-label">Keluar</label>
                <div class="col-sm-10">
                    <input type="int" class="form-control <?= ($validation->hasError('keluar')) ? 'is-invalid' : '' ?>" id="keluar" name="keluar" value="<?= old('keluar'); ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('keluar'); ?>
                    </div>
                </div>
            </div>

            <div class=" row mb-3">
                <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('jenis')) ? 'is-invalid' : '' ?>" id="jenis" name="jenis" value="<?= old('jenis'); ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('jenis'); ?>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>
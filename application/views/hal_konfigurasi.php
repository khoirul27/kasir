<div class="card">
    <h5 class="card-header">Konfigurasi</h5>
    <form action="<?= base_url('konfigurasi/edit') ?>" method="post">
        <div class="card-body row">
            <div class="col-4">
                <label for="defaultFormControlInput" class="form-label">Nama usaha</label>
                <input name="nama_usaha" type="text" class="form-control" value="<?= $konfigurasi->nama_usaha ?>" />
            </div>
            <div class="col-4">
                <label for="defaultFormControlInput" class="form-label">No telfon</label>
                <input name="no_telfon" type="text" class="form-control" value="<?= $konfigurasi->no_telfon ?>" />
            </div>
            <div class="col-4">
                <label for="defaultFormControlInput" class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" aria-label="With textarea"><?= $konfigurasi->alamat ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary mx-3" style="width: 100px;"> ubah </button>
        </div>
    </form>
</div>
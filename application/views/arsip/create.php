<div class="m-3">
    <h2>Arsip Surat >> Unggah</h2>
    <p class="w-50">Unggah surat yang telah terbit pada form ini untuk diarsipkan. Catatan: </p>
    <div class="mx-4">
        <li>Gunakan file berformat pdf.</li>
    </div>
    <?= $this->load->view('alert', null, true);
    ?>
    <hr>
    <form action="<?= base_url('arsip/tambah') ?>" method="POST" enctype="multipart/form-data" class="container">
        <div class="form-group">
            <label for="nomorsurat">Nomor Surat</label>
            <input type="text" style="text-transform: uppercase;" class="form-control" name="nomorsurat" id="nomorsurat" aria-describedby="nosurid" placeholder="Nomor surat" required>
            <small id="nosurid" class="form-text text-danger"><?= form_error('nomorsurat') ?></small>
        </div>
        <div class="form-group">
            <label for="">Kategori</label>
            <select class="form-control" name="kategori" required>
                <option disabled selected value hidden>Pilih kategori surat</option>
                <?php foreach (['Undangan', 'Pengumuman', 'Nota Dinas', 'Pemberitahuan'] as $key => $value) { ?>
                    <option value="<?= $value ?>"><?= $value ?></option>
                <?php } ?>
            </select>
            <small id="nosurid" class="form-text text-danger"><?= form_error('kategori') ?></small>
        </div>
        <div class="form-group">
            <label for="judulsurat">Judul Surat</label>
            <input type="text" class="form-control" name="judulsurat" id="judulsurat" aria-describedby="jdlsuid" placeholder="Judul surat" required>
            <small id="jdlsuid" class="form-text text-danger"><?= form_error('judulsurat') ?></small>
        </div>
        <div class="form-group">
            <label for="file">File Surat (pdf)</label>
            <input type="file" class="form-control-file" name="file" id="file" placeholder="" aria-describedby="fileid" required>
        </div>
        <div class="py-4">
            <a class="btn btn-danger" href="<?= base_url('arsip') ?>" role="button">Kembali </a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
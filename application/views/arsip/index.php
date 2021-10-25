<div class="m-3">
    <h2>Arsip Surat</h2>
    <p class="w-51">Berikut ini adalah surat-surat yang telah terbit dan diarsipkan. Klik "Lihat" pada kolom aksi untuk menampilkan surat</p>
	
	<?= $this->load->view('alert', null, TRUE);
    ?>
    <hr>
    <table class="table table-bordered" id="datatables">
        <thead>
            <tr>
                <th>Nomor Surat</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Waktu Pengarsipan</th>
                <th style="width: 27%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($arsipData as $key => $value) { ?>
                <tr>
                    <td style="text-transform: uppercase;" scope="row"><?= $value['nomor_surat'] ?></td>
                    <td><?= $value['kategori'] ?></td>
                    <td><?= $value['judul_surat'] ?></td>
                    <td><?= $value['createdAt'] ?></td>
                    <td>
                        <button class="btn btn-sm btn-danger" onclick="deleteModal(<?= $value['id_arsip'] ?>)" role="button">Hapus</button>
                        <a class="btn btn-sm btn-warning" href="<?= base_url('arsip/download/' . $value['id_arsip']) ?>" role="button">Unduh</a>
                        <a class="btn btn-sm btn-primary" href="<?= base_url('arsip/detail/' . $value['id_arsip']) ?>" role="button">Lihat</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="py-4">
        <a class="btn btn-success" href="<?= base_url('arsip/tambah') ?>" role="button">Arsipkan Surat</a>
    </div>
</div>


<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('arsip/delete') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Peringatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin menghapus arsip surat ini.</p>
                    <input id="idarsipdelete" name="idarsip" type="text" hidden>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

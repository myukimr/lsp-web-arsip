<div class="m-3">
    <h2>Arsip Surat >> Lihat</h2>
    <?= $this->load->view('alert', null, true) ?>
    <table>
        <tbody>
            <tr>
                <td scope="row"><strong>Nomor Surat</strong></td>
                <td>:</td>
                <td style="text-transform: uppercase;"><?= $arsipData->nomor_surat ?></td>
            </tr>
            <tr>
                <td scope="row"><strong>Kategori</strong></td>
                <td>:</td>
                <td><?= $arsipData->kategori ?></td>
            </tr>
            <tr>
                <td scope="row"><strong>Judul surat</strong></td>
                <td>:</td>
                <td><?= $arsipData->judul_surat ?></td>
            </tr>
            <tr>
                <td scope="row"><strong>Waktu unggah</strong></td>
                <td>:</td>
                <td><?= $arsipData->updatedAt ?></td>
            </tr>
        </tbody>
    </table>
    <iframe class="mt-3" src="<?= base_url("upload/" . $arsipData->nama_file) ?>" width="100%" height="550px"></iframe>
    <div>
        <a name="" id="" class="btn btn-secondary" href="<?= base_url('/') ?>" role="button">Kembali</a>
        <a name="" id="" class="btn btn-success" href="<?= base_url('arsip/download/' . $arsipData->id_arsip) ?>" role="button">Unduh</a>
        <a name="" id="" class="btn btn-primary" href="<?= base_url('arsip/edit/' . $arsipData->id_arsip) ?>" role="button">Edit/Ganti File</a>
    </div>
</div>
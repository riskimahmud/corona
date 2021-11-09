<?php if ($pasien->status == "aktif") : ?>
    <div class="alert alert-info">
        <h5 class="bolder">Update Status Pasien</h5>
        <?= form_open('update-data-pasien', ["autocomplete" => "off"]); ?>
        <?= form_hidden('id_pasien', $pasien->id_pasien); ?>
        <div class="row-fluid">
            <div class="span6 alert-warning">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="">Status</option>
                    <option value="sembuh">Sembuh</option>
                    <option value="meninggal">Meninggal</option>
                </select>
            </div>
            <div class="span6">
                <label for="tgl_update">Tanggal</label>
                <input class="date-picker form-control" name="tgl_update" id="tgl_update" type="text" data-date-format="yyyy-mm-dd" placeholder="Tanggal" required />
            </div>
            <div class="span12">
                <button class="btn btn-small btn-primary">Simpan</button>
            </div>
        </div>
    </div>
    <?= form_close(); ?>
<?php endif; ?>
<table class="table no-padding">
    <tr>
        <td>Status</td>
        <td>
            <?php if ($pasien->status == "aktif") {
                $label = "primary";
            } elseif ($pasien->status == "sembuh") {
                $label = "success";
            } else {
                $label = "important";
            } ?>
            <span class="label label-<?= $label; ?>"><?= strtoupper($pasien->status); ?></span>
        </td>
    </tr>
    <tr>
        <td>NIK</td>
        <td><b><?= $pasien->nik; ?></b></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td><b><?= $pasien->nama; ?></b></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td><b><?= $pasien->jenis_kelamin; ?></b></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td><b><?= $pasien->alamat; ?></b></td>
    </tr>
    <tr>
        <td>Kelurahan</td>
        <td><b><?= $pasien->kelurahan; ?></b></td>
    </tr>
    <tr>
        <td>Puskesmas</td>
        <td><b><?= $pasien->puskesmas; ?></b></td>
    </tr>
    <tr>
        <td>Tempat Perawatan</td>
        <td><b><?= $tempat_rawat->nama_tempat_rawat; ?></b></td>
    </tr>
    <tr>
        <td>Nilai CT</td>
        <td><b><?= $pasien->nilai_ct; ?></b></td>
    </tr>
    <tr>
        <td>Cluster</td>
        <td><b><?= $pasien->cluster; ?></b></td>
    </tr>
    <tr>
        <td>Tanggal Positif</td>
        <td><b><?= tgl_indonesia($pasien->tgl_masuk); ?></b></td>
    </tr>
    <?php if ($pasien->status != "aktif") : ?>
        <tr>
            <td>Tanggal <?= ucfirst($pasien->status); ?></td>
            <td><b><?= tgl_indonesia($pasien->tgl_keluar); ?></b></td>
        </tr>
    <?php endif; ?>
</table>
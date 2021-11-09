<table class="table no-padding">
    <tr>
        <td>No. Tiket</td>
        <td><b><?= $vaksin->tiket; ?></b></td>
    </tr>
    <tr>
        <td>NIK</td>
        <td><b><?= $vaksin->nik; ?></b></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td><b><?= $vaksin->nama; ?></b></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td><b><?= $vaksin->jenis_kelamin; ?></b></td>
    </tr>
    <tr>
        <td>Provinsi</td>
        <td><b><?= $vaksin->provinsi; ?></b></td>
    </tr>
    <tr>
        <td>Kabupaten / Kota</td>
        <td><b><?= $vaksin->kabupaten; ?></b></td>
    </tr>
    <tr>
        <td>Fasilitas Kesehatan</td>
        <td><b><?= $vaksin->faskes; ?></b></td>
    </tr>
    <tr>
        <td>Kelompok Usia</td>
        <td><b><?= $vaksin->kelompok_usia; ?></b></td>
    </tr>
    <tr>
        <td>Kategori</td>
        <td>
            <b>
                <?= $vaksin->kategori; ?>
                <?= ($vaksin->sub_kategori != "") ? "> $vaksin->sub_kategori" : "" ?>
            </b>
        </td>
    </tr>
    <tr>
        <td>Dosis</td>
        <td><b><?= $vaksin->dosis; ?></b></td>
    </tr>
    <tr>
        <td>Jenis Vaksin</td>
        <td><b><?= $vaksin->jenis_vaksin; ?></b></td>
    </tr>
</table>
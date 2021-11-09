<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-header widget-header-large">
                <h4>Daftar</h4>

                <div class="widget-toolbar">
                    <a href="<?= site_url('import-pasien-vaksinasi') ?>">
                        <i class="icon-plus-sign-alt"></i> Import
                    </a>
                </div>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <div class="table-responsive">

                        <table class="table table-hover" id="datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal <small>(yyyy-mm-dd)</small></th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Dosis</th>
                                    <th>Jenis Vaksin</th>
                                    <th>No. Tiket</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data as $d) :
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $d->tanggal; ?></td>
                                        <td><?= $d->nama; ?></td>
                                        <td><?= $d->jenis_kelamin; ?></td>
                                        <td><?= $d->dosis; ?></td>
                                        <td><?= $d->jenis_vaksin; ?></td>
                                        <td><?= $d->tiket; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-mini btn-primary detailVaksin" data-idvaksin="<?= $d->id_vaksin; ?>" title="Detail">
                                                    <i class="icon-list"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
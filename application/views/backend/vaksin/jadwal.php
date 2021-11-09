<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-header widget-header-large">
                <h4>Daftar</h4>

                <div class="widget-toolbar">
                    <a href="<?= site_url('tambah-jadwal') ?>">
                        <i class="icon-plus-sign-alt"></i> Tambah
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
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Penyelenggara</th>
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
                                        <td>
                                            <?= ($d->lama == "1") ? tgl_laporan($d->tanggal) : tgl_laporan($d->tanggal) . " - " . tgl_laporan(date('Y-m-d', strtotime("+" . ($d->lama - 1) . " day", strtotime($d->tanggal)))); ?>
                                        </td>
                                        <td>
                                            <?= substr($d->dari_jam, 0, 5); ?> - <?= ($d->sampai_jam === NULL) ? 'Selesai' : substr($d->sampai_jam, 0, 5); ?>
                                        </td>
                                        <td><?= $d->penyelenggara; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="ubah-jadwal/<?= $d->id_jadwal_vaksin; ?>" class="btn btn-mini btn-warning" title="Ubah">
                                                    <i class="icon-edit"></i>
                                                </a>
                                                <a href="hapus-jadwal/<?= $d->id_jadwal_vaksin; ?>" class="btn btn-mini btn-danger delete" title="Hapus">
                                                    <i class="icon-trash"></i>
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

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-large" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title bold" id="exampleModalLabel">Detail Pasien</h5>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-small" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
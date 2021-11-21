<div class="row-fluid">
    <div class="span12">
        <div class="">
            <a href="<?= site_url('pasien-semua') ?>" class="btn btn-small btn-inverse">Semua</a>
            <a href="<?= site_url('pasien-aktif') ?>" class="btn btn-small btn-primary">Aktif</a>
            <a href="<?= site_url('pasien-sembuh') ?>" class="btn btn-small btn-success">Sembuh</a>
            <a href="<?= site_url('pasien-meninggal') ?>" class="btn btn-small btn-danger">Meninggal</a>
            <a href="<?= site_url('pasien-checkup') ?>" class="btn btn-small btn-info">Masuk Masa Check <span class="badge badge-info"><?= $expire; ?></span></a>
        </div>
        <div class="space-6"></div>
        <div class="widget-box">
            <div class="widget-header widget-header-large">
                <h4>Daftar</h4>

                <div class="widget-toolbar">
                    <!-- <a href="<?= site_url('import-pasien'); ?>">
                        <i class="icon-plus-sign-alt"></i> Import
                    </a>
                    &nbsp; -->
                    <a href="<?= site_url('tambah-pasien'); ?>">
                        <i class="icon-plus-sign-alt"></i> Tambah
                    </a>
                </div>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <form class="form-search" action="<?= base_url('pasien'); ?>" method="POST">
                        <input type="text" class="input-large search-query" placeholder="Cari Nama" autofocus autocomplete="off" name="keyword_covid" value="<?= set_value('keyword_covid', ($this->session->userdata('keyword_covid') !== null) ? $this->session->userdata('keyword_covid') : ''); ?>" />
                        <button type="submit" class="btn btn-primary btn-small" name="submit" value="submit">
                            Cari
                            <i class="icon-search icon-on-right"></i>
                        </button>
                        <?php if ($this->session->userdata("keyword_covid") !== null) : ?>
                            <a href="batal-cari-pasien" class="btn btn-danger btn-small">
                                Batalkan Pencarian
                                <i class="icon-trash icon-on-right"></i>
                            </a>
                        <?php endif; ?>
                    </form>
                    <hr class="space-10">
                    <h5>Jumlah Data : <?= $total_rows; ?></h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Kelurahan</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Umur</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // $no = 1;
                                foreach ($data as $d) :
                                    if ($d->status == "aktif") {
                                        $label = "primary";
                                    } elseif ($d->status == "sembuh") {
                                        $label = "success";
                                    } else {
                                        $label = "important";
                                    }
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $d->nik; ?></td>
                                        <td><?= $d->nama; ?></td>
                                        <td><?= $d->alamat; ?></td>
                                        <td><?= $d->kelurahan; ?></td>
                                        <td><?= $d->jenis_kelamin; ?></td>
                                        <td><?= $d->umur; ?></td>
                                        <td>
                                            <span class="label label-<?= $label; ?>"><?= strtoupper($d->status); ?></span>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-mini btn-primary detailPasien" data-idpasien="<?= $d->id_pasien; ?>" title="Detail">
                                                    <i class="icon-list"></i>
                                                </a>
                                                <a href="ubah-pasien/<?= $d->id_pasien; ?>" class="btn btn-mini btn-warning" title="Ubah">
                                                    <i class="icon-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <div class="text-center">
                            <?php echo $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<!-- <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-large" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title bold" id="exampleModalLabel"></h5>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-small" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div> -->
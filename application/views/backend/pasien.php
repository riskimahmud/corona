<div class="row-fluid">
    <div class="span12">
        <div class="">
            <a href="<?= site_url('pasien') ?>" class="btn btn-small btn-inverse">Semua</a>
            <a href="<?= site_url('pasien/aktif') ?>" class="btn btn-small btn-primary">Aktif</a>
            <!-- <a href="<?= site_url('pasien/sembuh') ?>" class="btn btn-small btn-success">Sembuh</a>
            <a href="<?= site_url('pasien/meninggal') ?>" class="btn btn-small btn-danger">Menginggal</a> -->
            <a href="<?= site_url('pasien/checkup') ?>" class="btn btn-small btn-info">Masuk Masa Check <span class="badge badge-info"><?= $expire; ?></span></a>
        </div>
        <div class="space-6"></div>
        <!-- <div id="accordion2" class="accordion">
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a href="#collapseOne" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">
                        Sortir Data
                    </a>
                </div>

                <div class="accordion-body collapse" id="collapseOne">
                    <div class="accordion-inner">
                        <?= form_open('', ['class' => 'form-horizontal']); ?>
                        <div class="row">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label" for="jenis_kelamin">Jenis Kelamin</label>

                                    <div class="controls span6">
                                        <select name="jenis_kelamin" id="jenis_kelamin">
                                            <option value="">- Semua -</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="umur">Umur</label>

                                    <div class="controls span6">
                                        <select name="umur" id="umur">
                                            <option value="">- Semua -</option>
                                            <option value="1">0 - 12 Tahun</option>
                                            <option value="2">13 - 25 Tahun</option>
                                            <option value="3">25 - 45 Tahun</option>
                                            <option value="4">45 Tahun Keatas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="tempat_rawat">Tempat Rawat</label>

                                    <div class="controls span6">
                                        <select name="tempat_rawat" id="tempat_rawat">
                                            <option value="">- Semua -</option>
                                            <?php foreach ($tempat_rawat as $tem) : ?>
                                                <option value="<?= $tem->nama_tempat_rawat; ?>" <?= set_select('kelurahan', $tem->nama_tempat_rawat) ?>><?= $tem->nama_tempat_rawat; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label" for="kelurahan">Kelurahan</label>

                                    <div class="controls">
                                        <select class="chzn-select" name="kelurahan" id="kelurahan" data-placeholder="Semua">
                                            <option value=""></option>
                                            <?php foreach ($kelurahan as $kel) : ?>
                                                <option value="<?= $kel->nama_kelurahan; ?>" <?= set_select('kelurahan', $kel->nama_kelurahan) ?>><?= $kel->nama_kelurahan . " - " . $kel->kecamatan; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php echo form_error('kelurahan'); ?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="puskesmas">Puskesmas</label>

                                    <div class="controls span6">
                                        <select name="puskesmas" id="puskesmas">
                                            <option value="">- Semua -</option>
                                            <?php foreach ($puskesmas as $pus) : ?>
                                                <option value="<?= $pus->nama_puskesmas; ?>" <?= set_select('kelurahan', $pus->nama_puskesmas) ?>><?= $pus->nama_puskesmas; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="span12">
                                <button class="btn btn-primary btn-small" type="submit">
                                    <i class="icon-filter bigger-110"></i>
                                    Sortir
                                </button>
                                &nbsp; &nbsp; &nbsp;
                                <button class="btn btn-small" type="reset">
                                    <i class="icon-undo bigger-110"></i>
                                    Reset
                                </button>
                            </div>
                            <div class="space-20"></div>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="space-3"></div> -->
        <div class="widget-box">
            <div class="widget-header widget-header-large">
                <h4>Daftar</h4>

                <div class="widget-toolbar">
                    <a href="<?= site_url('tambah-pasien'); ?>">
                        <i class="icon-plus-sign-alt"></i> Tambah
                    </a>
                </div>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <div class="table-responsive">

                        <table class="table table-hover" id="tablePasien">
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
                                $no = 1;
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
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
                    <form class="form-search" action="<?= base_url('pasien-vaksinasi'); ?>" method="POST">
                        <input type="text" class="input-large search-query" placeholder="Cari Nama / Nomor Tiket" autofocus autocomplete="off" name="keyword" value="<?= set_value('keyword', ($this->session->userdata('keyword') !== null) ? $this->session->userdata('keyword') : ''); ?>" />
                        <button type="submit" class="btn btn-primary btn-small" name="submit" value="submit">
                            Cari
                            <i class="icon-search icon-on-right"></i>
                        </button>
                        <?php if ($this->session->userdata("keyword") !== null) : ?>
                            <a href="semua-pasien-vaksinasi" class="btn btn-danger btn-small">
                                Semua Data
                                <i class="icon-table icon-on-right"></i>
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
                                    <th>Tanggal <small>(yyyy-mm-dd)</small></th>
                                    <th>Nama</th>
                                    <th class="hidden-phone">Jenis Kelamin</th>
                                    <th>Dosis</th>
                                    <th>Jenis Vaksin</th>
                                    <th class="hidden-phone">No. Tiket</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($data)) : ?>
                                    <tr>
                                        <td colspan="8">
                                            <div class="alert alert-danger">Data Tidak Ditemukan!</div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <?php
                                // $no = $no;
                                foreach ($data as $d) :
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $d->tanggal; ?></td>
                                        <td><?= $d->nama; ?></td>
                                        <td class="hidden-phone"><?= $d->jenis_kelamin; ?></td>
                                        <td><?= $d->dosis; ?></td>
                                        <td><?= $d->jenis_vaksin; ?></td>
                                        <td class="hidden-phone"><?= $d->tiket; ?></td>
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

                        <div class="text-center">
                            <?php echo $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
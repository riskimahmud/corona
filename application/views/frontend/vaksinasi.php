<header class="header-base" style="background-image: url(<?php echo base_url(); ?>/assets_front/img/header.png);">
    <div class="container">
        <h1><?= $title; ?></h1>
        <h2><?= (!empty($subtitle)) ? $subtitle : ''; ?></h2>
    </div>
</header>
<main>
    <section class="section-base">
        <div class="container">
            <table class="table table-grid table-border no-padding-y align-left table-full-sm">
                <tbody>
                    <tr>
                        <td>
                            <div class="icon-box icon-box-left justify-content-center">
                                <i class="im-medicine text-lg"></i>
                                <div class="caption">
                                    <h3 class="text-sm">Dosis 1</h3>
                                    <p><?= (!empty($dosis1)) ? $dosis1->jumlah : 0; ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="icon-box icon-box-left justify-content-center">
                                <i class="im-medicine-2 text-lg"></i>
                                <div class="caption">
                                    <h3 class="text-sm">Dosis 2</h3>
                                    <p><?= (!empty($dosis2)) ? $dosis2->jumlah : 0; ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="icon-box icon-box-left justify-content-center">
                                <i class="im-medicine-3 text-lg"></i>
                                <div class="caption">
                                    <h3 class="text-sm">Dosis 3</h3>
                                    <p><?= (!empty($dosis3)) ? $dosis3->jumlah : 0; ?></p>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <table class="table table-border table-price">
                <thead>
                    <tr>
                        <th>Jenis Vaksin</th>
                        <th>Dosis 1</th>
                        <th>Dosis 2</th>
                        <th>Dosis 3</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sebaran as $s) : ?>
                        <tr>
                            <td><?= $s->jenis_vaksin; ?></td>
                            <td><?= $s->dosis1; ?></td>
                            <td><?= $s->dosis2; ?></td>
                            <td><?= $s->dosis3; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php if (!empty($jadwal)) : ?>
                <hr>
                <h2 class="align-center margin-2">Jadwal Vaksinasi</h2>
                <hr class="space" />
                <div class="grid-list" data-columns="3" data-columns-md="2" data-columns-sm="1">
                    <div class="grid-box">
                        <?php foreach ($jadwal as $j) : ?>
                            <div class="grid-item">
                                <div class="cnt-box cnt-box-blog-top boxed" data-href="#">
                                    <a id="scroll-box-trigger" href="#scroll-box-<?= $j->id_jadwal_vaksin; ?>" class=" img-box lightbox full-width detailJadwal" data-lightbox-anima="fade-in">
                                        <div class="blog-date">
                                            <span><?= tanggal($j->tanggal); ?></span>
                                            <span><?= bulan($j->tanggal); ?> <?= tahun($j->tanggal); ?></span>
                                        </div>
                                        <img src="<?= base_url("assets_front/img/bg-jadwal.png"); ?>" alt="" />
                                    </a>
                                    <div class="caption">
                                        <ul class="icon-list text-bold">
                                            <li><i class="im-calendar"></i><?= ($j->lama == "1") ? tgl_laporan($j->tanggal) : tgl_laporan($j->tanggal) . " - " . tgl_laporan(date('Y-m-d', strtotime("+" . ($j->lama - 1) . " day", strtotime($j->tanggal)))); ?></li>
                                            <li><i class="im-clock"></i><?= substr($j->dari_jam, 0, 5); ?> - <?= ($j->sampai_jam === NULL) ? 'Selesai' : substr($j->sampai_jam, 0, 5); ?></li>
                                            <li><i class="im-location"></i><?= $j->tempat; ?></li>
                                            <li><i class="im-doctor"></i><?= $j->penyelenggara; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div id="scroll-box-<?= $j->id_jadwal_vaksin; ?>" class="box-lightbox">
                                <div class="scroll-box" data-height="400" data-rail-color="#c3dff7" data-bar-color="#379cf4">
                                    <?= $j->keterangan; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>
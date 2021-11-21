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
                            <div class="icon-box icon-box-left">
                                <i class="im-bar-chart text-lg" style="color:#47B2E4"></i>
                                <div class="caption">
                                    <h3 class="text-sm">Jumlah Kasus</h3>
                                    <p><?= titik_angka($kasus); ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="icon-box icon-box-left">
                                <i class="im-depression text-lg" style="color:black"></i>
                                <div class="caption">
                                    <h3 class="text-sm">Aktif</h3>
                                    <p><?= titik_angka($aktif); ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="icon-box icon-box-left">
                                <i class="im-crying text-lg" style="color:red"></i>
                                <div class="caption">
                                    <h3 class="text-sm">Meninggal</h3>
                                    <p><?= titik_angka($meninggal); ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="icon-box icon-box-left">
                                <i class="im-happy text-lg" style="color:green"></i>
                                <div class="caption">
                                    <h3 class="text-sm">Sembuh</h3>
                                    <p><?= titik_angka($sembuh); ?></p>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <table id="datatable" class="table table-border table-full-sm">
                <thead>
                    <tr>
                        <th>Faskes</th>
                        <th>Aktif</th>
                        <th>Meninggal</th>
                        <th>Sembuh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sebaran as $s) : ?>
                        <tr>
                            <td><?= $s->nama_puskesmas; ?></td>
                            <td><?= $s->aktif; ?></td>
                            <td><?= $s->meninggal; ?></td>
                            <td><?= $s->sembuh; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>
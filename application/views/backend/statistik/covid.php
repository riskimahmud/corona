<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-body">
                <div class="widget-main">
                    <h3>Cari Berdasarkan :</h3>
                    <!-- <form class="form-horizontal" action="" method="POST"> -->
                    <?= form_open('', ['class' => '', 'autocomplete' => 'off']); ?>
                    <div class="row-fluid">
                        <div class="span3">
                            <div class="control-group">
                                <label class="control-label" for="dari_tanggal">Dari Tanggal</label>

                                <div class="controls">
                                    <div class="row-fluid input-append">
                                        <input class="date-picker" name="dari_tanggal" id="dari_tanggal" type="text" data-date-format="yyyy-mm-dd" value="<?= (isset($dari)) ? $dari : ''; ?>" required />
                                        <span class="add-on">
                                            <i class="icon-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="control-group">
                                <label class="control-label" for="sampai_tanggal">Sampai Tanggal</label>

                                <div class="controls">
                                    <div class="row-fluid input-append">
                                        <input class="date-picker" name="sampai_tanggal" id="sampai_tanggal" type="text" data-date-format="yyyy-mm-dd" value="<?= (isset($sampai)) ? $sampai : ''; ?>" required />
                                        <span class="add-on">
                                            <i class="icon-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-small" name="submit" value="submit">
                        Cari
                        <i class="icon-search icon-on-right"></i>
                    </button>
                    <?= form_close() ?>
                    <!-- </form> -->

                </div>
            </div>
        </div>

        <div class="space-10"></div>
        <?php if (isset($cari)) : ?>
            <div class="widget-box margin-5">
                <div class="widget-body">
                    <div class="widget-main">
                        <div class="alert alert-info">
                            <h4>Info Pencarian</h4>
                            <p>
                                Dari Tanggal : <b><?= tgl_indonesia($dari); ?></b> Sampai : <b><?= tgl_indonesia($sampai) ?></b>
                            </p>
                        </div>

                        <div class="space-10"></div>

                        <div class="row-fluid">
                            <div id="pie" class="span6" style="height:400px;"></div>
                            <div id="column" class="span6" style="height:400px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php if (isset($cari)) : ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Highcharts.setOptions({
            //     colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
            // });

            const pie = Highcharts.chart('pie', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie',
                    styledMode: true
                },
                title: {
                    text: 'Statistik Pasien Covid 19'
                },
                subtitle: {
                    text: 'Total Kasus <b><?= count($kasus); ?></b>'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.0f}%</b> <br> {point.y} Orang'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>:<br>{point.percentage:.0f} %<br>{point.y} Orang',
                        },
                        showInLegend: false
                    }
                },
                series: [{
                    name: 'Status',
                    // colorByPoint: true,
                    data: [{
                            name: 'Aktif',
                            y: <?= count($aktif); ?>,
                        }, {
                            name: 'Sembuh',
                            y: <?= count($sembuh); ?>,
                        },
                        {
                            name: 'Meninggal',
                            y: <?= count($meninggal); ?>,
                            // y: <?= round((count($meninggal) * 100) / count($kasus)); ?>,
                        }
                    ]
                }]
            });

            const column = Highcharts.chart('column', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Statistik Berdasarkan Puskesmas'
                },
                subtitle: {
                    text: 'Source: corona.gorontalokota.go.id'
                },
                xAxis: {
                    categories: <?= json_encode($nm_puskes); ?>,
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Orang'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.0f} Orang</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 5
                    }
                },
                series: <?= json_encode($column_stat); ?>
            });
        });
    </script>
<?php endif; ?>
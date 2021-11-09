<div class="row-fluid">
    <?php
    $aksi    =    get_value("a");
    $id        =    get_value("id");
    switch ($aksi) {
        case "add":
            // echo "add page";
    ?>
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4><i class="icon-plus"></i> Tambah <?php echo $label; ?></h4>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="row-fluid">
                                <form class="form-horizontal" action="<?php echo site_url($base . "/tambah_aksi"); ?>" method="POST" autocomplete="off" />
                                <div class="control-group">
                                    <label class="control-label">Nama</label>

                                    <div class="controls">
                                        <input type="text" class="span4" name="nama_tempat_rawat" placeholder="Nama" required />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Kuota</label>

                                    <div class="controls">
                                        <input type="text" class="span1" name="kuota" placeholder="Kuota" required />
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-small btn-inverse">
                                        Simpan
                                        <i class="icon-arrow-right icon-on-right bigger-110"></i>
                                    </button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            break;

        case "edit":
            $row    =    ambil_data_by_id_row($tabel, $key, $id);
        ?>
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4><i class="icon-pencil"></i> Edit <?php echo $label; ?></h4>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="row-fluid">
                                <form class="form-horizontal" action="<?php echo site_url($base . "/perbarui_aksi"); ?>" method="POST" enctype="multipart/form-data" autocomplete="off" />
                                <input type="hidden" class="span12" id="form-field-1" name="id" value="<?php echo $row->$key; ?>" />
                                <div class="control-group">
                                    <label class="control-label">Nama</label>

                                    <div class="controls">
                                        <input type="text" class="span4" name="nama_tempat_rawat" placeholder="Nama" value="<?php echo $row->nama_tempat_rawat; ?>" required />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Kuota</label>

                                    <div class="controls">
                                        <input type="text" class="span1" name="kuota" placeholder="Kuota" value="<?php echo $row->kuota; ?>" required />
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-small btn-inverse">
                                        Simpan
                                        <i class="icon-arrow-right icon-on-right bigger-110"></i>
                                    </button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            break;

        default:
        ?>
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4><i class="icon-list"></i> Daftar <?php echo $label; ?></h4>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="row-fluid">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Kuota</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no    =    1;
                                        foreach ($data as $d) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no; ?>
                                                </td>
                                                <td><?php echo $d->nama_tempat_rawat; ?></td>
                                                <td><?php echo $d->kuota; ?></td>
                                                <td>
                                                    <a class="btn btn-inverse btn-mini" href="?a=edit&id=<?php echo $d->id_tempat_rawat; ?>">Edit</a>
                                                </td>
                                            </tr>
                                        <?php
                                            $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
<?php
            break;
    }
?>
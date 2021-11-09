<div class="row-fluid">
    <div class="span12">
        <?= form_open('', ['class' => 'form-horizontal']); ?>
        <div class="control-group <?= form_error('nik') ? 'error' : ''; ?>">
            <label class="control-label" for="nik">NIK</label>

            <div class="controls">
                <input type="text" name="nik" id="nik" placeholder="NIK" value="<?php echo set_value('nik'); ?>" class="span4" autofocus />
                <?php echo form_error('nik'); ?>
            </div>
        </div>

        <div class="control-group <?= form_error('nama') ? 'error' : ''; ?>">
            <label class="control-label" for="nama">Nama</label>

            <div class="controls">
                <input type="text" name="nama" id="nama" placeholder="Nama" value="<?php echo set_value('nama'); ?>" class="span6" />
                <?php echo form_error('nama'); ?>
            </div>
        </div>

        <div class="control-group <?= form_error('jenis_kelamin') ? 'error' : ''; ?>">
            <label class="control-label" for="jenis_kelamin">Jenis Kelamin</label>

            <div class="controls">
                <label>
                    <input type="radio" name="jenis_kelamin" value="Laki-laki" <?= set_radio('jenis_kelamin', 'Laki-laki') ?> />
                    <span class="lbl"> Laki-laki</span>
                </label>
                <label>
                    <input type="radio" name="jenis_kelamin" value="Perempuan" <?= set_radio('jenis_kelamin', 'Perempuan') ?> />
                    <span class="lbl"> Perempuan</span>
                </label>
                <?php echo form_error('jenis_kelamin'); ?>
            </div>
        </div>

        <div class="control-group <?= form_error('umur') ? 'error' : ''; ?>">
            <label class="control-label" for="umur">Umur</label>

            <div class="controls">
                <input type="text" name="umur" id="umur" placeholder="Umur" value="<?php echo set_value('umur'); ?>" class="span2" />
                <?php echo form_error('umur'); ?>
            </div>
        </div>

        <div class="control-group <?= form_error('alamat') ? 'error' : ''; ?>">
            <label class="control-label" for="alamat">Alamat</label>

            <div class="controls">
                <textarea name="alamat" id="alamat" rows="3" class="span6"><?= set_value('alamat', ''); ?></textarea>
                <?php echo form_error('alamat'); ?>
            </div>
        </div>

        <div class="control-group <?= form_error('kelurahan') ? 'error' : ''; ?>">
            <label class="control-label" for="kelurahan">Kelurahan</label>

            <div class="controls">
                <select class="chzn-select span5" name="kelurahan" id="kelurahan" data-placeholder="Pilih Kelurahan">
                    <option value=""></option>
                    <?php foreach ($kelurahan as $kel) : ?>
                        <option value="<?= $kel->nama_kelurahan; ?>" <?= set_select('kelurahan', $kel->nama_kelurahan) ?>><?= $kel->nama_kelurahan . " - " . $kel->kecamatan; ?></option>
                    <?php endforeach; ?>
                </select>
                <?php echo form_error('kelurahan'); ?>
            </div>
        </div>

        <div class="control-group <?= form_error('puskesmas') ? 'error' : ''; ?>">
            <label class="control-label" for="puskesmas">Puskesmas</label>

            <div class="controls">
                <select class="span4" name="puskesmas" id="puskesmas">
                    <option value="">- Pilih -</option>
                    <?php foreach ($puskesmas as $pus) : ?>
                        <option value="<?= $pus->nama_puskesmas; ?>" <?= set_select('puskesmas', $pus->nama_puskesmas); ?>><?= $pus->nama_puskesmas; ?></option>
                    <?php endforeach; ?>
                </select>
                <?php echo form_error('puskesmas'); ?>
            </div>
        </div>

        <div class="control-group <?= form_error('tempat_rawat') ? 'error' : ''; ?>">
            <label class="control-label" for="tempat_rawat">Tempat Rawat</label>

            <div class="controls">
                <select class="span4" name="tempat_rawat">
                    <option value="">- Pilih -</option>
                    <?php foreach ($tempat_rawat as $tem) : ?>
                        <option value="<?= $tem->id_tempat_rawat; ?>" <?= set_select('tempat_rawat', $tem->id_tempat_rawat); ?>><?= $tem->nama_tempat_rawat; ?></option>
                    <?php endforeach; ?>
                </select>
                <?php echo form_error('tempat_rawat'); ?>
            </div>
        </div>

        <div class="control-group <?= form_error('nilai_ct') ? 'error' : ''; ?>">
            <label class="control-label" for="nilai_ct">Nilai CT</label>

            <div class="controls">
                <input type="text" name="nilai_ct" id="nilai_ct" placeholder="Nilai CT" value="<?php echo set_value('nilai_ct'); ?>" class="span2" />
                <?php echo form_error('nilai_ct'); ?>
            </div>
        </div>

        <div class="control-group <?= form_error('cluster') ? 'error' : ''; ?>">
            <label class="control-label" for="cluster">Cluster</label>

            <div class="controls">
                <input type="text" name="cluster" id="cluster" placeholder="Cluster" value="<?php echo set_value('cluster'); ?>" class="span6" />
                <?php echo form_error('cluster'); ?>
            </div>
        </div>

        <div class="control-group <?= form_error('tgl_positif') ? 'error' : ''; ?>">
            <label class="control-label" for="tgl_positif">Tanggal Positif</label>

            <div class="controls">
                <div class="row-fluid input-append">
                    <input class="date-picker" name="tgl_positif" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" value="<?php echo set_value('tgl_positif'); ?>" />
                    <span class="add-on">
                        <i class="icon-calendar"></i>
                    </span>
                </div>
                <?php echo form_error('tgl_positif'); ?>
            </div>
        </div>

        <div class="form-actions alert-primary">
            <button class="btn btn-primary btn-small" type="submit">
                <i class="icon-ok bigger-110"></i>
                Tambah
            </button>

            &nbsp; &nbsp; &nbsp;
            <button class="btn btn-small" type="reset">
                <i class="icon-undo bigger-110"></i>
                Reset
            </button>
        </div>
        <?= form_close(); ?>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <?= form_open('', ['class' => 'form-horizontal']); ?>
        <div class="control-group <?= form_error('penyelenggara') ? 'error' : ''; ?>">
            <label class="control-label" for="penyelenggara">Penyelenggara</label>

            <div class="controls">
                <input type="text" name="penyelenggara" id="penyelenggara" placeholder="Penyelenggara" value="<?php echo set_value('penyelenggara', $data->penyelenggara); ?>" class="span5" autofocus />
                <?php echo form_error('penyelenggara'); ?>
            </div>
        </div>

        <div class="control-group <?= form_error('tempat') ? 'error' : ''; ?>">
            <label class="control-label" for="tempat">Tempat</label>

            <div class="controls">
                <input type="text" name="tempat" id="tempat" placeholder="Tempat" value="<?php echo set_value('tempat', $data->tempat); ?>" class="span5" />
                <?php echo form_error('tempat'); ?>
            </div>
        </div>

        <div class="control-group <?= form_error('tanggal') ? 'error' : ''; ?>">
            <label class="control-label" for="tanggal">Tanggal</label>

            <div class="controls">
                <div class="row-fluid input-append">
                    <input class="date-picker" name="tanggal" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" value="<?php echo set_value('tanggal', $data->tanggal); ?>" placeholder="Tanggal" />
                    <span class="add-on">
                        <i class="icon-calendar"></i>
                    </span>
                </div>
                <?php echo form_error('tanggal'); ?>
            </div>
        </div>

        <div class="control-group <?= form_error('lama') ? 'error' : ''; ?>">
            <label class="control-label" for="lama">Lama (hari)</label>

            <div class="controls">
                <input type="text" class="input-mini" name="lama" value="<?= set_value('lama', $data->lama); ?>" />
                <?php echo form_error('lama'); ?>
            </div>
        </div>

        <div class="control-group <?= form_error('dari_jam') ? 'error' : ''; ?>">
            <label class="control-label" for="dari_jam">Dari Jam</label>

            <div class="controls">
                <div class="input-append bootstrap-timepicker">
                    <input id="dari_jam" type="text" name="dari_jam" class="input-small timepicker" value="<?= set_value('dari_jam', $data->dari_jam); ?>" />
                    <span class="add-on">
                        <i class="icon-time"></i>
                    </span>
                </div>
                <?php echo form_error('dari_jam'); ?>
            </div>
        </div>

        <div class="control-group <?= form_error('sampai_jam') ? 'error' : ''; ?>">
            <label class="control-label" for="sampai_jam">Sampai Jam</label>

            <div class="controls">
                <div class="input-append bootstrap-timepicker">
                    <input id="sampai_jam" type="text" name="sampai_jam" class="input-small timepicker" value="<?= set_value('sampai_jam', $data->sampai_jam); ?>" />
                    <span class="add-on">
                        <i class="icon-time"></i>
                    </span>
                </div>
                <span class="help-block">Biarkan <b>00:00</b> Jika Tidak Diketahui Waktu Selesai</span>
                <?php echo form_error('sampai_jam'); ?>
            </div>
        </div>

        <div class="control-group <?= form_error('keterangan') ? 'error' : ''; ?>">
            <label class="control-label" for="keterangan">Keterangan</label>

            <div class="controls">
                <?php
                echo $this->ckeditor->editor("keterangan", html_entity_decode(set_value('keterangan', $data->keterangan)), "");
                ?>
                <!-- <div class="wysiwyg-editor editor"></div> -->
                <!-- <input type="hidden" id="textEditor" name="keterangan"> -->
                <!-- <textarea name="keterangan" id="textEditor" rows="0" class="hidden"></textarea> -->
                <?php echo form_error('keterangan'); ?>
            </div>
        </div>

        <div class="form-actions alert-primary">
            <button class="btn btn-primary btn-small" type="submit">
                <i class="icon-ok bigger-110"></i>
                Ubah
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
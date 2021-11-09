<div class="row-fluid">
    <div class="span12">
        <?= form_open('', ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data']); ?>
        <div class="control-group <?= form_error('file') ? 'error' : ''; ?>">
            <label class="control-label" for="file">Import File Excel</label>

            <div class="controls">
                <input type="file" class="input-file" name="file" autofocus />
                <?php echo form_error('file'); ?>
            </div>
        </div>

        <div class="well">
            <h4 class="blue smaller dark">Ketentuan</h4>
            <ul>
                <li>File harus berformat .csv</li>
                <li>Maksimal 5mb</li>
            </ul>
        </div>

        <div class="form-actions">
            <button class="btn btn-primary btn-small" type="submit">
                <i class="icon-ok bigger-110"></i>
                Import
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
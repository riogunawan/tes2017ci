<div class="row">
    <div class="col-sm-12">
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo @$MASTER['DATA']['SUBTITLE'] ?></h3>
        </div>
        <?= form_open(''); ?>
        <input type="hidden" value="<?= $detail->id_kategori; ?>" name="id_kategori" />
          <div class="box-body">
            <?php echo validation_errors('<p style="color:red">*', '</p>'); ?>
            <div class="form-group">
              <label for="kategori_berita">Kategori Berita</label>
              <input class="form-control" id="kategori_berita" placeholder="Masukan kategori disini..." type="text" name="kategori_berita" value="<?= $detail->kategori_berita; ?>" required autofocus>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="button" onclick="history.back(-1)" class="btn btn-warning pull-left" /><i class="fa fa-arrow-left"></i>&nbsp; Kembali</button>
            <center><button type="submit" class="btn btn-success btn-lg" name="edit" value="Simpan"><i class="fa fa-save"></i>&nbsp; Simpan</button></center>
          </div>
        <?= form_close(); ?>
      </div>
    </div>
</div>
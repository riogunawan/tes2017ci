<?php if ($this->session->flashdata('info')): ?>
    <?php echo "<script type='text/javascript'>alert('".$this->session->flashdata('info')."')</script>"; ?>
<?php endif ?>

<div class="row">
    <div class="col-sm-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo @$MASTER['DATA']['SUBTITLE'] ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div>
              <a class="btn btn-social btn-success" data-toggle="modal" href='#modal-id'><i class="fa fa-plus"></i> Tambah</a>
              <!-- MODAL TAMBAH -->
              <div class="modal fade modal-success" id="modal-id">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header col-sm-12">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Tambah Kategori</h4>
                          </div>
                          <div class="modal-body col-sm-12">
                            <?= form_open('adm_kategori/tambah'); ?>
                            <?php echo validation_errors('<p style="color:red">*', '</p>'); ?>
                            <!-- text input -->
                                <div class="form-group col-sm-12">
                                    <label for="kategori_berita" class="col-sm-12 control-label">Kategori Berita</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" placeholder="Masukan Kategori disini..." id="kategori_berita" name="kategori_berita" value="<?= set_value('kategori_berita'); ?>" required autofocus>
                                    </div>
                                </div>
                          </div>
                          <div class="modal-footer col-sm-12">
                              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Tutup</button>
                              <button type="submit" class="btn btn-default" name="submit" value="submit"><i class="fa fa-send"></i>&nbsp;Tambahkan</button>
                              <?= form_close(); ?>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <br><br>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th width="35">No.</th>
                  <th>Nama Kategori</th>
                  <th width="170">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach ($list->result() as $row) {
                        echo '
                            <tr>
                              <td>'.$i.'</td>
                              <td>'.$row->kategori_berita.'</td>
                              <td>
                                <a href="'.site_url("adm_kategori/edit/$row->id_kategori").'" class="btn btn-warning "><i class="fa fa-edit"></i>&nbsp Edit</a>
                                <a href="'.site_url("adm_kategori/hapus/$row->id_kategori").'" onclick="return confirm(\'Apakah ingin menghapus data ini?\')" class="btn btn-danger"><i class="fa fa-remove"></i>&nbsp Hapus</a></td>
                            </tr>
                        ';
                        $i++;
                    }
                 ?>
            </tbody>
            <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Nama Kategori</th>
                  <th>Action</th>
                </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
</div>
<?php if ($this->session->flashdata('info')): ?>
    <?php echo "<script type='text/javascript'>alert('".$this->session->flashdata('info')."')</script>"; ?>
<?php endif ?>

<div class="row">
    <div class="col-sm-12">
      <div class="box box-warning">
        <div class="box-header">
          <h3 class="box-title"><?php echo @$MASTER['DATA']['SUBTITLE'] ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-sm-12">
                <?= form_open('adm_berita/edit'); ?>
                <?php echo validation_errors('<p style="color:red">*', '</p>'); ?>
                    <input type="hidden" value="<?= $detail->id_berita; ?>" name="id_berita" />
                <!-- text input -->
                    <div class="form-group col-sm-12">
                        <label for="judul_berita" class="col-sm-12 control-label">Judul Berita</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Masukan Kategori disini..." id="judul_berita" name="judul_berita" value="<?= $detail->judul_berita ?>" required autofocus>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="isi_berita" class="col-sm-12 control-label">Isi Berita</label>
                        <div class="col-sm-12">
                            <textarea id="editor1" name="isi_berita" rows="4" cols="50" required><?= $detail->isi_berita ?></textarea>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                      <label class="col-sm-12 control-label">Kategori Berita</label>
                      <div class="col-sm-12">
                          <select class="form-control" name="id_kategori">
                              <option value="<?= $detail->id_kategori ?>">-- <?= $detail->kategori_berita ?> --</option>
                          <?php foreach ($drop_kategori->result() as $row) {
                              echo "<option value='$row->id_kategori'>$row->kategori_berita</option>";
                          } ?>
                          </select>
                      </div>
                    </div>
                    <div class="form-group col-sm-12">
                      <label for="foto" class="col-sm-2 control-label">Foto Berita</label>
                      <div class="col-sm-10">
                        <div class="form-control" style="width: 200px; color: #555; height: auto;">
                            <img src="<?= base_url('assets/uploads/') ?><?= $detail->gambar_berita ?>" height="200px" class="img-responsive" alt="tidak ada foto">
                            <a data-toggle="modal" href='#modal-id'><button type="button" class="btn btn-info"><i class="fa fa-photo"></i>&nbsp; Edit Foto</button></a>
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-12">
                      <div class="col-sm-12">
                          <button type="button" onclick="history.back(-1)" class="btn btn-warning"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</button>&nbsp; &nbsp;<button type="submit" class="btn btn-success" name="edit" value="edit"><i class="fa fa-pencil"></i>&nbsp;Edit</button>
                      </div>
                    </div>
                  <?= form_close(); ?>
              </div>
        </div>
      </div>
    </div>
</div>

<!-- MODAL TAMBAH -->
<div class="modal fade modal-success" id="modal-id">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header col-sm-12">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Edit Foto</h4>
          </div>
          <div class="modal-body col-sm-12">
            <?= form_open('adm_berita/edit'); ?>
            <!-- text input -->
                <input type="hidden" value="<?= $detail->id_berita; ?>" name="id_berita" />
                <div class="form-group col-sm-12">
                  <label for="foto" class="col-sm-2 control-label">Foto Berita</label>
                  <div class="col-sm-10">
                      <!-- <input type="file" class="" name="foto" > -->
                      <div class="form-control dropzone" id="my-dropzone" style="width: 200px; color: #555; height: auto;"></div>
                        <?php
                            $hidden2_attr = array(
                                'type' => 'hidden',
                                'name' => 'foto',
                                'id' => 'foto',
                                'class' => 'form-control');
                            echo form_input($hidden2_attr);
                         ?>
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
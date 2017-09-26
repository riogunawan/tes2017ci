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
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                          <div class="modal-header col-sm-12">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Tambah Berita</h4>
                          </div>
                          <div class="modal-body col-sm-12">
                            <?= form_open('adm_berita/tambah'); ?>
                            <?php echo validation_errors('<p style="color:red">*', '</p>'); ?>
                            <!-- text input -->
                                <div class="form-group col-sm-12">
                                    <label for="judul_berita" class="col-sm-12 control-label">Judul Berita</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" placeholder="Masukan Judul disini..." id="judul_berita" name="judul_berita" value="<?= set_value('judul_berita'); ?>" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="isi_berita" class="col-sm-12 control-label">Isi Berita</label>
                                    <div class="col-sm-12">
                                        <textarea id="editor1" name="isi_berita" rows="4" cols="50" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                  <label class="col-sm-12 control-label">Kategori Berita</label>
                                  <div class="col-sm-12">
                                      <select class="form-control" name="id_kategori">
                                          <!-- <option value="1">-- Pilih --</option> -->
                                      <?php foreach ($drop_kategori->result() as $row) {
                                          echo "<option value='$row->id_kategori'>$row->kategori_berita</option>";
                                      } ?>
                                      </select>
                                  </div>
                                </div>
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
            </div>
            <br><br>
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                  <th width="35">No.</th>
                  <th>Judul Berita</th>
                  <th>Kategori</th>
                  <th>Tanggal</th>
                  <th>Foto</th>
                  <th width="170">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $base = base_url();
                    $i = 1;
                    foreach ($list->result() as $row) {
                        echo '
                            <tr>
                              <td>'.$i.'</td>
                              <td>'.$row->judul_berita.'</td>
                              <td>'.$row->kategori_berita.'</td>
                              <td>'.$row->tgl_berita.'</td>
                              <td><img src="'.$base.'assets/uploads/'.$row->gambar_berita.'" alt="Tidak Ada Gambar" height="100"></td>
                              <td>
                                <a href="'.site_url("adm_berita/edit/$row->id_berita").'" class="btn btn-warning "><i class="fa fa-edit"></i>&nbsp Edit</a>
                                <a href="'.site_url("adm_berita/hapus/$row->id_berita").'" onclick="return confirm(\'Apakah ingin menghapus data ini?\')" class="btn btn-danger"><i class="fa fa-remove"></i>&nbsp Hapus</a></td>
                            </tr>
                        ';
                        $i++;
                    }
                 ?>
            </tbody>
            <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Judul Berita</th>
                  <th>Kategori</th>
                  <th>Tanggal</th>
                  <th>Foto</th>
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
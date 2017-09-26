<div class="row" id="berita">
    <?php $row = $detail->row(); ?>
    <div class="col-sm-12 mb-20">
        <div class="col-sm-8 kotak detail-berita">
            <div class="col-sm-12">
                <h1 class="judul"><?= $row->judul_berita ?></h1>
            </div>
            <div class="col-sm-12">
                <ul class="list-inline tag">
                    <li><a class="text-success" href="#"><i class="fa fa-user"></i>&nbsp; <?= $row->nama_user ?></a></li>
                    <li><span class="text-success"><i class="fa fa-calendar"></i>&nbsp; <?= nama_hari(substr($row->tgl_berita, 0, 10)) ?>,&nbsp;<?= tgl_indo(substr($row->tgl_berita, 0, 10)) ?></span></li>
                    <li><span class="btn btn-danger btn-xs"><i class="fa fa-star-o"></i>&nbsp; <?= $row->kategori_berita ?></span></li>
                </ul>
            </div>
            <div class="col-sm-12">
                <img class="img-rounded foto-berita-list" src="<?= base_url() ?>assets/uploads/<?= $row->gambar_berita ?>" alt="Tidak ada foto berita">
            </div>
            <div class="col-sm-12">
                <p class="isi"><?= $row->isi_berita ?></p>
            </div>
        </div>
        <div class="col-sm-4">
            <?php foreach ($list->result() as $row): ?>

                <div class="box box-info">
                    <div class="box-body">
                        <h4 class=""><a href="<?= site_url("berita/$row->slug") ?>" title=""><?= $row->judul_berita ?></a></h4>
                        <p><?= substr($row->isi_berita, 0, 100) ?></p>
                        <span class="btn btn-danger btn-xs"><i class="fa fa-star-o"></i>&nbsp; <?= $row->kategori_berita ?></span>
                        <ul class="list-inline">
                            <li><span class="text-success"><i class="fa fa-calendar"></i>&nbsp; <?= nama_hari(substr($row->tgl_berita, 0, 10)) ?>,&nbsp;<?= tgl_indo(substr($row->tgl_berita, 0, 10)) ?></span></li>
                            <li><a class="text-success" href="#"><i class="fa fa-user"></i>&nbsp; <?= $row->nama_user ?></a></li>
                        </ul>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>

</div>
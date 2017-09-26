<div class="row" id="berita">
    <?php if (empty($qberita)): ?>
        <?php $base = base_url(); ?>
        <div class="col-sm-12">
            <div class="col-sm-4 kotak">
                <div class="">
                    <img class="img-rounded" src="" alt="Tidak ada foto berita" height="190px" width="100%">
                </div>
            </div>
            <div class="col-sm-8 kotak">
                <div class="">
                    <h1 class=""><a href="#" title="">MAAF,</a></h1>
                    <h4>Berita Tidak Ada</h4>
                    <a href="<?= site_url("depan_home/berita") ?>" class="btn btn-success btn-sm">Kembali Ke Berita <i class="fa fa-angle-double-right"></i></a>
                </div>
            </div>
        </div>
    <?php else: ?>
        <?php foreach ($qberita as $row): ?>
            <div class="col-sm-12 mb-20">
                <div class="col-sm-4 kotak">
                    <div class="">
                        <a href="<?= site_url("berita/$row->slug") ?>">
                            <img class="img-rounded foto-berita-list" src="<?= base_url() ?>assets/uploads/<?= $row->gambar_berita ?>" alt="Tidak ada foto berita">
                        </a>
                    </div>
                </div>
                <div class="col-sm-8 kotak xs-kotak">
                    <div class="">
                        <h3 class=""><a href="<?= site_url("berita/$row->slug") ?>" title=""><?= $row->judul_berita ?></a></h3>
                        <p><?= substr($row->isi_berita, 0, 100) ?></p>
                        <a href="<?= site_url("berita/$row->slug") ?>" class="btn btn-success btn-sm">Selengkapnya <i class="fa fa-angle-double-right"></i></a>
                        <ul class="list-inline tag">
                            <li><a class="text-success" href="#"><i class="fa fa-user"></i>&nbsp; <?= $row->nama_user ?> |</a></li>
                            <li><span class="text-success"><i class="fa fa-calendar"></i>&nbsp; <?= nama_hari(substr($row->tgl_berita, 0, 10)) ?>,&nbsp;<?= tgl_indo(substr($row->tgl_berita, 0, 10)) ?></span></li>
                        </ul>
                        <span class="btn btn-danger btn-xs kategori"><i class="fa fa-star-o"></i>&nbsp; <?= $row->kategori_berita ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
    <div class="col-sm-12">
        <center><?= $paging ?></center>
    </div>

</div>
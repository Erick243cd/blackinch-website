<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-12" style="margin-top: 2%;!important;">
            <div class="section-title">
                <h2>Suivez la radio en direct</h2>
            </div>
        </div>
        <div class="col-md-8">
            <div class="post post-thumb">
                <a class="post-img" href="#"><img
                            src="<?= site_url() ?>public/assets/img/051bb16024afde6c4646dfbcf5a33476.png"
                            alt=""></a>
                <div class="post-body">
                    <div class="post-meta">
                        <a class="post-category cat-2"
                           href="">Lorem ipsum dolor sit amet.</a>
                        <span class="post-date"></span>
                    </div>
                    <h3 class="post-title"><a
                                href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia,
                            voluptate!</a>
                    </h3>
                    <audio controls preload="metadata" style="width: 100%;!important;">
                        <source src="<?= site_url() ?>public/assets/podcasts/tmp/test.mp3"
                                type="audio/ogg">
                    </audio>
                </div>

            </div>
        </div>

        <?php foreach ($podcasts as $item): ?>
            <div class="col-md-4 col-sm-12">
                <div class="post">
                    <a class="post-img" href="#"><img
                                src="<?= site_url() ?>public/assets/imsg/posts/"
                                alt=""></a>
                    <div class="post-body">
                        <div class="post-meta">
                            <a class="post-category cat-<?= $item->category_color ?>"
                               href="#"><?= $item->name ?></a>
                            <span class="post-date"><?= date('M d, Y', strtotime($item->created_at)) ?></span>
                        </div>
                        <h3 class="post-title"><a
                                    href="#"><?= $item->title ?></a>
                        </h3>
                        <audio controls preload="metadata">
                            <source src="<?= site_url() ?>public/assets/podcasts/<?= $item->audioFile ?>"
                                    type="audio/ogg">
                        </audio>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
<?= $this->endSection() ?>

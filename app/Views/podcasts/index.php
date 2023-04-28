<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="post post-thumb">
                            <a class="post-img" href=""><img
                                        src="<?= site_url() ?>public/assets/img/posts/"
                                        alt=""></a>
                            <div class="post-body">
                                <div class="post-meta">
                                    <a class="post-category cat-3"
                                       href="">Lorem ipsum dolor sit amet.</a>
                                    <span class="post-date"></span>
                                </div>
                                <h3 class="post-title"><a
                                            href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia,
                                        voluptate!</a>
                                </h3>
                            </div>
                        </div>
                    </div>

                    <?php foreach ($podcasts as $item): ?>
                        <div class="col-md-6 col-sm-12">
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
            <div class="col-md-4">
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Articles les plus vues</h2>
                    </div>
                    <?php foreach ($mostview as $item): ?>
                        <div class="post post-widget">
                            <a class="post-img" href="<?= site_url('post-detail/' . $item->slug) ?>"><img
                                        src="<?= site_url() ?>public/assets/img/posts/<?= $item->postImage ?>"
                                        alt=""></a>
                            <div class="post-body">
                                <h3 class="post-title"><a
                                            href="<?= site_url('post-detail/' . $item->slug) ?>"><?= $item->title ?></a>
                                </h3>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
                <div class="aside-widget text-center">
                    <a href="#" style="display: inline-block;margin: auto;">
                        <img class="img-responsive" src="<?= site_url() ?>public/assets/img/ad-1.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

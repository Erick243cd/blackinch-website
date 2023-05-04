<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<div class="container">
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
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Actualités</h2>
                    </div>
                </div>
                <?php foreach ($posts as $item): ?>
                    <div class="col-md-12">
                        <div class="post post-row">
                            <a class="post-img" href="<?= site_url('post-detail/' . $item->slug) ?>"><img
                                        src="<?= site_url() ?>public/assets/img/posts/<?= $item->postImage ?>"
                                        alt=""></a>
                            <div class="post-body">
                                <div class="post-meta">
                                    <a class="post-category cat-<?= $item->category_color ?>"
                                       href="<?= site_url('posts-by-category/' . $item->category_slug) ?>"><?= $item->name ?></a>
                                    <span class="post-date"><?= date('M d, Y', strtotime($item->created_at)) ?></span>
                                </div>
                                <h3 class="post-title"><a href="<?= site_url('post-detail/' . $item->slug) ?>">
                                        <?= $item->title ?></a></h3>
                                <p> <?= character_limiter($item->description, 100) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
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
                            <a class="post-category cat-<?= $item->category_color ?? '' ?>"
                               href="#"><?= $item->title ?></a>
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
        <div class="col-md-4">
            <div class="aside-widget">
                <div class="section-title">
                    <h2>Catégories</h2>
                </div>
                <div class="category-widget">
                    <ul>
                        <?php foreach ($categories as $category): ?>
                            <li><a href="<?= site_url('posts-by-category/' . $category->category_slug) ?>"
                                   class="cat-<?= $category->category_color ?>"><?= $category->name ?>
                                    <span><?= $category->nb_categories ?? '' ?></span></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>

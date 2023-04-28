<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <ul class="page-header-breadcrumb">
                    <li><a href="<?= site_url()?>">Accueil</a></li>
                    <li>Contact</li>
                </ul>
                <h1><?= count($posts) .' '.  $title?></h1>
            </div>
        </div>
    </div>
</div>

</header>

<div class="section">

    <div class="container">

        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>Toutes les actualités</h2>
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
            <div class="col-md-4">

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


<?= $this->endSection() ?>

<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-12" style="margin-top: 2%;!important;">
            <div class="section-title">
                <h2><?= $title ?? "Actualités par category" ?></h2>
            </div>
        </div>
        <?php foreach ($posts as $row): ?>
            <div class="col-md-4">
                <div class="post">
                    <a class="post-img" href="<?= site_url('post-detail/' . $row->slug) ?>"><img
                                src="<?= site_url() ?>public/assets/img/posts/<?= $row->postImage ?>"
                                alt=""></a>
                    <div class="post-body">
                        <div class="post-meta">
                            <a class="post-category cat-<?= $row->category_color ?>"
                               href="<?= site_url('posts-by-category/' . $row->category_slug) ?>"><?= $row->name ?></a>
                            <span class="post-date"><?= date('M d, Y', strtotime($row->created_at)) ?></span>
                        </div>
                        <h3 class="post-title"><a
                                    href="<?= site_url('post-detail/' . $row->slug) ?>"><?= $row->title ?></a>
                        </h3>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="clearfix visible-md visible-lg"></div>
    </div>
</div>

<?= $this->endSection() ?>

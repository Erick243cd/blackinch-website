<?= $this->extend("layouts/app") ?>
<?= $this->section("content") ?>
<div class="section pt-5 pb-0">
    <div class="container">

        <div class="row mb-5 justify-content-center">
            <div class="col-lg-9">
                <?php if (isset($request)): ?>
                    <span class="fw-normal text-uppercase d-block mb-1 text-danger"><?= $request ?></span>
                <?php endif; ?>
                <h2 class="heading">'Nos services'</h2>

            </div>
        </div>


        <div class="row justify-content-center">
            <?php foreach ($services as $service): ?>
                <div class="col-lg-9">
                    <div class="post-entry d-md-flex small-horizontal mb-5">
                        <div class="me-md-5 thumbnail mb-3 mb-md-0">
                            <img src="<?= site_url() ?>public/assets/es_admin/images/services/<?= $service->picture ?>"
                                 alt="Image" class="img-fluid">
                        </div>
                        <div class="content">
                            <h2 class="heading"><a
                                        href="<?= site_url('service-detail/' . $service->slug) ?>"><?= $service->name ?></a>
                            </h2>
                            <p><?= character_limiter($service->description, 150) ?></p>
                            <a href="<?= site_url('service-detail/' . $service->slug) ?>"
                               class="post-author d-flex align-items-center">
                                <div class="author-pic">
                                    <img src="<?= site_url() ?>public/assets/images/arrow-right.png"
                                         alt="<?= altData() ?>">
                                </div>
                                <div class="text">
                                    <strong>Voir les détails</strong>
                                    <span>Blackinch SARL</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>


        </div>
        <!--        <div class="row align-items-center justify-content-center py-5">-->
        <!--            <div class="col-lg-6 text-center">-->
        <!--                <div class="custom-pagination">-->
        <!--                    <a href="#">1</a>-->
        <!--                    <a href="#" class="active">2</a>-->
        <!--                    <a href="#">3</a>-->
        <!--                    <a href="#">4</a>-->
        <!--                    <a href="#">5</a>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
    </div>
</div>
<?= $this->endSection() ?>

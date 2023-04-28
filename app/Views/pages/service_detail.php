<?= $this->extend("layouts/app") ?>
<?= $this->section("content") ?>
    <div class="section post-section pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center">
                        <img src="<?= site_url() ?>public/assets/images/logo.jpg" alt="<?= altData() ?>"
                             class="author-pic img-fluid rounded-circle mx-auto">
                    </div>
                    <span class="d-block text-center">Blackinch SARL</span>

                    <h2 class="heading text-center mb-5"><?= $service->name ?>.</h2>

                    <img src="<?= site_url() ?>public/assets/es_admin/images/services/<?= $service->picture ?>"
                         alt="<?= altData() ?>"
                         class="img-fluid rounded mb-4">
                    <p><?= $service->description ?></p>

                    <div class="col-lg-12">
                        <div class="item">
                            <div class="post-entry d-lg-flex">
                                <div class="content align-self-center">
                                    <a target="_blank"
                                       href="https://wa.me/<?= $sys_data->phone ?>?text=Bonjour <?= $sys_data->name ?>"
                                       class="post-author d-flex align-items-center">
                                        <div class="author-pic">
                                            <img src="<?= site_url() ?>public/assets/images/007-whatsapp.png"
                                                 alt="Image">
                                        </div>
                                        <div class="text">
                                            <strong>Contactez-nous</strong>
                                            <span>Blackinch SARL</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-1 my-5">
                        <?php foreach ($carousel as $item): ?>
                            <div class="col-lg-4">
                                <a href="<?= site_url() ?>public/assets/es_admin/images/services/carousel/<?= $item->pictures ?>"
                                   class="glightbox">
                                    <img src="<?= site_url() ?>public/assets/es_admin/images/services/carousel/<?= $item->pictures ?>"
                                         alt="<?= altData() ?>"
                                         class="img-fluid rounded">
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-lg-12">
                        <div class="item">
                            <div class="post-entry d-lg-flex">
                                <div class="content align-self-center">
                                    <a href="<?= site_url('contact') ?>"
                                       class="post-author d-flex align-items-center">
                                        <div class="author-pic">
                                            <img src="<?= site_url() ?>public/assets/images/contact.png"
                                                 alt="Image">
                                        </div>
                                        <div class="text">
                                            <strong>Contactez-nous</strong>
                                            <span>Blackinch SARL</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="heading">Autres services</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php foreach ($services as $item): ?>
                    <div class="col-lg-12">
                        <div class="post-entry d-md-flex small-horizontal mb-5">
                            <div class="me-md-5 thumbnail mb-3 mb-md-0">
                                <img src="<?= site_url() ?>public/assets/es_admin/images/services/<?= $item->picture ?>"
                                     alt="Image" class="img-fluid">
                            </div>
                            <div class="content">

                                <h2 class="heading"><a
                                            href="<?= site_url('service-detail/' . $item->slug) ?>"><?= $item->name ?></a>
                                </h2>
                                <p><?= character_limiter($item->description, 100) ?></p>

                                <a href="<?= site_url('service-detail/' . $item->slug) ?>"
                                   class="post-author d-flex align-items-center">
                                    <div class="author-pic">
                                        <img src="<?= site_url() ?>public/assets/images/arrows.png"
                                             alt="<?= altData() ?>">
                                    </div>
                                    <div class="text">
                                        <strong>Plus de détails</strong>
                                        <span>Blackinch SARL</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
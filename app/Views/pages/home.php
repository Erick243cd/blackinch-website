<?= $this->extend("layouts/app") ?>
<?= $this->section("content") ?>

    <div class="section pt-5 pb-0">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-7 text-center">
                    <h2 class="heading"></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="item">
                        <div class="post-entry d-lg-flex">
                            <div class="content align-self-center">
                                <div class="post-meta mb-3">
                                    <a href="<?= site_url('about') ?>" class="category">A propos de </a> <a href="#"
                                                                                                            class="category"></a>
                                    &mdash;
                                    <span class="date">Blackinch SARL</span>
                                </div>
                                <h2 class="heading"><a href="<?= site_url('about') ?>">Blackinch rend votre
                                        environnement de travail et d'habitation sain.</a></h2>
                                <p>Nous mettons à votre portée notre expertise et notre spécialisation dans la <b>peinture</b>,
                                    dans le <b>nettoyage profond de sols, murs et plafond</b>,
                                    dans le montage de vos <b> gitages métalliques ou en bois de plafond, bureaux, faux
                                        plier et vos placage ou installation Gyproc, Timberlite , Triplex , Duplex et
                                        autre.
                                    </b>
                                    <br>
                                    BlackInch Sarl réalise vos rêves en mettant à votre disposition son personnel le
                                    plus qualifié pour un travail propre et dans le délai.
                                </p>

                                <a target="_blank"
                                   href="https://wa.me/<?= $sys_data->phone ?>?text=Bonjour <?= $sys_data->name ?>"
                                   class="post-author d-flex align-items-center">
                                    <div class="author-pic">
                                        <img src="<?= site_url() ?>public/assets/images/007-whatsapp.png" alt="Image">
                                    </div>
                                    <div class="text">
                                        <strong>Contactez-nous</strong>
                                        <span>Blackinch SARL</span>
                                    </div>
                                </a>
                            </div>
                            <div class="me-lg-5 thumbnail mb-4 mb-lg-0">
                                <a href="<?= site_url('about') ?>">
                                    <img src="<?= site_url() ?>public/assets/images/about-1.jpg" alt="Image"
                                         class="img-fluid">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-7 text-center">
                        <h2 class="heading"></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="posts-slide-wrap">
                        <div class="posts-slide" id="posts-slide">
                            <?php if (isset($services)): ?>
                                <?php foreach ($services as $service): ?>
                                    <div class="item">
                                        <div class="post-entry d-lg-flex">
                                            <div class="me-lg-5 thumbnail mb-4 mb-lg-0">
                                                <a href="<?= site_url('service-detail/' . $service->slug) ?>"
                                                   title="Voir plus">
                                                    <img src="<?= site_url() ?>public/assets/es_admin/images/services/<?= $service->picture ?>"
                                                         alt="<?= altData() ?>"
                                                         class="img-fluid">
                                                </a>
                                            </div>

                                            <div class="content align-self-center">
                                                <h2 class="heading"><a href="<?= site_url('service-detail/' . $service->slug)?>"><?= $service->name ?>.</a>
                                                </h2>
                                                <p><?= character_limiter($service->description, 200) ?></p>
                                                <a href="<?= site_url('service-detail/' . $service->slug) ?>" class="post-author d-flex align-items-center">
                                                    <div class="author-pic">
                                                        <img src="<?= site_url() ?>public/assets/images/arrows.png"
                                                             alt="Image">
                                                    </div>
                                                    <div class="text">
                                                        <strong>Plus de détails</strong>
                                                        <span><?= altData() ?></span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="post-entry d-block small-post-entry-v">
                        <div class="thumbnail">
                            <a href="single.html">
                                <img src="<?= site_url()?>public/assets/es_admin/images/posts/about-3.jpg" alt="Image" class="img-fluid">
                            </a>
                        </div>
                        <div class="content">
                            <div class="post-meta mb-1">
                                <a href="#" class="category">Blackinch</a>, <a href="#" class="category">Peinture</a>
                                &mdash;
                                <span class="date">Avril 2, 2023</span>
                            </div>
                            <h2 class="heading mb-3"><a href="single.html">Titre de l'activité.</a></h2>
                            <p>Détail de l'activité.</p>
                            <a href="#" class="post-author d-flex align-items-center">
                                <div class="author-pic">
                                    <img src="<?= site_url()?>public/assets/images/contact.png" alt="Image">
                                </div>
                                <div class="text">
                                    <strong>Contactez-nous</strong>
                                    <span>CEO and Founder</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="post-entry d-block small-post-entry-v">
                        <div class="thumbnail">
                            <a href="single.html">
                                <img src="<?= site_url()?>public/assets/es_admin/images/posts/about-4.jpg" alt="Image" class="img-fluid">
                            </a>
                        </div>
                        <div class="content">
                            <div class="post-meta mb-1">
                                <a href="#" class="category">Blackinch</a>, <a href="#" class="category">Installation</a>
                                &mdash;
                                <span class="date">Avril 2, 2023</span>
                            </div>
                            <h2 class="heading mb-3"><a href="single.html">Titre de l'activité.</a></h2>
                            <p>Détail de l'activité.</p>
                            <a href="#" class="post-author d-flex align-items-center">
                                <div class="author-pic">
                                    <img src="<?= site_url()?>public/assets/images/contact.png" alt="Image">
                                </div>
                                <div class="text">
                                    <strong>Contactez-nous</strong>
                                    <span>Blackinch SARL</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="post-entry d-block small-post-entry-v">
                        <div class="thumbnail">
                            <a href="single.html">
                                <img src="<?= site_url()?>public/assets/es_admin/images/posts/about-5.jpg" alt="Image" class="img-fluid">
                            </a>
                        </div>
                        <div class="content">
                            <div class="post-meta mb-1">
                                <a href="#" class="category">Blackinch</a>, <a href="#" class="category">Nettoyage</a>
                                &mdash;
                                <span class="date">Avril 2, 2023</span>
                            </div>
                            <h2 class="heading mb-3"><a href="single.html">Titre de l'activité.</a></h2>
                            <p>Détail de l'activité.</p>
                            <a href="#" class="post-author d-flex align-items-center">
                                <div class="author-pic">
                                    <img src="<?= site_url()?>public/assets/images/007-whatsapp.png" alt="Image">
                                </div>
                                <div class="text">
                                    <strong>Contactez-nous</strong>
                                    <span>Blackinch SARL</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="post-entry d-block small-post-entry-v">
                        <div class="thumbnail">
                            <a href="single.html">
                                <img src="<?= site_url()?>public/assets/es_admin/images/posts/about-6.jpg" alt="Image" class="img-fluid">
                            </a>
                        </div>
                        <div class="content">
                            <div class="post-meta mb-1">
                                <a href="#" class="category">Blackinch</a>, <a href="#" class="category">Peinture</a>
                                &mdash;
                                <span class="date">Avril 2, 2023</span>
                            </div>
                            <h2 class="heading mb-3"><a href="single.html">Titre de l'activité.</a></h2>
                            <p>Détail de l'activité.</p>
                            <a href="#" class="post-author d-flex align-items-center">
                                <div class="author-pic">
                                    <img src="<?= site_url()?>public/assets/images/contact.png" alt="Image">
                                </div>
                                <div class="text">
                                    <strong>Contactez-nous</strong>
                                    <span>Blackinch SARL</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="post-entry d-block small-post-entry-v">
                        <div class="thumbnail">
                            <a href="single.html">
                                <img src="<?= site_url()?>public/assets/es_admin/images/posts/about-7.jpg" alt="Image" class="img-fluid">
                            </a>
                        </div>
                        <div class="content">
                            <div class="post-meta mb-1">
                                <a href="#" class="category">Blackinch</a>, <a href="#" class="category">Installation</a>
                                &mdash;
                                <span class="date">Avril 2, 2023</span>
                            </div>
                            <h2 class="heading mb-3"><a href="single.html">Titre de l'activité.</a></h2>
                            <p>Détail de l'activité.</p>
                            <a href="#" class="post-author d-flex align-items-center">
                                <div class="author-pic">
                                    <img src="<?= site_url()?>public/assets/images/007-whatsapp.png" alt="Image">
                                </div>
                                <div class="text">
                                    <strong>Contactez-nous</strong>
                                    <span>Blackinch SARL</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="post-entry d-block small-post-entry-v">
                        <div class="thumbnail">
                            <a href="single.html">
                                <img src="<?= site_url()?>public/assets/es_admin/images/posts/about-3.jpg" alt="Image" class="img-fluid">
                            </a>
                        </div>
                        <div class="content">
                            <div class="post-meta mb-1">
                                <a href="#" class="category">Blackinch</a>, <a href="#" class="category">Nettoyage</a>
                                &mdash;
                                <span class="date">Avril 2, 2023</span>
                            </div>
                            <h2 class="heading mb-3"><a href="single.html">Titre de l'activité.</a></h2>
                            <p>Détail de l'activité.</p>
                            <a href="#" class="post-author d-flex align-items-center">
                                <div class="author-pic">
                                    <img src="<?= site_url()?>public/assets/images/contact.png" alt="Image">
                                </div>
                                <div class="text">
                                    <strong>Contactez-nous</strong>
                                    <span>CEO and Founder</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





<?= $this->endSection() ?>
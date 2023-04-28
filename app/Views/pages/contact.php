<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<div class="section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-7 text-center">
                <h2 class="heading">'Contactez-nous'</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="post-entry d-md-flex small-horizontal mb-5">
                    <div class="me-md-5 thumbnail mb-3 mb-md-0">
                        <a href="#">
                            <img src="<?= site_url() ?>public/assets/images/contact.jpg"
                                 alt="Image" class="img-fluid">
                        </a>
                    </div>
                    <div class="content">
                        <div class="post-meta mb-3">
                            <a href="#" class="category">Blackinch</a> <a href="#" class="category">Sarl</a> &mdash;
                            <span class="date"></span>
                        </div>
                        <h2 class="heading"><a href="#">Nous sommes situés sur l’avenue de plaine, Quartier Naviundu, Commune Annexe.</a></h2>

                        <a href="#" class="post-author d-flex align-items-center">
                            <div class="author-pic">

                            </div>
                            <div class="text">
                                <strong>CD/L’SH/RCCM/20-B-00997</strong>
                                <span>ID NAT. 05-H5300-N70657L</span>
                            </div>
                        </a>
                        <a href="#" class="post-author d-flex align-items-center">
                            <div class="author-pic">

                            </div>
                            <div class="text">
                                <div class="text">
                                    <strong>WhatsApp: +243 813 139 610</strong>
                                    <span>E-mail : info@blackinchsarl.com</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="py-5 bg-light mx-md-3 sec-subscribe">
                <div class="container ml-3 mr-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="h4 fw-bold"></h2>
                        </div>
                    </div>
                    <form action="#" class="row">
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <input type="email" class="form-control" placeholder="Votre email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 mb-md-0">
                                <input type="email" class="form-control" placeholder="Objet">
                            </div>
                        </div>
                        <div class="col-md-12 mt-5">
                            <div class="mb-3 mb-md-0">
                             <textarea class="form-control" name="" id="" cols="30" rows="10" placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4 d-grid mt-5">
                            <input type="submit" class="btn btn-primary" value="Envoyer">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row g-5">
            <?php foreach ($services as $item): ?>
                <div class="col-lg-4">
                    <div class="post-entry d-block small-post-entry-v">
                        <div class="thumbnail">
                            <a href="<?= site_url('service-detail/' . $item->slug) ?>">
                                <img src="<?= site_url() ?>public/assets/es_admin/images/services/<?= $item->picture ?>"
                                     alt="<?= altData() ?>"
                                     class="img-fluid">
                            </a>
                        </div>
                        <div class="content">

                            <h2 class="heading mb-3">
                                <a href="<?= site_url('service-detail/' . $item->slug) ?>">
                                    <?= $item->name ?>
                                </a>
                            </h2>
                            <p> <?= character_limiter($item->description, 100) ?>.</p>
                            <a href="https://wa.me/<?= $sys_data->phone ?>?text=Bonjour <?= $sys_data->name ?>"
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
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

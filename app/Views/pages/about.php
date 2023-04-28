<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<div class="section pt-5 pb-0">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-7 text-center">
                <h2 class="heading">'A propos de nous'</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="posts-slide-wrap">
                    <div class="posts-slide" id="posts-slide">
                        <div class="item">
                            <div class="post-entry d-lg-flex">
                                <div class="me-lg-5 thumbnail mb-4 mb-lg-0">
                                    <a href="<?= site_url('contact') ?>">
                                        <img src="<?= site_url() ?>public/assets/images/installation_banniere.jpg"
                                             alt="Image" class="img-fluid">
                                    </a>
                                </div>
                                <div class="content align-self-center">
                                    <div class="post-meta mb-3">
                                        <a href="#" class="category">Blackinch </a> <a href="#"
                                                                                       class="category">SARL</a>
                                        &mdash;
                                        <span class="date">Le service qui rend votre environnement sain et vivable.</span>
                                    </div>
                                    <h2 class="heading"><a href="<?= site_url('contact') ?>">Nous transformons votre
                                            lieu de travail ou d'habitation en un endroit digne de votre nom ou celle de
                                            votre entreprise.</a></h2>
                                    <p>
                                        - Êtes-vous allergique au désordre ou la poussière ?<br>
                                        - Avez-vous une nouvelle maison ?<br>

                                        - Voulez vous présenter un espace d’habitation ou de travail à un client ?<br>
                                        - Aimer vous que tout soit toujours propre ?<br>
                                        - Tenez-vous à votre hygiène quotidienne ?<br>
                                        Vous n'avez plus à vous inquiéter ni à paniquer

                                    </p>
                                    <a href="<?= site_url('contact')?>" class="post-author d-flex align-items-center">
                                        <div class="author-pic">
                                            <img src="<?= site_url() ?>public/assets/images/contact.png"
                                                 alt="<?= altData() ?>">
                                        </div>
                                        <div class="text">
                                            <strong>Contactez-nous</strong>
                                            <span><?= altData()?> </span>
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
</div>
<div class="section post-section pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <p>
                    Nous offrons à nos clients un nettoyage profond des sols, murs et plafond. <br>
                    Nous mettons à votre disposition des équipes mobile pour vous servir. <br>

                    Pour un environnement de travail sein. Nous mettons à la disposition de nos clients des agents permanents pour un nettoyage quotidien.</p>
                <blockquote>
                    <p>Vous avez besoin d’un personnel pour ravitailler vos rayons ?
                        Faire un suivi de produits et orienter vos clients ! <br>
                        Blackinch sarl met à votre disposition un personnel qualifié pour tenir vos rayons de supermarché.</p>
                </blockquote>
                <p>Nous avons une spécialisation dans la peinture et nous mettons à votre disposition notre expertise. Et nos agents sont qualifiés pour exécuter tout type de travail sur la peinture</p>
                <p>(Masticage, ponçage, etc) au-delà de notre main d’œuvre nous offrons les choix de nouvelle technologie dans la peinture à nos clients (machine à ponçage, pistolet compresseur, etc).</p>
                <div class="row g-1 my-5">
                    <div class="col-lg-4">
                        <a href="<?= site_url()?>public/assets/images/about-8.jpg" class="glightbox"><img src="<?= site_url()?>public/assets/images/about-8.jpg" alt="Image"
                                                                              class="img-fluid rounded"></a>
                    </div>
                    <div class="col-lg-4">
                        <a href="<?= site_url()?>public/assets/images/about-9.jpg" class="glightbox"><img src="<?= site_url()?>public/assets/images/about-9.jpg" alt="Image"
                                                                              class="img-fluid rounded"></a>
                    </div>
                    <div class="col-lg-4">
                        <a href="<?= site_url()?>public/assets/images/about-10.jpg" class="glightbox"><img src="<?= site_url()?>public/assets/images/about-10.jpg" alt="Image"
                                                                              class="img-fluid rounded"></a>
                    </div>
                </div>
                <p>Pour tous vos travaux d’embellissement de vos maisons, bureaux, immeubles, salles, écoles, hôpitaux, usines, etc. Faite nous confiance.</p>
                <p>
                    Pour vos gitages métalliques ou en bois de plafond, bureau, faux pliers et vos placages ou installation Gyproc, timberlite, Triplex, Duplex et autre.
                    <br>
                    <b> BlackInch Sarl réalise vos rêves en mettant à votre disposition son personnel plus qualifié et doué pour un travail propre et dans le délai.</b>
                </p>
                <div class="row mt-5 pt-5 border-top">
                    <div class="col-12">
                        <span class="fw-bold text-black small mb-1">Visitez-nous sur</span>
                        <ul class="social list-unstyled">
                            <li><a href="<?= $sys_data->facebook_link ?>" target="_blank"><span
                                            class="icon-facebook"></span></a></li>
                            <li><a href="<?= $sys_data->instagram_link ?>" target="_blank"><span
                                            class="icon-instagram"></span></a></li>
                            <li><a href="https://wa.me/<?= $sys_data->phone ?>?text=Bonjour <?= $sys_data->name ?>"
                                   target="_blank"><span class="icon-whatsapp"></span></a></li>
                            <li><a href="<?= $sys_data->twitter_link ?>" target="_blank"><span
                                            class="icon-twitter"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

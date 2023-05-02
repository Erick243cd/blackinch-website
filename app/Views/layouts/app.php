<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= site_url() ?>public/assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="<?= site_url() ?>public/assets/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="<?= site_url() ?>public/assets/css/tiny-slider.css">
    <link rel="stylesheet" href="<?= site_url() ?>public/assets/css/glightbox.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>public/assets/css/aos.css">
    <link rel="stylesheet" href="<?= site_url() ?>public/assets/css/style.css">
    <title><?= altData() . ' | ' . ($title ?? altData()) ?></title>
    <script nonce="a3df895d-1564-427b-b023-c989bcc3cb54">(function (w, d) {
            !function (bv, bw, bx, by) {
                bv[bx] = bv[bx] || {};
                bv[bx].executed = [];
                bv.zaraz = {deferred: [], listeners: []};
                bv.zaraz.q = [];
                bv.zaraz._f = function (bz) {
                    return function () {
                        var bA = Array.prototype.slice.call(arguments);
                        bv.zaraz.q.push({m: bz, a: bA})
                    }
                };
                for (const bB of ["track", "set", "debug"]) bv.zaraz[bB] = bv.zaraz._f(bB);
                bv.zaraz.init = () => {
                    var bC = bw.getElementsByTagName(by)[0], bD = bw.createElement(by),
                        bE = bw.getElementsByTagName("title")[0];
                    bE && (bv[bx].t = bw.getElementsByTagName("title")[0].text);
                    bv[bx].x = Math.random();
                    bv[bx].w = bv.screen.width;
                    bv[bx].h = bv.screen.height;
                    bv[bx].j = bv.innerHeight;
                    bv[bx].e = bv.innerWidth;
                    bv[bx].l = bv.location.href;
                    bv[bx].r = bw.referrer;
                    bv[bx].k = bv.screen.colorDepth;
                    bv[bx].n = bw.characterSet;
                    bv[bx].o = (new Date).getTimezoneOffset();
                    if (bv.dataLayer) for (const bI of Object.entries(Object.entries(dataLayer).reduce(((bJ, bK) => ({...bJ[1], ...bK[1]}))))) zaraz.set(bI[0], bI[1], {scope: "page"});
                    bv[bx].q = [];
                    for (; bv.zaraz.q.length;) {
                        const bL = bv.zaraz.q.shift();
                        bv[bx].q.push(bL)
                    }
                    bD.defer = !0;
                    for (const bM of [localStorage, sessionStorage]) Object.keys(bM || {}).filter((bO => bO.startsWith("_zaraz_"))).forEach((bN => {
                        try {
                            bv[bx]["z_" + bN.slice(7)] = JSON.parse(bM.getItem(bN))
                        } catch {
                            bv[bx]["z_" + bN.slice(7)] = bM.getItem(bN)
                        }
                    }));
                    bD.referrerPolicy = "origin";
                    bD.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(bv[bx])));
                    bC.parentNode.insertBefore(bD, bC)
                };
                ["complete", "interactive"].includes(bw.readyState) ? zaraz.init() : bv.addEventListener("DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);</script>
</head>
<body>
<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>
<!--<nav class="site-nav fixed-top bg-light">-->
<nav class="site-nav">
    <div class="container">
        <div class="site-navigation">
            <div class="row">
                <div class="col-md-6 text-center order-1 order-md-2 mb-3 mb-md-0">
                    <a href="<?= (isset($page) && $page == 'home' ? "#" : site_url()) ?>"
                       class="logo m-0 text-uppercase">Blackinch Sarl</a>
                </div>
                <div class="col-md-3 order-3 order-md-1">
                    <form action="<?= site_url('search-service') ?>" class="search-form" method="post">
                        <span class="icon-search2"></span>
                        <input type="search" name="search" required class="form-control" placeholder="Rechercher...">
                    </form>
                </div>
                <div class="col-md-3 text-end order-2 order-md-3 mb-3 mb-md-0">
                    <div class="d-flex">
                        <ul class="list-unstyled social me-auto">
                            <li><a href="<?= $sys_data->facebook_link ?>" target="_blank"><span
                                            class="icon-facebook"></span></a></li>
                            <li><a href="<?= $sys_data->instagram_link ?>" target="_blank"><span
                                            class="icon-instagram"></span></a></li>
                            <li><a href="https://wa.me/<?= $sys_data->phone ?>?text=Bonjour <?= $sys_data->name ?>"
                                   target="_blank"><span class="icon-whatsapp"></span></a></li>
                        </ul>
                        <a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block"
                           data-toggle="collapse" data-target="#main-navbar">
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
            <ul class="js-clone-nav d-none d-lg-inline-none text-start site-menu float-end">
                <li class="<?= (isset($page) && $page == 'home') ? 'active' : '' ?>"><a
                            href="<?= (isset($page) && $page == 'home' ? "#" : site_url()) ?>">Accueil</a>
                </li>
                <li class="has-children <?= (isset($page) && $page == 'services') ? 'active' : '' ?>">
                    <a href="<?= (isset($page) && $page == 'services' ? "#" : site_url('services')) ?>">Services</a>
                    <ul class="dropdown">
                        <?php foreach ($services as $service): ?>
                            <li class="<?= (isset($page) && $page == $service->serviceId) ? 'active' : '' ?>">
                                <a href="<?= site_url('service-detail/' . $service->slug) ?>"><?= character_limiter($service->name, 10) ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="<?= (isset($page) && $page == 'about') ? 'active' : '' ?>"><a
                            href="<?= (isset($page) && $page == 'about' ? "#" : site_url('about')) ?>">A propos</a></li>
                <li class="<?= (isset($page) && $page == 'contact') ? 'active' : '' ?>"><a
                            href="<?= (isset($page) && $page == 'contact' ? "#" : site_url('contact')) ?>">Contact</a>
                </li>



                <li class="<?= (isset($page) && $page == 'posts') ? 'active' : '' ?>"><a
                            href="<?= (isset($page) && $page == 'about' ? "#" : site_url('posts')) ?>">Activités</a>
                </li>
                <?php if (isset($user_data)): ?>
                    <li><a onclick="return confirm('Etes-vous sûr de vous déconnecter ?')"
                           href="<?= site_url('logout') ?>">Logout</a></li>
                    <li><a href="<?= site_url('dashboard') ?>">Dashboard</a></li>
                <?php else: ?>
                    <li><a href="<?= site_url('login') ?>">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<?= $this->renderSection("content") ?>

<div class="py-5 bg-light mx-md-3 sec-subscribe">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="h4 fw-bold">Recevez nos emails</h2>
            </div>
        </div>
        <form action="#" class="row">
            <div class="col-md-8">
                <div class="mb-3 mb-md-0">
                    <input type="email" class="form-control" placeholder="Entrer votre adresse mail">
                </div>
            </div>
            <div class="col-md-4 d-grid">
                <input type="submit" class="btn btn-primary" value="Souscrire">
            </div>
        </form>
    </div>
</div>
<div class=" site-footer">
    <div class="container">
        <div class="row justify-content-center copyright">
            <div class="col-lg-7 text-center">
                <div class="widget">
                    <ul class="social list-unstyled">
                        <li><a href="<?= $sys_data->facebook_link ?>" target="_blank" rel="nofollow noopener"><span
                                        class="icon-facebook"></span></a></li>
                        <li><a href="<?= $sys_data->twitter_link ?>" target="_blank" rel="nofollow noopener"><span
                                        class="icon-twitter"></span></a></li>
                        <li><a href="<?= $sys_data->linkedin_link ?>" target="_blank" rel="nofollow noopener"><span
                                        class="icon-linkedin"></span></a></li>
                        <li><a href="https://wa.me/<?= $sys_data->phone ?>?text=Bonjour <?= $sys_data->name ?>"
                               target="_blank" rel="nofollow noopener"><span class="icon-whatsapp"></span></a></li>
                        <li><a href="<?= $sys_data->youtube_chanel_link ?>" target="_blank"
                               rel="nofollow noopener"><span class="icon-youtube-play"></span></a>
                        </li>
                    </ul>
                </div>
                <div class="widget">
                    <p>Blackinch Sarl &copy;<script>document.write(new Date().getFullYear());</script>
                        Tous droits réservés | par <a
                                href="https://afrinewsoft.com/" target="_blank" rel="nofollow noopener">Afrinewsoft</a>
                    </p>
                    <div class="d-block">
                        <a href="<?= (isset($page) && $page == 'about' ? "#" : site_url('about')) ?>" class="m-2">A
                            propos</a>/
                        <a href="<?= (isset($page) && $page == 'contact' ? "#" : site_url('contact')) ?>" class="m-2">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <script src="<?= site_url() ?>public/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= site_url() ?>public/assets/js/tiny-slider.js"></script>
    <script src="<?= site_url() ?>public/assets/js/glightbox.min.js"></script>
    <script src="<?= site_url() ?>public/assets/js/aos.js"></script>
    <script src="<?= site_url() ?>public/assets/js/navbar.js"></script>
    <script src="<?= site_url() ?>public/assets/js/counter.js"></script>
    <script src="<?= site_url() ?>public/assets/js/custom.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer
            src="https://static.cloudflareinsights.com/beacon.min.js/v2b4487d741ca48dcbadcaf954e159fc61680799950996"
            integrity="sha512-D/jdE0CypeVxFadTejKGTzmwyV10c1pxZk/AqjJuZbaJwGMyNHY3q/mTPWqMUnFACfCTunhZUVcd4cV78dK1pQ=="
            data-cf-beacon='{"rayId":"7b410e13df439ccc","version":"2023.3.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}'
            crossorigin="anonymous"></script>
</body>
</html>
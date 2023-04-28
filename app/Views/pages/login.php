<!DOCTYPE html>
<html lang="fr">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <title><?= "Login | " . $title ?? $contacts->name ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content=""/>
    <meta name="keywords" content="">
    <meta name="author" content="Afrinewsoft"/>
    <!-- Favicon icon -->
    <link rel="apple-touch-icon" sizes="180x180"
          href="<?= site_url() ?>public/assets/images/favicons/apple-touch-icon.png"/>
    <link rel="icon" type="image/png" sizes="32x32"
          href="<?= site_url() ?>public/assets/images/favicons/favicon-32x32.png"/>
    <link rel="icon" type="image/png" sizes="16x16"
          href="<?= site_url() ?>public/assets/images/favicons/favicon-16x16.png"/>
    <!-- vendor css -->
    <link rel="stylesheet" href="<?= site_url() ?>public/assets/es_admin/css/style.css">
</head>
<style>
    .auth-wrapper {
        background: linear-gradient(whitesmoke, orangered);
    }

    #btnLog {
        background: linear-gradient(orange, orangered);
        border-color: darkorange;
    }
</style>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
    <div class="auth-content">
        <div class="card">
            <?= form_open("login") ?>
            <?= csrf_field(); ?>
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <img src="<?= site_url() ?>public/assets/img/logo.png" alt="logo"
                             class="img-fluid mb-4"
                             style="height: 60px; width: 100%;"
                        >
                        <h4 class="mb-3 f-w-400">Connexion</h4>
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('success'); ?></div>
                        <?php endif; ?>
                        <div class="form-group mb-3">
                            <label class="floating-label" for="Email">Email</label>
                            <input type="text" class="form-control" id="email" name="u_email" placeholder=""
                                   value="<?= set_value('u_email') ?>">
                            <small id="input-help"
                                   class="form-text text-danger"><?= $validation['u_email'] ?? null; ?></small>
                        </div>
                        <div class="form-group mb-4">
                            <label class="floating-label" for="Password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" placeholder="" name="u_password">
                            <small id="input-help"
                                   class="form-text text-danger"><?= $validation['u_password'] ?? null; ?></small>
                        </div>
                        <button class="btn btn-block btn-primary mb-4" id="btnLog" type="submit">Se Connecter</button>
                        <p class="mb-2 text-muted">Retour sur le site web ? <a href="<?= site_url() ?>"
                                                                        class="f-w-400 text-primary"><i
                                        class="fas fa-angle-double-left mr-1 text-primary"></i>Back</a>
                        </p>
                    </div>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<!-- [ auth-signin ] end -->
<!-- Required Js -->
<script src="<?= base_url() ?>/public/assets/es_admin/js/vendor-all.min.js"></script>
<script src="<?= base_url() ?>/public/assets/es_admin/js/plugins/bootstrap.min.js"></script>
<script src="<?= base_url() ?>/public/assets/es_admin/js/ripple.js"></script>
<script src="<?= base_url() ?>/public/assets/es_admin/js/pcoded.min.js"></script>
</body>
</html>


<!DOCTYPE html>
<html lang="f">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <title><?= "Login | " . $title ?? $contacts->name ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content="<?= altData() ?>"/>
    <meta name="keywords" content="">
    <meta name="author" content="Afrinewsoft"/>
    <!-- Favicon icon -->
    <link rel="apple-touch-icon" sizes="180x180"
          href="<?= site_url() ?>public/assets/images/favicons/apple-touch-icon.png"/>
    <link rel="icon" type="image/png" sizes="32x32"
          href="<?= site_url() ?>public/assets/imageser/favicons/favicon-32x32.png"/>
    <link rel="icon" type="image/png" sizes="16x16"
          href="<?= site_url() ?>public/assets/images/favicons/favicon-16x16.png"/>
    <!-- vendor css -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/assets/es_admin/css/style.css">
</head>
<style>
    .auth-wrapper, #btnLog {
        background: linear-gradient(whitesmoke, orangered);
    }
</style>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
    <div class="auth-content">
        <div class="card">
            <?= form_open('change-pwd') ?>
            <?= csrf_field() ?>
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <h4 class="mb-4 f-w-400">Changement du mot de passe</h4>
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
                        <?php endif; ?>
                        <div class="form-group mb-3">
                            <input type="hidden" name="u_email" value="<?= $user_data['u_email']; ?>">
                            <label class="floating-label" for="current_password">Mot de Passe actuel</label>
                            <input type="password" class="form-control" placeholder="" name="current_password"
                                   value="<?= set_value('current_password'); ?>">
                            <small id="input-help"
                                   class="form-text text-danger"><?= $validation['current_password'] ?? null; ?></small>
                        </div>
                        <div class="form-group mb-3">
                            <label class="floating-label" for="new_Password">Nouveau Mot de Passe</label>
                            <input type="password" class="form-control" name="new_password" placeholder=""
                                   value="<?= set_value('new_password'); ?>">
                            <small id="input-help"
                                   class="form-text text-danger"><?= $validation['new_password'] ?? null; ?></small>
                        </div>
                        <div class="form-group mb-4">
                            <label class="floating-label" for="conf_new_password">Confirmer le Mot de Passe</label>
                            <input type="password" class="form-control" name="conf_new_password" placeholder=""
                                   value="<?= set_value('conf_new_password'); ?>">
                            <small id="input-help"
                                   class="form-text text-danger"><?= $validation['conf_new_password'] ?? null; ?></small>
                        </div>
                        <button class="btn btn-block btn-primary mb-4">Enregistrer Les Modifications</button>
                    </div>
                </div>
            </div>
            </form>
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


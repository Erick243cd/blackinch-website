<?= $this->extend("dashboard/base")?>
<?= $this->section("content")?>
<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Utilisateurs</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= site_url()?>dashboard"><i class="feather icon-home"></i>Tableau de Bord</a></li>
                            <li class="breadcrumb-item"><a href="<?= site_url()?>users">Liste Utilisateurs</a></li>
                            <li class="breadcrumb-item"><a href="#!">Création d'un nouvel Utilisateur</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Utilisateur</h5>
                    </div>
                    <div class="card-body">

                        <?= form_open('add-user')?>
                            <?= csrf_field()?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="floating-label" for="Email">Prénom</label>
                                        <input type="text" class="form-control" id="Text" aria-describedby="emailHelp" name="firstname" value="<?= set_value('firstname')?>">
                                        <small id="input-help" class="form-text text-danger"><?= $validation['firstname'] ?? null ;  ?></small>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="floating-label" for="Text">Nom</label>
                                        <input type="text" class="form-control" id="Text" name="lastname" value="<?= set_value('lastname')?>">
                                        <small id="input-help" class="form-text text-danger"><?= $validation['lastname'] ?? null ;  ?></small>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="floating-label" for="Text">Email</label>
                                        <input type="email" class="form-control" id="Text" name="email" value="<?= set_value('email')?>">
                                        <small id="input-help" class="form-text text-danger"><?= $validation['email'] ?? null ;  ?></small>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="floating-label" for="Text">Téléphone</label>
                                        <input type="tel" class="form-control" id="Text" name="phone" value="<?= set_value('phone')?>">
                                        <small id="input-help" class="form-text text-danger"><?= $validation['phone']  ?? null ;  ?></small>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label" for="">Rôle</label>
                                        <select name="role" class="form-control">
                                            <?php foreach($roles as $role):?>
                                                <option value="<?= $role->role_type?>" <?= set_select('role',$role->role_type);?>><?= ucfirst($role->role_type)?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <input type="submit" class="btn btn-md btn-primary" value="Sauvegarder">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>
<!-- [ Main Content ] end -->
<?= $this->endSection()?>

<?= $this->extend("dashboard/base") ?>
<?= $this->section("content") ?>
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5>Tous Les Utilisateurs</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= site_url() ?>dashboard"><i
                                            class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Les Utilisateurs</a></li>
                            <?php if ($user_data['u_role'] === 'admin'): ?>
                            <li class="breadcrumb-item"><a href="<?= site_url('add-user') ?>">Ajouter Un
                                    Utilisateur</a>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card user-profile-list">
                    <div class="card-body">
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                        <?php endif; ?>
                        <div class="dt-responsive table-responsive">
                            <?php if ($user_data['u_role'] === 'admin'): ?>
                                <div class="col-sm-12 text-right">
                                    <a type="button" href="<?= site_url() ?>add-user"
                                       class="btn btn-success btn-sm btn-round has-ripple"><i
                                                class="feather icon-plus"></i>&nbsp;Utilisateur</a>
                                </div>
                            <?php endif; ?>
                            <table id="user-list-table" class="table nowrap">

                                <?php if ($user_data['u_role'] === 'admin'): ?>
                                    <thead>
                                    <tr>
                                        <th>Noms</th>
                                        <th>Rôle</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($users as $row): ?>
                                        <tr>
                                            <td>
                                                <div class="d-inline-block align-middle">
                                                    <img src="<?= site_url() ?>public/assets/es_admin/images/user/<?= $row->u_picture ?? "no-image.jpg" ?>"
                                                         alt="user image" class="img-radius align-top m-r-15"
                                                         style="width:40px;">
                                                    <div class="d-inline-block">
                                                        <h6 class="m-b-0"><?= ucfirst($row->u_firstname) . ' ' . ucfirst($row->u_lastname) ?></h6>
                                                        <p class="m-b-0"><?= $row->u_email ?? "" ?></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?= ucfirst($row->u_role) ?? "" ?></td>
                                            <td><?= $row->phone ?? "" ?></td>
                                            <td>
                                                <?php if (isset($row->status)): ?>
                                                    <?php if ($row->status == 'desabled'): ?>
                                                        <span class="badge badge-light-danger">Désactivé</span>
                                                    <?php else : ?>
                                                        <span class="badge badge-light-success">Activé</span>
                                                    <?php endif ?>
                                                <?php else: ?>
                                                    <span class="badge badge-light-success">Activé</span>
                                                <?php endif ?>
                                                <div class="overlay-edit">
                                                    <?php if($user_data['u_id'] !== $row->u_id):?>
                                                        <a type="button" class="btn btn-icon btn-success"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Activer/Désactiver"
                                                        href="<?= site_url('active-user/' . $row->u_id) ?>"><i
                                                                    class="feather icon-check-circle"></i></a>
                                                   
                                                        <a type="button" href="<?= site_url('delete-user/' . $row->u_id) ?>"
                                                        data-toggle="tooltip" data-placement="top" title="Supprimer"
                                                        class="btn btn-icon btn-danger"
                                                        onclick="return confirm('Etes-vous sûr de supprimer cet utilisateur ?')">
                                                            <i class="feather icon-trash-2"></i></a>
                                                    <?php endif;?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Noms</th>
                                        <th>Rôle</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                    </tr>
                                    </tfoot>
                                <?php endif; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->

<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>

<?= $this->endSection() ?>


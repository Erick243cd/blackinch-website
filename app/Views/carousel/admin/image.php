<?= $this->extend("dashboard/base") ?>
<?= $this->section("content") ?>
<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Carousel</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>/dashboard"><i
                                        class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>/dashboard">Les Images</a></li>
                            <li class="breadcrumb-item"><a href="#!">Ajouter une image</a></li>
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
                        <h5>Sélectionnez une ou plusieurs images</h5>
                    </div>
                    <?php if (session()->getFlashdata('success') !== NULL) : ?>
                        <div class="alert alert-primary alert-dismissible fade show" role="alert" style="border:1px solid dodgerblue  ;background-color:transparent;elevation:20deg; border-radius: 10px; text-align: center; margin-left: 5%; margin-right: 5%">
                            <?= session()->getFlashdata('success'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    <?php endif; ?>
                    <!-- [ breadcrumb ] end -->
                    <div class="card-body">
                        <?= form_open_multipart('add-carousel/'. $service->serviceId) ?>
                            <?= csrf_field()?>
                            <input type="hidden" name="service_id" value="<?= $service->serviceId;?>">
                            <div class="row text-c">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="pictures[]" accept="image/*" multiple>
                                    </div>
                                    <small id="input-help" class="form-text text-danger"><?= $validation['pictures'] ?? null; ?></small>
                                </div>
                                
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Télécharger</button>
                                </div>
                            </div>
                        <?= form_close()?>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>
<!-- [ Main Content ] end -->

<?= $this->endSection() ?>

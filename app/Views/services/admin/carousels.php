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
                            <h5 class="m-b-10"><?= $title ?></h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= site_url() ?>dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= site_url() ?>list-services">Services</a></li>
                            <li class="breadcrumb-item"><a href="#!"><?= $title ?></a></li>
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
                        <div class="row">
                            <div class="col-sm-6">
                                <h5><?= $title ?></h5>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a type="button" href="<?= site_url() ?>add-carousel/<?= $service->serviceId ?>" class="btn btn-success btn-sm btn-round has-ripple"><i class="feather icon-plus"></i>&nbsp;Image</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-primary"><?= session()->getFlashdata('success'); ?></div>
                        <?php endif; ?>
                        <?php if ($cars) : ?>
                            <div class="row justify-content-center">
                                <?php foreach ($cars as $car) : ?>
                                    <div class="col-lg-4 col-sm-6 text-center">
                                        <div class="thumbnail mb-4">
                                            <div class="thumb">
                                                <a href="<?= site_url() ?>public/assets/es_admin/images/carousels/<?= $car->pictures; ?>" data-lightbox="1" data-title="Carousel">
                                                    <img src="<?= site_url() ?>public/assets/es_admin/images/carousels/<?= $car->pictures; ?>" alt="" class="img-fluid img-thumbnail">
                                                </a>
                                            </div>
                                            <a href="<?= site_url() ?>delete-carousel/<?= $car->car_id; ?>" data-toggle="tooltip" data-placement="top" title="Supprimer" class="btn btn-icon btn-outline-danger mt-1" onclick="return confirm('Voulez-vous supprimer cette image ?')">
                                                <i class="feather icon-trash-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>
<!-- [ Main Content ] end -->
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>
<?= $this->endSection() ?>
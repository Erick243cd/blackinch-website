<?= $this->extend("dashboard/base") ?>
<?= $this->section("content") ?>
<?php helper('form')?>
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
                            <li class="breadcrumb-item"><a href="#!">Ajouter les images</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ file-upload ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Ajouter une ou plusieurs images à la fois</h5>
                    </div>
                    <div class="card-body">
                        <!-- </?= form_open_multipart('add-carousel/'. $service->serviceId, 'id="form class="dropzone dz-clickable"');?> -->
                        <form action="<?=site_url()?>add-carousel/<?=$service->serviceId?>" class="dropzone dz-clickable">
                            <?= csrf_token();?>
                            <div class="fallback">
                                <input name="picture[]" type="file" id="file" multiple />
                            </div>
                            <div class="text-center m-t-20">
                                <button type="submit" class="btn btn-primary" id="submit">Télécharger</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- [ file-upload ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>
<!-- [ Main Content ] end -->


<?= $this->endSection() ?>

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
                                <li class="breadcrumb-item"><a href="<?= site_url() ?>dashboard"><i
                                                class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="<?= site_url() ?>list-posts">Emissions</a></li>
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
                            <h5><?= $title ?></h5>
                        </div>
                        <div class="card-body">

                            <?= form_open_multipart('add-podcast') ?>
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label" for="name">Titre</label>
                                        <input type="text" class="form-control" name="title"
                                               value="<?= set_value('title') ?>">
                                        <small id="input-help"
                                               class="form-text text-danger"><?= $validation['title'] ?? null; ?></small>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label" for="">Catégorie de l'émission</label>
                                        <select name="category_id" class="form-control">
                                            <?php foreach ($categories as $row): ?>
                                                <option value="<?= $row->categoryId ?>" <?= set_select('category_id', $row->categoryId); ?>><?= ucfirst($row->name) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small id="input-help"
                                               class="form-text text-danger"><?= $validation['category_id'] ?? null; ?></small>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="audio_file" accept=".mp3, .wav">
                                    </div>
                                    <small id="input-help"
                                           class="form-text text-danger"><?= $validation['audio_file'] ?? null; ?></small>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <input type="submit" class="btn btn-md btn-primary" value="Enregistrer et publier">
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
<?= $this->endSection() ?>
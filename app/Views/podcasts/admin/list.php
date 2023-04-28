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
                            <h5 class="m-b-10"><?= $title ?? altData() ?></h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= site_url() ?>dashboard"><i
                                        class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!"><?= $title ?? altData() ?></a></li>
                            <li class="breadcrumb-item"><a href="#!">Liste des emissions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- customar project  start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center m-l-0">
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-6 text-right">
                                <a type="button" href="<?= site_url() ?>add-podcast"
                                   class="btn btn-success btn-sm btn-round has-ripple"><i
                                        class="feather icon-plus"></i>&nbsp;Emissions</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="report-table" class="table mb-0">
                                <thead class="thead-light">
                                <tr>
                                    <th>Titre</th>
                                    <th>Catégorie</th>
                                    <th>Fichier audio</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if ($podcasts) : ?>
                                    <?php foreach ($podcasts as $row) : ?>
                                        <tr>
                                            <td class="align-middle">
                                                <p class="m-0 d-inline-block align-middle font-16">
                                                    <a href="#!"
                                                       class="text-body"><?= character_limiter($row->title, 50) ?></a>
                                                </p>
                                            </td>
                                            <td class="text-justify">
                                                <?= $row->name ?>
                                            </td>
                                            <td class="text-justify">
                                                <audio controls preload="metadata">
                                                    <source src="<?= site_url() ?>public/assets/podcasts/<?= $row->audioFile ?>"
                                                            type="audio/ogg">
                                                </audio>
                                            </td>
                                            <td class="align-middle">
                                                <?= date('d M , Y', strtotime($row->updated_at)) ?>
                                            </td>

                                            <td class="table-action">
                                                <a type="button"
                                                   href="<?= base_url() ?>podcast-edit/<?= $row->podcastId ?>"
                                                   data-toggle="tooltip" data-placement="top" title="Modifier"
                                                   class="btn btn-icon btn-outline-success">
                                                    <i class="feather icon-edit"></i>
                                                </a>
                                                <a href="<?= base_url() ?>delete-podcast/<?= $row->podcastId ?>"
                                                   data-toggle="tooltip" data-placement="top" title="Supprimer"
                                                   class="btn btn-icon btn-outline-danger"
                                                   onclick="return confirm('Voulez-vous supprimer cet élément ?')"
                                                >
                                                    <i class="feather icon-trash-2"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- customar project  end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>

</div>
<!-- [ Main Content ] end -->


<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    // DataTable start
    $('#report-table').DataTable({
        "lengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ]
    });
    // DataTable end
</script>

<?= $this->endSection() ?>



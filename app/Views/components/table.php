<?= $title_web ?>
<div class="card w-100" style="opacity: 0.9; width: 100%; display: block; overflow-x: auto;">
    <div class="card-header">
        <h4 class="card-title">Data <?= $title ?></h4>
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary btn-sm mb-3" hx-get="/<?= $controller ?>/add" hx-target="#konten" hx-replace-url="/<?= $controller ?>/add">Tambah Data</button> &nbsp;
            <button class="btn btn-primary btn-sm mb-3" hx-get="/<?= $controller ?>/upload" hx-target="#konten" hx-replace-url="/<?= $controller ?>/upload">Upload Data</button>
        </div>
    </div>
    <div class="card-body w-100">
        <div class="table-responsive">
            <div id="example-2_wrapper">
                <table id="example-2" class="display dataTable" style="min-width: 100%" aria-describedby="example-2_info">
                    <thead>
                        <tr role="row">
                            <?php foreach ($thead as $t) : ?>
                                <th><?= $t ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody style="width: 100%;" class="text-center">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    var table = $('#example-2').DataTable(<?= $tabel ?>);
</script>

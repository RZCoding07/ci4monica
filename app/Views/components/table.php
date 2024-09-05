<?= $title_web ?>
<div id="particles-js"></div>
<div class="card" style="opacity: 0.9;">
    <div class="card-header">
     
     <h4 class="card-title">Data <?= $title ?> <?= dd($regional) ?></h4>
        <div class="d-flex justify-content-end ">
            <div class="row">
                <div class="col">
                    <label for="">Pilih Regional</label>
                    <select class=" form-control" aria-label=".form-select-lg example">
                        <option selected disabled>Pilih Regional</option>
                    </select>

                </div>
                <div class="col">
                    <label for="">Pilih PKS</label>
                    <select class="form-control" aria-label=".form-select-lg example">
                        <option selected disabled>Pilih PKS</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>

                </div>
                <div class="col">
                    <label for="">Pilih Tahun</label>
                    <select class="form-control" aria-label=".form-select-lg example">

                    </select>

                </div>
                <div class="col">
                    <button class="btn btn-primary mt-4 rounded-circle btn-sm"><i class="fa fa-sync-alt"></i></button>
                </div>

            </div>

        </div>
        <div class="d-flex justify-content-end ">
            <button class="btn btn-primary btn-sm mb-3" hx-get="/<?= $controller ?>/add" hx-target="#konten" hx-replace-url="/<?= $controller ?>/add">Tambah Data</button> &nbsp;
            <button class="btn btn-primary btn-sm mb-3" hx-get="/<?= $controller ?>/upload" hx-target="#konten" hx-replace-url="/<?= $controller ?>/upload">Upload Data</button>
        </div>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <div id="example-2_wrapper" class="dataTables_wrapper">
                <table id="example-2" class="display dataTable" style="min-width: 850px" aria-describedby="example-2_info">
                    <thead>
                        <tr role="row">
                            <?php foreach ($thead as $t) : ?>
                                <th><?= $t ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    var table = $('#example-2').DataTable(<?= $tabel ?>);
</script>
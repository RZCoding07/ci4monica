<?= $title_web ?>
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Upload <?= $title ?></h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="example-2_wrapper" class="dataTables_wrapper">
                <?= form_open_multipart(strtolower($title) . '/upload') ?>
                <?= $form ?>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button class="btn btn-warning float-end" hx-get="/<?= strtolower($title) ?>" hx-target="#konten" hx-replace-url="/<?= strtolower($title) ?>">Kembali</button>
    </div>
</div>

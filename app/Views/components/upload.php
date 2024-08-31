<?= $title_web ?>
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Upload <?= $title ?></h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="example-2_wrapper" class="dataTables_wrapper">
                <?= form_open($controller . '/do_upload', ['id' => 'templateFormForm2']) ?>
                <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" class="form-control" name="excelFile" id="excelFile" required>
                </div>

                <div class="form-group mt-3 float-end">
                    <button type="button" class="btn btn-primary" id="btnUpload" onclick="handleUpload()">Upload</button>
                </div>
                <input type="hidden" name="inputData" id="inputData">
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button class="btn btn-warning float-end" hx-get="/<?= $controller ?>" hx-target="#konten" hx-replace-url="/<?= $controller ?>">Kembali</button>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
<script>
    async function excelProcessor(file) {
        if (!file) {
            return Promise.reject(new Error('File not found'));
        }
        let reader = new FileReader();
        return new Promise((resolve, reject) => {
            reader.onload = function(e) {
                try {
                    let workbook = XLSX.read(e.target.result, {
                        type: 'binary'
                    });
                    let sheet = workbook.Sheets[workbook.SheetNames[0]];
                    if (!sheet) {
                        return reject(new Error('Invalid file, make sure the file matches the template'));
                    }
                    let data = XLSX.utils.sheet_to_json(sheet, {
                        header: 1,
                        blankrows: false,
                        range: 1,
                        raw: true,
                        defval: ''
                    });
                    resolve(data);
                } catch (error) {
                    reject(error);
                }
            };
            reader.readAsBinaryString(file);
        });
    }
    $('#excelFile').on('change', async function(e) {
        let mappedData = [];
        e.preventDefault();
        $("#btnUpload").html('<i class="fa fa-spinner fa-spin"></i> Loading...');

        let fileform = $('#excelFile').get(0).files[0];
        let file = await excelProcessor(fileform);

        const chunkSize = Math.ceil(file.length / 10);
        for (let i = 0; i < 10; i++) {
            const chunk = file.slice(i * chunkSize, (i + 1) * chunkSize);
            mappedData.push(chunk);
        }

        console.log(mappedData);

        $("#inputData").val(JSON.stringify(mappedData));
        $("#btnUpload").html('Upload');
    });

    async function handleUpload() {
        const mappedData = JSON.parse($("#inputData").val());
        const uploadPromises = [];
        let allSuccessful = true;

        let toastMixin = Swal.mixin({
            toast: true,
            icon: 'success',
            title: 'General Title',
            animation: false,
            position: 'top-right',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });

        for (let i = 0; i < mappedData.length; i++) {
            uploadPromises.push(
                fetch(`<?= base_url() ?>/<?= $controller ?>/do_upload`, {
                    method: "POST",
                    headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                        mappedData: mappedData[i],
                    }),
                })
                .then(response => response.json().then(data => ({
                    ok: response.ok,
                    data
                })))
                .then(({
                    ok,
                    data
                }) => {
                    if (ok) {
                        toastMixin.fire({
                            animation: true,
                            title: `Batch ${i + 1} uploaded successfully`,
                        });
                    } else {
                        allSuccessful = false;
                        toastMixin.fire({
                            animation: true,
                            icon: 'error',
                            title: `Batch ${i + 1} failed to upload: ${data.message}`,
                        });
                    }
                })
                .catch(() => {
                    allSuccessful = false;
                    toastMixin.fire({
                        animation: true,
                        icon: 'error',
                        title: `Batch ${i + 1} failed to upload`,
                    });
                })
            );
        }

        // Menunggu semua promises selesai
        await Promise.allSettled(uploadPromises);

        if (allSuccessful) {
            toastMixin.fire({
                title: 'All chunks uploaded successfully',
                icon: 'success',
            });
        } else {
            toastMixin.fire({
                title: 'Some chunks failed to upload!',
                icon: 'error',
            });
        }
    }
</script>
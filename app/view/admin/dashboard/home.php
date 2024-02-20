<div class="container-fluid px-4">
    <h1 class="mt-4"><textarea style="border-style:none; max-height: 50px; min-height: 50px; overflow : hidden">Dashboard</textarea></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Data Warga Total</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <?= $warga->count ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Aspirasi Masuk</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <?= $aspirasi->count ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Alarm Darurat Sudah Dibunyikan Sebanyak</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <?= $darurat->count ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 mb-4">
                    
                </div>
            </div>
        </div>
    </div>
</div>
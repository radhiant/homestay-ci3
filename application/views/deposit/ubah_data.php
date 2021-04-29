<?php foreach($data as $d): ?>

<form action="<?= base_url() ?>deposit/proses_ubah" name="myForm" method="POST" enctype="multipart/form-data"
    onsubmit="return validateForm()" id="myForm">

    <div class="row mb-4">

        <div class="col-lg-12 mb-4 d-flex justify-content-between">
            <div class="d-flex">
                <div>
                    <a href="<?= base_url() ?>deposit" class="btn btn-primary rounded-circle mr-1"><i
                            class="fas fa-arrow-left"></i></a>
                </div>
                <h1 class="h3 font-weight-bold mt-1">Deposit</h1>
            </div>

            <div class="d-flex">
                <div>
                    <button type="submit" class="btn btn-success rounded-pill shadow mr-2" onclick="loadingklik()">
                        <span class="text">Simpan Perubahan</span> <i class="fas fa-check-circle"></i>
                    </button>
                </div>
                <div>
                    <a href="<?= base_url() ?>deposit" class="btn btn-danger rounded-pill shadow">
                        <span class="text">Batal</span> <i class="fas fa-times-circle"></i>
                    </a>
                </div>
            </div>

        </div>

        <div class="col-lg-2"></div>

        <div class="col-lg-8">
            <div class="card mb-5">
                <!-- Card Header - Accordion -->
                <div class="card-header bg-success d-flex justify-content-between">
                    <h6 class="font-weight-bold text-white mt-2">Form Ubah</h6>

                </div>
                <div class="card-body">

                <input type="hidden" value="<?= $d->deposit_id ?>" name="iddeposit">


                    <div class="form-group">
                        <label>Pilih Pelanggan</label>
                        <select name="pelanggan" class="form-control chosen" onchange="getKamar()" id="pelanggan">
                            <option value="">--Pilih--</option>
                            <?php foreach($pelanggan as $p): ?>
                            <option value="<?= $p->pelanggan_id ?>" <?= $d->pelanggan_id == $p->pelanggan_id ? 'selected' : '' ?>>[<?= $p->pelanggan_noktp ?>]
                                <?= $p->pelanggan_nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Pilih Kamar</label>
                        <input type="hidden" id="kamarid" value="<?= $d->kamar_id ?>">
                        <select name="kamar" class="form-control" id="kamar">
                            <option value="">--Pilih--</option>
                        </select>
                    </div>
                    

                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="text" class="form-control datetimepicker" name="tgl" id="tgl" autocomplete="off" value="<?= substr($d->deposit_tgl, 0, 16)?>">
                    </div>


                    <div class="form-group">
                        <label>Nominal</label>
                        <input type="text" class="form-control" name="nominal" id="nominal" value="<?= number_format($d->deposit_nominal,0,",",".") ?>">
                    </div>


                </div>
            </div>
        </div>

        <div class="col-lg-2"></div>

    </div>

</form>

<?php endforeach; ?>
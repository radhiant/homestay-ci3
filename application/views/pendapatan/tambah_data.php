<form action="<?= base_url() ?>pendapatan/proses_tambah" name="myForm" method="POST" enctype="multipart/form-data"
    onsubmit="return validateForm()" id="myForm">

    <div class="row mb-4">

        <div class="col-lg-12 mb-4 d-flex justify-content-between">
            <div class="d-flex">
                <div>
                    <a href="<?= base_url() ?>pendapatan" class="btn btn-primary rounded-circle mr-1"><i
                            class="fas fa-arrow-left"></i></a>
                </div>
                <h1 class="h3 font-weight-bold mt-1">Pendapatan</h1>
            </div>

            <div class="d-flex">
                <div>
                    <button type="submit" class="btn btn-primary rounded-pill shadow mr-2" onclick="loadingklik()">
                        <span class="text">Simpan</span> <i class="fas fa-check-circle"></i>
                    </button>
                </div>
                <div>
                    <a href="<?= base_url() ?>pendapatan" class="btn btn-danger rounded-pill shadow">
                        <span class="text">Batal</span> <i class="fas fa-times-circle"></i>
                    </a>
                </div>
            </div>

        </div>

        <div class="col-lg-1"></div>

        <div class="col-lg-10">
            <div class="card mb-5">
                <!-- Card Header - Accordion -->
                <div class="card-header bg-primary d-flex justify-content-between">
                    <h6 class="font-weight-bold text-white mt-2">Form Tambah</h6>

                </div>
                <div class="card-body">


                    <div class="form-group">
                        <label>Pilih Pelanggan</label>
                        <select name="pelanggan" class="form-control chosen">
                            <option value="">--Pilih--</option>
                            <?php foreach($pelanggan as $p): ?>
                            <option value="<?= $p->pelanggan_id ?>">[<?= $p->pelanggan_noktp ?>]
                                <?= $p->pelanggan_nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Pilih Kamar</label>
                        <select name="kamar" class="form-control chosen" id="kamar">
                            <option value="">--Pilih--</option>
                            <?php foreach($kamar as $k): ?>
                            <option value="<?= $k->kamar_id ?>"><?= $k->kamar_no ?> -
                                <?= $k->kamar_type ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Lama Sewa</label>
                        <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" class="form-control" name="ls" id="ls" value="1">
                    </div>

                    <div class="form-group">
                        <label>Type Sewa</label>
                        <select name="ts" class="form-control chosen" onchange="getTS()" id="ts">
                            <option value="">--Pilih--</option>
                            <?php foreach($pilsewa as $t): ?>
                            <option value="<?= $t->pilsewa_id ?>"><?= $t->pilsewa_nama ?> -
                                <?= $t->pilsewa_type ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Harga Sewa</label>
                        <input type="text" class="form-control" name="biaya" id="biaya" value="0">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Check-in</label>
                        <input type="text" class="form-control datetimepicker" name="tglM" id="tglM" autocomplete="off" value="<?= $datenow; ?>">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Check-out</label>
                        <input type="text" class="form-control datetimepicker" name="tglK" id="tglK" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label>Pembayaran</label>
                        <select name="pembayaran" class="form-control chosen">
                            <option value="">--Pilih--</option>
                            <option value="Tunai">Tunai</option>
                            <option value="Aplikasi">Aplikasi</option>
                            <option value="Transfer">Transfer</option>
                        </select>
                    </div>

                     <div class="form-group">
                        <label>Total Harga Sewa</label>
                        <input type="text" class="form-control" name="total" id="total" value="0">
                    </div>

                    <div class="form-group">
                        <label>Pilih Sales</label>
                        <select name="sales" class="form-control chosen" onchange="CalcDiff()">
                            <option value="">--Pilih--</option>
                            <?php foreach($sales as $s): ?>
                            <option value="<?= $s->sales_id ?>">
                                <?= $s->sales_nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                     <div class="form-group">
                        <label>Fee Sales</label>
                        <input type="text" class="form-control" name="fee" id="fee" value="0">
                    </div>

                    <div class="form-group">
                        <label>Status Pembayaran</label>
                        <select name="spembayaran" class="form-control chosen">
                            <option value="">--Pilih--</option>
                            <option value="Lunas">Lunas</option>
                            <option value="DP">DP</option>
                            <option value="Belum Bayar">Belum Bayar</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="ket" class="form-control"></textarea>
                    </div>


                </div>
            </div>
        </div>

        <div class="col-lg-1"></div>

    </div>

</form>
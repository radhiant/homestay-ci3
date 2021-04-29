<div class="row bg-langit relatip">



    <div class="col-lg-12">

        <div class="relatip">
            <img src="<?= base_url() ?>assets/upload/default/cloud1.png" class="awan1" height="150px">
            <img src="<?= base_url() ?>assets/upload/default/cloud1.png" class="awan2" height="150px">
            <img src="<?= base_url() ?>assets/upload/default/cloud1.png" class="awan3" height="150px">
        </div>

        <div class="sun">
            <div class="sun-face">
                <div class="sun-hlight"></div>
            </div>
            <div class="sun-anime">
                <div class="sun-ball"></div>
                <div class="sun-light">
                    <b></b>
                    <s></s>
                </div>
                <div class="sun-light">
                    <b></b>
                    <s></s>
                </div>
                <div class="sun-light">
                    <b></b>
                    <s></s>
                </div>
                <div class="sun-light">
                    <b></b>
                    <s></s>
                </div>
                <div class="sun-light">
                    <b></b>
                    <s></s>
                </div>
                <div class="sun-light">
                    <b></b>
                    <s></s>
                </div>
                <div class="sun-light">
                    <b></b>
                    <s></s>
                </div>
                <div class="sun-light">
                    <b></b>
                    <s></s>
                </div>
                <div class="sun-light">
                    <b></b>
                    <s></s>
                </div>
                <div class="sun-light">
                    <b></b>
                    <s></s>
                </div>
                <div class="sun-light">
                    <b></b>
                    <s></s>
                </div>
                <div class="sun-light">
                    <b></b>
                    <s></s>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-1"></div>

    <div class="col-lg-10">
        <br><br><br>
        <div class="card bangunan">
            <div class="card-body p-5">

                <div class="row">

                    <div class="col-lg-12 mb-5 text-center">
                        <h4 class="text-bold text-white">Safira Halim Homestay</h4>
                    </div>

                    <?php if($jmlData <= 0): ?>
                    <div class="col-lg-12 mb-5">
                        <div class="card bg-light text-black jendela">
                            <div class="card-body p-3 text-center">
                                <h4 class="mt-4">
                                    Data Kamar belum ada !
                                </h4>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php foreach($data as $d): ?>

                    <?php 
                        $this->db->select('*');
                        $this->db->where('kamar_id', $d->kamar_id);
                        $this->db->where('pendapatan_tgl_masuk <=', $now);
                        $this->db->where('pendapatan_tgl_keluar >=', $now);
                        $query = $this->db->get('tbl_pendapatan');    
                        $data = $query->row();
                        if($query->num_rows() > 0){
                            $hasil = 'in';

                            $this->db->select('*');
                            $this->db->where('kamar_id', $data->kamar_id);
                            $this->db->where('deposit_tgl >=', $data->pendapatan_tgl_masuk);
                            $query1 = $this->db->get('tbl_deposit');    

                            if($query1->num_rows() > 0){
                                $hasil1 = 'in';
                            }else{
                                $hasil1 = 'null';
                            }
                        
                        }else{
                            $hasil = 'null';
                            $hasil1 = 'null';
                        }

                        

                        ?>

                    <div class="<?= $jmlData <= 9 ? 'col-lg-4' : 'col-lg-3' ?> mb-5">
                        <div
                            class="card <?= $hasil == 'in' ? 'bg-primary text-white' : 'bg-light text-black' ?> jendela">
                            <div class="card-body p-3 text-center">
                                <h4 class="<?= $hasil1 == 'in' ? '' : 'mt-3' ?>">
                                    <?= $d->kamar_type ?>
                                </h4>
                                <h4 class="">
                                    <?= $d->kamar_no ?>
                                </h4>
                                <h5>
                                    <?php if($hasil1 == 'in'): ?>
                                    <span class="badge badge-success rounded-pill">Deposit</span>
                                    <?php endif; ?>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; ?>

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3"><br><br><br><br><br><br><br><br><br></div>


                            <div class="col-lg-6">
                                <div class="card bg-light pintu">

                                </div>
                            </div>

                            <div class="col-lg-3"></div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="col-lg-1"></div>


</div>

<div class="relatip" id="bottom">
    <img src="<?= base_url() ?>assets/upload/default/tree1.png" class="tree1" height="300px">
    <img src="<?= base_url() ?>assets/upload/default/tree2.png" class="tree2" height="300px">
    <img src="<?= base_url() ?>assets/upload/default/car2.png" class="car2" width="300px">
    <img src="<?= base_url() ?>assets/upload/default/moto1.png" class="moto1" width="150px">
    <img src="<?= base_url() ?>assets/upload/default/moto2.png" class="moto2" width="150px">
    <img src="<?= base_url() ?>assets/upload/default/car1.png" class="car1" width="350px">

    <div id="stage">
        <div id="road">
            <div id="stripes"></div>
        </div>
    </div>
</div>
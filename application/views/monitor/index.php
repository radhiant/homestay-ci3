<div class="row mb-4">

    <div class="col-xl-12 col-md-12 mb-4 mt-4 d-flex justify-content-between">

        <div>
            <h1 class="h1 ml-4" id="hari">...</h1>
            <h1 class="h1 ml-4"><span class="badge badge-primary shadow rounded-pill" id="jam"><i
                        class="far fa-clock"></i> 00:00:00</span></h1>
            <div class="d-flex">
                <h6 class="h6 ml-4 mt-3"><span class="badge badge-secondary shadow">&nbsp; &nbsp; &nbsp;</span> Kamar
                    kosong</h6>
                <h6 class="h6 ml-4 mt-3"><span class="badge badge-primary shadow">&nbsp; &nbsp; &nbsp;</span> Di Booking
                </h6>
                <h6 class="h6 ml-4 mt-3"><span class="badge badge-danger shadow">&nbsp; &nbsp; &nbsp;</span> Segera
                    Checkout</h6>
                <h6 class="h6 ml-4 mt-3"><span class="badge badge-warning shadow">&nbsp; &nbsp; &nbsp;</span> Sudah
                    booking belom bayar</h6>
            </div>

        </div>


        <img class="rounded shadow" height="100px" src="<?= base_url() ?>assets/icon/logo-homestay.png">
    </div>

    <div class="col-xl-12 col-md-12">
        <hr>
    </div>



    <?php foreach($data as $d): ?>

    <?php 
        $this->db->select('*');
        $this->db->where('kamar_id', $d->kamar_id);
        $this->db->where('pendapatan_tgl_masuk <=', $now);
        $this->db->where('pendapatan_tgl_keluar >=', $now);
        $query = $this->db->get('tbl_pendapatan');    
        $data = $query->row();
        if($query->num_rows() > 0){
            

            $getData = $query->row();
            $tglK = $getData->pendapatan_tgl_keluar;

            // $startTimeStamp = strtotime($getData->pendapatan_tgl_masuk);
            // $endTimeStamp = strtotime($getData->pendapatan_tgl_keluar);

            // $timeDiff = abs($endTimeStamp - $startTimeStamp);

            // $numberDays = $timeDiff/86400;  // 86400 seconds in one day

            // // and you might want to convert to integer
            // $numberDays = intval($numberDays);
            
            
            if($getData->pendapatan_total == '0'){
                $hasil = 'request';
            }elseif($tglK == $now){
                $hasil = 'inout';
            }else{
                $hasil = 'in';
            }

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

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card 
        <?php if($hasil == 'in'){echo 'border-left-primary';}elseif($hasil == 'inout'){echo 'checkout';}elseif($hasil == 'request'){echo 'border-left-warning';}else{echo 'border-left-secondary';} ?> shadow h-100 py-2 
        <?php if($hasil == 'in'){echo 'bg-primary';}elseif($hasil == 'inout'){echo 'checkout';}elseif($hasil == 'request'){echo 'bg-warning';}else{echo 'bg-secondary';} ?>
        ">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div
                            class="text font-weight-bold <?= $hasil == 'in' || $hasil == 'inout' ? 'text-white' : 'text-white' ?> text-uppercase mb-1">
                            <?= $d->kamar_no ?>
                            <?php if($hasil1 == 'in'): ?>
                            <span class="badge badge-success rounded-pill">Deposit</span>
                            <?php endif; ?>
                        </div>
                        <div
                            class="h5 mb-0 font-weight-bold <?= $hasil == 'in' || $hasil == 'inout' ? 'text-white' : ' text-white' ?>">
                            <?= $d->kamar_type ?>
                        </div>
                    </div>
                    <div class="col-auto position-relative">
                        <i class="fas fa-bed fa-2x text-gray-300"></i>
                    </div>
                </div>

                <!-- <div class="col mr-2 mt-2">
                    <?= $numberDays; ?>
                </div> -->
            </div>
        </div>
    </div>

    <?php endforeach; ?>

</div>
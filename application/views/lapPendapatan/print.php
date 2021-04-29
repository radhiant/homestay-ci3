<?php 

 function getBulan($bulan)
{
    switch ($bulan) {
        case "January":
          return 'Januari';
          break;
        case "February":
            return 'Februari';
          break;
        case "March":
            return 'Maret';
          break;
        case "April":
            return 'April';
          break;
        case "May":
            return 'Mei';
          break;
        case "June":
            return 'Juni';
          break;
        case "July":
            return 'Juli';
          break;
        case "August":
            return 'Agustus';
          break;
        case "September":
            return 'September';
          break;
        case "October":
            return 'Oktober';
          break;
        case "November":
            return 'November';
          break;
        case "December":
            return 'Desember';
          break;
          
        default:
        return 'Semua';
      }
}

?>
<div class="row">

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12 mt-4 mb-5">
            <div class="d-flex">
                <img class="mr-3 ml-4 rounded" width="225" src="<?= base_url() ?>assets/icon/logo-homestay.png">
                <div>
                    <h1>Laporan Pendapatan</h1>
                    <h4><?= getBulan($bulan) ?> - <?= $tahun ?></h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card">
            <div class="card-body p-4">
                <?php $no = 1; foreach($sales as $s): ?>
                <div class="d-flex justify-content-between">
                    <h5 class="mr-4 ml-2">
                        <?= $no++ ?>. <?= $s->sales_nama ?>
                    </h5>
                    <h4 class="font-weight-bold mr-4">
                        <?php 
                        $this->db->select_sum('pendapatan_total');
                        $this->db->where('sales_id', $s->sales_id);
                        if($tglAwal != ''){
                            $this->db->where('pendapatan_tgl_masuk >=', $tglAwal);
                            $this->db->where('pendapatan_tgl_masuk <=', $tglAkhir);
                        }else{
                            $this->db->where('YEAR(pendapatan_tgl_masuk)', $tahun);
                        }
                        $getData= $this->db->get('tbl_pendapatan');
                        $hasil = $getData->row();
                        echo 'Rp '.number_format($hasil->pendapatan_total,0,",",".");
                        ?>
                    </h4>
                </div>
                <hr class="sidebar-divider d-none d-md-block mb-4">
                <?php endforeach; ?>

                <div class="d-flex justify-content-between mb-4">
                    <h5 class="mr-4">
                        <b> TOTAL </b>
                    </h5>
                    <h3 class=" font-weight-bold">
                        <?php 
                        $this->db->select_sum('pendapatan_total');
                        if($tglAwal != ''){
                            $this->db->where('pendapatan_tgl_masuk >=', $tglAwal);
                            $this->db->where('pendapatan_tgl_masuk <=', $tglAkhir);
                        }else{
                            $this->db->where('YEAR(pendapatan_tgl_masuk)', $tahun);
                        }
                        $getData1= $this->db->get('tbl_pendapatan');
                        $hasil1 = $getData1->row();
                        echo 'Rp '.number_format($hasil1->pendapatan_total,0,",",".");
                        ?>
                    </h3>
                </div>

                <br>
                <center>
                    <h6><b>--Safira Halim Homestay--</b></h6>
                </center>
            </div>
        </div>
    </div>

</div>
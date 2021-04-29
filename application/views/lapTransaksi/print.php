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

<section>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12 mt-4 mb-5">
            <div class="d-flex justify-content-between">
                <div class="mr-4 ml-3">
                    <h1>Laporan Transaksi</h1>
                    <h4><?= getBulan($bulan) ?> - <?= $tahun ?></h4>
                    <h4><?= $pmbyrn == 'semua_pembayaran' ? 'Semua Jenis Pembayaran' : ucfirst($pmbyrn) ?></h4>
                </div>
                <img class="mr-3 ml-4 rounded" height="100px" src="<?= base_url() ?>assets/icon/logo-homestay.png">
            </div>
        </div>
    </div>
</section>

<section>

    <div class="col-xl-12 col-md-12 mb-4">
        <table class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pelanggan</th>
                    <th>Kamar</th>
                    <th>Sales</th>
                    <th>Pembayaran</th>
                    <th>Pendapatan</th>
                    <th>Fee Sales %</th>
                    <th>Fee Sales 2</th>
                    <th>Total Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                <?php $sbtotal = 0; $sbfee = 0; $sbfee2 = 0; $sbttlp = 0; $no = 1; 
                        foreach($transaksi as $d): ?>
                <tr>
                    <td><?= $no++ ?>.</td>
                    <td><?= $d->pelanggan_nama ?></td>
                    <td><?= $d->kamar_no ?></td>
                    <td><?= $d->sales_nama?></td>
                    <td><?= $d->pendapatan_pembayaran == null ? "(kosong)" : $d->pendapatan_pembayaran ?></td>
                    <td><?= 'Rp '.number_format($d->pendapatan_total,0,",",".") ?></td>
                    <td>
                        <?php 
                                $fee = ($d->sales_biaya/100)*$d->pendapatan_total; 
                                echo 'Rp '.number_format($fee,0,",",".");
                            ?>
                    </td>
                    <td><?= 'Rp '.number_format($d->pendapatan_fee,0,",",".") ?></td>
                    <td>
                        <?php 
                                $ttlPendapatan = $d->pendapatan_total - ($fee + $d->pendapatan_fee);
                                echo 'Rp '.number_format($ttlPendapatan,0,",",".");
                            ?>
                    </td>
                </tr>

                <?php 
                            $sbtotal += $d->pendapatan_total; 
                            $sbfee += $fee; 
                            $sbfee2 += $d->pendapatan_fee; 
                            $sbttlp += $ttlPendapatan;
                        ?>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <th colspan="5">
                    <center><b> <i>TOTAL</i> </b></center>
                </th>
                <th><?= 'Rp '.number_format($sbtotal,0,",",".") ?></th>
                <th><?= 'Rp '.number_format($sbfee,0,",",".") ?></th>
                <th><?= 'Rp '.number_format($sbfee2,0,",",".") ?></th>
                <th><?= 'Rp '.number_format($sbttlp,0,",",".") ?></th>
            </tfoot>
        </table>
    </div>

</section>
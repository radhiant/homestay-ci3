<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendapatan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('pendapatan_model');
        $this->load->model('pelanggan_model');
        $this->load->model('kamar_model');
        $this->load->model('sales_model');
        $this->load->model('pilsewa_model');
	
      }

	public function index()
	{
        $data['judul'] = 'Pendapatan';
        $this->load->view('templates/header', $data);
        $this->load->view('pendapatan/index');
        $this->load->view('js/alljs');
        $this->load->view('js/pendapatan/pendapatanjs');
        $this->load->view('js/pendapatan/getpendapatan');
        $this->load->view('templates/footer');
    }

    public function tambah()
	{
        $data['judul'] = 'Pendapatan';
        $data['pelanggan'] = $this->pelanggan_model->data()->result();
        $data['kamar'] = $this->kamar_model->data()->result();
        $data['sales'] = $this->sales_model->data()->result();
        $data['pilsewa'] = $this->pilsewa_model->data()->result();

        $data['datenow'] = date('Y-m-d 12:00');

        $this->load->view('templates/header', $data);
        $this->load->view('pendapatan/tambah_data');
        $this->load->view('js/alljs');
        $this->load->view('js/pendapatan/pendapatanjs');
        $this->load->view('js/pendapatan/formpendapatan');
        $this->load->view('templates/footer');
    }

    public function ubah($id)
	{
        $data['judul'] = 'Pendapatan';
        $data['pelanggan'] = $this->pelanggan_model->data()->result();
        $data['kamar'] = $this->kamar_model->data()->result();
        $data['sales'] = $this->sales_model->data()->result();
        $data['pilsewa'] = $this->pilsewa_model->data()->result();

        $data['data'] = $this->pendapatan_model->detailJoin($id)->result();

        $this->load->view('templates/header', $data);
        $this->load->view('pendapatan/ubah_data');
        $this->load->view('js/alljs');
        $this->load->view('js/pendapatan/pendapatanjs');
        $this->load->view('js/pendapatan/formpendapatan');
        $this->load->view('templates/footer');
  }

  public function detail($id)
	{
        $data['judul'] = 'Pendapatan';
        $data['data'] = $this->pendapatan_model->detailJoin($id)->result();

        $this->load->view('templates/header', $data);
        $this->load->view('pendapatan/detail_data');
        $this->load->view('js/alljs');
        $this->load->view('js/pendapatan/pendapatanjs');
        $this->load->view('templates/footer');
  }

  public function invoice($id)
  {
        $data['judul'] = 'Invoice';
        $data['data'] = $this->pendapatan_model->detailJoin($id)->result();

        $this->load->view('templates/no_header', $data);
        $this->load->view('pendapatan/invoice');
        // $this->load->view('js/alljs');
        // $this->load->view('js/pendapatan/pendapatanjs');
        $this->load->view('templates/no_footer');
  }

    public function proses_tambah()
  {
        $kode = $this->pendapatan_model->buat_kode(); 
        $pelanggan = $this->input->post('pelanggan');
        $kamar = $this->input->post('kamar');
        $ls = $this->input->post('ls');
        $ts = $this->input->post('ts');
        $sales = $this->input->post('sales');
        $biaya = $this->input->post('biaya');
        $pembayaran = $this->input->post('pembayaran');
        $tglM = $this->input->post('tglM');
        $tglK = $this->input->post('tglK');
        $total = $this->input->post('total');
        $fee = $this->input->post('fee');
        $spembayaran = $this->input->post('spembayaran');
        $ket = $this->input->post('ket');
        $usrinput = $this->session->userdata('login_session')['id_user'];
        $tglnow = date("Y-m-d");

        $date1 = strtotime($tglM);
        $formatTgl1 = date('Y-m-d H:i',$date1);

        $date2 = strtotime($tglK);
        $formatTgl2 = date('Y-m-d H:i',$date2);

        $data = array(
            'pendapatan_id' => $kode,
            'pelanggan_id' => $pelanggan,
            'kamar_id' => $kamar,
            'sales_id' => $sales,
            'pilsewa_id' => $ts,
            'pendapatan_lamasewa' => $ls,
            'pendapatan_biaya' => str_replace(".", "", $biaya),
            'pendapatan_tgl_masuk' => $formatTgl1,
            'pendapatan_tgl_keluar' => $formatTgl2,
            'pendapatan_pembayaran' => $pembayaran,
            'pendapatan_total' => str_replace(".", "", $total),
            'pendapatan_fee' => str_replace(".", "", $fee),
            'pendapatan_spembayaran' => $spembayaran,
            'pendapatan_ket' => $ket,
            'pendapatan_tgl_input' => $tglnow,
            'pendapatan_status' => 'Check-in',
            'user_id' => $usrinput
        );

        $this->pendapatan_model->tambah_data($data, 'tbl_pendapatan');
		$this->session->set_flashdata('Pesan','
			<script>
			$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
			});
			</script>
			');
		redirect('pendapatan');
  }

  public function proses_ubah()
  {
        $kode = $this->input->post('idpendapatan');
        $pelanggan = $this->input->post('pelanggan');
        $kamar = $this->input->post('kamar');
        $sales = $this->input->post('sales');
        $ls = $this->input->post('ls');
        $ts = $this->input->post('ts');
        $biaya = $this->input->post('biaya');
        $pembayaran = $this->input->post('pembayaran');
        $tglM = $this->input->post('tglM');
        $tglK = $this->input->post('tglK');
        $total = $this->input->post('total');
        $fee = $this->input->post('fee');
        $spembayaran = $this->input->post('spembayaran');
        $ket = $this->input->post('ket');
        $status = $this->input->post('status');


        $date1 = strtotime($tglM);
        $formatTgl1 = date('Y-m-d H:i',$date1);

        $date2 = strtotime($tglK);
        $formatTgl2 = date('Y-m-d H:i',$date2);

        $data = array(
            'pelanggan_id' => $pelanggan,
            'kamar_id' => $kamar,
            'sales_id' => $sales,
             'pilsewa_id' => $ts,
            'pendapatan_lamasewa' => $ls,
            'pendapatan_biaya' => str_replace(".", "", $biaya),
            'pendapatan_tgl_masuk' => $formatTgl1,
            'pendapatan_tgl_keluar' => $formatTgl2,
            'pendapatan_pembayaran' => $pembayaran,
            'pendapatan_fee' => str_replace(".", "", $fee),
            'pendapatan_spembayaran' => $spembayaran,
            'pendapatan_ket' => $ket,
            'pendapatan_total' => str_replace(".", "", $total),
            'pendapatan_status' => $status
        );

        $where = array(
            'pendapatan_id' => $kode
        );

        $this->pendapatan_model->ubah_data($where, $data, 'tbl_pendapatan');
		$this->session->set_flashdata('Pesan','
			<script>
			$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
			});
			</script>
			');
		redirect('pendapatan');
  }

  public function proses_hapus($id)
	{
        
		$where = array('pendapatan_id' => $id );
		$this->pendapatan_model->hapus_data($where, 'tbl_pendapatan');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('pendapatan');
    }

    public function proses_checkout($id)
	{
        $tglnow = date("Y-m-d H:i:s");
        $data = array('pendapatan_tgl_keluar' => $tglnow, 'pendapatan_status' => 'Check-out');
		$where = array('pendapatan_id' => $id);
		$this->pendapatan_model->ubah_data($where, $data, 'tbl_pendapatan');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil chekout!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('pendapatan');
    }
    
    public function hapus_all()
	{
        
		$this->pendapatan_model->delete_all('tbl_pendapatan');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('pendapatan');
    }
    
    public function mhapus(){
		$id = $_POST['chkbox']; 
        $this->pendapatan_model->mdelete($id); 
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('pendapatan');
		
    }

    public function getPilsewa()
    {
        $id = $this->input->post('id');
        $where = array('pilsewa_id' => $id);
        $data = $this->pilsewa_model->ambilId('tbl_pilsewa', $where)->result();

        echo json_encode($data);

    }

    public function getDataPendapatan()
    {
        $list = $this->pendapatan_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $tglNow = date('Y-m-d H:i:s');
            if($tglNow >= $field->pendapatan_tgl_keluar){
                $status = '<span class="badge badge-danger rounded-pill">Check-out</span>';
                $btnCheckout = "";
            }elseif($field->pendapatan_status == 'Check-out'){
                $status = '<span class="badge badge-danger rounded-pill">Check-out</span>';
                $btnCheckout = "";
            }elseif($field->pendapatan_status == 'Check-in'){
                $status = '<span class="badge badge-success rounded-pill">Check-in</span>';
                $btnCheckout = '<a href="#" onclick="checkout('."'".$field->pendapatan_id."'".')" class="btn rounded-circle btn-danger btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Checkout"> <i class="fas fa-calendar-times"></i> </a>';
            }else{
                $status = '<span class="badge badge-secondary rounded-pill">Belum di atur</span>';
                $btnCheckout = "";
            }

			  $aksi = '	<center>
                        '.$btnCheckout.'
                        <a href="'.base_url().'pendapatan/invoice/'.$field->pendapatan_id.'" class="btn rounded-circle btn-primary btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Invoice" target="_blank"> <i class="fas fa-file-invoice"></i> </a>
                        <br>
						<a href="'.base_url().'pendapatan/detail/'.$field->pendapatan_id.'" class="btn rounded-circle btn-primary btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Detail Data"> <i class="fas fa-eye"></i> </a>
                        <a href="'.base_url().'pendapatan/ubah/'.$field->pendapatan_id.'" class="btn rounded-circle btn-success btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Ubah Data"> <i class="fas fa-pen"></i> </a>
                        
                        </center>
                        ';
			
            $checkBox = '<div class="custom-control custom-checkbox ml-2">
            <input type="checkbox" class="custom-control-input" id="cbx-'.$no.'" name="chkbox[]" value="'.$field->pendapatan_id.'" onclick="check()">
            <label class="custom-control-label" for="cbx-'.$no.'"></label>
            </div>';

            $bulan = array (1 =>   'Jan',
            'Feb',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agus',
            'Sep',
            'Okt',
            'Nov',
            'Des'
          );

          $biaya = 'Rp'.number_format($field->pendapatan_biaya,0,",",".");
          $total = 'Rp'.number_format($field->pendapatan_total,0,",",".");

          $tglM = explode('-', $field->pendapatan_tgl_masuk);
          $tglK = explode('-', $field->pendapatan_tgl_keluar);

          $tglM = explode(' ', $field->pendapatan_tgl_masuk);
          $tglM1 = explode('-', $tglM[0]);
          $tglM2 = explode(':', $tglM[1]);

          $tglK = explode(' ', $field->pendapatan_tgl_keluar);
          $tglK1 = explode('-', $tglK[0]);
          $tglK2 = explode(':', $tglK[1]);

          $tglMasuk = '<span class="badge badge-primary rounded-pill mr-1"><i class="far fa-calendar-alt"></i> '.$tglM1[2] . ' ' . $bulan[ (int)$tglM1[1] ] . ' ' . $tglM1[0].'</span>'.'<br><span class="badge badge-success rounded-pill"><i class="far fa-clock"></i> '.$tglM2[0].':'.$tglM2[1].'</span>';
          $tglkeluar = '<span class="badge badge-primary rounded-pill mr-1"><i class="far fa-calendar-alt"></i> '.$tglK1[2] . ' ' . $bulan[ (int)$tglK1[1] ] . ' ' . $tglK1[0].'</span>'.'<br><span class="badge badge-danger rounded-pill"><i class="far fa-clock"></i> '.$tglK2[0].':'.$tglK2[1].'</span>';
        
            

            $no++;
            $row = array();
            $row[] = $checkBox;
            $row[] = $no.'.';
            $row[] = $field->pelanggan_nama;
            $row[] = $field->kamar_no;
            $row[] = $field->kamar_type;
            $row[] = $biaya;
            $row[] = $tglMasuk;
            $row[] = $tglkeluar;
            $row[] = $status;
            $row[] = $total;
            $row[] = $field->sales_nama;
            $row[] = $aksi;

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->pendapatan_model->count_all(),
            "recordsFiltered" => $this->pendapatan_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    
}
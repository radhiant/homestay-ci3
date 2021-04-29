<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deposit extends CI_Controller {

        public function __construct() {
                parent::__construct();
                date_default_timezone_set('Asia/Jakarta');
                $this->load->model('pendapatan_model');
                $this->load->model('deposit_model');
                $this->load->model('kamar_model');
                
              }

	public function index()
	{
        $data['judul'] = 'Deposit';
        $this->load->view('templates/header', $data);
        $this->load->view('deposit/index');
        $this->load->view('js/alljs');
        $this->load->view('js/deposit/depositjs');
        $this->load->view('js/deposit/getdeposit');
        $this->load->view('js/deposit/formdeposit');
        $this->load->view('templates/footer');
    }

    public function tambah()
	{
        $data['judul'] = 'Deposit';
        $data['pelanggan'] = $this->pendapatan_model->gPelanggan()->result();
        $data['kamar'] = $this->kamar_model->data()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('deposit/tambah_data');
        $this->load->view('js/alljs');
        $this->load->view('js/deposit/depositjs');
        $this->load->view('js/deposit/formdeposit');
        $this->load->view('templates/footer');
    }

    public function ubah($id)
	{
        $data['judul'] = 'Deposit';
        $data['pelanggan'] = $this->pendapatan_model->gPelanggan()->result();
        $data['kamar'] = $this->kamar_model->data()->result();

        $data['data'] = $this->deposit_model->detailJoin($id)->result();

        $this->load->view('templates/header', $data);
        $this->load->view('deposit/ubah_data');
        $this->load->view('js/alljs');
        $this->load->view('js/deposit/depositjs');
        $this->load->view('js/deposit/formdeposit');
        $this->load->view('templates/footer');
  }

  public function detail($id)
  {
      $data['judul'] = 'Deposit';
      $data['data'] = $this->deposit_model->detailJoin($id)->result();

      $this->load->view('templates/header', $data);
      $this->load->view('deposit/detail_data');
      $this->load->view('js/alljs');
      $this->load->view('js/deposit/depositjs');
      $this->load->view('templates/footer');
}

    public function proses_tambah()
  {
        $kode = $this->deposit_model->buat_kode(); 
        $pelanggan = $this->input->post('pelanggan');
        $kamar = $this->input->post('kamar');
        $tgl = $this->input->post('tgl');
        $nominal = $this->input->post('nominal');

        $usrinput = $this->session->userdata('login_session')['id_user'];
        $tglnow = date("Y-m-d");


        $data = array(
            'deposit_id' => $kode,
            'pelanggan_id' => $pelanggan,
            'kamar_id' => $kamar,
            'deposit_tgl' => $tgl,
            'deposit_nominal' => str_replace(".", "", $nominal),
            'deposit_status' => 'Diterima',
            'deposit_tgl_input' => $tglnow,
            'user_id' => $usrinput
        );

        $this->deposit_model->tambah_data($data, 'tbl_deposit');
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
		redirect('deposit');
  }

  public function proses_ubah()
  {
        $kode = $this->input->post('iddeposit');
        $pelanggan = $this->input->post('pelanggan');
        $kamar = $this->input->post('kamar');
        $tgl = $this->input->post('tgl');
        $nominal = $this->input->post('nominal');


        $data = array(
            'pelanggan_id' => $pelanggan,
            'kamar_id' => $kamar,
            'deposit_tgl' => $tgl,
            'deposit_nominal' => str_replace(".", "", $nominal),
        );

        $where = array(
            'deposit_id' => $kode
        );

        $this->deposit_model->ubah_data($where, $data, 'tbl_deposit');
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
		redirect('deposit');
  }

  public function proses_pengembalian()
  {
        $kode = $this->input->post('iddeposit');
        $tglKembali = $this->input->post('tglKembali');
        $nominal = $this->input->post('nominal');


        $data = array(
            'deposit_tgl_kembali' => $tglKembali,
            'deposit_nominal_kembali' => str_replace(".", "", $nominal),
            'deposit_status' => "Dikembalikan"
        );

        $where = array(
            'deposit_id' => $kode
        );

        $this->deposit_model->ubah_data($where, $data, 'tbl_deposit');
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
		redirect('deposit');
  }


  public function proses_hapus($id)
	{
		$where = array('deposit_id' => $id );
		$this->deposit_model->hapus_data($where, 'tbl_deposit');
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
		redirect('deposit');
    }
    
    public function hapus_all()
	{
        
		$this->deposit_model->delete_all('tbl_deposit');
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
		redirect('deposit');
    }
    
    public function mhapus(){
		$id = $_POST['chkbox']; 
        $this->deposit_model->mdelete($id); 
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
		redirect('deposit');
		
    }

    public function getKamarPendapatan()
    {
        $id = $this->input->post('id');
        $data = $this->pendapatan_model->detailJoinByPelanggan($id)->result();

        echo json_encode($data);
    }

    public function getDataDeposit()
    {
        $list = $this->deposit_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            if($field->deposit_status == 'Dikembalikan'){
                $aksi = '<a href="'.base_url().'deposit/detail/'.$field->deposit_id.'" class="btn rounded-circle btn-primary btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Detail Data"> <i class="fas fa-eye"></i> </a>';
            }else{
                $aksi = '
                <div class="dropdown mb-4">
                      <button class="btn btn-sm btn-primary dropdown-toggle rounded-pill" type="button"
                          id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                      </button>
                      <div class="dropdown-menu animated--fade-in"
                              aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item text-primary" data-target="#kembaliModal" data-toggle="modal" href="#" onclick="kembalikan('."'".$field->deposit_id."'".', '."'".$field->deposit_nominal."'".')"><i class="fas fa-retweet"></i> Dikembalikan</a>
                          <a class="dropdown-item text-primary" href="'.base_url().'deposit/detail/'.$field->deposit_id.'"><i class="fas fa-eye"></i> Detail</a>
                          <a class="dropdown-item text-success" href="'.base_url().'deposit/ubah/'.$field->deposit_id.'"><i class="fas fa-edit"></i> Ubah</a>
                      </div>
                  </div>
                ';
            }
             
			
            $checkBox = '<div class="custom-control custom-checkbox ml-2">
            <input type="checkbox" class="custom-control-input" id="cbx-'.$no.'" name="chkbox[]" value="'.$field->deposit_id.'" onclick="check()">
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

          $nominal = 'Rp'.number_format($field->deposit_nominal,0,",",".");

          $tglD = explode(' ', $field->deposit_tgl);
          $tglD1 = explode('-', $tglD[0]);
          $tglD2 = explode(':', $tglD[1]);

          if($field->deposit_status == 'Diterima'){
            $status = '<span class="badge badge-primary rounded-pill">Diterima</span>';
                }elseif($field->deposit_status == 'Dikembalikan'){
            $status = '<span class="badge badge-success rounded-pill">Dikembalikan</span>';
                }

         
          $tgl = '<span class="badge badge-primary rounded-pill mr-1"><i class="far fa-calendar-alt"></i> '.$tglD1[2] . ' ' . $bulan[ (int)$tglD1[1] ] . ' ' . $tglD1[0].'</span>'.'<span class="badge badge-primary rounded-pill"><i class="far fa-clock"></i> '.$tglD2[0].':'.$tglD2[1].'</span>';

            $no++;
            $row = array();
            $row[] = $checkBox;
            $row[] = $no.'.';
            $row[] = $field->kamar_no;
            $row[] = $field->pelanggan_nama;
            $row[] =  $tgl;
            $row[] = $nominal;
            $row[] = $status;
            $row[] = $aksi;

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->deposit_model->count_all(),
            "recordsFiltered" => $this->deposit_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    
}

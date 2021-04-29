<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembiayaan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('pembiayaan_model');
        $this->load->model('katbiaya_model');
        $this->load->model('jnsbiaya_model');
        $this->load->model('smbrbiaya_model');
        $this->load->model('vendor_model');
	
      }

	public function index()
	{
        $data['judul'] = 'Pembiayaan';
        $this->load->view('templates/header', $data);
        $this->load->view('pembiayaan/index');
        $this->load->view('js/alljs');
        $this->load->view('js/pembiayaan/pembiayaanjs');
        $this->load->view('js/pembiayaan/getpembiayaan');
        $this->load->view('templates/footer');
    }

    public function tambah()
	{
        $data['judul'] = 'Pembiayaan';
        $data['katbiaya'] = $this->katbiaya_model->data()->result();
        $data['jnsbiaya'] = $this->jnsbiaya_model->data()->result();
        $data['smbrbiaya'] = $this->smbrbiaya_model->data()->result();
        $data['vendor'] = $this->vendor_model->data()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('pembiayaan/tambah_data');
        $this->load->view('js/alljs');
        $this->load->view('js/pembiayaan/pembiayaanjs');
        $this->load->view('js/pembiayaan/formpembiayaan');
        $this->load->view('templates/footer');
    }

    public function ubah($id)
	{
        $data['judul'] = 'Pembiayaan';
        $data['katbiaya'] = $this->katbiaya_model->data()->result();
        $data['jnsbiaya'] = $this->jnsbiaya_model->data()->result();
        $data['smbrbiaya'] = $this->smbrbiaya_model->data()->result();
        $data['vendor'] = $this->vendor_model->data()->result();

        $data['data'] = $this->pembiayaan_model->detailJoin($id)->result();

        $this->load->view('templates/header', $data);
        $this->load->view('pembiayaan/ubah_data');
        $this->load->view('js/alljs');
        $this->load->view('js/pembiayaan/pembiayaanjs');
        $this->load->view('js/pembiayaan/formpembiayaan');
        $this->load->view('templates/footer');
  }

  public function detail($id)
	{
        $data['judul'] = 'Pembiayaan';
        $data['data'] = $this->pembiayaan_model->detailJoin($id)->result();

        $this->load->view('templates/header', $data);
        $this->load->view('pembiayaan/detail_data');
        $this->load->view('js/alljs');
        $this->load->view('js/pembiayaan/pembiayaanjs');
        $this->load->view('templates/footer');
  }

    public function proses_tambah()
  {
        $kode = $this->pembiayaan_model->buat_kode(); 
        $katbiaya = $this->input->post('katbiaya');
        $jnsbiaya = $this->input->post('jnsbiaya');
        $tgl = $this->input->post('tgl');
        $nmbiaya = $this->input->post('nmbiaya');
        $nilai = $this->input->post('nilai');
        $jumlah = $this->input->post('jumlah');
        $satuan = $this->input->post('satuan');
        $smbrbiaya = $this->input->post('smbrbiaya');
        $vendor = $this->input->post('vendor');
        $ket = $this->input->post('ket');
        $usrinput = $this->session->userdata('login_session')['id_user'];
        $tglnow = date("Y-m-d");

        $date1 = strtotime($tgl);
        $formatTgl1 = date('Y-m-d',$date1);

        $data = array(
            'pembiayaan_id' => $kode,
            'katbiaya_id' => $katbiaya,
            'jnsbiaya_id' => $jnsbiaya,
            'pembiayaan_tgl' => $formatTgl1,
            'pembiayaan_nmbiaya' => $nmbiaya,
            'pembiayaan_nilai' => str_replace(".", "", $nilai),
            'pembiayaan_jumlah' => $jumlah,
            'pembiayaan_satuan' => $satuan,
            'smbrbiaya_id' => $smbrbiaya,
            'vendor_id' => $vendor,
            'pembiayaan_ket' => $ket,
            'pembiayaan_tgl_input' => $tglnow,
            'pembiayaan_user_input' => $usrinput
        );

        $this->pembiayaan_model->tambah_data($data, 'tbl_pembiayaan');
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
		redirect('pembiayaan');
  }

  public function proses_ubah()
  {
        $kode = $this->input->post('idpembiayaan');
        $katbiaya = $this->input->post('katbiaya');
        $jnsbiaya = $this->input->post('jnsbiaya');
        $tgl = $this->input->post('tgl');
        $nmbiaya = $this->input->post('nmbiaya');
        $nilai = $this->input->post('nilai');
        $jumlah = $this->input->post('jumlah');
        $satuan = $this->input->post('satuan');
        $smbrbiaya = $this->input->post('smbrbiaya');
        $vendor = $this->input->post('vendor');
        $ket = $this->input->post('ket');

        $date1 = strtotime($tgl);
        $formatTgl1 = date('Y-m-d',$date1);

        $data = array(
            'katbiaya_id' => $katbiaya,
            'jnsbiaya_id' => $jnsbiaya,
            'pembiayaan_tgl' => $formatTgl1,
            'pembiayaan_nmbiaya' => $nmbiaya,
            'pembiayaan_nilai' => str_replace(".", "", $nilai),
            'pembiayaan_jumlah' => $jumlah,
            'pembiayaan_satuan' => $satuan,
            'smbrbiaya_id' => $smbrbiaya,
            'vendor_id' => $vendor,
            'pembiayaan_ket' => $ket
        );

        $where = array(
            'pembiayaan_id' => $kode
        );

        $this->pembiayaan_model->ubah_data($where, $data, 'tbl_pembiayaan');
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
		redirect('pembiayaan');
  }

  public function proses_hapus($id)
	{
		$where = array('pembiayaan_id' => $id );
		$this->pembiayaan_model->hapus_data($where, 'tbl_pembiayaan');
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
		redirect('pembiayaan');
    }
    
    public function hapus_all()
	{
        
		$this->pembiayaan_model->delete_all('tbl_pembiayaan');
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
		redirect('pembiayaan');
    }
    
    public function mhapus(){
		$id = $_POST['chkbox']; 
        $this->pembiayaan_model->mdelete($id); 
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
		redirect('pembiayaan');
		
    }

    public function getDatapembiayaan()
    {
        $list = $this->pembiayaan_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
			  $aksi = '	
						<a href="'.base_url().'pembiayaan/detail/'.$field->pembiayaan_id.'" class="btn rounded-circle btn-primary btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Detail Data"> <i class="fas fa-eye"></i> </a>
                        <a href="'.base_url().'pembiayaan/ubah/'.$field->pembiayaan_id.'" class="btn rounded-circle btn-success btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Ubah Data"> <i class="fas fa-pen"></i> </a>
                    ';
			
            $checkBox = '<div class="custom-control custom-checkbox ml-2">
            <input type="checkbox" class="custom-control-input" id="cbx-'.$no.'" name="chkbox[]" value="'.$field->pembiayaan_id.'" onclick="check()">
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

          $nilai = 'Rp'.number_format($field->pembiayaan_nilai,0,",",".");

          $ptgl = explode('-', $field->pembiayaan_tgl);

            $no++;
            $row = array();
            $row[] = $checkBox;
            $row[] = $no.'.';
            $row[] = $field->katbiaya_nama;
            $row[] = $field->jnsbiaya_nama;
            $row[] = $ptgl[2] . ' ' . $bulan[ (int)$ptgl[1] ] . ' ' . $ptgl[0];
            $row[] = $field->pembiayaan_nmbiaya;
            $row[] = $nilai;
            $row[] = $field->pembiayaan_jumlah;
            $row[] = $field->pembiayaan_satuan;
            $row[] = $field->smbrbiaya_nama;
            $row[] = $field->vendor_nama;
            $row[] = $field->pembiayaan_ket;
            $row[] = $aksi;

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->pembiayaan_model->count_all(),
            "recordsFiltered" => $this->pembiayaan_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    
}

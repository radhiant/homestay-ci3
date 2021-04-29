<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('kamar_model');
	
      }

	public function index()
	{
        $data['judul'] = 'Kamar';
        $this->load->view('templates/header', $data);
        $this->load->view('kamar/index');
        $this->load->view('js/alljs');
        $this->load->view('js/kamar/kamarjs');
        $this->load->view('js/kamar/getkamar');
        $this->load->view('js/kamar/formkamar');
        $this->load->view('templates/footer');
  }

  public function detail($id)
	{
        $data['judul'] = 'Kamar';
        $data['data'] = $this->kamar_model->detailJoin($id)->result();

        $this->load->view('templates/header', $data);
        $this->load->view('kamar/detail_data');
        $this->load->view('js/alljs');
        $this->load->view('js/kamar/kamarjs');
        $this->load->view('templates/footer');
  }

  public function proses_tambah()
  {
        $kode = $this->kamar_model->buat_kode(); 
        $nokamar = $this->input->post('nokamar');
        $type = $this->input->post('type');
        $biaya = $this->input->post('biaya');
        $usrinput = $this->session->userdata('login_session')['id_user'];
        $tglnow = date("Y-m-d");

        $data = array(
            'kamar_id' => $kode,
            'kamar_no' => $nokamar,
            'kamar_type' => $type,
            'kamar_biaya' => str_replace(".", "", $biaya),
            'kamar_tgl_input' => $tglnow,
            'kamar_user_input' => $usrinput
        );

        $this->kamar_model->tambah_data($data, 'tbl_kamar');
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
		redirect('kamar');
  }

  public function proses_ubah()
  {
      $kode = $this->input->post('idkamar');
      $nokamar = $this->input->post('nokamar');
      $type = $this->input->post('type');
      $biaya = $this->input->post('biaya');

      $where = array(
        'kamar_id' => $kode
      );

      $data = array(
          'kamar_no' => $nokamar,
          'kamar_type' => $type,
          'kamar_biaya' => str_replace(".", "", $biaya),
      );

      $this->kamar_model->ubah_data($where, $data, 'tbl_kamar');
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
		redirect('kamar');
  }

  public function proses_hapus($id)
	{
		$where = array('kamar_id' => $id );
		$this->kamar_model->hapus_data($where, 'tbl_kamar');
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
		redirect('kamar');
    }
    
    public function hapus_all()
	{
        
		$this->kamar_model->delete_all('tbl_kamar');
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
		redirect('kamar');
    }
    
    public function mhapus(){
		$id = $_POST['chkbox']; 
        $this->kamar_model->mdelete($id); 
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
		redirect('kamar');
		
    }

    public function getData()
    {
        $id = $this->input->post('id');
        $where = array('kamar_id' => $id );
        $data = $this->kamar_model->detail_data($where, 'tbl_kamar')->result();
        echo json_encode($data);
    }
    
  function getDataKamar()
    {
        $list = $this->kamar_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
			  $aksi = '	
						<a href="'.base_url().'kamar/detail/'.$field->kamar_id.'" class="btn rounded-circle btn-primary btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Detail Data"> <i class="fas fa-eye"></i> </a>
                        <a href="#" data-target="#ukamarModal" onclick="getKamar('."'".$field->kamar_id."'".')" data-toggle="modal" class="btn rounded-circle btn-success btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Ubah Data"> <i class="fas fa-pen"></i> </a>
                    ';
			
            $checkBox = '<div class="custom-control custom-checkbox ml-2">
            <input type="checkbox" class="custom-control-input" id="cbx-'.$no.'" name="chkbox[]" value="'.$field->kamar_id.'" onclick="check()">
            <label class="custom-control-label" for="cbx-'.$no.'"></label>
            </div>';

            $biaya = 'Rp. '.number_format($field->kamar_biaya,0,",",".");

            $no++;
            $row = array();
            $row[] = $checkBox;
            $row[] = $no.'.';
            $row[] = $field->kamar_no;
            $row[] = $field->kamar_type;
            $row[] = $biaya;
            $row[] = $aksi;

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->kamar_model->count_all(),
            "recordsFiltered" => $this->kamar_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

}

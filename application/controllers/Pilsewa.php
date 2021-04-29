<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pilsewa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('pilsewa_model');
	
      }

	public function index()
	{
        $data['judul'] = 'Pilihan Sewa';
        $data['kode'] = $this->pilsewa_model->buat_kode(); 
        $this->load->view('templates/header', $data);
        $this->load->view('pilsewa/index');
        $this->load->view('js/alljs');
        $this->load->view('js/pilsewa/pilsewajs');
        $this->load->view('js/pilsewa/getpilsewa');
        $this->load->view('js/pilsewa/formpilsewa');
        $this->load->view('templates/footer');
  }

  public function detail($id)
	{
        $data['judul'] = 'Pilihan Sewa';
        $where = array('pilsewa_id' => $id);
        $data['data'] = $this->pilsewa_model->ambilId('tbl_pilsewa', $where)->result();

        $this->load->view('templates/header', $data);
        $this->load->view('pilsewa/detail_data');
        $this->load->view('js/alljs');
        $this->load->view('js/pilsewa/pilsewajs');
        $this->load->view('templates/footer');
  }

  public function proses_tambah()
  {
        $kode = $this->pilsewa_model->buat_kode(); 
        $ps = $this->input->post('ps');
        $type = $this->input->post('type');
        $harga = $this->input->post('harga');
        $ket = $this->input->post('ket');

        $data = array(
            'pilsewa_id' => $kode,
            'pilsewa_nama' => $ps,
            'pilsewa_type' => $type,
            'pilsewa_harga' => str_replace(".", "", $harga),
            'pilsewa_ket' => $ket
        );

        $this->pilsewa_model->tambah_data($data, 'tbl_pilsewa');
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
		    redirect('pilsewa');
  }

  public function proses_ubah()
  {
      $kode = $this->input->post('idpilsewa');
      $ps = $this->input->post('ps');
      $type = $this->input->post('type');
      $harga = $this->input->post('harga');
      $ket = $this->input->post('ket');

      $where = array(
        'pilsewa_id' => $kode
      );

      $data = array(
          'pilsewa_nama' => $ps,
          'pilsewa_type' => $type,
          'pilsewa_harga' => str_replace(".", "", $harga),
          'pilsewa_ket' => $ket
      );

      $this->pilsewa_model->ubah_data($where, $data, 'tbl_pilsewa');
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
		redirect('pilsewa');
  }

  public function proses_hapus($id)
	{
		$where = array('pilsewa_id' => $id );
		$this->pilsewa_model->hapus_data($where, 'tbl_pilsewa');
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
		redirect('pilsewa');
    }
    
    public function hapus_all()
	{
        
		$this->pilsewa_model->delete_all('tbl_pilsewa');
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
		redirect('pilsewa');
    }
    
    public function mhapus(){
		$id = $_POST['chkbox']; 
        $this->pilsewa_model->mdelete($id); 
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
		redirect('pilsewa');
		
    }

    public function getData()
    {
        $id = $this->input->post('id');
        $where = array('pilsewa_id' => $id );
        $data = $this->pilsewa_model->detail_data($where, 'tbl_pilsewa')->result();
        echo json_encode($data);
    }
    
  function getDatapilsewa()
    {
        $list = $this->pilsewa_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
			  $aksi = '	
						<a href="'.base_url().'pilsewa/detail/'.$field->pilsewa_id.'" class="btn rounded-circle btn-primary btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Detail Data"> <i class="fas fa-eye"></i> </a>
                        <a href="#" data-target="#upilsewaModal" onclick="getpilsewa('."'".$field->pilsewa_id."'".')" data-toggle="modal" class="btn rounded-circle btn-success btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Ubah Data"> <i class="fas fa-pen"></i> </a>
                    ';
			
            $checkBox = '<div class="custom-control custom-checkbox ml-2">
            <input type="checkbox" class="custom-control-input" id="cbx-'.$no.'" name="chkbox[]" value="'.$field->pilsewa_id.'" onclick="check()">
            <label class="custom-control-label" for="cbx-'.$no.'"></label>
            </div>';

            $harga = 'Rp'.number_format($field->pilsewa_harga,0,",",".");

            $no++;
            $row = array();
            $row[] = $checkBox;
            $row[] = $no.'.';
            $row[] = $field->pilsewa_id;
            $row[] = $field->pilsewa_nama;
            $row[] = $field->pilsewa_type;
            $row[] = $harga;
            $row[] = $field->pilsewa_ket;
            $row[] = $aksi;

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->pilsewa_model->count_all(),
            "recordsFiltered" => $this->pilsewa_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

}

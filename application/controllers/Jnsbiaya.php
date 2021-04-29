<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jnsbiaya extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('jnsbiaya_model');
	
      }

	public function index()
	{
        $data['judul'] = 'Jenis Barang';
        $data['kode'] = $this->jnsbiaya_model->buat_kode(); 
        $this->load->view('templates/header', $data);
        $this->load->view('jnsbiaya/index');
        $this->load->view('js/alljs');
        $this->load->view('js/jnsbiaya/jnsbiayajs');
        $this->load->view('js/jnsbiaya/getjnsbiaya');
        $this->load->view('js/jnsbiaya/formjnsbiaya');
        $this->load->view('templates/footer');
  }

  public function detail($id)
	{
        $data['judul'] = 'Jenis Barang';
        $where = array('jnsbiaya_id' => $id);
        $data['data'] = $this->jnsbiaya_model->ambilId('tbl_jnsbiaya', $where)->result();

        $this->load->view('templates/header', $data);
        $this->load->view('jnsbiaya/detail_data');
        $this->load->view('js/alljs');
        $this->load->view('js/jnsbiaya/jnsbiayajs');
        $this->load->view('templates/footer');
  }

  public function proses_tambah()
  {
        $kode = $this->jnsbiaya_model->buat_kode(); 
        $namaK = $this->input->post('namaK');
        $ket = $this->input->post('ket');

        $data = array(
            'jnsbiaya_id' => $kode,
            'jnsbiaya_nama' => $namaK,
            'jnsbiaya_ket' => $ket
        );

        $this->jnsbiaya_model->tambah_data($data, 'tbl_jnsbiaya');
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
		    redirect('jnsbiaya');
  }

  public function proses_ubah()
  {
      $kode = $this->input->post('idjnsbiaya');
      $namaK = $this->input->post('namaK');
      $ket = $this->input->post('ket');

      $where = array(
        'jnsbiaya_id' => $kode
      );

      $data = array(
          'jnsbiaya_nama' => $namaK,
          'jnsbiaya_ket' => $ket
      );

      $this->jnsbiaya_model->ubah_data($where, $data, 'tbl_jnsbiaya');
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
		redirect('jnsbiaya');
  }

  public function proses_hapus($id)
	{
		$where = array('jnsbiaya_id' => $id );
		$this->jnsbiaya_model->hapus_data($where, 'tbl_jnsbiaya');
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
		redirect('jnsbiaya');
    }
    
    public function hapus_all()
	{
        
		$this->jnsbiaya_model->delete_all('tbl_jnsbiaya');
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
		redirect('jnsbiaya');
    }
    
    public function mhapus(){
		$id = $_POST['chkbox']; 
        $this->jnsbiaya_model->mdelete($id); 
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
		redirect('jnsbiaya');
		
    }

    public function getData()
    {
        $id = $this->input->post('id');
        $where = array('jnsbiaya_id' => $id );
        $data = $this->jnsbiaya_model->detail_data($where, 'tbl_jnsbiaya')->result();
        echo json_encode($data);
    }
    
  function getDatajnsbiaya()
    {
        $list = $this->jnsbiaya_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
			  $aksi = '	
						<a href="'.base_url().'jnsbiaya/detail/'.$field->jnsbiaya_id.'" class="btn rounded-circle btn-primary btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Detail Data"> <i class="fas fa-eye"></i> </a>
                        <a href="#" data-target="#ujnsbiayaModal" onclick="getjnsbiaya('."'".$field->jnsbiaya_id."'".')" data-toggle="modal" class="btn rounded-circle btn-success btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Ubah Data"> <i class="fas fa-pen"></i> </a>
                    ';
			
            $checkBox = '<div class="custom-control custom-checkbox ml-2">
            <input type="checkbox" class="custom-control-input" id="cbx-'.$no.'" name="chkbox[]" value="'.$field->jnsbiaya_id.'" onclick="check()">
            <label class="custom-control-label" for="cbx-'.$no.'"></label>
            </div>';

            $no++;
            $row = array();
            $row[] = $checkBox;
            $row[] = $no.'.';
            $row[] = $field->jnsbiaya_id;
            $row[] = $field->jnsbiaya_nama;
            $row[] = $field->jnsbiaya_ket;
            $row[] = $aksi;

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->jnsbiaya_model->count_all(),
            "recordsFiltered" => $this->jnsbiaya_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

}

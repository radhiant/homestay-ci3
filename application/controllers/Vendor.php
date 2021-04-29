<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('vendor_model');
	
      }

	public function index()
	{
        $data['judul'] = 'Vendor';
        $data['kode'] = $this->vendor_model->buat_kode(); 

        $this->load->view('templates/header', $data);
        $this->load->view('vendor/index');
        $this->load->view('js/alljs');
        $this->load->view('js/vendor/vendorjs');
        $this->load->view('js/vendor/getvendor');
        $this->load->view('js/vendor/formvendor');
        $this->load->view('templates/footer');
  }

  public function detail($id)
	{
        $data['judul'] = 'Vendor';
        $where = array('vendor_id' => $id);
        $data['data'] = $this->vendor_model->detail_data($where, 'tbl_vendor')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('vendor/detail_data');
        $this->load->view('js/alljs');
        $this->load->view('js/vendor/vendorjs');
        $this->load->view('templates/footer');
  }

  public function proses_tambah()
  {
        $kode = $this->vendor_model->buat_kode(); 
        $namaV = $this->input->post('namaV');
        $kontak = $this->input->post('kontak');
        $notelp = $this->input->post('notelp');
        $alamat = $this->input->post('alamat');
        $ket = $this->input->post('ket');

        $data = array(
            'vendor_id' => $kode,
            'vendor_nama' => $namaV,
            'vendor_kontak' => $kontak,
            'vendor_notelp' => $notelp,
            'vendor_alamat' => $alamat,
            'vendor_ket' => $ket
        );

      $this->vendor_model->tambah_data($data, 'tbl_vendor');
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
		  redirect('vendor');
  }

  public function proses_ubah()
  {
      $kode = $this->input->post('idvendor');
      $namaV = $this->input->post('namaV');
      $kontak = $this->input->post('kontak');
      $notelp = $this->input->post('notelp');
      $alamat = $this->input->post('alamat');
      $ket = $this->input->post('ket');

      $where = array(
        'vendor_id' => $kode
      );

      $data = array(
        'vendor_nama' => $namaV,
        'vendor_kontak' => $kontak,
        'vendor_notelp' => $notelp,
        'vendor_alamat' => $alamat,
        'vendor_ket' => $ket
    );

      $this->vendor_model->ubah_data($where, $data, 'tbl_vendor');
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
		redirect('vendor');
  }

  public function proses_hapus($id)
	{
		$where = array('vendor_id' => $id );
		$this->vendor_model->hapus_data($where, 'tbl_vendor');
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
		redirect('vendor');
    }
    
    public function hapus_all()
	{
        
		$this->vendor_model->delete_all('tbl_vendor');
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
		redirect('vendor');
    }
    
    public function mhapus(){
		$id = $_POST['chkbox']; 
        $this->vendor_model->mdelete($id); 
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
		redirect('vendor');
		
    }

    public function getData()
    {
        $id = $this->input->post('id');
        $where = array('vendor_id' => $id );
        $data = $this->vendor_model->detail_data($where, 'tbl_vendor')->result();
        echo json_encode($data);
    }
    
  function getDataVendor()
    {
        $list = $this->vendor_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
			  $aksi = '	
						<a href="'.base_url().'vendor/detail/'.$field->vendor_id.'" class="btn rounded-circle btn-primary btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Detail Data"> <i class="fas fa-eye"></i> </a>
                        <a href="#" data-target="#uvendorModal" onclick="getVendor('."'".$field->vendor_id."'".')" data-toggle="modal" class="btn rounded-circle btn-success btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Ubah Data"> <i class="fas fa-pen"></i> </a>
                    ';
			
            $checkBox = '<div class="custom-control custom-checkbox ml-2">
            <input type="checkbox" class="custom-control-input" id="cbx-'.$no.'" name="chkbox[]" value="'.$field->vendor_id.'" onclick="check()">
            <label class="custom-control-label" for="cbx-'.$no.'"></label>
            </div>';



            $no++;
            $row = array();
            $row[] = $checkBox;
            $row[] = $no.'.';
            $row[] = $field->vendor_nama;
            $row[] = $field->vendor_kontak;
            $row[] = $field->vendor_notelp;
            $row[] = $field->vendor_alamat;
            $row[] = $field->vendor_ket;
            $row[] = $aksi;

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->vendor_model->count_all(),
            "recordsFiltered" => $this->vendor_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

}

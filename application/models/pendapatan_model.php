<?php
 
class pendapatan_model extends CI_Model {
 
    var $table = 'tbl_pendapatan as p'; //nama tabel dari database
    var $column_order = array(null, 'plg.pelanggan_nama','k.kamar_no','k.kamar_type', 'p.pendapatan_biaya', 'p.pendapatan_tgl_masuk', 'p.pendapatan_tgl_keluar', 'p.pendapatan_total', 's.sales_nama', 'p.pendapatan_status'); //field yang ada di table pendapatan
    var $column_search = array('plg.pelanggan_nama','k.kamar_no','k.kamar_type', 'p.pendapatan_biaya', 'p.pendapatan_tgl_masuk', 'p.pendapatan_tgl_keluar', 'p.pendapatan_total', 's.sales_nama', 'p.pendapatan_status'); //field yang diizin untuk pencarian 
    var $order = array('p.pendapatan_id' => 'desc'); // default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
        $this->db->join('tbl_pelanggan as plg', 'plg.pelanggan_id = p.pelanggan_id','left');
        $this->db->join('tbl_kamar as k', 'k.kamar_id = p.kamar_id','left');
        $this->db->join('tbl_sales as s', 's.sales_id = p.sales_id','left');

        $i = 0;
     
        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function data()
    {
        $this->db->order_by('pendapatan_id','DESC');
        return $query = $this->db->get('tbl_pendapatan');
    }



    public function ambilId($table, $where)
   {
       return $this->db->get_where($table, $where);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }

    public function gPelanggan()
    {
        $this->db->select('*');
        $this->db->from('tbl_pendapatan as p');
        $this->db->join('tbl_pelanggan as pl', 'pl.pelanggan_id = p.pelanggan_id', 'left');
        $this->db->group_by("p.pelanggan_id");
        return $query = $this->db->get();
    }

    public function dataJoinbyDate($tglAwal, $tglAkhir, $tahun, $pembayaran)
    {
        $this->db->select('*');
        $this->db->from('tbl_pendapatan as p');
        $this->db->join('tbl_pelanggan as pl', 'pl.pelanggan_id = p.pelanggan_id', 'left');
        $this->db->join('tbl_kamar as k', 'k.kamar_id = p.kamar_id', 'left');
        $this->db->join('tbl_sales as s', 's.sales_id = p.sales_id', 'left');
        $this->db->join('tbl_pilsewa as ps', 'ps.pilsewa_id = p.pilsewa_id', 'left');
        $this->db->join('tbl_user as u', 'u.user_id = p.user_id', 'left');

        if($pembayaran != 'semua_pembayaran'){
            $this->db->where('p.pendapatan_pembayaran', $pembayaran);
        }

        if($tglAwal != ''){
            $this->db->where('p.pendapatan_tgl_masuk >=', $tglAwal);
            $this->db->where('p.pendapatan_tgl_masuk <=', $tglAkhir);
        }else{
            $this->db->where('YEAR(p.pendapatan_tgl_masuk)', $tahun);
        }
        $this->db->order_by("p.pendapatan_id", "DESC");
        return $query = $this->db->get();
    }


    public function detailJoin($where)
    {
        $this->db->select('*');
        $this->db->from('tbl_pendapatan as p');
        $this->db->join('tbl_pelanggan as pl', 'pl.pelanggan_id = p.pelanggan_id', 'left');
        $this->db->join('tbl_kamar as k', 'k.kamar_id = p.kamar_id', 'left');
        $this->db->join('tbl_sales as s', 's.sales_id = p.sales_id', 'left');
        $this->db->join('tbl_pilsewa as ps', 'ps.pilsewa_id = p.pilsewa_id', 'left');
        $this->db->join('tbl_user as u', 'u.user_id = p.user_id', 'left');
        $this->db->where('p.pendapatan_id',$where);
        return $query = $this->db->get();
    }

    public function sumData($tglAwal, $tglAkhir, $tahun)
    {
        $this->db->select_sum('pendapatan_total');
        $this->db->from('tbl_pendapatan');
        if($tglAwal != ''){
            $this->db->where('pendapatan_tgl_masuk >=', $tglAwal);
            $this->db->where('pendapatan_tgl_masuk <=', $tglAkhir);
        }else{
            $this->db->where('YEAR(pendapatan_tgl_masuk)', $tahun);
        }
        $query = $this->db->get();
        return $query->row()->pendapatan_total;
    
    }

    public function detailJoinByPelanggan($where)
    {
        $this->db->select('*');
        $this->db->from('tbl_pendapatan as p');
        $this->db->join('tbl_pelanggan as pl', 'pl.pelanggan_id = p.pelanggan_id', 'left');
        $this->db->join('tbl_kamar as k', 'k.kamar_id = p.kamar_id', 'left');
        $this->db->join('tbl_sales as s', 's.sales_id = p.sales_id', 'left');
        $this->db->join('tbl_user as u', 'u.user_id = p.user_id', 'left');
        $this->db->where('p.pelanggan_id',$where);
        return $query = $this->db->get();
    }


    public function detail_data($where, $table)
    {
       return $this->db->get_where($table,$where);
    }

    public function tambah_data($data, $table)
    {
       $this->db->insert($table, $data);
    }

    public function ubah_data($where, $data, $table)
    {
       $this->db->where($where);
       $this->db->update($table, $data);

    }

    public function mdelete($id){
        $this->db->where_in('pendapatan_id', $id);
        $this->db->delete('tbl_pendapatan');
  }

    public function delete_all($table)
    {
        $this->db->empty_table($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }


    public function buat_kode()   {
		  $this->db->select('RIGHT(tbl_pendapatan.pendapatan_id,6) as kode', FALSE);
		  $this->db->order_by('pendapatan_id','DESC');
		  $this->db->limit(1);
		  $query = $this->db->get('tbl_pendapatan');      
		  if($query->num_rows() <> 0){
		   //jika kode ternyata sudah ada.
		   $data = $query->row();
		   $kode = intval($data->kode) + 1;
		  }
		  else {
		   //jika kode belum ada
		   $kode = 1;
		  }
		  $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); 
		  $kodejadi = "PND-".$kodemax;    
		  return $kodejadi;
	}

 
}
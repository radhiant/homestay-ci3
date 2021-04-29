<?php
 
class smbrbiaya_model extends CI_Model {
 
    var $table = 'tbl_smbrbiaya'; //nama tabel dari database
    var $column_order = array(null, 'smbrbiaya_id','smbrbiaya_nama'); //field yang ada di table smbrbiaya
    var $column_search = array('smbrbiaya_id','smbrbiaya_nama'); //field yang diizin untuk pencarian 
    var $order = array('smbrbiaya_id' => 'desc'); // default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
 
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
        $this->db->order_by('smbrbiaya_id','DESC');
        return $query = $this->db->get('tbl_smbrbiaya');
    }

    public function ambilFoto($where)
    {
      $this->db->order_by('smbrbiaya_id','DESC');
      $this->db->limit(1);
      $query = $this->db->get_where('tbl_smbrbiaya', $where);   
      
      $data = $query->row();
      $foto= $data->smbrbiaya_foto;
      
      return $foto;
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

    public function detailJoin($where)
    {
        $this->db->select('*');
        $this->db->from('tbl_smbrbiaya as k');
        $this->db->join('tbl_user as u', 'u.user_id = k.user_id', 'left');
        $this->db->where('k.smbrbiaya_id',$where);
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
        $this->db->where_in('smbrbiaya_id', $id);
        $this->db->delete('tbl_smbrbiaya');
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
		  $this->db->select('RIGHT(tbl_smbrbiaya.smbrbiaya_id,6) as kode', FALSE);
		  $this->db->order_by('smbrbiaya_id','DESC');
		  $this->db->limit(1);
		  $query = $this->db->get('tbl_smbrbiaya');      
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
		  $kodejadi = "SMBR-".$kodemax;    
		  return $kodejadi;
	}

 
}
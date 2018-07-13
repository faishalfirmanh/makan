<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pelanggan_model extends CI_Model
{

    public $table = 'pelanggan';
    public $id = 'id_pel';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_pel', $q);
	$this->db->or_like('nama', $q);
  $this->db->or_like('password', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('pekerjaan', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pel', $q);
	$this->db->or_like('nama', $q);
  $this->db->or_like('password', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('pekerjaan', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    public function insertUser(){
    $bahan=array(
      'nama'=>$this->input->post('nama'),
      'password'=>$this->input->post('password'),
      'alamat'=>$this->input->post('alamat'),
      'pekerjaan'=>$this->input->post('pekerjaan')
    );
      $this->db->insert('pelanggan',$bahan);

  }

        public function loginCus($nama,$password)
      	{
      		$this->db->select('id_pel,nama,password');
      		$this->db->from('pelanggan');
      		$this->db->where('nama', $nama);
      		$this->db->where('password',$password);
      		$query=$this->db->get();
      		if($query->num_rows()==1)
      		{
      			return $query->result();
      		}
      		else
      		{
      			return false;
      		}

      	}

}

/* End of file Pelanggan_model.php */
/* Location: ./application/models/Pelanggan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-06-28 04:27:33 */
/* http://harviacode.com */

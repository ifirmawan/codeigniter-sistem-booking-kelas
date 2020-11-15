<?php
/**
* 
*/
class FW_Model extends CI_Model
{
	public $table_name;
	public $column;
	public $data_entry;
	public $str_join;
	public $field_attr 	= array();
	public $field_values= array();
	
	function __construct($table_name){
		parent::__construct();
		$this->table_name =$table_name;
		$this->fields();
	}

	function get_enum_values($field=''){
		$type = $this->db->query( "SHOW COLUMNS FROM {$this->table_name} WHERE Field = '{$field}'" )->row( 0 )->Type;
		preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
		$enum = explode("','", $matches[1]);
		return $enum;
	}

	public function get_by_id($id){
		$this->db->from($this->table_name);
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function save_data($data)
	{
		if (isset($data['user_pass'])) {
			$data['user_pass']	= sha1($data['user_pass']);
		}
		$this->db->insert($this->table_name, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data){
		$this->db->update($this->table_name, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id){
		$this->db->where('id', $id);
		$this->db->delete($this->table_name);
	}

	public function fields(){
		$data =$this->db->list_fields($this->table_name);
		$this->column = $data;
	}

    public function count_filtered(){
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function get_where($where=array()){
		$query = $this->db->get_where($this->table_name,$where);
		if ($query->num_rows()) {
			return $query->result_array();
		}
		return false;
	}
	public function max_select($column='id'){
		$query = $this->db->select_max($column)->get($this->table_name);
		if ($query->num_rows() > 0) {
			$send = $query->result_array();
			return $send[0][$column];
		}
		return 0;
	}
	public function get_by_column($id=false,$by=NULL){
		if ($id && !is_null($by)) {
			$query = $this->get_by_id($id);
			if (count($query) > 0 && in_array($by, $this->column)) {
				return $query->$by;
			}
		}else{
			return false;
		}
	}

}
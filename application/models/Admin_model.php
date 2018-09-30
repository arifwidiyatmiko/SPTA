<?php 

/**
 * 
 */
class Admin_model extends CI_Model
{
	
	function getWhere($Value)
	{
		$this->db->where($Value);
		return $this->db->get('admin');
	}
	public function getId($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('admin');
	}
	public function insert($value)
	{
		$this->db->insert('admin', $value);
	}

	public function update($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('admin', $data);
	}
	public function getAll($value='')
	{
		return $this->db->get('admin');
	}
	function get_enum_values( $table, $field )
	{
	    $type = $this->db->query( "SHOW COLUMNS FROM {$table} WHERE Field = '{$field}'" )->row( 0 )->Type;
	    preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
	    $enum = explode("','", $matches[1]);
	    return $enum;
	}
	
}

?>
<?php class Offices_model extends CI_Model {

	public function __construct() {
 		$this->load->database(); 
	}
	
	public function get_columns($table_name = NULL) {
		$result = $this->db->list_fields($table_name);
		foreach($result as $field) {
			$data[$field] = ucwords(str_replace('_', ' ', $field));
		}
		return $data;
	}
	public function get_raw_columns($table_name = NULL) {
		
		$data = $this->db->list_fields($table_name);

		return $data;
	}

	// leaving either orderby or asc_desc blank will just use defaul db ordering
	public function get_options($table_name = NULL, $orderby = NULL, $asc_desc = NULL) {

		$this->db->select('*')->from($table_name);
					
		if ($orderby != NULL && $asc_desc != NULL)
			$this->db->order_by($orderby, $asc_desc);

		$data = $this->db->get()->result_array();

		return $data;
	}

	public function select_all_from_offices() {        
        
        $query = $this->db->select('*')
                          ->from('offices')
                          ->where('is_deleted', 0)
                          ->limit('60')
                          ->get();

        $data = $query->result_array();


       	return $data;
	}

	public function select_offices() {

		// $this->load->database();
		// $database = $this->db->database();

		// $table_headers = $this->db->select('COLUMN_NAME')
		// 							->from('INFORMATION_SCHEMA.COLUMNS')
		// 							->where('TABLE_SCHEMA', $database)
		// 							->where('TABLE_NAME', 'offices')
		// 							->get()->result_array();

		$table_data = $this->db->select('*')
								->from('offices')
								->get()->result_array();

		return $table_data;					
	}

	public function select_offices_by_id($id = NULL) {

		$table_data = $this->db->select('*')
								->from('offices')
								->where('id', $id)
								->get()->row_array();

		return $table_data;					
	}

	public function add_db_entry($post_data = NULL, $table_name = NULL) {

		$success = FALSE;

		if($this->db->insert($table_name, $post_data))
			$success = TRUE;

		return $success;
	}

	public function update_db_entry($post_data = NULL, $table_name = NULL) {

		$success = FALSE;

		if($this->db->where('id', $post_data['id'])->update($table_name, $post_data))
			$success = TRUE;

		return $success;
	}

}

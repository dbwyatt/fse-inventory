<?php class Tools_model extends CI_Model {

	public function __construct() {
 		$this->load->database(); 
	}
	
	public function get_columns($table_name = NULL) {
		$result = $this->db->list_fields($table_name);
		foreach($result as $field) {
			$data[] = ucwords(str_replace('_', ' ', $field));
		}
		return $data;
	}
	public function get_raw_columns($table_name = NULL) {
		
		$data = $this->db->list_fields($table_name);

		return $data;
	}

	public function get_options($table_name = NULL) {

		$data = $this->db->select('*')
							->from($table_name)
							->get()->result_array();

		return $data;
	}

	public function select_all_from_tools() {        
        
        $query = $this->db->select('*')
                          ->from('tools')
                          //->limit('30')
                          ->get();

        $data = $query->result_array();


       	return $data;
	}

	public function select_tools() {

		// $this->load->database();
		// $database = $this->db->database();

		// $table_headers = $this->db->select('COLUMN_NAME')
		// 							->from('INFORMATION_SCHEMA.COLUMNS')
		// 							->where('TABLE_SCHEMA', $database)
		// 							->where('TABLE_NAME', 'tools')
		// 							->get()->result_array();

		$table_data = $this->db->select('*')
								->from('tools')
								->get()->result_array();

		return $table_data;					
	}

	public function add_db_entry($post_data = NULL, $table_name = NULL) {

		$success = FALSE;

		if($this->db->insert($table_name, $post_data))
			$success = TRUE;

		return $success;
	}
}

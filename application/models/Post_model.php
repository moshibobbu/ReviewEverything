<?php
	class Post_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_posts($slug = FALSE){
			if($slug === FALSE){
				$query = $this->db->get('Company');
				return $query->result_array();
			}

			$query = $this->db->get_where('Company', array('slug' => $slug));
			return $query->row_array();
		}

		public function create_post(){
			$slug = url_title($this->input->post('name'));

			$data = array (
				'name' => $this->input->post('name'),
				'slug' => $slug,
				'summary' => $this->input->post('summary'),
				'website' => $this->input->post('website'),
				'contactEmail' => $this->input->post('email')
			);
			return $this->db->insert('Company', $data);
		}
	}
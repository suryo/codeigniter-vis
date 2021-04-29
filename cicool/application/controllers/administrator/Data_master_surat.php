<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Data Master Surat Controller
*| --------------------------------------------------------------------------
*| Data Master Surat site
*|
*/
class Data_master_surat extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_data_master_surat');
	}

	/**
	* show all Data Master Surats
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('data_master_surat_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['data_master_surats'] = $this->model_data_master_surat->get($filter, $field, $this->limit_page, $offset);
		$this->data['data_master_surat_counts'] = $this->model_data_master_surat->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/data_master_surat/index/',
			'total_rows'   => $this->model_data_master_surat->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Data Master Surat List');
		$this->render('backend/standart/administrator/data_master_surat/data_master_surat_list', $this->data);
	}
	
	/**
	* Add new data_master_surats
	*
	*/
	public function add()
	{
		$this->is_allowed('data_master_surat_add');

		$this->template->title('Data Master Surat New');
		$this->render('backend/standart/administrator/data_master_surat/data_master_surat_add', $this->data);
	}

	/**
	* Add New Data Master Surats
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('data_master_surat_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('No_surat', 'No Surat', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('keterangan_surat', 'Keterangan Surat', 'trim|required');
		$this->form_validation->set_rules('kepada', 'Kepada', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('Alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('tempat', 'Tempat', 'trim|required');
		$this->form_validation->set_rules('kepala_desa', 'Kepala Desa', 'trim|required|max_length[11]');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'No_surat' => $this->input->post('No_surat'),
				'keterangan_surat' => $this->input->post('keterangan_surat'),
				'kepada' => $this->input->post('kepada'),
				'Alamat' => $this->input->post('Alamat'),
				'tanggal' => $this->input->post('tanggal'),
				'tempat' => $this->input->post('tempat'),
				'kepala_desa' => $this->input->post('kepala_desa'),
			];

			
			$save_data_master_surat = $this->model_data_master_surat->store($save_data);

			if ($save_data_master_surat) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_data_master_surat;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/data_master_surat/edit/' . $save_data_master_surat, 'Edit Data Master Surat'),
						anchor('administrator/data_master_surat', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/data_master_surat/edit/' . $save_data_master_surat, 'Edit Data Master Surat')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/data_master_surat');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/data_master_surat');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Data Master Surats
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('data_master_surat_update');

		$this->data['data_master_surat'] = $this->model_data_master_surat->find($id);

		$this->template->title('Data Master Surat Update');
		$this->render('backend/standart/administrator/data_master_surat/data_master_surat_update', $this->data);
	}

	/**
	* Update Data Master Surats
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('data_master_surat_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('No_surat', 'No Surat', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('keterangan_surat', 'Keterangan Surat', 'trim|required');
		$this->form_validation->set_rules('kepada', 'Kepada', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('Alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('tempat', 'Tempat', 'trim|required');
		$this->form_validation->set_rules('kepala_desa', 'Kepala Desa', 'trim|required|max_length[11]');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'No_surat' => $this->input->post('No_surat'),
				'keterangan_surat' => $this->input->post('keterangan_surat'),
				'kepada' => $this->input->post('kepada'),
				'Alamat' => $this->input->post('Alamat'),
				'tanggal' => $this->input->post('tanggal'),
				'tempat' => $this->input->post('tempat'),
				'kepala_desa' => $this->input->post('kepala_desa'),
			];

			
			$save_data_master_surat = $this->model_data_master_surat->change($id, $save_data);

			if ($save_data_master_surat) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/data_master_surat', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/data_master_surat');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/data_master_surat');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Data Master Surats
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('data_master_surat_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
            set_message(cclang('has_been_deleted', 'data_master_surat'), 'success');
        } else {
            set_message(cclang('error_delete', 'data_master_surat'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Data Master Surats
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('data_master_surat_view');

		$this->data['data_master_surat'] = $this->model_data_master_surat->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Data Master Surat Detail');
		$this->render('backend/standart/administrator/data_master_surat/data_master_surat_view', $this->data);
	}
	
	/**
	* delete Data Master Surats
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$data_master_surat = $this->model_data_master_surat->find($id);

		
		
		return $this->model_data_master_surat->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('data_master_surat_export');

		$this->model_data_master_surat->export('data_master_surat', 'data_master_surat');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('data_master_surat_export');

		$this->model_data_master_surat->pdf('data_master_surat', 'data_master_surat');
	}
}


/* End of file data_master_surat.php */
/* Location: ./application/controllers/administrator/Data Master Surat.php */
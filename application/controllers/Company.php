<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Company extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Company';

		$this->load->model('model_company');
	}

	/* 
    * It redirects to the company page and displays all the company information
    * It also updates the company information into the database if the 
    * validation for each input field is successfully valid
    */
	public function index()
	{
		if (!in_array('updateCompany', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
		$this->form_validation->set_rules('service_charge_value', 'Charge Amount', 'trim|required');
		$this->form_validation->set_rules('vat_charge_value', 'Vat Charge', 'trim|required');


		if ($this->form_validation->run() == TRUE) {
			// true case
			$upload_image = $this->upload_image();

			$data = array(
				'company_name' => $this->input->post('company_name'),
				'service_charge_value' => $this->input->post('service_charge_value'),
				'vat_charge_value' => $this->input->post('vat_charge_value'),
				'address' => $this->input->post('address'),
				'phone' => $this->input->post('phone'),
				'country' => $this->input->post('country'),
				'message' => $this->input->post('message'),
				'currency' => $this->input->post('currency')
			);



			$update = $this->model_company->update($data, 1);
			if ($update == true) {
				$this->session->set_flashdata('success', 'Successfully created');
				redirect('company/', 'refresh');
			} else {
				$this->session->set_flashdata('errors', 'Error occurred!!');
				redirect('company/index', 'refresh');
			}
		} else {

			// false case


			$this->data['currency_symbols'] = $this->currency();
			$this->data['company_data'] = $this->model_company->getCompanyData(1);
			$this->render_template('company/index', $this->data);
		}
	}

	/*
    * This function is invoked from another function to upload the image into the assets folder
    * and returns the image path
    */
	public function upload_image()
	{
		// assets/images/product_image
		$config['upload_path'] = 'assets/images/product_image';
		$config['file_name'] =  uniqid();
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2000';

		// $config['max_width']  = '1024';s
		// $config['max_height']  = '768';

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('product_image')) {
			$error = $this->upload->display_errors();
			return $error;
		} else {
			$data = array('upload_data' => $this->upload->data());
			$type = explode('.', $_FILES['product_image']['name']);
			$type = $type[count($type) - 1];

			$path = $config['upload_path'] . '/' . $config['file_name'] . '.' . $type;
			return ($data == true) ? $path : false;
		}
	}
}

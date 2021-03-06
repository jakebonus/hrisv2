<?php	
	
	$this->load->view('v_head'); // Global Load
	
		if( $this->session->userdata('a_id')) {
			if(strtolower($this->session->userdata('a_level')) == 'manager'){
				$this->load->view('v_menu'); // SideBar - Menubar for HR Manager
				$this->load->view('v_sidebar'); // SideBar - Menubar for HR Manager
			}else{
				$this->load->view('v_menu'); // SideBar - Menubar for Employees
				$this->load->view('v_employee_sidebar'); // SideBar - Menubar for Employees
			}
		}
	
	$this->load->view($content); // Global Load
	
	if( $this->session->userdata('a_id')) {
		$this->load->view('v_footer'); // Footer after login
	}else{
		$this->load->view('v_login_footer'); // JS , JQuery for Login
	}
	

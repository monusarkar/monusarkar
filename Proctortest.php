<?php
header("Access-Control-Allow-Origin: *");
/**
 * File: ProctorTest.php
 * Role: Controller for all the Proctor related functionality.
 * Created By: Monu Sarkar
 */
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Proctortest extends MY_Controller {

    function __construct(){
        parent::__construct();    
        //$this->load->model('Base_model');
        //$this->load->model('Web_model');
        //$this->load->model('QuestionPaper_model');
        //$this->load->model('Individual_Dashboard_model');
        //$this->load->model('Company_Dashboard_model');
        //$this->load->model('Tests_model');
        //$this->load->model('TestReport_model');
        //$this->load->model('usp/Report_model');
        //$this->load->helper('security');
        //$this->load->library('Csvimport');
        //$this->load->library('Bcrypt');
        //$this->load->helper('url');
        //$this->load->library('S3');
    	//$this->load->model('AWS_model');
        //$this->load->model('AdminDashboard_model');
    }
	 
	public function index() {
		echo "Nothing Defined Here!";
	}
	
	public function proctor() {
		$this->load->view("proctor-admin");
	}
	
	public function candidate() {
		$this->load->view("proctor-candidate");
	}
	
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: undefined
 * Date: 16-8-8
 * Time: 下午3:04
 */
    class Jingubang extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('show_model');
            $this->load->helper('url_helper');
        }
        public function index(){
            $this->load->view('welcome_message');
        }
        public function new_user(){
         //   $this->load->;
        }
        public function history(){

        }
        public function register(){
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['title'] = '注册新用户';

            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required');

            if($this->form_validation->run() === FALSE){
                $data['attributes'] = array('style'=>'');
                $this->load->view('templates/header',$data);
                $this->load->view('user/register',$data);
                $this->load->view('templates/footer');

            }
            else {
                $res = $this->show_model->register();
                if($res == 1){
                     $data['msg'] = "注册成功";
                 }
                elseif($res == 0){
                     $data['msg'] = "注册失败";
                 }
                 elseif($res == 2){
                     $data['msg'] = "用户名已存在";
                 }
                $this->load->view('common/message',$data);
            }
        }
        public function sql(){
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['title'] = '金箍棒sql注入检测系统';
        }
    }
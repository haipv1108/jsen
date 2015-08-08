<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Email extends CI_Email {

     var $CI;
     var $_mail;
     
     function __construct()
     {
        parent::__construct();
        $CI =& get_instance(); 
     }
     // mà session chú set cái gì đấy. lưu cái gì lên web???
     function config($data){


        $this->_mail=array(
                            "from_sender"       => "dodaihoc.abvk@gmail.com",
                            "name_sender"       => "HaNguyenNgoc",
                            "subject_sender"    => "Active acount Manager Member with CodeIgniter 2.0",
                         );
                               
                     
        $this->_mail['to_receiver'] = $data['to_receiver'];               
        $this->_mail['message'] = $data['message'];

     }
     
     function sendmail(){
                                /*
                                $config['protocol'] = 'sendmail';
                                $config['mailpath'] = '/usr/sbin/sendmail';
                                $config['charset'] = 'iso-8859-1';
                                $config['wordwrap'] = TRUE;

                                $this->email->initialize($config);
                                  */

            $config['protocol']    = 'sendmail';
            $config['smtp_host']    = 'ssl://smtp.gmail.com';
            $config['smtp_port']    = '465';
            $config['smtp_timeout'] = '7';
            $config['smtp_user']    = 'dodaihoc.abvk@gmail.com'; // địa chỉ gmail
            $config['smtp_pass']    = '01646236194'; // pass gmail
            $config['charset']    = 'utf-8';
            $config['newline']    = "\r\n";
            $config['mailtype'] = 'html'; // or html
            $config['validation'] = TRUE; // bool whether to validate email or not      
            $this->initialize($config);
        /*
        $this->email->from('dodaihoc.abvk@gmail.com', 'Hà');
        $this->email->to('annguyenngoc1967@gmail.com'); 

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');  

        $this->email->send();
        echo $this->email->print_debugger();
        
        */
        
            $this->from($this->_mail['from_sender'], $this->_mail['name_sender']);
            $this->to($this->_mail['to_receiver']); 
        
            $this->subject($this->_mail['subject_sender']);
            $this->message($this->_mail['message']);
        
            $this->send();
            echo $this->print_debugger();
     }
}

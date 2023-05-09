<?php
$this->load->library('email');
$config = array();
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'xxx';
$config['smtp_user'] = 'xxx';
$config['smtp_pass'] = 'xxx';
$config['smtp_port'] = 25;
$this->email->initialize($config);
$this->email->set_newline("\r\n");
<?php defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->library('email');
$config = array(
'crlf' => "\r\n",
'newline' => "\r\n",
    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => 'smtp.gmail.com', 
    'smtp_port' => 587,
    '_smtp_auth' => TRUE,
    'smtp_user' => 'portal@nairobiwesthospital.com',
    'smtp_pass' => 'wdygixdvzonyjkww',
    'smtp_crypto' => 'tls', //can be 'ssl' or 'tls' for example
    'mailtype' => 'html', //plaintext 'text' mails or 'html'
    'smtp_timeout' => '4', //in seconds
    'charset' => 'utf-8',
    'wordwrap' => FALSE,
);

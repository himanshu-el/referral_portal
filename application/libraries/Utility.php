<?php   defined('BASEPATH') OR exit('No direct script access allowed');

    class Utility{
        public static function getsocial(){
            $CI =& get_instance();

            $CI->db->select('*')->from('houdinv_social_links');
            $getSearchsocial = $CI->db->get()->row();
            return $getSearchsocial;

        }


        public static function getcategory(){
            $CI =& get_instance();

            $CI->db->select('*')->from('product_cate');
            $getSearchsocial = $CI->db->get()->result_array();
            return $getSearchsocial;

        }


        public static function sitedata(){
            $CI =& get_instance();
            $CI->db->select('*')->from('site_setting');
            $getSite = $CI->db->get()->row();
            return $getSite;

        }
    }

?>
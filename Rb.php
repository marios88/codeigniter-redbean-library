<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rb {

    protected $_CI;

    function __construct() {
        // Include database configuration
        $this->_CI = &get_instance();

        require_once APPPATH.'third_party/rb.php';
        // Database data
        $this->_CI->load->database();
        if(!R::testConnection()){
            R::setup("mysql:host=".$this->_CI->db->hostname.";dbname=".$this->_CI->db->database,$this->_CI->db->username,$this->_CI->db->password);
            if(ENVIRONMENT === 'development'){
                R::debug( TRUE, 3 );
            }
        }
    } //end __contruct()
} //end Rb
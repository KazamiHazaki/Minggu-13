<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : API - rubypedia
 * @author   : Billy Titan Pratama <Billytitan11@gmail.com>
 * @since    : 2017
 * @license  : https://www.rubypedia.com/
 */
class Blog extends CI_Controller {

    function __construct() {

        parent::__construct();
        //load model web
        $this->load->model('web');
    }

    public function index()
    {
        //get data dari model
        $blog = $this->web->get_blog();
        //masukkan data kedalam variabel
        $data['blog'] = $blog;
        //deklarasi variabel array
        $response = array();
        $posts = array();
        //lopping data dari database
        foreach ($blog as $hasil)
        {
            $posts[] = array(
                                "id"                 =>  $hasil->id_blog,
                "judul"            =>  $hasil->judul_blog,
                "content"        =>  $hasil->content,
                "created_at"   =>  $hasil->created_at,
                                "updated_at"  => $hasil->updated_at
            );
        }
        $response['blog'] = $posts;
        header('Content-Type: application/json');
        echo json_encode($response,TRUE);

    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pagination_library
{

    protected CI_Controller $CI;
    private int $per_page = 10;
    private int $uri_segment = 3;
    private string $base_url = '';

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->library('pagination');
    }

    public function get_links()
    {
        return $this->CI->pagination->create_links();
    }

    public function set_base_url($base_url)
    {
        $this->base_url = $base_url;
    }

    public function get_per_page()
    {
        return $this->per_page;
    }

    public function set_per_page($per_page)
    {
        $this->per_page = $per_page;
    }

    public function set_pagination_config(int $total_rows)
    {
        $config['base_url'] = $this->base_url;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $this->per_page;
        $config['uri_segment'] = $this->uri_segment;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';

        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only"></span></span></li>';

        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '</span></li>';

        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span></li>';

        //sirven para los botones "first" y "last"
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';

        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</li>';

        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->CI->pagination->initialize($config);
    }

    public function set_uri_segment(int $uri_segment)
    {
        $this->uri_segment = $uri_segment;
    }

    public function get_uri_segment()
    {
        return ($this->CI->uri->segment($this->uri_segment)) ? $this->CI->uri->segment($this->uri_segment) : 0;
    }
}

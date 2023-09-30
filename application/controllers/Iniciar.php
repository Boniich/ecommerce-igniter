<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iniciar extends CI_Controller {
	
	public function index()
	{
           $dato['conforme'] ="";
		$this->load->view('home/ingresoSistema',$dato);
	}
        
        public function ValidaUsuario(){
            
            /*Recibe los datos de user y pass y tiene que validarlos*/
            
            $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_SPECIAL_CHARS);
            
            $pass = filter_input(INPUT_POST, 'clave', FILTER_SANITIZE_SPECIAL_CHARS);
           
            /* hay que hacer una function en model enviarle como parametros user y pass y que devuelva true o false*/
            if($usuario=='1234' && $pass=='lopez')
            {echo'bienvenido';}else{
                
            $dato['conforme']="no es usuario del sistema";
            
            $this->load->view('home/ingresoSistema',$dato);
            
            
          //  echo("el usuario es ".$usuario." <br> y la password es ".$pass);
        }
        
}}

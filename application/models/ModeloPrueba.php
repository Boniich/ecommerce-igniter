<?php

class ModeloPrueba extends CI_Model {

 

    function __construct() { 
        parent::__construct();
    }

  function validaIngreso($usuario,$clave){        
         $result = $this->db->query("SELECT * FROM user as us inner join perfil as per on us.idperfil=per.idperfil"
                . " WHERE usuario = '" . $usuario. "' and claveIngreso='" . $clave . "' and isVigente=true");
        if ($result->num_rows() > 0) {
            return $result;
        }
        
    }    
}



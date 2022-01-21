<?php

namespace App\Controllers;
use App\Models\PruebaModel;

class Usuarios extends BaseController
{
    
    public function index(){        
            return view('usuarios/index' );
    }

    function saveUsuario(){

        if ($this->request->isAJAX()) {

            $formData  = $_POST;
            $dataVista = [];
            $data      = [];
            $error     = 0;

            $dataVista['msg']    = 'User creado';
            $dataVista['data'] = $data;
            $dataVista['status'] = 'success';

            if( isset($formData['modo']) ){
                
                if(  $formData['modo'] == 0 ){
                    $dataVista['msg']    = 'User creado';
                }else if(  $formData['modo'] == 2 ){
                    $dataVista['msg']    = 'User Editado';
                }else if(  $formData['modo'] == 3 ){
                    $dataVista['msg']    = 'User Eliminado';
                }else if(  $formData['modo'] ){
                    $dataVista['msg']    = 'No se pudo realizar la petición';
                }
                $modo            = $formData['modo'];
            }

            echo json_encode( $dataVista );
            exit;

        } 

        
        
    }

}

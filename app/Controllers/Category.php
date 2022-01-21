<?php

namespace App\Controllers;
use App\Models\PruebaModel;

class Category extends BaseController
{
    
    public function index(){        
        $session = session();
        if( $session->has('user') ){
            $mdlUser = new PruebaModel();
            $data['lista_categorias'] = $mdlUser->getCategorias();
            $data['lista_centro_costo'] = $mdlUser->getCentroCosto();
            // echo "data desde el controlador:<br><pre>";print_r($data);exit;
            return view('category/index', $data );
        }else{
            return view('login');
        }
    }

    function saveCategory(){

        if ($this->request->isAJAX()) {

            $error = 0;
            $formData = $_POST;
            $dataVista = [];
            $data = [];

            $dataVista['status'] = 'warning';
            $dataVista['msg']    = 'Intente Nuevamente';
            $dataVista['title']  = ''; 

            if( isset($formData['modo']) && trim($formData['modo'])!='' ){
                if(  $formData['modo'] == 0 ){
                    $dataVista['msg']    = 'Categoría creada';
                }else if(  $formData['modo'] == 2 ){
                    $dataVista['msg']    = 'Categoría Editada';
                }else if(  $formData['modo'] == 3 ){
                    $dataVista['msg']    = 'Categoría Eliminada';
                }else {
                    $dataVista['msg']    = 'No se pudo realizar la petición';
                }
                $modo            = $formData['modo'];
            }else{
                $error++;
            }

            if( isset($formData['id_categoria']) && trim($formData['id_categoria'])!='' ){
                $id_categoria    = $formData['id_categoria'];
                if(  $formData['id_categoria'] > 0  ){
                }else if(  $formData['id_categoria'] < 1 ){
                    if( $modo == 0 ){
                        $id_categoria    = -1;
                    }else{
                        $error++;
                    }   
                }
            }else{
                $error++;
            }

            if( isset($formData['estado']) && trim($formData['estado'])!='' ){
                $estado    = $formData['estado'];
                if(  $formData['estado'] == 'vigente' || $formData['estado'] == 'no vigente' ){
                }else { 
                    $error++; 
                }
            }else{
                $error++;
            }

            if( isset($formData['nombre']) && trim($formData['nombre'])!='' ){
                $nombre    = $formData['nombre'];
            }else{
                $error++;
            }

            if( isset($formData['id_centro_costo']) && trim($formData['id_centro_costo'])!='' ){
                $id_centro_costo    = $formData['id_centro_costo'];
                if(  $formData['id_centro_costo'] > 0  ){
                }else {
                    $error++;
                }
            }else{
                $error++;
            }

            $dataVista['data']   = $data;
            
            if( $error > 0){
                echo json_encode( $dataVista );
                exit;
            }
                    
            $usuario         = '1';
            $mdlUser = new PruebaModel();

            //*** OJOOOOOO que cuando se va a cargar una vista desde un metodo (function), Se debe colocar variable data['data'] 
            //ya que al pasar a la vista se convierte en varieble texto 
            //$data['data'] = json_encode($reservasModel->getAllReservas());

            $data = $mdlUser->categoriaExiste( $nombre, $id_categoria, $modo );
            
            if( isset($data[0]) && $modo <> 3 ){
                $dataVista['status'] = 'warning';
                $dataVista['msg']    = 'Nombre categoría ya existe. ';
            }else{
                $dataVista['status'] = 'success';
                $data = $mdlUser->saveCategorias($modo, $id_categoria, $id_centro_costo,  $nombre, $estado, $usuario );
                
                if( isset($data[0]) ){
                    $dataVista['status'] = 'success';
                }else{
                    $dataVista['status'] = 'warning';
                }
            }

            $dataVista['data'] = $data;
            
            echo json_encode( $dataVista );

        }

        
    }

}

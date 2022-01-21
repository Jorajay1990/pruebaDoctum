<?php

namespace App\Controllers;
use App\Models\PruebaModel;

class Productos extends BaseController
{
    
    public function index(){        
        $session = session();
        if( $session->has('user') ){
            $mdlUser = new PruebaModel();
            $data['lista_productos'] = $mdlUser->getProductos();
            // $data['lista_productos'] = $mdlUser->getCategorias();
            $data['lista_categoria'] = $mdlUser->getCategoriasVigente();
            // echo "data desde el controlador:<br><pre>";print_r($data);exit;
            return view('productos/index', $data );
        }else{
            return view('login');
        }
    }

    function saveProducto(){

        if ($this->request->isAJAX()) {

            $formData  = $_POST;
            $dataVista = [];
            $data      = [];
            $error     = 0;

            $dataVista['status'] = 'success';
            $dataVista['msg']    = 'data Obtenida';
            $dataVista['title']  = ''; 

            if( isset($formData['modo']) ){
                
                if(  $formData['modo'] == 0 ){
                    $dataVista['msg']    = 'Producto creado';
                }else if(  $formData['modo'] == 2 ){
                    $dataVista['msg']    = 'Producto Editado';
                }else if(  $formData['modo'] == 3 ){
                    $dataVista['msg']    = 'Producto Eliminado';
                }else if(  $formData['modo'] ){
                    $dataVista['msg']    = 'No se pudo realizar la petición';
                }

            }

            if( isset($formData['id_producto']) && trim($formData['id_producto'])!='' ){
                $id_producto    = $formData['id_producto'];
                if(  $formData['id_producto'] > 0  ){
                }else{
                    if( $modo == 0 ){
                        $id_producto    = -1;
                    }else{
                        $error++;
                    }   
                }
            }else{
                $error++;
            }

            if( isset($formData['id_categoria']) && trim($formData['id_categoria'])!='' ){
                $id_categoria    = $formData['id_categoria'];
                if(  $formData['id_categoria'] > 0  ){
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

            if( isset($formData['estado']) && trim($formData['estado'])!='' ){
                $estado    = $formData['estado'];
                if(  $formData['estado'] == 'vigente' || $formData['estado'] == 'no vigente' ){
                }else { 
                    $error++; 
                }
            }else{
                $error++;
            }

            if( isset($formData['codigo_barra']) && trim($formData['codigo_barra'])!='' ){
                $codigo_barra    = $formData['codigo_barra'];
            }else{
                $error++;
            }

            if( isset($formData['precio_compra']) && trim($formData['precio_compra'])!='' ){
                $precio_compra    = $formData['precio_compra'];
            }else{
                $error++;
            }

            if( isset($formData['precio_iva']) && trim($formData['precio_iva'])!='' ){
                $precio_iva    = $formData['precio_iva'];
            }else{
                $error++;
            }

            if( isset($formData['precio_venta']) && trim($formData['precio_venta'])!='' ){
                $precio_venta    = $formData['precio_venta'];
            }else{
                $error++;
            }

            if( isset($formData['descripcion']) && trim($formData['descripcion'])!='' ){
                $descripcion    = $formData['descripcion'];
            }else{
                $error++;
            }
            
            // modo: "2"
            // id_producto: "57"
            // id_categoria: "13"
            // nombre: "Soda maquina"
            // estado: "vigente"
            // codigo_barra: "56565656"
            // precio_compra: "4000"
            // precio_iva: "6500"
            // precio_venta: "6000"
            // descripcion
           
            $dataVista['data']   = $formData;
            
            if( $error > 0){
                echo json_encode( $dataVista );
                exit;
            }

            $mdlUser = new PruebaModel();

            //*** OJOOOOOO que cuando se va a cargar una vista desde un metodo (function), Se debe colocar variable data['data'] 
            //ya que al pasar a la vista se convierte en varieble texto 
            //$data['data'] = json_encode($reservasModel->getAllReservas());

            $data = $mdlUser->productoExiste( $nombre, $id_producto, $modo );
            $usuario='';
            
            if( isset($data[0]) && $modo <> 3 ){
                $dataVista['status'] = 'warning';
                $dataVista['msg']    = 'Nombre Producto ya existe. ';
            }else{
                $dataVista['status'] = 'success';
                $data = $mdlUser->saveProducto($modo, $id_producto, $id_categoria,  $nombre, $estado, $codigo_barra, $precio_compra, $precio_iva, $precio_venta, $usuario, $descripcion );
                
                if( isset($data[0]) ){
                    $dataVista['status'] = 'success';
                }else{
                    $dataVista['status'] = 'warning';
                }
            }

            $dataVista['data'] = $data;
            
            echo json_encode( $dataVista );

        }

        // return view('dashboard/getDataUsuario', $formData);
        
        
        
    }

  
}

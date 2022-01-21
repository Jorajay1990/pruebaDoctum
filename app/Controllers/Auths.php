<?php

namespace App\Controllers;
use App\Models\PruebaModel;

class Auths extends BaseController
{
    
    public function index(){        
        $session = session();
        if( $session->has('user') ){
            return view('dashboard/index');
        }else{
            return view('login');
        }
    }

    function getDataUsuario(){

        if ($this->request->isAJAX()) {

            $formData = $_POST;

            $mdlUser = new PruebaModel();

            //*** OJOOOOOO que cuando se va a cargar una vista desde un metodo (function), Se debe colocar variable data['data'] 
            //ya que al pasar a la vista se convierte en varieble texto 
            //$data['data'] = json_encode($reservasModel->getAllReservas());
            $data = $mdlUser->getDataUsuario($formData['usuario'], md5($formData['clave']) );
           
            if( isset($data[0]) ){
                $session = session();
                $session->set('user', $data[0]['user']);
                $session->set('nombre', $data[0]['nombres'].' '.$data[0]['apparterno']);
                // echo "data desde el controlador:<br><pre>";print_r($data);exit;
                $permisoMenu = [];
                foreach( $data as $menu ){
                    $permisoMenu[ $menu['menu'] ][] = array(
                                            'id_menu' =>$menu['id_menu'], 
                                            'nombre_menu' =>$menu['nombre_menu'], 
                                            'url_menu'=>$menu['url_menu']
                                        );
                }

                // $permisoMenu = [];
                // $permisoMenu['tablero']   = ['read'=>0, 'write'=>0, 'url'=>'url', 'nombre_menu'=>'Tablero'] ;
                // $permisoMenu['administracion2']   = ['read'=>0, 'write'=>0, 'url'=>'url', 'nombre_menu'=>'Administración', 
                //                                         'submenus'=>[ 
                //                                                     ['nombre_menu'=>'Usuarios', 'url'=>'usuarios/index'],
                //                                                     ['nombre_menu'=>'Perfil', 'url'=>'perfil/index'],
                //                                                     ['nombre_menu'=>'Mesas', 'url'=>'mesas/index'],
                //                                                     ['nombre_menu'=>'Centro Costo', 'url'=>'centro_costo/index'],
                //                                                     ['nombre_menu'=>'Forma de Pago', 'url'=>'fpago/index'] 
                //                                         ]
                //                                     ];
                // $permisoMenu['mantenedores']   = ['read'=>0, 'write'=>0, 'url'=>'url', 'nombre_menu'=>'Mantenedores',
                //                                                 'submenus'=>[ 
                //                                                     ['nombre_menu'=>'Usuarios', 'url'=>'usuarios/index'],
                //                                                     ['nombre_menu'=>'Perfil', 'url'=>'perfil/index'],
                //                                                     ['nombre_menu'=>'Mesas', 'url'=>'mesas/index'],
                //                                                     ['nombre_menu'=>'Centro Costo', 'url'=>'centro_costo/index'],
                //                                                     ['nombre_menu'=>'Forma de Pago', 'url'=>'fpago/index'] 
                //                                         ]
                //                                     ];
                // $permisoMenu['usuarios']   = ['read'=>0, 'write'=>0, 'url'=>'usuarios/index', 'nombre_menu'=>'url'];
                // $permisoMenu['categorias'] = ['read'=>0, 'write'=>0, 'url'=>'category/index', 'nombre_menu'=>'Categorias'];
                // $permisoMenu['productos']  = ['read'=>0, 'write'=>0, 'url'=>'productos/index', 'nombre_menu'=>'Productos'];
                // $permisoMenu['pedidos']  = ['read'=>0, 'write'=>0, 'url'=>'url', 'nombre_menu'=>'Orden de Pedidos',
                //                                                     'submenus'=>[ 
                //                                                         ['nombre_menu'=>'Agregar Orden', 'url'=>'url'],
                //                                                         ['nombre_menu'=>'Lista Orden', 'url'=>'url']
                //                                             ]
                //                                         ];
                // $permisoMenu['ventas']  = ['read'=>0, 'write'=>0, 'url'=>'url', 'nombre_menu'=>'Ventas',
                //                                                     'submenus'=>[ 
                //                                                         ['nombre_menu'=>'Ventas por día', 'url'=>'url'],
                //                                                         ['nombre_menu'=>'Proyección de Ventas', 'url'=>'url']
                //                                             ]
                //                                         ];
                // $permisoMenu['caja']  = ['read'=>0, 'write'=>0, 'url'=>'url', 'nombre_menu'=>'Cierre Caja'];
                // $permisoMenu['informe']  = ['read'=>0, 'write'=>0, 'url'=>'url', 'nombre_menu'=>'Informe de Ventas',
                //                                         'submenus'=>[ 
                //                                             ['nombre_menu'=>'Ventas Diarias', 'url'=>'url'],
                //                                             ['nombre_menu'=>'Comparativa de Ventas', 'url'=>'url'],
                //                                             ['nombre_menu'=>'Ranking Productos', 'url'=>'url'],
                //                                             ['nombre_menu'=>'Comparativa de Productos', 'url'=>'url']] 
                //                                 ]
                //                             ];
                // $permisoMenu['cobranzas']  = ['read'=>0, 'write'=>0, 'url'=>'url', 'nombre_menu'=>'Cobranzas'];
                
                $session->set('permisos', $permisoMenu );
                // echo "data desde el controlador:<br><pre>";print_r($permisoMenu );exit;

                $dataVista['status'] = 'success';
                $dataVista['msg']    = 'Login correctamente';
                // echo "data desde el controlador:<br><pre>";print_r($data);exit;
            }else{
                $dataVista['status'] = 'warning';
                $dataVista['msg']    = 'Sin Usuario válido o Contraseña válido';
            }

            $dataVista['data'] = $data;
            
            echo json_encode( $dataVista );

        }

        // return view('dashboard/getDataUsuario', $formData);
        
        
        
    }

    public function login(){
        $session = session();
        if( $session->has('user') ){
            return view('dashboard/index');
        }else{
            return view('login');
        }
	}

	/*
		clears the session and redirects to login page
	*/
	public function logout()
	{
        $session = session();
		$session->destroy();
        // redirect('auths', 'refresh');
        return view('login');
	}
}

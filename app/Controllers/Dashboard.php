<?php

namespace App\Controllers;
use App\Models\DashModel;
use App\Models\PruebaModel;

class DashBoard extends BaseController
{
    public function index(){        

        $session = session();
        if( $session->has('user') ){
            $mdlUser = new DashModel();
            $dataResponse['dataResponse'] = $mdlUser->getDataDash();
           //  echo "Data dashBoard a la vista:<br><pre>";
           //  print_r($dataResponse);
           //  exit;
   
           return view('dashboard/index', $dataResponse);
        }else{
            return view('login');
        }

        
    }

    function getDataUsuario(){


        if ($this->request->isAJAX()) {

            // echo "<pre>";
            // print_r($_POST);
            // echo"<br><br>";
            //exit;

            $formData = $_POST;

            $mdlUser = new PruebaModel();

            //*** OJOOOOOO que cuando se va a cargar una vista desde un metodo (function), Se debe colocar variable data['data'] 
            //ya que al pasar a la vista se convierte en varieble texto 
            //$data['data'] = json_encode($reservasModel->getAllReservas());

            $data = $mdlUser->getDataUsuario($formData['usuario'], $formData['clave']);

            // echo "data desde el controlador:<br><pre>";print_r($data);exit;

            echo json_encode($data);

        }

        // return view('dashboard/getDataUsuario', $formData);
        
        
        
    }

    public function prueba(){

       echo "llegue a prueba JAIMIN";

        //     $reservasModel = new PruebaModel();
        //     //*** OJOOOOOO Se debe colocar data ya que al pasar a la vista se convierte en varieble texto ****
        //     $data['data'] = $reservasModel->getAllReservas();
        //     echo "<pre>";print_r($data);exit;    
        //     return view('dashboard/index', $data);    
    }
}

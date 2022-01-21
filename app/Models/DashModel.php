<?php

namespace App\Models;

use CodeIgniter\Model;

class DashModel extends Model
{
    // protected $table      = 'users';
    // protected $primaryKey = 'id';
    // protected $useAutoIncrement = true;
    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;
    // protected $allowedFields = ['name', 'email'];
    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';
    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    public function getDataDash(){

        $dataResponse = array();
        $dataResponse['titulo'] = '';
        $dataResponse['status'] = '';
        $dataResponse['msg'] = '';
        $dataResponse['data'] = array();

        try{

            //$user = $this->Session->read('usuario');

            // if($user=='' || $user==null){
            //     $this->redirect(array('controller' => 'usuarios'));
            // }else{

                $msg = '';
                ///*** SALONES MESAS *** */
                $sql = "SELECT s.id_salon, s.nombre AS salon, m.numero, m.descripcion, m.capacidad, m.estado
                        FROM salones s
                            LEFT JOIN ( SELECT * FROM mesas WHERE mesas.estado = 'vigente') as m ON m.id_salon = s.id_salon
                        WHERE s.estado = 'vigente';";
        
                $query = $this->db->query($sql);
                $responseBd = $query->getResultArray();

                // echo "Salones y mesas vigentes:<br><pre>";
                // print_r($responseBd);
                // echo "<br><br>";
                // exit;

                $query->freeResult();

                if($responseBd[0]['id_salon']){

                    $dataResponse['data']['salones_mesas'] = $responseBd;

                    ///***TOTAL DE ORDENES *** */
                    $sql = "SELECT COUNT(*) AS total_ordenes FROM orden_pedidos WHERE estado = 'vigente'";

                    $query = $this->db->query($sql);
                    $responseBd = $query->getResultArray();

                    // echo "Total Ordenes:<br><pre>";
                    // print_r($responseBd);                    
                    // echo "<br>";                    

                    $query->freeResult();                    

                    if(isset($responseBd[0]['total_ordenes'])){
                        $dataResponse['data']['total_ordenes'] = $responseBd[0]['total_ordenes'];
                    }else{
                        $dataResponse['data']['total_ordenes'] = 0;
                        $msg .= "No se pudo obtener el total de ordenes vigentes.<br>Por favor actualice la página.<br>";
                    }

                    ///*** TOTAL VENTAS PAGADAS */
                    $sql = "SELECT SUM(total_venta) AS total_ventas FROM ventas WHERE fecha  = CURDATE() AND estado = 'pagada';";
                    $query = $this->db->query($sql);
                    $responseBd = $query->getResultArray();

                    // echo "<br><br>Total Ventas:<br><pre>";
                    // print_r($responseBd);                    
                    // echo "<br>";
                    $query->freeResult();
                    //exit;

                    // echo "responseBd[0]['total_ventas']: ".$responseBd['0']['total_ventas']."<br>";

                    if(isset($responseBd[0])){                        

                        if($responseBd[0]['total_ventas']!=null && $responseBd[0]['total_ventas'] !=''){
                            $dataResponse['data']['total_ventas'] = $responseBd[0]['total_ordenes'];
                        }else{
                            $dataResponse['data']['total_ventas'] = 0;    
                        }                       

                    }else{                        
                        $dataResponse['data']['total_ventas'] = 0;
                        $msg .= "No se pudo obtener el total de venta diaría.<br>Por favor actualice la página.<br>";
                    }

                    ///*** TOTAL VENTA PROYECTADA *** */
                    $sql = "SELECT SUM(total_orden) AS total_venta_proyectada FROM orden_pedidos WHERE estado = 'vigente';";
                    $query = $this->db->query($sql);
                    $responseBd = $query->getResultArray();
                    $query->freeResult();                    

                    if(isset($responseBd[0])){

                        if($responseBd[0]['total_venta_proyectada']!=null && $responseBd[0]['total_venta_proyectada'] !=''){
                            $dataResponse['data']['total_venta_proyectada'] = $responseBd[0]['total_venta_proyectada'];
                        }else{
                            $dataResponse['data']['total_venta_proyectada'] = 0;    
                        }                        

                    }else{
                        $dataResponse['data']['total_venta_proyectada'] = 0;
                        $msg .= "No se pudo obtener el total de la venta proyectada.<br>Por favor actualice la página.<br>";
                    }

                    ///*** MESAS DISPONIBLES *** */
                    $sql = "SELECT m.id_mesa, m.numero, m.capacidad, s.nombre as sala
                            FROM mesas m
                                LEFT JOIN salones s USING (id_salon)
                            WHERE m.estado = 'vigente'
                            AND not EXISTS (
                            
                                SELECT op.id_orden, om.id_mesa 
                                    FROM orden_pedidos op
                                        LEFT JOIN orden_mesas om USING(id_orden)
                                    WHERE estado = 'vigente')";

                    $query = $this->db->query($sql);
                    $responseBd = $query->getResultArray();
                    $query->freeResult();                    

                    if(isset($responseBd[0])){

                        if($responseBd[0]['id_mesa']!=null && $responseBd[0]['id_mesa'] !=''){
                            $dataResponse['data']['total_mesas_disponibles'] = count($responseBd);
                            $dataResponse['data']['data_mesas_disponibles'] = $responseBd;
                        }else{
                            $dataResponse['data']['total_mesas_disponibles'] = 0;    
                            $dataResponse['data']['data_mesas_disponibles'] = array();
                        }                        

                    }else{
                        $dataResponse['data']['total_mesas_disponibles'] = 0;
                        $dataResponse['data']['data_mesas_disponibles'] = array();
                        $msg .= "No se pudo obtener el total de mesas disponibles.<br>Por favor actualice la página.<br>";
                    }

                    if($msg!=''){

                        $dataResponse['titulo'] = 'Sr(a). Usuario(a)';
                        $dataResponse['status'] = 'info';
                        $dataResponse['msg']    = 'Se encontraron algunas observaciones.<br>'.$msg;

                    }else{
                        $dataResponse['titulo'] = 'OK';
                        $dataResponse['status'] = 'success';
                        $dataResponse['msg']    = 'OK';
                    }
                }else{
                    $dataResponse['titulo'] = 'Sr(a). Usuario(a).';
                    $dataResponse['status'] = 'warning';
                    $dataResponse['msg'] = 'No se encuentran salones y mesas configuradas en el sistema.<br>Por favor dirijase al manú mantenedores para agregar salas y mesas.';
                    $dataResponse['data'] = array();
                }       
                
            // }

            // echo "data al controlador:<br><pre>";
            // print_r($dataResponse);
            // exit;

            return $dataResponse;

        }
        catch(\Exception $e){
            $dataResponse['titulo'] = 'Error!';
            $dataResponse['status'] = 'error';
            $dataResponse['msg']    = 'Se ha producido un error al procesar los datos:<br>'.$e->getMessage().'<br>Contactar con el proveedor del software.';
            $dataResponse['data']   = array();
            return $dataResponse;
        }        
      							
	}

    public function getDataUsuario($user, $clave){
        
        //*** OJOOOOO AQUI las fechas deben ir en fomato gringo yy-mm-dd
        //*** Para cambiar probar en el soquete de la base de datos de utf8_general_ci pasarlo a utf8_spanish_ci
        // $sql = "call sp_obt_datos_reservas(3,1,'01/12/2020','01/12/2020');";
        // $sql = "call sp_obt_datos_reservas(3,1,'2020-12-01','2020-12-30');";

        // $sql = "CALL sp_valida_login('admin', '21232f297a57a5a743894a0e4a801fc3')";
        $sql = "CALL sp_valida_login('".$user."', '".$clave."')";
        
        $query = $this->db->query($sql);
        $data = $query->getResultArray();

        // echo "data desde el modelo:<br><pre>";
        // print_r($data);exit;

        //$query = $this->db->query($sql);        
        //$data = $query->result_array();        
        // $query->next_result();
        // $query->free_result();
        $query->freeResult();
                
        return $data;
      							
	}
}
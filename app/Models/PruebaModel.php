<?php

namespace App\Models;

use CodeIgniter\Model;

class PruebaModel extends Model
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

    public function getDataUsuario($user, $clave)
	{
        
        //*** OJOOOOO AQUI las fechas deben ir en fomato gringo yy-mm-dd
        //*** Para cambiar probar en el soquete de la base de datos de utf8_general_ci pasarlo a utf8_spanish_ci
        // $sql = "call sp_obt_datos_reservas(3,1,'01/12/2020','01/12/2020');";
        // $sql = "call sp_obt_datos_reservas(3,1,'2020-12-01','2020-12-30');";

        // $sql = "CALL sp_valida_login('admin', '21232f297a57a5a743894a0e4a801fc3')";
        $sql = "CALL sp_valida_login('".$user."', '".$clave."')";
        $query = $this->db->query($sql);
        $data = $query->getResultArray();
        $query->freeResult();
                
        return $data;
      							
	}

    public function getCategorias()
	{
        
        //*** OJOOOOO AQUI las fechas deben ir en fomato gringo yy-mm-dd
        //*** Para cambiar probar en el soquete de la base de datos de utf8_general_ci pasarlo a utf8_spanish_ci
        // $sql = "call sp_obt_datos_reservas(3,1,'01/12/2020','01/12/2020');";
        // $sql = "call sp_obt_datos_reservas(3,1,'2020-12-01','2020-12-30');";

        // $sql = "CALL sp_valida_login('admin', '21232f297a57a5a743894a0e4a801fc3')";
        $sql = "CALL sp_categoria_get()";
        $query = $this->db->query($sql);
        $data = $query->getResultArray();
        $query->freeResult();
                
        return $data;
      							
	}

    public function getCentroCosto()
	{
        
        //*** OJOOOOO AQUI las fechas deben ir en fomato gringo yy-mm-dd
        //*** Para cambiar probar en el soquete de la base de datos de utf8_general_ci pasarlo a utf8_spanish_ci
        // $sql = "call sp_obt_datos_reservas(3,1,'01/12/2020','01/12/2020');";
        // $sql = "call sp_obt_datos_reservas(3,1,'2020-12-01','2020-12-30');";
        // $sql = "CALL sp_valida_login('admin', '21232f297a57a5a743894a0e4a801fc3')";
        $sql = "CALL sp_centro_costo_get()";
        $query = $this->db->query($sql);
        $data = $query->getResultArray();
        $query->freeResult();
                
        return $data;
      							
	}

    public function getProductos()
	{
        
        //*** OJOOOOO AQUI las fechas deben ir en fomato gringo yy-mm-dd
        //*** Para cambiar probar en el soquete de la base de datos de utf8_general_ci pasarlo a utf8_spanish_ci
        // $sql = "call sp_obt_datos_reservas(3,1,'01/12/2020','01/12/2020');";
        // $sql = "call sp_obt_datos_reservas(3,1,'2020-12-01','2020-12-30');";

        // $sql = "CALL sp_valida_login('admin', '21232f297a57a5a743894a0e4a801fc3')";
        $sql = "CALL sp_producto_get()";
        $query = $this->db->query($sql);
        $data = $query->getResultArray();
        $query->freeResult();
                
        return $data;
      							
	}

    public function productoExiste( $nombre, $id_producto, $modo )
	{
        $sql = "CALL `sp_usuarios_existe`('".$nombre."', '".$id_producto."', '".$modo."');";
        $query = $this->db->query($sql);
        $data = $query->getResultArray();
        $query->freeResult();
                
        return $data;
      							
	}

    public function saveProducto($modo, $id_producto, $id_categoria,  $nombre, $estado, $codigo_barra, $precio_compra, $precio_iva, $precio_venta, $usuario, $descripcion )
	{
        // $sql = "CALL sp_valida_login('admin', '21232f297a57a5a743894a0e4a801fc3')";
        $sql = "CALL `sp_usuarios_save`('".$modo."', '".$id_producto."', '".$id_categoria."', '".$nombre."', 
        '".$estado."','".$codigo_barra."','".$precio_compra."','".$precio_iva."','".$precio_venta."','".$usuario."','".$descripcion."');";
        $query = $this->db->query($sql);
        $data = $query->getResultArray();
        $query->freeResult();
                
        return $data;
      							
	}

    public function getCategoriasVigente()
	{
        
        //*** OJOOOOO AQUI las fechas deben ir en fomato gringo yy-mm-dd
        //*** Para cambiar probar en el soquete de la base de datos de utf8_general_ci pasarlo a utf8_spanish_ci
        // $sql = "call sp_obt_datos_reservas(3,1,'01/12/2020','01/12/2020');";
        // $sql = "call sp_obt_datos_reservas(3,1,'2020-12-01','2020-12-30');";

        // $sql = "CALL sp_valida_login('admin', '21232f297a57a5a743894a0e4a801fc3')";
        $sql = "CALL sp_categoria_vigente_get()";
        $query = $this->db->query($sql);
        $data = $query->getResultArray();
        $query->freeResult();
                
        return $data;
      							
	}

    public function saveCategorias($modo, $id_categoria_modal, $id_centro_costo_modal, $nombre_modal, $estado_modal, $usuario ) 
	{
        // $sql = "CALL sp_valida_login('admin', '21232f297a57a5a743894a0e4a801fc3')";
        $sql = "CALL `sp_category_save`('".$modo."', '".$id_categoria_modal."', '".$id_centro_costo_modal."', '".$nombre_modal."', '".$estado_modal."','".$usuario."');";
        $query = $this->db->query($sql);
        $data = $query->getResultArray();
        $query->freeResult();
                
        return $data;
      							
	}

    public function categoriaExiste( $nombre_modal, $id_categoria_modal, $modo ) 
	{
        // $sql = "CALL sp_valida_login('admin', '21232f297a57a5a743894a0e4a801fc3')";
        $sql = "CALL `sp_categoria_existe`('".$nombre_modal."', '".$id_categoria_modal."', '".$modo."');";
        $query = $this->db->query($sql);
        $data = $query->getResultArray();
        $query->freeResult();
                
        return $data;
      							
	}


    public function getUsuarios()
	{
        
        //*** OJOOOOO AQUI las fechas deben ir en fomato gringo yy-mm-dd
        //*** Para cambiar probar en el soquete de la base de datos de utf8_general_ci pasarlo a utf8_spanish_ci
        // $sql = "call sp_obt_datos_reservas(3,1,'01/12/2020','01/12/2020');";
        // $sql = "call sp_obt_datos_reservas(3,1,'2020-12-01','2020-12-30');";

        // $sql = "CALL sp_valida_login('admin', '21232f297a57a5a743894a0e4a801fc3')";
        $sql = "CALL sp_usuarios_get()";
        $query = $this->db->query($sql);
        $data = $query->getResultArray();
        $query->freeResult();
                
        return $data;
      							
	}

    public function usuarioExiste( $user, $id_usuario, $modo )
	{
        $sql = "CALL `sp_usuarios_existe`('".$user."', '".$id_usuario."', '".$modo."');";
        $query = $this->db->query($sql);
        $data = $query->getResultArray();
        $query->freeResult();
                
        return $data;
      							
	}

    public function saveUsuario($modo, $id_usuario, $user, $nombre, $appaterno, $apmaterno, $rut, $estado, $perfil_modal , $empresa_modal,$usuario_save )
	{
        // $sql = "CALL sp_valida_login('admin', '21232f297a57a5a743894a0e4a801fc3')";
        $sql = "CALL `sp_usuarios_save`('".$modo."', '".$id_usuario."', '".$user."', '".$nombre."', '".$appaterno."','".$apmaterno."','".$rut."','".$estado."','".$perfil_modal."','".$empresa_modal."','".$usuario_save."');";
        $query = $this->db->query($sql);
        $data = $query->getResultArray();
        $query->freeResult();
                
        return $data;
      							
	}



    public function getPerfilesVigente()
	{
        
        //*** OJOOOOO AQUI las fechas deben ir en fomato gringo yy-mm-dd
        //*** Para cambiar probar en el soquete de la base de datos de utf8_general_ci pasarlo a utf8_spanish_ci
        // $sql = "call sp_obt_datos_reservas(3,1,'01/12/2020','01/12/2020');";
        // $sql = "call sp_obt_datos_reservas(3,1,'2020-12-01','2020-12-30');";

        // $sql = "CALL sp_valida_login('admin', '21232f297a57a5a743894a0e4a801fc3')";
        $sql = "CALL sp_perfiles_vigente_get()";
        $query = $this->db->query($sql);
        $data = $query->getResultArray();
        $query->freeResult();
                
        return $data;
      							
	}

    public function getEmpresaVigente()
	{
        
        //*** OJOOOOO AQUI las fechas deben ir en fomato gringo yy-mm-dd
        //*** Para cambiar probar en el soquete de la base de datos de utf8_general_ci pasarlo a utf8_spanish_ci
        // $sql = "call sp_obt_datos_reservas(3,1,'01/12/2020','01/12/2020');";
        // $sql = "call sp_obt_datos_reservas(3,1,'2020-12-01','2020-12-30');";

        // $sql = "CALL sp_valida_login('admin', '21232f297a57a5a743894a0e4a801fc3')";
        $sql = "CALL sp_empresas_vigente_get()";
        $query = $this->db->query($sql);
        $data = $query->getResultArray();
        $query->freeResult();
                
        return $data;
      							
	}

    

    
    
    
}
<?php
require(APPPATH.'/libraries/REST_Controller.php');
class Api_Rest extends REST_Controller{
    function cursos_get(){ 
        if(!$this->get('id'))//parametros que vas a jalar
        {
            $this->response(NULL, 400); //respuesta si no lo obtiene
        }
 
        $user = $this->user_model->get( $this->get('id') );//buscar en base de datos cambiar el modelo
         
        if($user)//si es correcto
        {
            $this->response($user, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);//si no encuentra nada dentro de la base
        }
    }
}
/*
 * para obtener el dato se tiene que hacer una peticion con las siguientes caracteristicas
 * desarrollo.virtual.usac.edu.gt/Api_Rest/controlador/param/data/format/formato
 * ej.
 * desarrollo.virtual.usac.edu.gt/Api_Rest/Api_Rest/curso/id/format/json
 */

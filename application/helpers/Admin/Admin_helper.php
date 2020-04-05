<?php
function getChangePassRules()
{
    return array(
        array(
            'field' => 'Pass1',
            'label' => 'Pass1',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'La Contraseña es Requerida',
            ),
        ),
        array(
            'field' => 'Pass2',
            'label' => 'Pass2',
            'rules' => 'required|matches[Pass1]|trim',
            'errors' => array(
                'required' => 'Vuelva a Ingresar la Contraseña',
                'matches' =>  'Las contraseñas no coinciden',
            ),
        ),
    );
}

function getRegisterCurseRules()
{
    return array(
        array(
            'field' => 'NombreCurso',
            'label' => 'NombreCurso',
            'rules' => 'required|max_length[255]|trim',
            'errors' => array(
                'required' => 'El Nombre del Curso es Requerido',
                'max_legth' => 'El Nombre del Curso es demasiado largo',
            ),
        ),
        array(
            'field' => 'selectDocente',
            'label' => 'selectDocente',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Tiene que elegir el docente del Curso',
            ),
        ),
    );
}

function getRegisterDocenteRules()
{
    return array(
        array(
            'field' => 'Codigo',
            'label' => 'Codigo',
            'rules' => 'required|max_length[11]|trim',
            'errors' => array(
                'required' => 'El Código del Docente es Requerido',
                'max_legth' => 'El Código del Docente es demasiado largo',
            ),
        ),
        array(
            'field' => 'Nombre',
            'label' => 'Nombre',
            'rules' => 'required|max_length[255]|trim',
            'errors' => array(
                'required' => 'El Nombre del Docente es Requerido',
                'max_legth' => 'El Nombre del Docente es demasiado largo',
            ),
        ),
        array(
            'field' => 'Apellido',
            'label' => 'Apellido',
            'rules' => 'required|max_length[255]|trim',
            'errors' => array(
                'required' => 'El Apellido del Docente es Requerido',
                'max_legth' => 'El Apellido del Docente es demasiado largo',
            ),
        ),
        array(
            'field' => 'password',
            'label' => 'password',
            'rules' => 'required|max_length[255]|trim',
            'errors' => array(
                'required' => 'La Contraseña es Requerida',
                'max_legth' => 'La Contraseña es demasiada larga',
            ),
        ),
        
    );
}

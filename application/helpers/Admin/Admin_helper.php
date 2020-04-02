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

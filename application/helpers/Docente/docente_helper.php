<?php
function getThemesRules()
{
    return array(
        array(
            'field' => 'Nombre_T',
            'label' => 'Nombre_T',
            'rules' => 'required|max_length[255]|trim',
            'errors' => array(
                'required' => 'El Nombre del Tema es Requerido',
                'max_legth' => 'El Nombre del Tema es demasiado largo',
            ),
        ),
    );
}
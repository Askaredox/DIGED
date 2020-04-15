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

function getTitlesRules()
{
    return array(
        array(
            'field' => 'Nombre',
            'label' => 'Nombre',
            'rules' => 'required|max_length[255]|trim',
            'errors' => array(
                'required' => 'El Nombre del Titulo es Requerido',
                'max_legth' => 'El Nombre del Titulo es demasiado largo',
            ),
        ),
    );
}
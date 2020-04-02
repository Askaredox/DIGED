<?php
function getLoginRules()
{
    return array(
        array(
            'field' => 'txtUser',
            'label' => 'txtUser',
            'rules' => 'required|max_length[20]',
            'errors' => array(
                'required' => 'El Usuario es requerido.',
                'max_length[255]'=>  'El nombre de Usuario es demasiado Largo.',
            ),
        ),
        array(
            'field' => 'txtPass',
            'label' => 'txtPass',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'La Contraseña es requerida.',
            ),
        ),
    );
}

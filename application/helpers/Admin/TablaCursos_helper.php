<?php
function getEditCursoRules()
{
    return array(
        array(
            'field' => 'curso',
            'label' => 'curso',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'El %s es Requerido',
            ),
        ),
        array(
            'field' => 'docente',
            'label' => 'docente',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'El %s es Requerido',
            ),
        ),
    );
}

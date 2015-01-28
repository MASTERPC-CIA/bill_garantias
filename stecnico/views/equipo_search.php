<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo Open('form', array('method'=>'post','action'=>  base_url('stecnico/equipo/get_crud')));
    echo Open('div',array('class'=>'col-md-3 form-group'));
        echo Open('div',array('class'=>'input-group'));
          echo tagcontent('span', 'Fecha', array('class'=>'input-group-addon'));
          echo input(array('name'=>"fecha_desde", 'class'=>"form-control datepicker",'placeholder'=>"Desde", 'style'=>"width: 50%"));
          echo input(array('name'=>"fecha_hasta", 'class'=>"form-control datepicker", 'placeholder'=>"Hasta", 'style'=>"width: 50%"));
        echo Close('div');
    echo Close('div');  

    echo Open('div',array('class'=>'col-md-3 form-group'));
        echo Open('div',array('class'=>'input-group'));
          echo tagcontent('span', 'F.Entrega', array('class'=>'input-group-addon'));
          echo input(array('name'=>"fecha_entr_desde", 'class'=>"form-control datepicker",'placeholder'=>"Desde", 'style'=>"width: 50%"));
          echo input(array('name'=>"fecha_entr_hasta", 'class'=>"form-control datepicker", 'placeholder'=>"Hasta", 'style'=>"width: 50%"));
        echo Close('div');
    echo Close('div');  
    
    $tecnicos_combo = combobox($tecnicos, array('label'=>'empleado','value'=>'empl_id'), array('name'=>'tecnico_id','class'=>'form-control'), true);
    echo Open('div',array('class'=>'col-md-3 form-group'));
        echo Open('div',array('class'=>'input-group'));
          echo tagcontent('span', 'Tecnico', array('class'=>'input-group-addon'));
          echo $tecnicos_combo;
        echo Close('div');
    echo Close('div');  

    $tiposservicio_combo = combobox($tiposservicio, array('label'=>'tipo','value'=>'id'), array('name'=>'tiposervicio_id','class'=>'form-control'), true);
    echo Open('div',array('class'=>'col-md-3 form-group'));
        echo Open('div',array('class'=>'input-group'));
          echo tagcontent('span', 'T. Serv.', array('class'=>'input-group-addon'));
          echo $tiposservicio_combo;
        echo Close('div');
    echo Close('div');  

    $estadosequ_combo = combobox($estadosequ, array('label'=>'estado','value'=>'id'), array('name'=>'equestado_id','class'=>'form-control'), true);
    echo Open('div',array('class'=>'col-md-3 form-group'));
        echo Open('div',array('class'=>'input-group'));
          echo tagcontent('span', 'Estado', array('class'=>'input-group-addon'));
          echo $estadosequ_combo;
        echo Close('div');
    echo Close('div');  

    $marcas_combo = combobox($marcas, array('label'=>'nombre','value'=>'id'), array('name'=>'marca_id','class'=>'form-control'), true);
    echo Open('div',array('class'=>'col-md-3 form-group'));
        echo Open('div',array('class'=>'input-group'));
          echo tagcontent('span', 'Marca', array('class'=>'input-group-addon'));
          echo $marcas_combo;
        echo Close('div');
    echo Close('div');  

    $empleados_combo = combobox($empleados, array('label'=>'nombres','value'=>'id'), array('name'=>'user_id','class'=>'form-control'), true);
    echo Open('div',array('class'=>'col-md-3 form-group'));
        echo Open('div',array('class'=>'input-group'));
          echo tagcontent('span', 'Usuario', array('class'=>'input-group-addon'));
          echo $empleados_combo;
        echo Close('div');
    echo Close('div');  

    echo Open('div',array('class'=>'col-md-3 form-group'));
        echo Open('div',array('class'=>'input-group'));
          echo tagcontent('span', 'RUC/CI. Cliente: ', array('class'=>'input-group-addon'));
          echo input(array('name'=>'client_id','class'=>'form-control'));
        echo Close('div');
    echo Close('div');  

    echo Open('div',array('class'=>'col-md-3 form-group'));
        echo Open('div',array('class'=>'input-group'));
          echo tagcontent('span', 'Nro', array('class'=>'input-group-addon'));
          echo input(array('name'=>'id','class'=>'form-control'));
        echo Close('div');
    echo Close('div');  
    
    echo tagcontent('button', 'Buscar', array('id'=>'ajaxformbtn','data-target'=>'equipos_ingresados_out','class'=>'btn btn-primary'));
echo Close('form'); //cierra form de buscar proveedor

echo tagcontent('div', '', array('id'=>'equipos_ingresados_out','class'=>'col-md-12'));
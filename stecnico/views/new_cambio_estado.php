<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//echo tagcontent('button', '<span class="glyphicon glyphicon-print"></span> Imprimir', array('id'=>'printbtn','data-target'=>'equipo_ingreso_print','class'=>'btn btn-default'));
//echo lineBreak2(1, array('class'=>'clr'));
echo Open('div', array('id'=>'equipo_ingreso_print','class'=>'col-md-12','style'=>'font-family:monospaced'));
    echo Open('table', array('class'=>'table table-striped table-condensed'));
        echo Open('tr');
            echo tagcontent('td', '<label>Nro.</label> '.$equipo->anio.'-'.$equipo->prefix.str_pad($equipo->id, 11, '0', STR_PAD_LEFT));
            echo tagcontent('td', '<label>F.Ingreso: </label> '.$equipo->fecha.' '.$equipo->hora);
            echo tagcontent('td', '<label>Servicio: </label> '.$equipo->tipo_servicio);
            echo tagcontent('td', 'Marca: '.$equipo->marca);
            echo tagcontent('td', 'Tecnico: '.$equipo->tecnico_nombres.$equipo->tecnico_apellidos);
        echo Close('tr');
        echo Open('tr');
            echo tagcontent('td', 'Cl.: '.$equipo->client_nombres.' '.$equipo->client_apellidos);
            echo tagcontent('td', 'C.I: '.$equipo->client_id);
            echo tagcontent('td', 'Tlf.: '.$equipo->client_telefonos);
//            echo tagcontent('td', 'E-mail: '.$equipo->client_email);
            echo tagcontent('td', 'Dir: '.$equipo->client_direccion, array('colspan'=>'2'));
        echo Close('tr');
        echo Open('tr');
            echo Open('td',array('colspan'=>'5'));
                echo Open('form', array('method'=>'post','action'=>  base_url('stecnico/equipo/save_new_estado')));
                    echo input(array('type'=>'hidden','name'=>'equipo_id','value'=>$equipo->id));
                    echo tagcontent('textarea', '', array('name'=>'detalle','class'=>'form-control','placeholder'=>'Detalle del Estado','rows'=>'5'));
                    echo lineBreak2(1, array('class'=>'clr'));
                    
                    $input = input(array('name'=>'email','value'=>$equipo->client_email,'class'=>'form-control'));
                    echo tagcontent('div', $input, array('class'=>'col-md-3'));

                    $input = input(array('name'=>'celular','value'=>$equipo->client_celular,'class'=>'form-control'));
                    echo tagcontent('div', $input, array('class'=>'col-md-2'));

                    $estadosequ_combo = combobox($estadosequ, array('label'=>'estado','value'=>'id'), array('name'=>'estado_id','class'=>'combobox form-control input-sm'));        
                    echo tagcontent('div', $estadosequ_combo, array('class'=>'col-md-2'));
        
                    $btn_submit = tagcontent('button', 'Guardar Estado', array('id'=>'ajaxformbtn','data-target'=>'new_cambio_estado_out','class'=>'btn btn-primary pull-right',));
                    echo tagcontent('div', $btn_submit, array('class'=>'col-md-5'));
                echo Close('form');
            echo Close('td');
        echo Close('tr');
    echo Close('table');

    echo tagcontent('div', '', array('id'=>'new_cambio_estado_out','class'=>'col-md-12'));
    
    echo lineBreak2(1, array('class'=>'clr'));
    
    echo Open('form', array('method'=>'post','action'=>  base_url('stecnico/equipo/get_hist_estado')));    
        echo input(array('type'=>'hidden','name'=>'equipo_id','value'=>$equipo->id));    
        $btn_submit = tagcontent('button', 'Historial', array('id'=>'ajaxformbtn','data-target'=>'hist_estado_out','class'=>'btn btn-success',));
        echo tagcontent('div', $btn_submit, array('class'=>'col-md-5'));    
    echo Close('form');
    echo tagcontent('div', '', array('id'=>'hist_estado_out','class'=>'col-md-12'));
echo Close('div');
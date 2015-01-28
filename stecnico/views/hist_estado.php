<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if($hist_estado){
    foreach ($hist_estado as $hist) {
        echo lineBreak2(1, array('class'=>'clr'));
        echo Open('table', array('class'=>'table table-striped table-condensed'));
            echo Open('tr', array('class'=>'info'));
                echo tagcontent('td', '<label>Nro.</label> '.$equipo->anio.'-'.$equipo->prefix.str_pad($equipo->id, 11, '0', STR_PAD_LEFT));
                echo tagcontent('td', '<label>F.Ingreso: </label> '.$equipo->fecha.' '.$equipo->hora);
                echo tagcontent('td', '<label>Servicio: </label> '.$equipo->tipo_servicio);
                echo tagcontent('td', 'Marca: '.$equipo->marca);
                echo tagcontent('td', 'Tecnico: '.$equipo->tecnico_nombres.$equipo->tecnico_apellidos);
            echo Close('tr');
            echo Open('tr', array('class'=>'info'));
                echo tagcontent('td', 'Cl.: '.$equipo->client_nombres.' '.$equipo->client_apellidos);
                echo tagcontent('td', 'C.I: '.$equipo->client_id);
                echo tagcontent('td', 'Tlf.: '.$equipo->client_telefonos);
    //            echo tagcontent('td', 'E-mail: '.$equipo->client_email);
                echo tagcontent('td', 'Dir: '.$equipo->client_direccion, array('colspan'=>'2'));
            echo Close('tr');
            echo Open('tr');
                echo Open('td',array('colspan'=>'5','style'=>'background: #'.$hist->estado_color));
                    echo Open('form', array('method'=>'post','action'=>  base_url('stecnico/equipo/notificar_estado')));
                        echo input(array('type'=>'hidden','name'=>'equipo_id','value'=>$equipo->id));

                        //echo tagcontent('textarea', '', array('name'=>'detalle','class'=>'form-control','placeholder'=>'Detalle del Estado','rows'=>'5'));
                        echo $hist->detalle;
                        echo lineBreak2(1, array('class'=>'clr'));

                        $input = input(array('name'=>'email','value'=>$hist->email,'class'=>'form-control'));
                        echo tagcontent('div', $input, array('class'=>'col-md-3'));

                        $input = input(array('name'=>'celular','value'=>$hist->celular,'class'=>'form-control'));
                        echo tagcontent('div', $input, array('class'=>'col-md-2'));

//                        $estadosequ_combo = combobox($estadosequ, array('label'=>'estado','value'=>'id'), array('name'=>'estado_id','class'=>'combobox form-control input-sm'));        
                        echo tagcontent('div', $hist->estado_equ.', en '.$hist->fecha.' '.$hist->hora , array('class'=>'col-md-2'));

                        $btn_submit = tagcontent('button', '<span class="glyphicon glyphicon-envelope"></span> Notificar', array('id'=>'ajaxformbtn','data-target'=>'new_cambio_estado_out','class'=>'btn btn-info pull-right',));
                        echo tagcontent('div', $btn_submit, array('class'=>'col-md-5'));
                    echo Close('form');
                echo Close('td');
            echo Close('tr');
        echo Close('table');        
    } 
}else{
    echo tagcontent('strong', 'El equipo a&uacute;n no ha sido revisado ..', array('class'=>'text-warning','style'=>'font-size:20px'));
}

    
//print_r($hist_estado);
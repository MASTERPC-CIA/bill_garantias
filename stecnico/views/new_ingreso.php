<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo Open('form', array('method'=>'post','action'=>  base_url('stecnico/index/find_client_by_ci')));
    $client_by_ci_btn = tagcontent('span', tagcontent('button', 'Cliente <span class="glyphicon glyphicon-ok"></span>', array('class'=>'btn btn-default','type'=>'submit','data-target'=>'client_by_id_out','id'=>'ajaxformbtn')), array('class'=>'input-group-btn'));
    $client_by_ci_btn .= tagcontent('span', tagcontent('button', '<span class="glyphicon glyphicon-search"></span>', array('class'=>'btn btn-default','type'=>'button','data-url'=>base_url('stecnico/index/search_client_view'),'id'=>'ajaxpanelbtn','data-target'=>'container-fluid')), array('class'=>'input-group-btn'));
    $client_by_ci = tagcontent('div', input(array('type'=>'text','name'=>'ci','placeholder'=>'C.I. Cliente','required'=>'','class'=>'form-control','style'=>'')).$client_by_ci_btn, array('class'=>'input-group'));
    echo tagcontent('div', $client_by_ci, array('class'=>'col-md-3'));
echo Close('form'); //cierra form de buscar proveedor

echo tagcontent('div', '', array('id'=>'client_by_id_out','class'=>'col-md-12'));

echo lineBreak2(1, array('class'=>'clr'));
/******************************************************************************/
    echo Open('form', array('method'=>'post','action'=>  base_url('stecnico/equipo/save_equipo')));
        echo input(array('type'=>'hidden','name'=>'cliente_id','id'=>'cliente_id'));
        
        $infoequ =  tagcontent('div', '', array('id'=>'clientserviciooutput'));
        $infoequ .=  tagcontent('div', 'Estado del Equipo'. input(array('name'=>'caracteristicas','class'=>'form-control')), array('class'=>'col-md-12'));
        $infoequ .=  tagcontent('div', 'Problema'. input(array('name'=>'problema','class'=>'form-control','required'=>'')), array('class'=>'col-md-12'));
        $infoequ .=  tagcontent('div', 'Presupuesto'. input(array('name'=>'presupuesto','value'=>'0.00','class'=>'form-control input-sm positive')), array('class'=>'col-md-3'));
        $infoequ .=  tagcontent('div', 'Anticipo'. input(array('name'=>'anticipocliente','value'=>'0.00','class'=>'form-control input-sm positive')), array('class'=>'col-md-3'));
        $infoequ .=  tagcontent('div', 'F. Entrega'. input(array('name'=>'fechaentrega','required'=>'','placeholder'=>date('Y-m-d',time()),'class'=>'form-control input-sm datepicker')), array('class'=>'col-md-3'));
        $infoequ .=  tagcontent('div', 'H. Entrega'. input(array('name'=>'horaentrega','required'=>'','placeholder'=>date('H:i',time()),'data-mask'=>'00:00','class'=>'form-control input-sm ')), array('class'=>'col-md-3'));

        $tiposservicioprint = '';    
            foreach ($tiposservicio as $val) { 
//                $tiposservicioprint .=  tagcontent('option', $val->tipo, array('value'=>$val->id.','.$val->prefix));
                $tiposservicioprint .=  tagcontent('option', $val->tipo, array('value'=>$val->id));
            }

        $infoequ .=  input(array('type'=>'hidden','name'=>'tecnico_name','id'=>'tecnico_name','value'=>$tecnicos[0]->empleado));

        $tecnicos_combo = combobox($tecnicos, array('label'=>'empleado','value'=>'empl_id'), array('class'=>'combobox form-control input-sm','name'=>'tecnicoencargado','id'=>'tecnicoencargado'));
        $infoequ .=  tagcontent('div', 'Tecnico'. $tecnicos_combo, array('class'=>'col-md-4'));

        $infoequ .=  tagcontent('div', 'Tipo Serv.'. tagcontent('select', $tiposservicioprint, array('class'=>'combobox form-control input-sm','name'=>'tiposervicio','id'=>'tiposervicio')), array('class'=>'col-md-4'));

        $estadosequ_combo = combobox($estadosequ, array('label'=>'estado','value'=>'id'), array('name'=>'estado_id','class'=>'combobox form-control input-sm'));        
        $infoequ .=  tagcontent('div', 'Estado.'. $estadosequ_combo, array('class'=>'col-md-4'));
        
        $marcas_combo = combobox($marcas, array('label'=>'nombre','value'=>'id'), array('name'=>'marca_id','class'=>'combobox form-control input-sm'));
        $infoequ .= tagcontent('div', 'Marca: '. $marcas_combo, array('class'=>'col-md-4'));                
        
        $infoequ .=  tagcontent('div', 'Deja Equipo'. input(array('type'=>'checkbox','name'=>'equipoenbodega','value'=>'1','checked'=>'checked','class'=>'form-control input-sm positive')), array('class'=>'col-md-3'));
        $attrequ = '';               
        if($eqattrlist){
            $attrequ .=  Open('table', array('class'=>'table table-condensed'));
                foreach ($eqattrlist as $val) {
                    if($val->deleted == 0){
                        $td = '';
                            $td .=  tagcontent('td', $val->nombreattr, null);
                            $td .=  tagcontent('td',  input(array('name'=>'equipoattr[]','id'=>$val->inputid,'class'=>'form-control input-sm')). input(array('type'=>'hidden','name'=>'equipoattrid[]','value'=>$val->id)). input(array('type'=>'hidden','name'=>'equipoattrname[]','value'=>$val->nombreattr)), null);
                            $attrequ .=  tagcontent('tr', $td, null);                                        
                    }
                }
            $attrequ .=  closeTag('table');
        }else{
            $attrequ .=  tagcontent('div', 'No se han encontrado elementos para listar', array('class'=>'alert alert-warning','data-missing'=>'alert'));    
        }

        echo tagcontent('div', $attrequ, array('class'=>'col-md-4'));
        echo tagcontent('div', $infoequ, array('class'=>'col-md-8'));
        echo lineBreak(1, array('class'=>'clr'));
        echo input(array('type'=>'submit','id'=>'ajaxformbtn','data-target'=>'newserviciooutput','value'=>'Ingresar Orden de Trabajo','class'=>'btn btn-primary pull-right'));                    
        
    echo Close('form');   

    echo  tagcontent('div', '', array('id'=>'newserviciooutput','style'=>''));
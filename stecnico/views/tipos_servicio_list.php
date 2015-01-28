<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    if($tipos_servicio){
        $thead = array('Tipo Servicio');
        $table =  tablethead($thead);
        foreach ($res as $val) {
//            $td =  tagcontent('td', $val->tipo);
//            $td .=  tagcontent('td', $val->prefix);
//            $table .=  tagcontent('tr', $td, array('class'=>''));
            
            $editts =  input(array('type'=>'hidden','value'=>'edit', 'name'=>'action'));
            $editts .=  input(array('type'=>'hidden','value'=>$val->id, 'name'=>'id'));
            $editts .= 'Tipo S.:'. input(array('name'=>'tipo','value'=>$val->tipo,'required'=>'','style'=>'width:150px'));
            $editts .= 'Prefijo:'. input(array('name'=>'prefix','value'=>$val->prefix,'style'=>'width:60px'));
            $editts .=  input(array('type'=>'submit','value'=>'Edit','id'=>'ajaxformbtn','data-target'=>'edittsout','class'=>'btn btn-sm btn-primary'));
            $feditts =  tagcontent('form', $editts, array('method'=>'post','action'=>  base_url().'/modules/stecnico/controller/tiposervicio1.php'));
            $td =  tagcontent('td', $feditts);
            $table .=  tagcontent('tr', $td, null);            
            
        }
        echo  tagcontent('table', $table, array('class'=>'table','id'=>'table-tiposervlist'));
        echo  tagcontent('div', '', array('id'=>'edittsout'));
             
    }
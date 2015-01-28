<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    if($estados_eq){
        $thead = array('Estados Equipo');
        $table = tablethead($thead);
        foreach ($estados_eq as $val) {           
            $editts = input(array('type'=>'hidden','value'=>'edit', 'name'=>'action'));
            $editts .= input(array('type'=>'hidden','value'=>$val->id, 'name'=>'id'));
            $editts .= input(array('name'=>'estado','value'=>$val->estado,'required'=>'','style'=>'width:150px'));
            $editts .= 'Orden:'.  input(array('name'=>'orden','value'=>$val->orden,'style'=>'width:60px'));
            $editts .= tagcontent('div', input(array('name'=>'color','value'=>$val->color,'style'=>'','class'=>'pick-a-color2 form-control')), array('style'=>'width:120px;float:left'));
            $editts .= input(array('type'=>'submit','value'=>'Edit','id'=>'ajaxformbtn','data-target'=>'edittsout','class'=>'btn btn-sm btn-primary'));
            $feditts = tagcontent('form', $editts, array('method'=>'post','action'=>  base_url('stecnico/config/edit_stequestado')));
            $td = tagcontent('td', $feditts);
            $table .= tagcontent('tr', $td, null);            
            
        }
        echo tagcontent('table', $table, array('class'=>'table','id'=>'table-estadosequ'));
        echo tagcontent('div', '', array('id'=>'edittsout'));
//        echo tagcontent('script', "$('#table-estadosequ').dataTable(opttable250)");                
        echo tagcontent('script', "$('.pick-a-color2').pickAColor();");                
    }
    
    $jsarray = array(
        base_url().'/js/libs/datatables-1.9.4/media/js/jquery.dataTables.js',
    );
    echo jsload($jsarray); 
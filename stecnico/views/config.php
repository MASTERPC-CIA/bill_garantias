<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo  Open('div', array('class'=>'container-fluid'));
//    $tabsarray = array( 
//        'attrequipo'=>'Atributos de Equipo', 
//        'tiposerv'=>'Tipo de Servicios', 
//        'estadosequ'=>'Estados de Equipo'  
//    );
//    
    $tabsarray = array(
        'attrequipo'=>array('label'=>'Atributos de Equipo','class'=>'active'),
        'tiposerv'=>array('label'=>'Tipo de Servicios'),        
        'estadosequ'=>array('label'=>'Estados de Equipo')
    );    
    
    echo  tabs($tabsarray, array('class'=>'nav nav-tabs'));
    
    echo  Open('div',array('class'=>'tab-content')). LineBreak(1, array('class'=>'clr'));
    
        echo  Open('div', array('id'=>'attrequipo','class'=>'tab-pane active'));
            /*listar attributos cargados para el equipo*/
            $attrlistfields = array(
                '1'=>array('type'=>'submit','id'=>'ajaxformbtn','data-target'=>'attrlistoutput','class'=>'btn btn-primary','value'=>'Ver atributos de equipo')
            );
            
            $listattreq =  input(array('type'=>'submit','id'=>'ajaxformbtn','data-target'=>'attrlistoutput','class'=>'btn btn-primary','value'=>'Ver atributos de equipo'));
            $listattreq .=  input(array('type'=>'hidden','name'=>'action','value'=>'list'));
                    
            $attrlistform =  tagcontent('form', $listattreq, array('method'=>'post','action'=>  base_url('stecnico/config/get_crud_equipoattr')));
            
            $attrlistform .=  LineBreak(1, array('class'=>'clr')). tagcontent('div', '', array('id'=>'attrlistoutput'));
            echo  tagcontent('div', $attrlistform, array('class'=>'col-md-12'));        
        echo  closeTag('div'); /* cierre de pestania attrequipo */
        
        echo  Open('div', array('id'=>'tiposerv','class'=>'tab-pane'));
           
            $listtiposerv =  input(array('type'=>'hidden','name'=>'action','value'=>'list'));
            $listtiposerv .=  input(array('type'=>'submit','id'=>'ajaxformbtn','data-target'=>'listtiposervout','value'=>'Listar Tipos de Servicio','class'=>'btn btn-primary'));
            $listtiposerv .=  tagcontent('div', '', array('id'=>'listtiposervout'));            
            $flisttiposerv =  tagcontent('form', $listtiposerv, array('method'=>'post','action'=>  base_url('stecnico/config/get_crud_tipos_servicio') ));
            
            echo  tagcontent('div', $flisttiposerv, array('class'=>'col-md-12'));
        echo  closeTag('div'); /* cierra pestania tiposerv */        
        

//            $newestadoequ =   tagcontent('div',  tagcontent('label', 'Estado:', array('class'=>'col-md-4')). tagcontent('div',  input(array('name'=>'estado','required'=>'','class'=>'form-control')), array('class'=>'col-md-8')), array('class'=>'form-group'));
//            $newestadoequ .=  tagcontent('div',  tagcontent('label', 'Orden:', array('class'=>'col-md-4')). tagcontent('div',  input(array('name'=>'orden','class'=>'form-control')), array('class'=>'col-md-8')), array('class'=>'form-group'));
//            $newestadoequ .=  tagcontent('div',  tagcontent('label', 'Color:', array('class'=>'col-md-4')). tagcontent('div',  input(array('name'=>'color','value'=>'fff','class'=>'pick-a-color form-control')), array('class'=>'col-md-8')), array('class'=>'form-group'));
//            $newestadoequ .=  input(array('type'=>'hidden','name'=>'action','value'=>'add'));
//            $newestadoequ .=  input(array('type'=>'submit','id'=>'ajaxformbtn','data-target'=>'newequestadoout','value'=>'Crear Nuevo Estado','class'=>'btn btn-primary pull-right'));
//            $newestadoequ .=  tagcontent('div', '', array('id'=>'newequestadoout'));
//            $fnewestadoequ =  tagcontent('form', $newestadoequ, array('method'=>'post','action'=>  base_url('stecnico/config/save_stequestado'),'class'=>'form-horizontal'));
//            $newestadoequview =  tagcontent('div', $fnewestadoequ, array('class'=>'col-md-6'));
            
            
//            echo tagcontent('label', 'Color:', array('class'=>'col-md-4')). tagcontent('div',  input(array('name'=>'color','value'=>'fff','class'=>'pick-a-color form-control')), array('class'=>'col-md-8')), array('class'=>'form-group');

//            $flisestadoequ =  tagcontent('form', $lisestadoequ, array('method'=>'post','action'=>base_url('stecnico/config/get_crud_equestado')));
//            $lisestadoequview =  tagcontent('div', $flisestadoequ. tagcontent('div', '', array('id'=>'estadoseqlistout')), array('class'=>'col-md-12'));
                    
            echo Open('div', array('id'=>'estadosequ','class'=>'tab-pane'));            
                echo Open('form', array('method'=>'post','action'=>base_url('stecnico/config/get_crud_equestado'),'class'=>'col-md-4'));
                    echo input(array('type'=>'submit','id'=>'ajaxformbtn','data-target'=>'estadoseqlistout','class'=>'btn btn-primary','value'=>'Listar Estados'));
                    echo input(array('type'=>'hidden','name'=>'action','value'=>'list'));                    
                echo Close('form');    
//                echo tagcontent('label', 'Color:', array('class'=>'col-md-4')). tagcontent('div',  input(array('name'=>'color','value'=>'fff','class'=>'pick-a-color form-control')), array('class'=>'col-md-8')), array('class'=>'form-group');                
                echo tagcontent('div',  input(array('name'=>'color','value'=>'fff','class'=>'pick-a-color form-control')), array('class'=>'col-md-3'));
                echo tagcontent('div', '', array('id'=>'estadoseqlistout','class'=>'col-md-12'));            
//                echo  tagcontent('div', $lisestadoequview, array('id'=>'estadosequ','class'=>'tab-pane'));
            echo Close('div');
//        estadosequ
        
    echo  closeTag('div'); /* cierra tab-content */
    
echo  closeTag('div'); /* cierre de container-fluid */
echo tagcontent('script', "$('.pick-a-color').pickAColor();");    
echo tagcontent('script', "$('.pick-a-color2').pickAColor();");    

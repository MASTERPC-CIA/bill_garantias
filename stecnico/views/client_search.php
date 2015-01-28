<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo Open('form', array('method'=>'post','action'=>  base_url('stecnico/index/get_crud_clients')));
    $client_by_ci_btn = tagcontent('span', tagcontent('button', 'Cliente <span class="glyphicon glyphicon-ok"></span>', array('class'=>'btn btn-default','type'=>'submit','data-target'=>'clients_list_out','id'=>'ajaxformbtn')), array('class'=>'input-group-btn'));
//    $client_by_ci_btn .= tagcontent('span', tagcontent('button', '<span class="glyphicon glyphicon-search"></span>', array('class'=>'btn btn-default','type'=>'submit','data-url'=>base_url('stecnico/index/search_client_view'),'id'=>'ajaxpanelbtn','data-target'=>'container-fluid')), array('class'=>'input-group-btn'));
    $client_by_ci = tagcontent('div', input(array('type'=>'text','name'=>'search_text','placeholder'=>'Cliente','required'=>'','class'=>'form-control','style'=>'')).$client_by_ci_btn, array('class'=>'input-group'));
    echo tagcontent('div', $client_by_ci, array('class'=>'col-md-3'));
echo Close('form'); //cierra form de buscar proveedor

echo tagcontent('div', '', array('id'=>'clients_list_out','class'=>'col-md-12'));
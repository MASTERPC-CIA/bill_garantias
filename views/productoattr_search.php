<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo Open('form', array('method'=>'post','action'=>  base_url('garantias/productoattr/get_crud')));
    $prod_attr_combo = combobox($prod_attr, array('label'=>'attr','value'=>'id'), array('name'=>'prodattr_id','class'=>'form-control'));
    echo tagcontent('div', $prod_attr_combo, array('class'=>'col-md-2'));

    $tipo_transaccion_combo = combobox($tipo_transaccion, array('label'=>'nombre','value'=>'cod'), array('name'=>'tipotransaccion_cod','class'=>'form-control'),true);
    echo Open('div',array('class'=>'col-md-3'));
        echo Open('div', array('class'=>'input-group'));
            echo tagcontent('span', 'Trans.', array('class'=>'input-group-addon'));
            echo $tipo_transaccion_combo;
        echo Close('div');
    echo Close('div');    
    
    $input = input(array('name'=>'valor_attr','class'=>'form-control','placeholder'=>'VALOR ATRIBUTO'));
    echo tagcontent('div', $input, array('class'=>'col-md-2'));
    
    echo tagcontent('button', 'Buscar', array('id'=>'ajaxformbtn','data-target'=>'productoattr_out','class'=>'btn btn-primary'));
echo Close('form');

echo tagcontent('div', '', array('id'=>'productoattr_out','class'=>'col-md-12'));
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//print_r($cliente);

echo Open('div', array('class'=>'col-md-12'));
    if($cliente){
        echo tagcontent('script', '$("#cliente_id").val("'.$cliente->PersonaComercio_cedulaRuc.'")');
        
        echo tagcontent('div', 'RUC/CI. '.$cliente->PersonaComercio_cedulaRuc, array('class'=>'col-md-3'));
        echo tagcontent('div', $cliente->apellidos.' '.$cliente->nombres, array('class'=>'col-md-5'));
        echo tagcontent('div', 'Tlf. '.$cliente->telefonos, array('class'=>'col-md-2'));
        echo tagcontent('div', $cliente->email, array('class'=>'col-md-2'));
    }else{
    echo Open('form', array('class'=>'form-horizontal','method'=>'post','action'=>  base_url('ventas/index/create_client'),'style'=>'color:#3a8104'));
    ?>
    <label class="col-md-1">Pasaporte:</label>
    <div class="col-md-2">
        <label class="radio-inline">
          <input type="radio" name="es_pasaporte" id="es_pasaporte" value="1"> SI
        </label>
        <label class="radio-inline">
            <input type="radio" name="es_pasaporte" id="es_pasaporte" value="0" checked="true"> NO
        </label>
    </div>
    <?php
    echo lineBreak2(1, array('class'=>'clr'));
            $label = tagcontent('label', 'CI/RUC*', array('class'=>'col-md-3'));
            $input = tagcontent('div', input(array('name'=>'PersonaComercio_cedulaRuc','class'=>'form-control','required'=>'','value'=>$ci)), array('class'=>'col-md-9'));
            echo tagcontent('div', $label.$input, array('class'=>'form-group col-md-4'));

            $label = tagcontent('label', 'Nombres*', array('class'=>'col-md-3'));
            $input = tagcontent('div', input(array('name'=>'nombres','id'=>'nombres_client','class'=>'form-control','required'=>'','placeholder'=>'Ingrese el Nombre del Cliente')), array('class'=>'col-md-9'));
            echo tagcontent('div', $label.$input, array('class'=>'form-group col-md-4'));

            $label = tagcontent('label', 'Apellidos*', array('class'=>'col-md-3'));
            $input = tagcontent('div', input(array('name'=>'apellidos','class'=>'form-control','required'=>'','placeholder'=>'Ingrese el Apellido del Cliente')), array('class'=>'col-md-9'));
            echo tagcontent('div', $label.$input, array('class'=>'form-group col-md-4'));

            $label = tagcontent('label', 'Direccion', array('class'=>'col-md-3'));
            $input = tagcontent('div', input(array('name'=>'direccion','value'=>'Loja','class'=>'form-control')), array('class'=>'col-md-9'));
            echo tagcontent('div', $label.$input, array('class'=>'form-group col-md-4'));

            $label = tagcontent('label', 'Telefonos', array('class'=>'col-md-3'));
            $input = tagcontent('div', input(array('name'=>'telefonos','class'=>'form-control')), array('class'=>'col-md-9'));
            echo tagcontent('div', $label.$input, array('class'=>'form-group col-md-4'));

            $label = tagcontent('label', 'E-mail', array('class'=>'col-md-3'));
            $input = tagcontent('div', input(array('name'=>'email','class'=>'form-control')), array('class'=>'col-md-9'));
            echo tagcontent('div', $label.$input, array('class'=>'form-group col-md-4'));

            echo '<div class="col-md-12">'.tagcontent('button', '<span class="glyphicon glyphicon-plus"></span> Crear Cliente', array('class'=>'btn btn-success','id'=>'ajaxformbtn','data-target'=>'cotizacionescart')).'</div>';
        echo Close('form');
        echo tagcontent('script', '$("#nombres_client").focus()');
    }
echo Close('div');    

  


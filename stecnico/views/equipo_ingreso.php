<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//print_r($equipo);
//echo '<br/>';
//print_r($equipoattrequipo);
echo tagcontent('button', '<span class="glyphicon glyphicon-print"></span> Imprimir', array('id'=>'printbtn','data-target'=>'equipo_ingreso_print','class'=>'btn btn-default'));
echo lineBreak2(1, array('class'=>'clr'));
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
            echo tagcontent('td', 'E-mail: '.$equipo->client_email);
            echo tagcontent('td', 'Dir: '.$equipo->client_direccion);
        echo Close('tr');
        echo Open('tr');
            echo tagcontent('td', '<strong>Problema: </strong>'.$equipo->problema,array('colspan'=>'5'));
        echo Close('tr');
        echo Open('tr');
            echo tagcontent('td', '<strong>Caracteristicas: </strong>'.$equipo->caracteristicas,array('colspan'=>'5'));
        echo Close('tr');
    echo Close('table');
    if($equipoattrequipo){
        foreach ($equipoattrequipo as $val) {
            echo tagcontent('div', $val->nombreattr.': '.$val->valor, array('class'=>'col-md-3'));
        }
    }
    
    echo Open('table', array('class'=>'table table-striped table-condensed'));
        echo Open('tr');
            echo tagcontent('td', '&nbsp;');
            echo tagcontent('td', '&nbsp;');
        echo Close('tr');
        echo Open('tr');
            echo tagcontent('td', 'Usuario: '.$this->user->nombres.' '.$this->user->apellidos);
            echo tagcontent('td', 'Cliente: '.$equipo->client_nombres.' '.$equipo->client_apellidos);
        echo Close('tr');
        echo Open('tr');
            echo tagcontent('td', '<strong>Condiciones: </strong>El cliente tiene la obligación de realizar sus propios respaldos, Master PC no se responsabiliza. Pasados 90 días Master PC no se responsabiliza del estado de equipos, en impresoras hasta 8 días, y se cobrará su permanencia en bodega. La garantía de 15 días no cubre problemas causados por programas que el cliente instale o virus. Para retirar traer el ticket de ingreso. Para toda Garantía se necesita facturas, CDs, manual, cajas, no se recibe roto, quebrado o con líquido. Este documento es el único comprobante válido para el retiro de su equipo, su reposición tendá un costo de 5 dolares. GRACIAS POR SU COLABORACIÓN. MASTER PC NO ES REPONSABLE POR EL SOFTWARE PREINSTALADO DEL CLIENTE SIN LICENCICAS ORIGINALES. Por medio de mi firma en este documento autorizo para que master pc done este equipo si no es retirado en 90 dias ',array('colspan'=>'2','style'=>'font-size:10px'));
        echo Close('tr');
    echo Close('table');    
echo Close('div');


echo tagcontent('script', '$("#equipo_ingreso_print").printThis({optprint1})');

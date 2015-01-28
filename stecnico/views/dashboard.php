<?php
$css = array(
    base_url('resources/bootstrap-3.2.0/css/bootstrap.min.css'),
    base_url('resources/bootstrap-3.2.0/css/bootstrap-theme.css'),
    base_url('resources/bootstrap-3.2.0/css/dashboard.css'),
    base_url('resources/js/libs/combobox/css/bootstrap-combobox.css'),
    base_url('resources/js/libs/pick-a-color/build/1.2.3/css/pick-a-color-1.2.3.min.css'),
    base_url('assets/grocery_crud/css/ui/simple/jquery-ui-1.10.1.custom.min.css'),   
    base_url('assets/grocery_crud/themes/datatables/css/demo_table_jui.css'),
    base_url('assets/grocery_crud/themes/datatables/css/datatables.css'),
    base_url('assets/grocery_crud/themes/datatables/css/jquery.dataTables.css'),
    base_url('assets/grocery_crud/themes/datatables/extras/TableTools/media/css/TableTools.css'),
    base_url('resources/css/datepicker.css'),
    base_url('resources/js/libs/sco.js/css/scojs.css'),
    base_url('resources/js/libs/sco.js/css/sco.message.css'),
    base_url('resources/js/libs/jsPanel-bootstrap/source/jsPanel.css'),
    base_url('resources/js/libs/autosuggest/css/style.css'),
    base_url('resources/css/style.css'),    
);
echo csslink($css);

$js = array(
    base_url('assets/grocery_crud/js/jquery-1.10.2.min.js'),
    base_url('assets/grocery_crud/js/jquery_plugins/jquery.noty.js'),
    base_url('assets/grocery_crud/js/jquery_plugins/config/jquery.noty.config.js'),
    base_url('assets/grocery_crud/js/common/lazyload-min.js'),
    base_url('assets/grocery_crud/js/common/list.js'),
    base_url('assets/grocery_crud/themes/datatables/js/jquery.dataTables.min.js'),
    base_url('assets/grocery_crud/themes/datatables/js/datatables-extras.js'),
    base_url('assets/grocery_crud/themes/datatables/extras/TableTools/media/js/ZeroClipboard.js'),
    base_url('assets/grocery_crud/themes/datatables/extras/TableTools/media/js/TableTools.min.js'),
    base_url('assets/grocery_crud/js/jquery_plugins/ui/jquery-ui-1.10.3.custom.min.js'),
    
    base_url('resources/bootstrap-3.2.0/js/bootstrap.min.js'),
    base_url('resources/js/comunes/printThis.js'),
    base_url('resources/js/libs/sco.js/js/sco.message.js'),
    base_url('resources/js/libs/jform/jquery.form.js'),
    base_url('resources/js/bootstrap-datepicker.js'),
    base_url('resources/js/bootstrap-datepicker.es.js'),
    base_url('resources/js/libs/autosuggest/bootstrap-typeahead.js'),
    base_url('resources/js/libs/autosuggest/hogan-2.0.0.js'),
    base_url('resources/js/libs/jsPanel/source/AC_RunActiveContent.js'),
    base_url('resources/js/libs/jsPanel-bootstrap/source/jquery.jspanel.bs-1.4.0.min.js'),
    base_url('resources/js/libs/numeric/jquery.numeric.js'),
    base_url('resources/js/libs/pick-a-color/build/1.2.3/js/pick-a-color-1.2.3.min.js'),
    base_url('resources/js/libs/pick-a-color/build/dependencies/tinycolor-0.9.15.min.js'),
    base_url('resources/js/libs/combobox/js/bootstrap-combobox.js'),
    base_url('resources/js/modules/comunes.js'),
);
echo jsload($js);

$this->load->view('templates/header.php');

echo Open('div', array('class'=>'row'));
    $this->load->view('templates/slidebar.php');
    
    echo Open('div', array('class'=>'col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main','id'=>'container-fluid'));
        echo $view;
    echo Close('div'); //cierra div .col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main    
echo Close('div'); //cierra div .row

?>
<script>        
     var main_path = "<?= base_url()?>";
     var optprint1 = { debug: false, importCSS: true, printContainer: true, loadCSS: main_path+"/css/allstyles.css", removeInline: false };     
    $(function() {
        $.load_datepicker();
        printelem();
        $.loadAjaxPanel();
        loadFormAjax();   
        
        $(document).on("mousedown", "input.number", function(e) {
            $(".number").numeric();
        });
        $(document).on("mousedown", "input.integer", function(e) {
            $(".integer").numeric(false, function() {this.value = "1";this.focus();});
        });
        $(document).on("mousedown", "input.positive", function(e) {
            $(".positive").numeric({negative: false}, function() {this.value = "";this.focus();});
        });
        $(document).on("mousedown", "input.positive-integer", function(e) {
            $(".positive-integer").numeric({decimal: false, negative: false}, function() {this.value = "";this.focus();});
        });        
    });

</script>
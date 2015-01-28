   <div class="navbar navbar-default navbar-fixed-top" role="navigation">
       <input type="hidden" name="main_path" id="main_path" value="<?php echo base_url() ?>">
      <!--<div class="container-fluid">-->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">ADMIN - BILLINGSOF</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
              <li><a href="<?= base_url()?>">Inicio</a></li>
            <!--<li><a href="#">Settings</a></li>-->
            <li><a href="#">Config</a></li>
            <li><a href="<?= base_url(). 'welcome/logout' ?>">Salir</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      <!--</div>-->
    </div>
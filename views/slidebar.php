
        <div class="navbar-defaults sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <?php
                            echo $this->load->view('login/user_logo','',TRUE);
                        ?>
                    </li>

                    <li>
                        <a class="active" href="<?= base_url('garantias/index')?>"><i class="glyphicon glyphicon-th fa-fw"></i> Busqueda de Series</a>
                    </li>

                </ul>
            </div>
                        <!-- /.sidebar-collapse -->
        </div>
            <!-- /.navbar-static-side -->
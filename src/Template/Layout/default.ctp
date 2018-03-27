<?php
use Cake\ORM\TableRegistry;

$eventos = TableRegistry::get('Eventos');

$eventos = $eventos->find('list',['keyField'=>'id','valueField'=>'nombre']);
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= 'Esteban Vazquez Eventos' ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['../node_modules/bootstrap/dist/css/bootstrap.min','sb-admin','bootstrap-pagination','../node_modules/datatables.net-dt/css/jquery.dataTables']) ?>

    <!-- angular files -->
    <?= $this->Html->script(['jquery.min']) ?>

    <?= $this->Html->script(['../node_modules/angular/angular.min','angular/angular-route.min','../frontend/app']) ?>

    <?= $this->Html->script(['../node_modules/datatables.net/js/jquery.dataTables']); ?>;

    <?= $this->Html->css(['../node_modules/angular-datatables/dist/css/angular-datatables.min',
                          '../node_modules/angular-datatables/dist/plugins/bootstrap/datatables.bootstrap.min',
                          '../node_modules/ng-dialog/css/ngDialog-theme-default.min',
                          '../node_modules/ng-dialog/css/ngDialog.min']); ?>;
    
    <?= $this->Html->css(['../node_modules/semantic-ui-checkbox/checkbox.min']); ?>;
    <?= $this->Html->script(['../node_modules/semantic-ui-checkbox/checkbox.min']); ?>;

    <?= $this->Html->css(['estilos_','../node_modules/font-awesome/css/font-awesome.min']); ?>;

   

    <?= $this->Html->script(['../node_modules/angular-datatables/dist/angular-datatables',
                              '../node_modules/angular-datatables/dist/plugins/bootstrap/angular-datatables.bootstrap',
                              '../node_modules/ng-dialog/js/ngDialog.min']); ?>;

    <!-- controller angular -->
    <?= $this->Html->script(['../frontend/controllers/escuelasCtrl',
                              '../frontend/controllers/eventosCtrl',
                             '../frontend/controllers/alumnosCtrl',
                             '../frontend/controllers/menusCtrl',
                             '../frontend/controllers/entregasCtrl']); ?>



    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body ng-app="gestion-ev" class="sidenav-toggled">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="index.html">Esteban Vazquez Eventos</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse main-layout" id="navbarResponsive">
          <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item"  data-placement="right" >
              <a class="nav-link" href="/rev">
             
                <i class="fa fa-fw fa-dashboard"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item"  data-placement="right" >
              <a class="nav-link" href="#!/escuelas">
                <i class="fa fa-fw fa-building-o"></i>
                <span class="nav-link-text">Escuelas</span>
              </a>
            </li>
            <li class="nav-item"  data-placement="right" >
              <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#!/eventos" data-parent="#exampleAccordion">
                <i class="fa fa-fw fa-wrench"></i>
                <span class="nav-link-text">Eventos</span>
              </a>
              

              <ul class="sidenav-second-level collapse sub-item">
                <?php foreach($eventos as $e_key => $evento):?> 
                  <li>
                    <a href="#!/eventos/list/<?= $e_key ?>"><?= $evento ?></a>
                  </li>
                <?php endforeach;?>
                
              </ul>
            </li>
            
          <!--   <li class="nav-item"  data-placement="right" >
              <a class="nav-link" href="#!/eventos">
                <i class="fa fa-fw fa-table"></i>
                <span class="nav-link-text">Eventos</span>
              </a>
            </li> -->
            
            <li class="nav-item"  data-placement="right" >
              <a class="nav-link" href="#!/alumnos">
                <i class="fa fa-w fa-graduation-cap"></i>
                <span class="nav-link-text">Alumnos</span>
              </a>
            </li>
            
            <li class="nav-item"  data-placement="right" >
              <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
                <i class="fa fa-fw fa-file"></i>
                <span class="nav-link-text">Example Pages</span>
              </a>
              <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                <li>
                  <a href="login.html">Login Page</a>
                </li>
                <li>
                  <a href="register.html">Registration Page</a>
                </li>
                <li>
                  <a href="forgot-password.html">Forgot Password Page</a>
                </li>
                <li>
                  <a href="blank.html">Blank Page</a>
                </li>
              </ul>
            </li>
            <li class="nav-item"  data-placement="right" >
              <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
                <i class="fa fa-fw fa-sitemap"></i>
                <span class="nav-link-text">Menu Levels</span>
              </a>
              <ul class="sidenav-second-level collapse" id="collapseMulti">
                <li>
                  <a href="#">Second Level Item</a>
                </li>
                <li>
                  <a href="#">Second Level Item</a>
                </li>
                <li>
                  <a href="#">Second Level Item</a>
                </li>
                <li>
                  <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>
                  <ul class="sidenav-third-level collapse" id="collapseMulti2">
                    <li>
                      <a href="#">Third Level Item</a>
                    </li>
                    <li>
                      <a href="#">Third Level Item</a>
                    </li>
                    <li>
                      <a href="#">Third Level Item</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="nav-item"  data-placement="right">               
              <a class="nav-link" href="#">
                <i class="fa fa-fw fa-link"></i>
                <span class="nav-link-text">Link</span>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
              <a class="nav-link text-center" id="sidenavToggler">
                <i class="fa fa-fw fa-angle-left"></i>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-fw fa-envelope"></i>
                <span class="d-lg-none">Messages
                  <span class="badge badge-pill badge-primary">12 New</span>
                </span>
                <span class="indicator text-primary d-none d-lg-block">
                  <i class="fa fa-fw fa-circle"></i>
                </span>
              </a>
              <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">Nuevos Mensajes:</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <strong>David Miller</strong>
                  <span class="small float-right text-muted">11:21 AM</span>
                  <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <strong>Jane Smith</strong>
                  <span class="small float-right text-muted">11:21 AM</span>
                  <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <strong>John Doe</strong>
                  <span class="small float-right text-muted">11:21 AM</span>
                  <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item small" href="#">Ver todos messages</a>
              </div>
            </li>
           <!--  <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-fw fa-bell"></i>
                <span class="d-lg-none">Alerts
                  <span class="badge badge-pill badge-warning">6 New</span>
                </span>
                <span class="indicator text-warning d-none d-lg-block">
                  <i class="fa fa-fw fa-circle"></i>
                </span>
              </a>
              <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">New Alerts:</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <span class="text-success">
                    <strong>
                      <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                  </span>
                  <span class="small float-right text-muted">11:21 AM</span>
                  <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <span class="text-danger">
                    <strong>
                      <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
                  </span>
                  <span class="small float-right text-muted">11:21 AM</span>
                  <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <span class="text-success">
                    <strong>
                      <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                  </span>
                  <span class="small float-right text-muted">11:21 AM</span>
                  <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item small" href="#">View all alerts</a>
              </div>
            </li> -->
            <li class="nav-item">
              <form class="form-inline my-2 my-lg-0 mr-lg-2">
                <div class="input-group">
                  <input class="form-control" type="text" placeholder="Buscar">
                  <span class="input-group-append">
                    <button class="btn btn-primary" type="button">
                      <i class="fa fa-search"></i>
                    </button>
                  </span>
                </div>
              </form>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-fw fa-sign-out"></i>Cerrar sesión</a>
            </li>
          </ul>
        </div>
     </nav>
    
    <div class="content-wrapper" style="padding: 55px 20px 55px 20px;">
    <div class="container-fluid">
        <ng-view>    
        </ng-view>    
    </div>
    </div>
    

    <footer>
    </footer>
</body>
<?= $this->Html->script(['bootstrap.bundle.min','sb-admin']) ?>

</html>

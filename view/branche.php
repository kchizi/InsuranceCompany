<?php
require('../app/classLoad.php');
session_start();
if ( isset($_SESSION['userAxaAmazigh']) ) {
    //create Controllers
    $compagnieActionController = new AppController('compagnie');
    $brancheActionController   = new AppController('branche');
    //objects and vars
    $branches   = $brancheActionController->getAll();
    $compagnies = $compagnieActionController->getAll();
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <?php include('../include/head.php') ?>
    </head>
    <body class="fixed-top">
        <div class="header navbar navbar-inverse navbar-fixed-top">
          <?php include("../include/top-menu.php"); ?>
        </div>
        <div class="page-container row-fluid sidebar-closed">
            <?php include("../include/sidebar.php"); ?>
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span12">
                            <ul class="breadcrumb">
                                <li><i class="icon-home"></i><a href="dashboard.php">Accueil</a><i class="icon-angle-right"></i></li>
                                <li><i class="icon-wrench"></i><a href="configuration.php">Paramètrages</a><i class="icon-angle-right"></i></li>
                                <li><i class="icon-list-alt"></i><a>Branches</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <?php if(isset($_SESSION['actionMessage']) and isset($_SESSION['typeMessage'])){ $message = $_SESSION['actionMessage']; $typeMessage = $_SESSION['typeMessage']; ?>
                            <div class="alert alert-<?= $typeMessage ?>"><button class="close" data-dismiss="alert"></button><?= $message ?></div>
                            <?php } unset($_SESSION['actionMessage']); unset($_SESSION['typeMessage']); ?>
                            <!-- addBranche box begin -->
                            <div id="addBranche" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h3>Ajouter Nouvelle Branche</h3>
                                </div>
                                <form class="form-horizontal" action="../app/Dispatcher.php" method="post">
                                    <div class="modal-body">
                                        <div class="control-group">
                                            <label class="control-label">Compagnie</label>
                                            <div class="controls">
                                                <select name="idCompagnie">
                                                    <?php foreach ( $compagnies as $compagnie ) { ?>
                                                    <option value="<?= $compagnie->id() ?>"><?= $compagnie->id()." : ".$compagnie->raisonSociale() ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Branche</label>
                                            <div class="controls">
                                                <input required="required" type="text" name="code" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Designation</label>
                                            <div class="controls">
                                                <input required="required" type="text" name="designation" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">%Taxe</label>
                                            <div class="controls">
                                                <input required="required" type="text" name="tauxTaxe" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">%Commission</label>
                                            <div class="controls">
                                                <input required="required" type="text" name="tauxCommission" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">%TPS</label>
                                            <div class="controls">
                                                <input required="required" type="text" name="tauxTPS" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="control-group">
                                            <div class="controls">
                                                <input type="hidden" name="action" value="add" />
                                                <input type="hidden" name="source" value="branche" />    
                                                <button class="btn" data-dismiss="modal"aria-hidden="true">Non</button>
                                                <button type="submit" class="btn red" aria-hidden="true">Oui</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- addBranche box end -->
                            <div class="portlet box light-grey" id="history">
                                <div class="portlet-title">
                                    <h4>Liste des branches</h4>
                                    <div class="tools">
                                        <a href="javascript:;" class="reload"></a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="clearfix">
                                        <div class="btn-group">
                                            <a class="btn blue pull-right" href="#addBranche" data-toggle="modal">
                                                <i class="icon-plus-sign"></i>&nbsp;Branche
                                            </a>
                                        </div>
                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                            <thead>
                                                <tr>
                                                    <th class="t10 hidden-phone">Actions</th>
                                                    <th class="t5 hidden-phone">Compagnie</th>
                                                    <th class="t5">Branche</th>
                                                    <th class="t50 hidden-phone">Designation</th>
                                                    <th class="t10">%Taxe</th>
                                                    <th class="t10">%Commission</th>
                                                    <th class="t10">%TPS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ( $branches as $branche ) { ?>
                                                <tr>
                                                    <td class="hidden-phone">
                                                        <a href="#deleteBranche<?= $branche->id() ?>" data-toggle="modal" data-id="<?= $branche->id() ?>" class="btn mini red"><i class="icon-remove"></i></a>
                                                        <a href="#updateBranche<?= $branche->id() ?>" data-toggle="modal" data-id="<?= $branche->id() ?>" class="btn mini green"><i class="icon-refresh"></i></a>
                                                    </td>
                                                    <td class="hidden-phone"><?= $branche->idCompagnie() ?></td>
                                                    <td><?= $branche->code() ?></td>
                                                    <td class="hidden-phone"><?= $branche->designation() ?></td>
                                                    <td><?= $branche->tauxTaxe() ?></td>
                                                    <td><?= $branche->tauxCommission() ?></td>
                                                    <td><?= $branche->tauxTPS() ?></td>
                                                </tr> 
                                                <!-- updateBranche box begin -->
                                                <div id="updateBranche<?= $branche->id() ?>" class="modal hide fade in" tabindex="-1" role="dialog" aria-hidden="false" >
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h3>Modifier Info Branche</h3>
                                                    </div>
                                                    <form class="form-inline" action="../app/Dispatcher.php" method="post">
                                                        <div class="modal-body">
                                                            <div class="control-group">
                                                                <label class="control-label">Compagnie</label>
                                                                <div class="controls">
                                                                    <select name="idCompagnie">
                                                                        <option value="<?= $branche->idCompagnie() ?>"><?= $branche->idCompagnie()." : ".$compagnieActionController->getOneById($branche->idCompagnie())->raisonSociale() ?></option>
                                                                        <option disabled="disabled">-------------------------------------------------------------</option>
                                                                        <?php foreach ( $compagnies as $compagnie ) { ?>
                                                                        <option value="<?= $compagnie->id() ?>"><?= $compagnie->id()." : ".$compagnie->raisonSociale() ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Branche</label>
                                                                <div class="controls">
                                                                    <input required="required" type="text" name="code"  value="<?= $branche->code() ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Designation</label>
                                                                <div class="controls">
                                                                    <input required="required" type="text" name="designation"  value="<?= $branche->designation() ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">%Taxe</label>
                                                                <div class="controls">
                                                                    <input type="text" name="tauxTaxe" value="<?= $branche->tauxTaxe() ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">%Commission</label>
                                                                <div class="controls">
                                                                    <input type="text" name="tauxCommission" value="<?= $branche->tauxCommission() ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">%TPS</label>
                                                                <div class="controls">
                                                                    <input type="text" name="tauxTPS" value="<?= $branche->tauxTPS() ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="control-group">
                                                                <div class="controls">
                                                                    <input type="hidden" name="id" value="<?= $branche->id() ?>" />
                                                                    <input type="hidden" name="action" value="update" />
                                                                    <input type="hidden" name="source" value="branche" />    
                                                                    <button class="btn" data-dismiss="modal"aria-hidden="true">Non</button>
                                                                    <button type="submit" class="btn red" aria-hidden="true">Oui</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- updateBranche box end --> 
                                                <!-- deleteBranche box begin -->
                                                <div id="deleteBranche<?= $branche->id() ?>" class="modal modal-big hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h3>Supprimer Branche</h3>
                                                    </div>
                                                    <form class="form-horizontal" action="../app/Dispatcher.php" method="post">
                                                        <div class="modal-body">
                                                            <h4 class="dangerous-action">Êtes-vous sûr de vouloir supprimer cette Branche : <?= $branche->code() ?> ? Cette action est irréversible!</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="control-group">
                                                                <div class="controls">
                                                                    <input type="hidden" name="id" value="<?= $branche->id() ?>" />
                                                                    <input type="hidden" name="action" value="delete" />
                                                                    <input type="hidden" name="source" value="branche" />    
                                                                    <button class="btn" data-dismiss="modal"aria-hidden="true">Non</button>
                                                                    <button type="submit" class="btn red" aria-hidden="true">Oui</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- deleteBranche box end --> 
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('../include/footer.php'); ?>
        <?php include('../include/scripts.php'); ?>     
        <script>jQuery(document).ready( function(){ App.setPage("table_managed"); App.init(); } );</script>
    </body>
</html>
<?php
}
else{
    header('Location:../index.php');    
}
?>

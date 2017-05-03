<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/font-awesome.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/default.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/profil_index.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/view.css') ?>">
	<link rel="icon" type="img/png" href="<?= $this->assetUrl('img/fav.png') ?>" />
	<link rel="stylesheet" href="<?= $this->assetUrl('css/frontp.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/nav.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/main.css') ?>">


</head>
<body>
	<?php if ($w_current_route != 'default_home'): ?>
		<header>
			<div class="parent2">
				<?php if($w_user) : ?>
				<?php if($w_user['role'] === 'user') : ?>
				<div class="test1" ><a href="<?php echo $this->url('default_profile'); ?>"><i class="fa fa-user fa-2x"></i></a></div>
				<?php elseif($w_user['role'] === 'admin'): ?>
					<div class="test1"><a href="<?php echo $this->url('default_profile_admin'); ?>"><i class="fa fa-user-secret fa-2x"></i></a></div>
				<?php  endif; ?>
				<?php  else: ?>
				<div class="test1" ><i class="fa fa-user-plus fa-2x" data-toggle="modal" data-target="#myModal"></i></div>
				<?php  endif; ?>
				<div class="test2"><a href="<?php echo $this->url('event_index'); ?>"><i class="fa fa-motorcycle fa-2x" ></i></a></div>
				<div class="test3"><a href="<?php echo $this->url('event_view'); ?>"><i class="fa fa-road fa-2x"></i></a></div>
				<div class="test4"><a href="<?php echo $this->url('default_contact'); ?>"><i class="fa fa-envelope-o fa-2x"></i></a></div>
				<div class="mask2"><i class="fa fa-home fa-3x"></i></div>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Se connecter</h4>
					</div>
						<div class="modal-body">
							<ul>
								<form class="" method="post">
									<div class="row">
										<div class="col-lg-4">
											<div class="form-group">
												<input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur">
											</div><!-- /input-group -->
										</div><!-- /.col-lg-6 -->
										<div class="col-lg-4">
											<div class="form-group">
												<input type="password" class="form-control" name="password" placeholder="Mot de passe">
											</div><!-- /input-group -->
										</div><!-- /.col-lg-6 -->
										<div class="col-lg-4">
											<div class="input-group">
												<button class="btn" type="submit" name="button-login">Se connecter</button>
											</div><!-- /input-group -->
										</div><!-- /.col-lg-6 -->
									</div><!-- /.row -->
								</form>
								<li><a href="<?php echo $this->url('security_register'); ?>">Pas encore de compte ?</a></li>
								<li><a href="<?php echo $this->url('security_forget'); ?>">Mot de passe oublié</a></li>
							</ul>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
		</header>

	<?php endif; ?>

		<section>
			<?= $this->section('main_content') ?>
		</section>
			<?php if ($w_current_route != 'default_home'): ?>
				<footer id="footer" class="clearfix">

         <div class="container">
         <div id="footer-wrapper">
           <div class="row">
             <div class="col-sm-6 col-md-2">
               <div id="meta-3" class="widget widgetFooter widget_meta">
               <h4 class="widgettitle">l'Essentiels :</h4>
               <ul>
 			    		  <li><a href="#"><i class="fa fa-home fa-fw"></i> Accueil</a></li>
 							  <li><a href="#"><i class="fa fa-link"></i> Evenement</a></li>
 							  <li><a href="#"><i class="fa fa-envelope fa-fw"></i> Contact </a></li>
              </ul>
 					 	</div>
 				 	</div>
           <div class="col-sm-6 col-md-2">
               		<div id="recent-posts-3" class="widget widgetFooter widget_recent_entries">
                     <h4 class="widgettitle">Aussi sur  :</h4>
                     <ul>
 											<li><a href="#" target="_blank"><i class="fa fa-facebook"></i> Facebook</a></li>
 											<li><a href="#" target="_blank"><i class="fa fa-twitter"></i> Twitter</a></li>
 											<li><a href="#" target="_blank"><i class="fa fa-youtube"></i> Youtube</a></li>
 										</ul>
 									</div>
 				</div>
       </div>
     </div> <!--  #footer -->
       <div id="sub-floor">
         <div class="container">
           <div class="row">
             <div class="col-md-4 copyright">
              Copy right LaBonneSortie © 2017
             </div>
             <div class="col-md-4 col-md-offset-4 attribution">
              Developer by  <a target="_blank" href="#">LaBonneSortieteam</a> .
             </div>
           </div> <!-- end .row -->
         </div>
				 <?php endif; ?>
			<script src="<?= $this->assetUrl('js/jquery-3.2.1.min.js') ?>" charset="utf-8"></script>
			<script src="<?= $this->assetUrl('js/bootstrap.min.js') ?>" charset="utf-8"></script>
			<script src="<?= $this->assetUrl('js/nav.js') ?>" charset="utf-8"></script>
			<script src="<?= $this->assetUrl('js/script.js') ?>" charset="utf-8"></script>
			<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDw-gYmqJqQ-8RYU_8LZoTNFyQ51_yWYCY&callback=initMap" type="text/javascript"></script>
			<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDw-gYmqJqQ-8RYU_8LZoTNFyQ51_yWYCY" type="text/javascript"></script>
			<script src="<?= $this->assetUrl('js/autocomplete.js') ?>" charset="utf-8"></script>
			<?= $this->section('javascript') ?> <!--AIzaSyDw-gYmqJqQ-8RYU_8LZoTNFyQ51_yWYCY-->
		</footer>

	</div>
</body>
</html>

<?php include('include/header.php'); ?>

<div id="home-banner" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img class="d-block w-100 img-fluid" src="img/slider_1.jpg" alt="First slide">
			<div class="carousel-caption d-none d-md-block">
				<h1>トップバナー</h1>
				<p>CREATE A ACCOUNT AND GET FUND FOR YOUR DREAM PROJECT</p>
				<P>
					<a href="signup.html" type="button" class="btn btn-success">ログイン</a>
					<a href="login.html" type="button" class="btn btn-primary">新規会員登録</a>
				</P>
			</div>
		</div>
		<div class="carousel-item">
			<img class="d-block w-100 img-fluid" src="img/slider_2.jpg" alt="Second slide">
			<div class="carousel-caption d-none d-md-block">
				<h1>トップバナー</h1>
				<p>CREATE A ACCOUNT AND GET FUND FOR YOUR DREAM PROJECT</p>
				<P>
					<a href="signup.html" type="button" class="btn btn-success">ログイン</a>
					<a href="login.html" type="button" class="btn btn-primary">新規会員登録</a>
				</P>
			</div>
		</div>
		<div class="carousel-item">
			<img class="d-block w-100 img-fluid" src="img/slider_3.jpg" alt="Third slide">
			<div class="carousel-caption d-none d-md-block">
				<h1>トップバナー</h1>
				<p>CREATE A ACCOUNT AND GET FUND FOR YOUR DREAM PROJECT</p>
				<P>
					<a href="signup.html" type="button" class="btn btn-success">ログイン</a>
					<a href="login.html" type="button" class="btn btn-primary">新規会員登録</a>
				</P>
			</div>
		</div>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>

<div class="container">

<ul class="nav nav-tabs home-tabs" role="tablist">
	<li class="nav-item ">
		<a class="nav-link active popular" data-toggle="tab" href="#popular" role="tab">ランキング
			<div class="divider"></div>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link category1" data-toggle="tab" href="#category1" role="tab">ものづくり
			<div class="divider"></div>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link category2" data-toggle="tab" href="#category2" role="tab">チャレンジ
			<div class="divider"></div>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link category3" data-toggle="tab" href="#category3" role="tab">社会貢献
			<div class="divider"></div>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link category4" data-toggle="tab" href="#category4" role="tab">アート
			<div class="divider"></div>
		</a>
	</li>


</ul>
<!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane active" id="popular" role="tabpanel">
		
		<div class="row mt20 projects">
			<?php for($i=0; $i<5; $i++){
				include('include/project.php');
			}?>
		</div>
		<div class="row mt20 projects">
			<?php for($i=0; $i<5; $i++){
				include('include/project.php');
			}?>
		</div>


	</div>
	<div class="tab-pane" id="category1" role="tabpanel">
		<div class="row mt20 projects">
			<?php for($i=0; $i<5; $i++){
				include('include/project.php');
			}?>
		</div>
		<div class="row mt20 projects">
			<?php for($i=0; $i<5; $i++){
				include('include/project.php');
			}?>
		</div>
	</div>
	<div class="tab-pane" id="category2" role="tabpanel">
		<div class="row mt20 projects">
			<?php for($i=0; $i<5; $i++){
				include('include/project.php');
			}?>
		</div>
		<div class="row mt20 projects">
			<?php for($i=0; $i<5; $i++){
				include('include/project.php');
			}?>
		</div>
	</div>
	<div class="tab-pane" id="category3" role="tabpanel">
		<div class="row mt20 projects">
			<?php for($i=0; $i<5; $i++){
				include('include/project.php');
			}?>
		</div>
		<div class="row mt20 projects">
			<?php for($i=0; $i<5; $i++){
				include('include/project.php');
			}?>
		</div>
	</div>
	<div class="tab-pane" id="category4" role="tabpanel">
		<div class="row mt20 projects">
			<?php for($i=0; $i<5; $i++){
				include('include/project.php');
			}?>
		</div>
		<div class="row mt20 projects">
			<?php for($i=0; $i<5; $i++){
				include('include/project.php');
			}?>
		</div>
	</div>
</div>


</div>


<?php include('include/footer.php'); ?>


		
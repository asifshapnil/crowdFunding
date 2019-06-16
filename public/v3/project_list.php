<?php include('include/header.php'); ?>

<div class="container">

<div class="row mt20 text-right">
	<div class="col">
		<div><i class="fa fa-search"> some text</i></div>
		<form class="form-inline pull-right">
          <div class="input-group">
			  <input type="text" class="form-control" placeholder="search" aria-describedby="basic-addon2">
			  <span class="input-group-addon" id="basic-addon2"><i class="fa fa-search"></i></span>
			</div>
        </form>
	</div>	
</div>
<div class="mt20">
	<div class="row">
		<div class="col-md-10">
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
						<?php for($i=0; $i<4; $i++){
							include('include/project.php');
						}?>
					</div>
					<div class="row mt20 projects">
						<?php for($i=0; $i<4; $i++){
							include('include/project.php');
						}?>
					</div>
				</div>
				<div class="tab-pane" id="category1" role="tabpanel">
					<div class="row mt20 projects">
						<?php for($i=0; $i<4; $i++){
							include('include/project.php');
						}?>
					</div>
					<div class="row mt20 projects">
						<?php for($i=0; $i<4; $i++){
							include('include/project.php');
						}?>
					</div>
				</div>
				<div class="tab-pane" id="category2" role="tabpanel">
					<div class="row mt20 projects">
						<?php for($i=0; $i<4; $i++){
							include('include/project.php');
						}?>
					</div>
					<div class="row mt20 projects">
						<?php for($i=0; $i<4; $i++){
							include('include/project.php');
						}?>
					</div>
				</div>
				<div class="tab-pane" id="category3" role="tabpanel">
					<div class="row mt20 projects">
						<?php for($i=0; $i<4; $i++){
							include('include/project.php');
						}?>
					</div>
					<div class="row mt20 projects">
						<?php for($i=0; $i<4; $i++){
							include('include/project.php');
						}?>
					</div>
				</div>
				<div class="tab-pane" id="category4" role="tabpanel">
					<div class="row mt20 projects">
						<?php for($i=0; $i<4; $i++){
							include('include/project.php');
						}?>
					</div>
					<div class="row mt20 projects">
						<?php for($i=0; $i<4; $i++){
							include('include/project.php');
						}?>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-2 mt50">
			<img src="http://via.placeholder.com/200x800" class="img-fluid">
		</div>
	</div>
	
</div>

</div>

<?php include('include/footer.php'); ?>


		
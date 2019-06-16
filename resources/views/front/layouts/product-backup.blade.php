<div class="col-md-{{isset($col)?$col:''}} item mt20">
	<div class="">
		<div class="project-image" style="height:100px; background-image: url('{{$p->image ? Request::root().'./uploads/products/.'.$p->image : asset('uploads/projects/1615154785167836.jpeg')}}');" alt="Card image cap"></div>
		<div class="padding">
			<p class="card-text"><a href="{{route('front-product-details', ['id' => $p->id])}}">{{$p->title}}</a>
				<br>
			{{$p->description}}</p>
			<!-- <button class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> 支援する</button> -->

		</div>
	</div>
</div>

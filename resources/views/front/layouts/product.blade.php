<div class="project_item">

		<a href="{{  route('front-product-details', ['id' => $p->id])}}">
				<div  class="project_img" style="height:200px; width:auto; background-color:#fff; background-image: url({{url('uploads/products/'.$p->image)}});background-repeat: no-repeat;
					background-position: center center; background-size: contain;">
				</div>
		</a>


	<div class="project_text">
		<ul class="project_tags list-inline project_category_items">
			<li class="list-inline-item">
			<h6 class="" style="font-size:14px; color:#bfc5cc;"> <span style="color:#bfc5cc;"> <i class="fa fa-tag"></i> {{$p->subCategory->category->name}}</span></h6>

			</li>
		</ul>
		<strong class="project_title"><a title="{{$p->title}}" href="{{route('front-product-details', ['id' => $p->id])}}">{{str_limit($p->title, 25)}}</a></strong>

		<div class="row project_progress">
			<div class="col-md-12">
				<span style="letter-spacing: 1px;"> <span style="font-size:18px;">{{ $p->price }}</span>   円（税込) </span>
			</div>
		</div>
		<div class="row project_item_footer">
			<div class="col-7">
				<p>{{ $p->company_name }}</p>
			</div>
		</div>
	</div>
</div>

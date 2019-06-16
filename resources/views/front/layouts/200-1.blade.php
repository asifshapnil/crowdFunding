<div class="bg-dark no-container project_details_bottom_info">
	<div class="container">
		<div class="row">
			<div class=" col-md-10 offset-md-1 col-sm-12">
				<div class="mt-5">
					<div class="row">
						<div class="col-md-12">
							<div class="row inner">
								<div class="col-md-8  mb-5 ">
									<div class="content-inner-blue mb-3">
										<div class="bg-white p-2">
											<h4 class="pb-2 font-weight-bold">プロジェクトの目的</h4>
											<p> {{ $project->purpose }} </p>

										</div>
									</div>
								@if ($project->details)
									@foreach($project->details as $projectDetails)
									<div class="content-inner-blue  mb-3">
										<div class="bg-white p-2">
											<h4 class="pb-2 font-weight-bold">{{$projectDetails->details_title}}</h4>
											<p> {{ $projectDetails->details_description }} </p>

										</div>
									</div>
								@endforeach
							@endif

									<div class="content-inner-blue mb-3 ">
										<div class="bg-white p-2">
											<h4 class="pb-2 font-weight-bold">{{ $project->title }}</h4>
											<div class="row mb-4">
												<img src="{{ asset('uploads/projects/'. $project->featured_image) }}" alt="" class="col-md-4" width="157px" height="157px;">
												<div class="col-md-8">
													<div class="row">
														<span class="col-md-12">
															{!! html_entity_decode($project->description) !!}
														</span>
													</div>
													<div class="row p-0 mt-auto">
														<span class="col-md-12">
															@if (Auth::check())
																<button class="p-2 text-white btn btn-md mt-4 font-weight-bold msg_send_btn "  data-user_id="{{ $project->user->id }}"  data-project_username="{{ $project->user->first_name.' '.$project->user->last_name }}" style="cursor:pointer; color:#fff;"> <span style="color:#fff !important;"> <i class="fa fa-envelope"></i> </span>メッセージを送る</button>
															@else
																<a class="p-2 text-white btn btn-md mt-4 font-weight-bold bg-dark" href="{{ route('front-project-details-login', $project->id) }}"   style="cursor:pointer; color:#fff;"> <span style="color:#fff !important;"> <i class="fa fa-envelope"></i> </span>メッセージを送る</a>
															@endif
														</span>
													</div>
													{{-- <button type="button" class="btn btn-md mt-4" name="button" style="background:#c6c6c6"; > <span class="fa fa-envelope" style="color:#fff;"></span> メッセージを送る</button> --}}

												</div>
											</div>

										</div>
									</div>
							</div>
							<div class="col-md-4">
								<div class="content-inner-arrow mb-3 details_btm_arrow">
									<div class="bg-white p-2">
										<div class="row">
											<div class="px-4 mb-2 col-md-12">
												<h4 class="forn-weight-bold">リターンを選ぶ</h4>
												<span>このプロジェクトを支援するためには リターンをお選びください。</span>
											</div>
										</div>
										<div class="arrow-down">

										</div>
									</div>
									<div class="detailsbtnarrow">
										<img src="{{ URL::to('assets/front/img/btmarrow.png') }}">
									</div>
								</div>
								@foreach ($project->reward->sortByDesc('amount') as $reward)

								<div class="content-inner-blue mb-3">
									<div class="bg-white p-2">
										<div class=row>
											<div class="px-4 mb-2 col-md-12">
												<h4 class="fornt-weight-bold p-0">￥{{ $reward->amount }} コース</h4>
												<span>{{$reward->is_other}}</span>

											</div>
											<div class="px-4 mb-2 col-md-12">
												@if ( $reward->other_file)
													<img src="{{ asset('uploads/projects/'. $reward->other_file) }}" alt="" class="" width="100%" height="200px">
												@else
													<img src="{{ asset('uploads/projects/1615154785167836.jpeg') }}" alt="" class="" width="100%" height="200px">
												@endif

											</div>
											<div class="px-4 mb-2 col-md-12" style="font-size:15px;">
												<span>{{ $reward->is_crofun_point }}  ポイント</span> <br>
												{{-- {{ $reward->is_crofun_point }} --}}
											{{  $reward->other_description }}
											</div>
											<div class="px-4 mb-2 mt-1 col-md-12">
												<a  href="/user/invest/{{ $project->id }}?reward={{ $reward->id }}" class=" text-white btn btn-md btn-block" name="button" style="background:#0099ff;">このリターンを選択する</a>

											</div>

										</div>
									</div>
								</div>
							@endforeach

								{{-- <div class="content-inner-blue mb-3">
									<div class="bg-white p-2">
										<div class=row>
											<div class="px-4 mb-2 col-md-12">
												<h4 class="fornt-weight-bold p-0">￥5,000 コース</h4>
												<span>リターン名がここに入りますす</span>

											</div>
											<div class="px-4 mb-2 col-md-12">
												<img src="{{ asset('images/BMW-TA.jpg') }}" alt="" class="" width="100%" height="200px">

											</div>
											<div class="px-4 mb-2 col-md-12" style="font-size:15px;">
												<a href="#">1000ポイント</a> <br>
												CrofunポイントとはCrofunに登録されて いる様々な商品と交換できるポイントです。
											</div>
											<div class="px-4 mb-2 mt-1 col-md-12">
												<button type="button" class=" text-white btn btn-md btn-block" name="button" style="background:#0099ff;">このリターンを選択する</button>

											</div>

										</div>
									</div>
								</div> --}}
							</div>

							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

@section('title','事業計画')
@extends('main')

@section('content')
    <div id="wrapper">

		<section id="main">
			<section id="post-250" class="content">

				<h3 class="heading">事業計画</h3>
				<article class="post">
					{!! $plans->links('vendor.pagination.bootstrap-4') !!}
					@foreach($plans as $plan)
						<h3><a href="{{route("business_plan_details",$plan->id)}}"><b>{{ $plan->title}}</b></a></h3>
						{!! substr($plan->contents, 0, 270) !!} 
						@if(strlen($plan->contents) > 270)
							<a href="{{route("business_plan_details",$plan->id)}}">... 読み続けて</a>
						@endif
					@endforeach
					{!! $plans->links('vendor.pagination.bootstrap-4') !!}
				</article>
			</section>
			<div class="pagenav">
				<span class="prev"><a href="#top" rel="top">&laquo; ページトップへ戻る</a></span>
				<span class="next"></span>
			</div>
		</section>

		@include("partials._sidebar")
	</div>

@endsection
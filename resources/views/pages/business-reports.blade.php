@section('title','事業報告書')
@extends('main')

@section('content')
    <div id="wrapper">

		<section id="main">
			<section id="post-250" class="content">

				<h3 class="heading">事業報告</h3>
				<article class="post">
					{!! $reports->links('vendor.pagination.bootstrap-4') !!}
					@foreach($reports as $report)
						<h3><a href="{{route("business_report_details",$report->id)}}"><b>{{ $report->title}}</b></a></h3>
						{!! substr($report->contents, 0, 270) !!} 
						@if(strlen($report->contents) > 270)
							<a href="{{route("business_report_details",$report->id)}}">... 読み続けて</a>
						@endif
					@endforeach
					{!! $reports->links('vendor.pagination.bootstrap-4') !!}
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
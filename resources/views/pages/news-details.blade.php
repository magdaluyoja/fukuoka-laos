@section('title','ニュースの詳細')
@extends('main')

@section('content')
    <div id="wrapper">

		<section id="main">
			<section id="post-250" class="content">

				<h3 class="heading">ニュースの詳細</h3>
				<article class="post">
            		<h1 >{{ $content->title }}</h1>
                    {!! $content->contents !!}
            		@foreach($content->attachments as $attachment)
            			<div class="row">
                			<div class="col-sm-12">
        						<h3>
        							@if (strpos($attachment->filename, '.pdf'))
									   <a href="/uploads/{{$content->content_type}}/{{$attachment->filename}}" target="_blank"><b>{{$attachment->filename}} </b> <img src="/assets/images/pdf.png"></a>
									@else
										<img src="/uploads/{{$content->content_type}}/{{$attachment->filename}}" class="img-fluid block-centered" alt="{{$attachment->filename}}">
									@endif
        						</h3>
        					</div>
        				</div>
    				@endforeach
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
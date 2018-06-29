@section('title','ホーム')
@extends('main')

@section('content')
    <div id="wrapper">
		<div id="mainBanner">
			<img src="/assets/images/banners/mainImg1.jpg" alt="That Luang"><div class="slogan"><h2>That Luang</h2><p>Vientiane, Laos</p>
		</div>
	</div>

	<section class="content">
		<h3 class="heading">福岡・ラオス友好協会とは？</h3>
		<article class="post">
			<p><img src="/assets/images/banners/sample.jpg" alt="" width="260" height="113" class="alignright"><b>本会は日本(福岡)とラオス両国民の経済・文化交流を図り、ラオスの教育、福祉向上等に 寄与すると共に、<br>以下の事業を通じて、会員相互の交流、親睦を図ることを目的としています。</b><br>
			1) ラオスとの経済、文化交流事業の企画、実施<br>
			2) 九州のラオス留学生との交流支援<br>
			3) 来福したラオス要人との交流、及びラオスセミナーの開催<br>
			4) 会員へのラオス情報の提供<br>
			5) 現地教育資材の提供等による教育水準向上支援<br>
			6) その他、本会の目的に必要な事業 <br>
			詳しくは<a href="/greetings-and-overview">「福岡・ラオス友好協会会則」</a>をご覧ください。</p>
		</article>
	</section>

	<section class="content">
		<h3 class="heading">新着情報</h3>
		<article class="post">
			@foreach($contents as $content)
				<p>
					@if($content->content_type === "plan")
						<a href="{{route("business_plan_details",$content->id)}}">
					@elseif($content->content_type === "report")
						<a href="{{route("business_report_details",$content->id)}}">
					@else
						<a href="{{route("news_details",$content->id)}}">
					@endif
						{{ explode("-", $content->date)[0] }}年
							{{ explode("-", $content->date)[1] }}月
							{{ explode("-", $content->date)[1] }}日 {{ $content->title}}
						</a>
				</p>
			@endforeach
		</article>
	</section>
@endsection
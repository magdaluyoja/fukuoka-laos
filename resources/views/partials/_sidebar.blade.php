<aside id="sidebar">
	<section>
		<h3 class="heading"><span>概要・会員企業</span></h3>
		<article>
			<ul>
				<li><a href="/greetings-and-overview">ご挨拶・概要</a></li>
				<li><a href="/officers-list">役員一覧</a></li>
				<li><a href="/members">会員企業</a></li>
			</ul>
		</article>
	</section>
	<section>
		<h3 class="heading"><span>新着情報</span></h3>
		<article>
			<ul>
				@foreach($contents as $content)
					<li>
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
					</li>
				@endforeach
			</ul>
		</article>
	</section>
	<section>
		<h3 class="heading"><span>関係リンク</span></h3>
		<article>
			<ul class="menu">
				<li><a href="http://www.laoembassytokyo.com/" target="_blank">駐日ラオス大使館</a></li>
				<li><a href="http://www.lao.jp/" target="_blank">ラオス情報文化観光省</a></li>
				<li><a href="https://www.lao-airlines.jp/" target="_blank">ラオス国営航空</a></li>
				<li><a href="http://www.fukuoka-fta.or.jp/" target="_blank">福岡貿易会</a></li>
			</ul>
		</article>
	</section>
</aside>
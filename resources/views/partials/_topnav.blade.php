<nav id="mainNav">
	<div class="inner">
		<a class="menu" id="menu"><span>MENU</span></a>
		<div class="topnav" style="display: none;">
			<ul>
				<li class="{{ Request::is('/') ? 'current-menu-item' : '' }}"><a href="/"><strong>トップページ</strong><span>Top</span></a></li>
				<li class=" {{ Request::is('greetings-and-overview') ? 'current-menu-item' : '' }}
					{{ Request::is('officers-list') ? 'current-menu-item' : '' }}
					{{ Request::is('members') ? 'current-menu-item' : '' }} ">
					<a href="#">
						<strong>概要・会員企業</strong><span>Greeting</span>
					</a>
					<ul class="sub-menu">
						<li class="{{ Request::is('greetings-and-overview') ? 'current-sub-menu-item' : '' }}">
							<a href="/greetings-and-overview">ごあいさつ・概要</a>
						</li>
						<li class="{{ Request::is('officers-list') ? 'current-sub-menu-item' : '' }}">
							<a href="/officers-list">役員一覧</a>
						</li>
						<li class="{{ Request::is('members') ? 'current-sub-menu-item' : '' }}">
							<a href="/members">会員企業</a>
						</li>
					</ul>
				</li>
				<li class="{{ Request::is('business-plans') ? 'current-menu-item' : '' }}">
					<a href="/business-plans"><strong>事業計画</strong><span>Plan</span></a>
				</li>
				<li class="{{ Request::is('business-reports') ? 'current-menu-item' : '' }}">
					<a href="/business-reports"><strong>事業報告</strong><span>Report</span></a>
				</li>
				<li class="{{ Request::is('news') ? 'current-menu-item' : '' }}">
					<a href="/news"><strong>ニュース</strong><span>News</span></a>
				</li>
				<li class="{{ Request::is('contact-us') ? 'current-menu-item' : '' }}">
					<a href="/contact-us"><strong>お問い合わせ</strong><span>Contact</span></a>
				</li>
			</ul>
		</div>
	</div>
</nav>
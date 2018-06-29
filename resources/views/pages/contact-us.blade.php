@section('title','接触')
@extends('main')

@section('content')
    <div id="wrapper">

		<section id="main">
            <section id="post-250" class="content">
                <h3 class="heading">お問い合わせ</h3>
                <article class="post">
                    <div class="panel panel-danger" id="div-form">
                        <div class="panel-body">
                            <p class="dateLabel">
                                <time datetime="2014-09-01">※印は必須項目となっております。</time>
                            </p>
                            <form class="form-horizontal" name="frm-contact" action="/pages/contact/index.php#div-form" autocomplete='off' method="POST" data-parsley-validate>
                                <div class="form-group">
                                    <label for="company_name" class="col-sm-3 label-title control-label">会社名 : </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="company_name" name="company_name" autocomplete='company' data-parsley-required value="" placeholder="会社名">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="belonging_department" class="col-sm-3 label-title control-label">所属部課 : </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="belonging_department" name="belonging_department" autocomplete='department' value="" placeholder="所属部課">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="position" class="col-sm-3 label-title control-label">役　職 : </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="position" name="position" autocomplete='position' value="" placeholder="役　職">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 label-title control-label">氏　名 (<span class="required">※</span>) : </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="name" name="name" autocomplete='name' data-parsley-required value="" placeholder="氏　名">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="zip_code" class="col-sm-3 label-title control-label">郵便番号 (<span class="required">※</span>) : </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="zip_code" name="zip_code" autocomplete='zip_code' data-parsley-required value="" placeholder="郵便番号">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="col-sm-3 label-title control-label">住　所 : </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="address" name="address" autocomplete='address' data-parsley-required value="" placeholder="住　所">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telephone" class="col-sm-3 label-title control-label">TEL (<span class="required">※</span>) : </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="telephone" name="telephone" autocomplete='telephone' data-parsley-required value="" placeholder="TEL">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fax" class="col-sm-3 label-title control-label">FAX : </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="fax" name="fax" autocomplete='fax' value="" placeholder="FAX">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-3 label-title control-label">メールアドレス (<span class="required">※</span>) : </label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="email" name="email" autocomplete='email' data-parsley-required value="" placeholder="メールアドレス">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <p class="bold">すべての入力内容をご確認のうえ、「入力確認画面へ」ボタンを押してください。</p>
                                </div>
                                <div class="text-center">
                                    <input type="image" src="/assets/images/form_confirm_off.jpg" name="submit_inquiry" value="submit_inquiry">
                                </div>
                            </form>
                        </div>
                    </div>
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
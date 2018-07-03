@section('title','新しいコンテンツを作成する')
@section('styles')
	<link rel="stylesheet" type="text/css" href="/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/libs/quill/dist/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="/assets/vendor/Parsley.js-2/src/parsley.min.css">
@endsection

@extends('admin.main')

@section('content')
	<div class="page-breadcrumb">
	    <div class="row">
	        <div class="col-sm-6 d-flex no-block align-items-center">
	            <h4 class="page-title">内容</h4>
	        </div>
	        <div class="col-sm-6 d-flex no-block align-items-center">
	            <div class="ml-auto text-right">
	                <nav aria-label="breadcrumb">
	                    <ol class="breadcrumb">
	                        <li class="breadcrumb-item"><a href="/admin" class="badge badge-pill badge-success">ホーム</a></li>
	                        <li class="breadcrumb-item"><a href="{{route("contents.index")}}" class="badge badge-pill badge-success">コンテンツリスト</a></li>
	                        <li class="breadcrumb-item active" aria-current="page">コンテンツの編集</li>
	                    </ol>
	                </nav>
	            </div>
	        </div>
	    </div>
	</div>

	<div class="container-fluid">
	    <div class="row">
	        <div class="col-md-12">
	        	@include('admin.partials._messages')
	            <div class="card">
	                <form class="form-horizontal" action="{{route('contents.update', $content->id)}}" method="POST" id="frm-new-content" enctype="multipart/form-data" data-parsley-validate autocomplete="off">
	                	{{ csrf_field() }}
	                	<input type="hidden" name="_method" value="PUT">
	                    <div class="card-body wizard-content">
	                        <h4 class="card-title">コンテンツを編集する</h4>
	                        <div class="form-group row">
	                            <label for="date" class="col-sm-2 control-label col-form-label">投稿日 *</label>
	                            <div class="col-sm-10">
	                                <input  type="text" class="form-control datepicker-autoclose" name="date" id="date" placeholder="投稿日 yyyy-mm-dd" value="{{$content->date}}" data-parsley-required>
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label for="title" class="col-sm-2 control-label col-form-label">タイトル *</label>
	                            <div class="col-sm-10">
	                                <input  type="text" class="form-control" id="title" name="title" value="{{$content->title}}" placeholder="タイトル" data-parsley-required>
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label for="content-type" class="col-sm-2 control-label col-form-label">リンク先 *</label>
	                            <div class="col-sm-10">
	                                <select class="form-control required" id="content-type" name="content_type" data-parsley-required>
	                                    <option value="">--リンク先--</option>
	                                    <option value="plan" {!! ($content->content_type === "plan") ? "selected" : "" !!}>事業計画</option>
	                                    <option value="report" {!! ($content->content_type === "report") ? "selected" : "" !!}>事業報告</option>
	                                    <option value="news" {!! ($content->content_type === "news") ? "selected" : "" !!}>ニュース</option>
	                                </select>
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label class="col-md-2" for="pdf-attachment">PDFファイル</label>
	                            <div class="col-md-10">
	                                <div class="custom-file">
	                                    <input type="file" class="custom-file-input" id="pdf-attachment" name="pdf_attachment[]" multiple>
	                                    <label class="custom-file-label" for="pdf-attachment">pdf /画像のアップロード...</label>
	                                    <div class="div-list">
	                                    	<div class='bg-success text-white' style='margin:5px 0;padding:5px;'>
	                                    		<labe>FILES : </label>
                                    			<ul style='margin:5px;'>
                                    				@foreach($content->attachments as $attachment)
                                    					<li>{{ $attachment->filename}}</li>
                                    				@endforeach
                                    			</ul>
	                                    	</div>
	                                    </div>
	                                </div>
	                            </div>
	                            
	                        </div>
	                        <div class="form-group row">
	                            <label class="col-md-12" for="content">コンテンツ</label>
	                            <div class="col-md-12">
	                            	<input name="contents" id="hdn-contents" type="hidden" value="{{ $content->contents }}">
	                                <div id="content" style="height: 300px;">
	                                	{!! $content->contents !!}
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="border-top">
	                        <div class="card-body">
	                            <button type="submit" class="btn btn-primary float-right">Submit</button>
	                            <div class="clearfix"></div>
	                        </div>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>  
	</div>
@endsection
@section('scripts')
	<script src="/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<script src="/assets/libs/quill/dist/quill.min.js"></script>
	<script src="/assets/vendor/Parsley.js-2/dist/parsley.min.js"></script>
	<script src="/assets/vendor/Parsley.js-2/src/i18n/ja.js"></script>
	<script src="/assets/js/admin/new-content.js"></script>
@endsection
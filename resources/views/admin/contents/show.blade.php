@section('title','新しいコンテンツを作成する')
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
	                        <li class="breadcrumb-item"><a href="{{route('contents.index')}}" class="badge badge-pill badge-success">コンテンツリスト</a></li>
	                        <li class="breadcrumb-item active" aria-current="page">コンテンツの詳細</li>
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
                    <div class="card-body wizard-content">
                    	<div class="col-sm-12">
                    		<a href="{{route('contents.create')}}" class="btn btn-success">作成する</a>
                    		<a href="{{route('contents.edit', $content->id)}}" class="btn btn-warning">編集</a>
                    		<a  class="btn btn-danger" 
	                            href="#"
	                            onclick="   event.preventDefault();
	                                        document.getElementById('delete-form').submit();">
	                        	削除
	                        </a>
	                        <form id="delete-form" action="{{ route('contents.destroy',$content->id) }}" method="POST" style="display: none;">
	                            {{ csrf_field() }}
	                            <input type="hidden" name="_method" value="DELETE">
	                        </form>
	                        <p></p>
	                    </div>
                    	<div class="col-sm-12">
                    		<h5 >{{ $content->title }}</h5>
                            <div class="text-muted">{{ $content->date }}</div> 
                            <span class="m-b-5 badge badge-secondary">{{ ucfirst(trans($content->content_type)) }}</span>
	                    </div>
                    	<div class="col-sm-12">
	                        {!! $content->contents !!}
	                    </div>
                    	<div class="col-sm-12">
                    		@foreach($content->attachments as $attachment)
                    			<div class="row">
	                    			<div class="col-sm-12">
	            						<p>
	            							@if (strpos($attachment->filename, '.pdf'))
											   <a href="/uploads/{{$content->content_type}}/{{$attachment->filename}}" target="_blank">{{$attachment->filename}}<img src="/assets/images/pdf.png"></a>
											@else
												<img src="/uploads/{{$content->content_type}}/{{$attachment->filename}}" class="img-fluid" alt="{{$attachment->filename}}">
											@endif
	            							
	            						</p>
	            					</div>
	            				</div>
            				@endforeach
	                    </div>
                    </div>
	            </div>
	        </div>
	    </div>  
	</div>
@endsection

@section('title','新しいコンテンツを作成する')
@extends('admin.main')

@section('content')
	<div class="page-breadcrumb">
	    <div class="row">
	        <div class="col-sm-6 d-flex no-block align-items-center">
	            <h4 class="page-title">内容物</h4>
	        </div>
	        <div class="col-sm-6 d-flex no-block align-items-center">
	            <div class="ml-auto text-right">
	                <nav aria-label="breadcrumb">
	                    <ol class="breadcrumb">
	                        <li class="breadcrumb-item"><a href="/admin" class="badge badge-pill badge-success">ホーム</a></li>
	                        <li class="breadcrumb-item active" aria-current="page">コンテンツリスト</li>
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
                    	<h4>コンテンツリスト</h4>
                        <p><a href="{{route("contents.create")}}" class="btn btn-success">コンテンツを作成する</a></p>
                        {!! $contents->links('vendor.pagination.bootstrap-4') !!}
			            <div class="comment-widgets scrollable ps-container ps-theme-default" data-ps-id="5c075dc7-746f-722f-1605-a5c8f59cd832">
			            	@foreach($contents as $content)
                                <div class="d-flex flex-row comment-row m-t-0">
                                    <div class="p-2"><img src="/assets/images/{{$content->content_type}}.png" alt="user" width="50" class=""></div>
                                    <div class="comment-text w-100">
                                        <h4 class="font-medium">{{ $content->title }}</h4>
                                        <div class="text-muted">{{ $content->date }}</div> 
                                        <span class="m-b-15 badge badge-secondary">{{ ucfirst(trans($content->content_type)) }}</span>
                                        
                                        <span class="m-b-15 d-block">{!! substr($content->contents, 0, 250) !!} {!! strlen($content->contents) > 250 ? "..." : "" !!}</span>
                                        <div class="comment-footer">
                                        	<div class="row">
	                                        	<div class="col-sm-offset-9 col-sm-3 ">
	                                        		<a href="{{ route('contents.show',$content->id) }}" class="btn btn-success btn-sm"><i class="far fa-list-alt"></i></a>
		                                            <a href="{{ route('contents.edit',$content->id) }}" class="btn btn-cyan btn-sm"><i class="far fa-edit"></i></a>

		                                            <a  class="btn btn-danger btn-sm" 
							                            href="#"
							                            onclick="   event.preventDefault();
							                                        document.getElementById('delete-form').submit();">
							                        	<i class="fas fa-trash-alt"></i>
							                        </a>
							                        <form id="delete-form" action="{{ route('contents.destroy',$content->id) }}" method="POST" style="display: none;">
							                            {{ csrf_field() }}
							                            <input type="hidden" name="_method" value="DELETE">
							                        </form>
	                                        	</div>
	                                       	</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                         <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
			            {!! $contents->links('vendor.pagination.bootstrap-4') !!}
                    </div>
	            </div>
	        </div>
	    </div>  
	</div>
@endsection

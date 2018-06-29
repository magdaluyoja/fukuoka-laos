@section('title','新しいコンテンツを作成する')
@extends('admin.main')

@section('content')
	<div class="page-breadcrumb">
	    <div class="row">
	        <div class="col-sm-6 d-flex no-block align-items-center">
	            <h4 class="page-title">コンテンツリスト</h4>
	        </div>
	        <div class="col-sm-6 d-flex no-block align-items-center">
	            <div class="ml-auto text-right">
	                <nav aria-label="breadcrumb">
	                    <ol class="breadcrumb">
	                        <li class="breadcrumb-item"><a href="/admin">ホーム</a></li>
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
                        <h4 class="card-title">コンテンツリスト</h4>
                        <p><a href="{{route("contents.create")}}" class="btn btn-success">Create New Content</a></p>
                        {!! $contents->links('vendor.pagination.bootstrap-4') !!}
                        <div class="table-responsive">
			                <table class="table table-bordered table-hover">
			                	<thead>
			                		<tr>
			                			<th>No</th>
			                			<th>Title</th>
			                			<th>Content</th>
			                			<th>Date</th>
			                			<th>Action</th>
			                		</tr>
			                	</thead>
			                	<tbody>
			                		@foreach($contents as $content)
				                		<tr data-content-id='{{ $content->id }}'>
				                			<td class="text-center">{{$loop->iteration}}</td>
				                			<td>{{ $content->title }}</td>
				                			<td>{!! substr($content->contents, 0, 140) !!} {!! strlen($content->contents) > 140 ? "..." : "" !!}</td>
				                			<td>{{ $content->date }}</td>
				                			<td class="text-center">
				                				<a href="{{ route('contents.show',$content->id) }}" class="btn btn-primary"><i class="far fa-list-alt"></i></a>
				                			</td>
				                		</tr>
				                	@endforeach
			                	</tbody>
			                </table>
			            </div>
			            <div class="comment-widgets scrollable ps-container ps-theme-default" data-ps-id="5c075dc7-746f-722f-1605-a5c8f59cd832">
			            	@foreach($contents as $content)
                                <!-- Comment Row -->
                                <div class="d-flex flex-row comment-row m-t-0">
                                    <div class="p-2"><img src="/assets/images/content.png" alt="user" width="50" class="rounded-circle"></div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium">{{ $content->title }}</h6>
                                        <span class="m-b-5 badge badge-secondary">{{ $content->type }}</span>
                                        <span class="m-b-15 d-block">{!! substr($content->contents, 0, 140) !!} {!! strlen($content->contents) > 140 ? "..." : "" !!}</span>
                                        <div class="comment-footer">

                                        	<div class="col-sm-6">
                                        		<span class="text-muted float-right">{{ $content->date }}</span> 	
                                        	</div>
                                        	<div class="clearfix"></div>
                                        	<div class="col-sm-6">
                                        		<a href="{{ route('contents.show',$content->id) }}" class="btn btn-success btn-sm"><i class="far fa-list-alt"></i></a>
	                                            <a href="{{ route('contents.show',$content->id) }}" class="btn btn-cyan btn-sm"><i class="far fa-edit"></i></a>
	                                            <a href="{{ route('contents.show',$content->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
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

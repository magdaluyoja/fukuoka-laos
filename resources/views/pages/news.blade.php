@section('title','ニュース')
@extends('main')

@section('content')
    <div id="wrapper">

        <section id="main">
            <section id="post-250" class="content">

                <h3 class="heading">ニュース</h3>
                <article class="post">
                    {!! $news->links('vendor.pagination.bootstrap-4') !!}
                    @foreach($news as $new)
                        <h3><a href="{{route("news_details",$new->id)}}"><b>{{ $new->title}}</b></a></h3>
                        {!! substr($new->contents, 0, 270) !!} 
                        @if(strlen($new->contents) > 270)
                            <a href="{{route("news_details",$new->id)}}">... 読み続けて</a>
                        @endif
                    @endforeach
                    {!! $news->links('vendor.pagination.bootstrap-4') !!}
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
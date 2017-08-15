@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Blog</div>

                <div class="panel-body">
                    @include('layouts.alert')
                    <div class="row" style="padding: 10px;">
                    <a class="btn btn-success" href="{!! route('blog_create') !!}">Create A Blog</a>
                    </div>
                    @foreach($posts as $post)
                      <div style="border: 1px solid violet;">  
                        <h4>{!! $post->username !!}</h4>
                        <h4>{!! $post->posttitle !!}</h4>

                        <span>{!! $post->created_at !!}</span>
                        <a class="btn btn-xs btn-success" href="{!! route('blog.details',$post->_id) !!}">View</a>
                        @if($post->user_id == Auth::user()->_id)

                            <a class="btn btn-xs btn-warning" href="{!! route('blog_edit', $post->_id) !!}">Edit</a>

                            <a class="btn btn-xs btn-danger" href="{!! route('blog_delete', $post->_id) !!}">Delete</a>

                        @endif
                        <p>{!! substr($post->post,0,30) !!}....</p>
                      </div> 
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

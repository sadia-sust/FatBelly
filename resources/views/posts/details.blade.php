@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$post->username}}'s blog</div>
                <div style="padding: 10px;"> 

                <h4>Title: {{$post->posttitle}}
                </h4>
                </div>

                <div style="padding: 10px;"> 

                {{$post->post}}
                </div>
<div class="row">
	<div class="col-md-8 ">
			 	
			 		<!-- <li><a href="#"><i class="fa fa-thumbs-o-up"></i> </a>{!! count($post->upvotes) !!}</li> -->
			 		<a class="btn btn-xs btn-default" style="text-decoration: none" href="{!! route('post.upvote',$post->_id) !!}"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Like </a> : {!! count($post->upvotes) !!}

			 		<a class="btn btn-xs btn-default" style="text-decoration: none" href="{!! route('post.downvote',$post->_id) !!}"><i class="fa fa-thumbs-o-down"></i>Dislike </a> : {!! count($post->downvotes) !!}
			 	</div>
			 </div>

                </div>
                </div>
                </div>
                <div class="row">
<div class="comment-section">
        <div class="col-md-4 col-md-offset-2">
            @if(count($post->comments)>0)
            <h4>Comments</h4>
            @endif

            @for($i = 0; $i < count($post->comments); $i++)
            <div class="grid1_of_2">
                
                <div class="grid_text">
                    

                    <h4><a href="#">{!! $post->comments[$i]['user']['name'] !!}</a></h5>
                    <h6>{!! \Carbon\Carbon::parse($post->comments[$i]['created_at']['date'])->format('d-m-Y') !!}</h6>
                    <p class="para top"> {!! $post->comments[$i]['comment'] !!}</p>

                </div>
                <div class="clear"></div>
            </div>
            @endfor
                <div class="artical-commentbox">
                    <h4>Leave a Comment</h4>
                    <div class="table-form">

                        {!! Form::open([
                            'route' => ['post.comment',$post->_id],
                            'method' => 'post'
                          ]) 
                        !!}

                            <div>
                              
                                <textarea name="comment"> </textarea>   
                            </div>


                            <input type="submit" value="submit">

                        {!! Form::close() !!}   
                    </div>
                    <div class="clear"> </div>
                </div>          
            </div>
    </div>
                </div>
         </div>
@endsection
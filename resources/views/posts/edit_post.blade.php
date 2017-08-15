@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Blog Post</div>

                <div class="panel-body">
                    @include('layouts.alert')
                    {!! Form::model($post,[
                        'route' => ['blog_update',$post->_id],
                        'method' => 'put'
                      ]) 
                    !!}

                    
  {!! Form::text('posttitle', null, [
                        'class' => 'form-control', 
                        'placeholder' => 'Title', 
                        'required']
                        )
                    !!}

                    {!! Form::textarea('post', null, [
                        'class' => 'form-control', 
                        'placeholder' => 'Write a post', 
                        'required']
                        )
                    !!}

                    {!! Form::submit('Submit', ['class'=>'form-control btn-success']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

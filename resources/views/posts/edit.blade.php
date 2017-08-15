@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit food details</div>

                <div class="panel-body">
                    @include('layouts.alert')

                    {!! Form::model($food_details,[
                        'route' => ['update',$food_details->_id],
                        'method' => 'put'
                      ]) 
                    !!}

                    {!! Form::text('food_name', $food_details->food_name, [
                        'class' => 'form-control', 
                        'placeholder' => 'Food name', 
                        'required']
                        )
                    !!}

                    {!! Form::text('food_callory', $food_details->food_callory, [
                        'class' => 'form-control', 
                        'placeholder' => 'Callory in gram', 
                        'required']
                        )
                    !!}

                    {!! Form::submit('Edit', ['class'=>'form-control btn-success']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

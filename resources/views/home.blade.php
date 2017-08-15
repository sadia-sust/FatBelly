@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                @if(Auth::user()->name =='admin')
                @include('layouts.alert')
                    {!! Form::open([
                        'route' => 'store',
                        'method' => 'post'
                      ]) 
                    !!}

                    <br>

                    <input type="text" name="food_name" placeholder="  Food name" size="60%" style=" margin-left: 20%; border-radius: 4px; border: 1px solid #ccd0d2; height: 36px;" required>

                    <br>
                    <br>

                    <input type="text" name="food_callory" placeholder="  Callory in 1000 gram" size="60%" style=" margin-left: 20%; border-radius: 4px; border: 1px solid #ccd0d2; height: 36px;" required>

                    <br><br>

                    <input type="submit" value="Add" style=" background-color: #2ab27b; border-color: #259d6d; border-radius: 4px; color:#fff; border: 1px solid #ccd0d2; margin-left: 60%; width: 15%; height: 36px;">

                    <br><br>

                    {!! Form::close() !!}

                
                @else

                @include('layouts.alert')
                    {!! Form::open([
                        'route' => 'user_store',
                        'method' => 'post'
                      ]) 
                    !!}

                    <br>

                    <!-- <input type="text" name="food_name" placeholder="   Food name" size="60%" style=" margin-left: 20%; border-radius: 4px; border: 1px solid #ccd0d2; height: 36px;" required> -->
                    <p style=" margin-left: 20%; "><b>Enter food name : </b></p>
                    <select name="food_name"  required="" style=" margin-left: 20%; border-radius: 4px; border: 1px solid #ccd0d2; height: 30px;">  
                                
                                 <option value=""> </option> 
                                 @foreach($food_details1 as $food_item)
                                 <option value="{{$food_item->food_name}}"> {{$food_item->food_name}}</option>
                                 @endforeach
                                
                    </select>  

                    <br>
                    <br>

                    <input type="text" name="food_quantity" placeholder="   Food quantity" size="60%" style=" margin-left: 20%; border-radius: 4px; border: 1px solid #ccd0d2; height: 36px;" required>
                    

                    <br><br>

                    <input type="submit" value="Calculate" style=" background-color: #2ab27b; border-color: #259d6d; border-radius: 4px; color:#fff; border: 1px solid #ccd0d2; margin-left: 60%; width: 15%; height: 36px;">

                    <br><br>


                    {!! Form::close() !!}

                @endif

               


                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <a style="padding: 5 px;margin: 5px; color:red;" href="{!! route('compare') !!}"> Compare yourself with Others!!!!</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                
                @if(Auth::user()->name =='admin')
                <table id="example" class="display">
                     <thead>
                        <th>Food Name</th>
                        <th>Callory</th>
                        <th></th>
                     </thead>

                     <tbody>

                     @foreach($food_details as $food_info)
                        <tr>
                    <td>{{$food_info->food_name}}</td>
                    <td>{{$food_info->food_callory}}</td> 
                    <td><a class="btn btn-xs btn-warning" href="{!! route('edit', $food_info->_id) !!}">Edit</a>

                        <a class="btn btn-xs btn-danger" href="{!! route('delete', $food_info->_id) !!}">Delete</a></td>
                  </tr>
                  

                  @endforeach
                     </tbody>
                </table>

                @else
                <table id="example" class="display">
                <thead>
                        <th>Food Name</th>
                        <th>Quantity</th>
                        <th>Callory</th>
                        <th></th>
                     </thead>
                     <tbody>


                     @foreach($food_details as $food_info)
                        @if($food_info->username == Auth::user()->name)

                        <tr>
                    <td>{{$food_info->food_name}}</td>
                    <td>{{$food_info->food_quantity}}</td> 
                    <td>{{$food_info->food_callory}}</td> 
                    <!-- <td>delete</td> -->
                    
                    <td><a class="btn btn-xs btn-danger" href="{!! route('delete', $food_info->_id) !!}">Delete</a></td>
                  </tr>
                      @endif

                      @endforeach
                         </tbody>

                </table>

                @endif
                  


                
            </div>
        </div>
    </div>
     
    
</div>
@endsection

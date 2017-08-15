@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Food Lists</div>

                <table id="example" class="display">
                     <thead>
                        <th>Food Name</th>
                        <th>Callory in 1000 grams</th>
                     </thead>

                     <tbody>

                     @foreach($food_details as $food_info)
                        <tr>
                    <td>{{$food_info->food_name}}</td>
                    <td>{{$food_info->food_callory}}</td> 

                  </tr>
                  

                  @endforeach
                     </tbody>
                </table>


               


                
            </div>
        </div>
    </div>
    

    
</div>
@endsection

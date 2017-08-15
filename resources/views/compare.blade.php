@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
    
                
               


                
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                
                <table id="example" class="display">
                <thead>
                        <th>username</th>
                        <th>Weight</th>
                        <th>Height</th>
                        
                        <th>Total Calory</th>

                        <th></th>
                     </thead>
                     <tbody>
                    @php
                    $prev = $food_details[0]->username;
                    $ca = (floatval($food_details[0]->food_callory)  );
                    $ans= "S";
                    @endphp


                     @for($i=1;$i< count($food_details) ;  $i+=1)
                    
                    
                    @if($food_details[$i]->username == $prev)
                    @php
                    $ca =$ca +  (floatval($food_details[$i]->food_callory) );
                    @endphp
                    @elseif($prev!=Auth::user()->name)
                    

                        <tr>
                    <td>{{$prev}}</td>
                    <td>
                          
                        @for($j = 0 ;$j<count($users); $j++)
                        @if($users[$j]->name == $prev  )
                        @php
                        $ans = $users[$j]->weight;
                        @endphp
                        @endif
                        @endfor
                        {{$ans}}

                    </td>

                   <td>
                          
                        @for($j = 0 ;$j<count($users); $j++)
                        @if($users[$j]->name == $prev  )
                        @php
                        $ans = $users[$j]->height;
                        @endphp
                        @endif
                        @endfor
                        {{$ans}}

                    </td>

                    <td>{{$ca}}</td> 
                    <!-- <td>delete</td> -->
                    <td><a class="btn btn-xs btn-success" href="{!! route('compareuser',$prev) !!}">Compare</a></td>

                    @php
                    $prev = $food_details[$i]->username;
                    $ca = (floatval($food_details[$i]->food_callory)  );
                    @endphp
                  </tr>
                  @else
                    @php
                    $prev = $food_details[$i]->username;
                    $ca = (floatval($food_details[$i]->food_callory)  )
                  @endphp

                    @endif
                      @endfor
                      
                  @if($prev!=Auth::user()->name)
                    
                        <tr>
                    <td>{{$prev}}</td>
                    <td>
                        
                        
                        @for($j = 0 ;$j<count($users); $j++)
                        @if($users[$j]->name == $prev  )
                        @php
                        $ans = $users[$j]->weight;
                        @endphp
                        @endif
                        @endfor
                        {{$ans}}
                    </td>
                    <td>
                          
                        @for($j = 0 ;$j<count($users); $j++)
                        @if($users[$j]->name == $prev  )
                        @php
                        $ans = $users[$j]->height;
                        @endphp
                        @endif
                        @endfor
                        {{$ans}}

                    </td>

                    <td>{{$ca}}</td> 
                    <!-- <td>delete</td> -->

                    <td><a class="btn btn-xs btn-success" href="{!! route('compareuser',$prev) !!}">Compare</a></td>
                         </tr>
                         @endif
                         </tbody>

                </table>

                  


                
            </div>
        </div>
    </div>
     
    
</div>
@endsection

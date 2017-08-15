@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-6 col-md-offset-2">
    @php
    $current_weight=10.0;
    $current_hight=10.0;
    @endphp
    @foreach($users as $us)
    @if(Auth::user()->name== $us->name)
    @php
    $current_weight=max($us->weight,$current_weight);
    $current_hight=max($us->height,$current_hight);
    @endphp
    @endif
    @endforeach
    
    @php
    $pound = floatval($current_weight)*2.2;
    $inch = floatval($current_hight)* 0.393701;
    $pound = $pound * 0.45;
    $inch = $inch * 0.025;
    $inch = $inch * $inch;
    $BMI = $pound/$inch;
    $expected_weight = 50+ ($current_hight-152.5)*.5875;
    @endphp

    </div>
    </div>
    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">{{Auth::user()->name}}'s Profile</div>
                <div><h5>Your Current Weight is {{$current_weight}}</h5>

                    <h5>Your Current Height is {{$current_hight}}</h5>
                @if($BMI <19.0 || $BMI >25.0)
                <h5 style="color:red;">Your BMI  is {{$BMI}}</h5>
                @else
                <h5 style="color:green;">Your BMI  is {{$BMI}}</h5>
                @endif
                <h5> Average BMI should be between 19 and 25</h5>
                <h5>Estimated ideal body weight in (kg) should Be: {{$expected_weight}}
                </h5>
                    </div>
                
                <div>
                @include('layouts.alert')
                    {!! Form::open([
                        'route' => 'weight_store',
                        'method' => 'post'
                      ]) 
                    !!}

                    <br>
                     <input type="hidden" name="id" value = "{{Auth::user()->id}}" placeholder=" Edit your height" size="60%" style=" margin-left: 20%; border-radius: 4px; border: 1px solid #ccd0d2; height: 36px;" required>

                    <input type="text" name="food_name" placeholder=" Edit your height" size="60%" style=" margin-left: 20%; border-radius: 4px; border: 1px solid #ccd0d2; height: 36px;" required>

                    <br>
                    <br>

                    <input type="text" name="food_quantity" placeholder=" Edit your Weight" size="60%" style=" margin-left: 20%; border-radius: 4px; border: 1px solid #ccd0d2; height: 36px;" required>

                    <br><br>

                    <input type="submit" value="Calculate" style=" background-color: #2ab27b; border-color: #259d6d; border-radius: 4px; color:#fff; border: 1px solid #ccd0d2; margin-left: 60%; width: 15%; height: 36px;">

                    <br><br>


                    {!! Form::close() !!}



               


                </div>
            </div>
        </div>
    </div>


        </div>
    </div>
     
    
</div>
@endsection

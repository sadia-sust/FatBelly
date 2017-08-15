<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User, App\Food_list, App\User_food_list;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Redirect, Input, Auth;

use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        if(Auth::user()->name=='admin')
        {
            $food_details = Food_list::get();
            return view('home')
            ->with('food_details', $food_details);
        }
        
        else
        {

            $food_details1 = Food_list::get();
            $food_details = User_food_list::get();

            return view('home')
            ->with('food_details', $food_details)
            ->with('food_details1',$food_details1);

        }
      
        
       
    }

    public function foodList()
    {

       $food_details = Food_list::get();

        return view('food')
            ->with('food_details', $food_details);
       
    }
    public function profile()
    {

        $users = User::get();

        return view('profile')
            ->with('users', $users);
       
    }



    public function create(){

        $food_details = Food_list::get();

        return view('home')
            ->with('food_details', $food_details);
       // return view('home');

        //return view('home',compact('food_details'));
    }



    public function store(Request $request){
        $rules = [
            'food_name'   => 'required',
            //'food_callory' => 'required'
        ];

        $data = $request->all();

        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $food_details = new Food_list();
            $food_details->username = Auth::user()->name;
            $food_details->user_id = Auth::user()->_id;
            $food_details->food_name = $data['food_name'];
            $food_details->food_callory = $data['food_callory'];
            

            if($food_details->save()){
                $food_details = Food_list::get();

               // return $food_details;

                //return 1;
                return redirect()->route('home')
                    ->with('success', 'inserted successfully')->with('food_details', $food_details);
            }else{
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'failed to insert!');
            }
        } 
    }


    public function userStore(Request $request){
        $rules = [
            'food_name'   => 'required',
            //'food_callory' => 'required'
        ];

        $data = $request->all();

        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $food_details = new User_food_list();
            $food_details->username = Auth::user()->name;
            $food_details->user_id = Auth::user()->_id;
            $food_details->food_name = $data['food_name'];

            $tmp = $data['food_name'];
            $food_details->food_quantity = $data['food_quantity'];

            //return $tmp;
            $food_ad = Food_list::get()->where('food_name', $tmp)->first();

           // return $food_ad;

            // $food_data = DB::collection('Food_lists')->where('food_name', $tmp)->first();
            // return $food_data;

            $food_details->food_callory = ((int)$data['food_quantity']*(int)$food_ad->food_callory)/1000;

            //return $tmp1;
            

            if($food_details->save()){
                $food_details = User_food_list::get();
                return redirect()->route('home')
                    ->with('success', 'inserted successfully')->with('food_details', $food_details);
            }else{
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'failed to insert!');
            }
        } 
    }



    public function edit($id){
        $food_details = Food_list::findOrFail($id);
        return view('posts.edit')
                ->with('food_details', $food_details);    
    }

    public function update(Request $request, $id){
        $rules = [
            'food_name'   => 'required',
            //'food_callory' => 'required'
        ];

        $data = $request->all();

        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $food_details = Food_list::findOrFail($id);
          
            $food_details->food_name = $data['food_name'];
            $food_details->food_callory = $data['food_callory'];

            if($food_details->save()){
                return redirect()->route('home')
                    ->with('success', 'Food info updated successfully');
            }else{
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'failed to update food info!');
            }
        }
    }

    public function delete($id){

        if(Auth::user()->name=='admin')
        $food_data = Food_list::findOrFail($id);
        else
        $food_data = User_food_list::findOrFail($id);

       // $food_data = Food_list::findOrFail($id);
        
        if($food_data->delete()){

          //  $food_details = Food_list::get();

            return redirect()->route('home')
                ->with('error', 'deleted successfully');
                //->with('food_details', $food_details);
        }
        else{
            return redirect()->back()
                ->withInput()
                ->with('error', 'failed to delete!');
        }
     }
     public function weightUpdate(Request $request){
       


        $data = $request->all();
        {
            $food_details = User::findOrFail($data['id']);

            $food_details->height = $data['food_name'];
            $food_details->weight = $data['food_quantity'];

            if($food_details->save()){
               // return $food_details;
                return redirect()->route('profile');
                   // ->with('success', 'Food info updated successfully');
            }else{
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'failed to update food info!');
            }
        }
    }
}

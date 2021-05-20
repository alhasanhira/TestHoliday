<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayApiController extends Controller
{
    public function index(){
        return Holiday::all();
    }

    public function store(){
        request()->validate([
            'name' => 'required',
            'date' => 'required',
            'state' => 'required',
        ]);
    
        return Holiday::create([
            'name' => request('name'),
            'date' => request('date'),
            'state' => request('state'),
        ]);
    }

    public function update($id){

        $message = $holiday = Holiday::where('id',$id)->update(
            [
                'name' => request('name'),
                'date' => request('date'),
                'state' => request('state')
            ]);
    
        return [
            'Updated' => 'Data Updated'
        ];
    }
    public function destroy($id){
        
        $holiday = Holiday::where('id',$id);
        $holiday->delete();
        return [
            'Data Deleted'
        ];
    }
    public function check($state){

    $holiday = Holiday::where('state',$state)->get();
    if($holiday->count()){
        return 'Its a Holiday';
    }
    else
    return 'Not Holiday';
    
    }
        
}

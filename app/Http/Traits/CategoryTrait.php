<?php
namespace App\Http\Traits;

trait CategoryTrait{

    public function validaion_check($request){
        $check = $this->validate($request, [
            'name'  => 'required',
            'type'  => 'required',
        ]);

        if($check){
            return true;
        }else{
            return false;
        }
    }

    public function data_process($data, $request){
        $data->name = $request->name;
        $data->type = $request->type;
        try {
            $data->save();
        } catch (Exception $e) {
            toast($e->message(),'error');
            return redirect()->back();
        }

    }
}

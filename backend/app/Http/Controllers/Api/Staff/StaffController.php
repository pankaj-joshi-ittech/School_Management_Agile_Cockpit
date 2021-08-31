<?php

namespace App\Http\Controllers\Api\Staff;
use App\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\StaffRepository;

class StaffController extends Controller
{
    public function __construct(Request $request ,StaffRepository $staffRepository){

        $this->request = $request;

        $this->staffRepository = $staffRepository;
    }

    public function getStaffDetails(){
        try{
            $getStaff = $this->staffRepository->getData([],'get',[],1);

            if(isset($getStaff)){
                return response()->json([
                    'status' => 'success',
                    'data' => $getStaff
                ],200);
            }

        }catch (\Exception $ex){
            return response()->json([
                'status' => 'error',
                'code' => $ex->getCode(),
                'message' => $ex->getMessage(),
                'error_details' => 'on line : '.$ex->getLine().' on file : '.$ex->getFile()
            ], 200);
        }

    }

    public function getStaffById($staff_id){
        try{
            $getStaffWithId =  $this->staffRepository->getData(['id'=> $staff_id],'first',[],1);

        }catch (\Exception $ex){
            return response()->json([
                'status' => 'error',
                'code' => $ex->getCode(),
                'message' => $ex->getMessage(),
                'error_details' => 'on line : '.$ex->getLine().' on file : '.$ex->getFile()
            ], 200);
        }

    }

    public function deleteStaff($staff_id){
        try{
            Staff::where('id', $staff_id)->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Staff Deleted !'
            ],200);

        }catch (\Exception $ex){
            return response()->json([
                'status' => 'error',
                'code' => $ex->getCode(),
                'message' => $ex->getMessage(),
                'error_details' => 'on line : '.$ex->getLine().' on file : '.$ex->getFile()
            ], 200);
        }

    }

    public function createUpdateStaff(){
        try{
           $createUpdateStaff =  $this->staffRepository->createUpdateData(['id' => $this->request->id],$this->request->all());

           if(isset($createUpdateStaff)){
               return response()->json([
                'status' => 'success',
                'data' => $createUpdateStaff
               ],200);
           }

        }catch (\Exception $ex){
            return response()->json([
                'status' => 'error',
                'code' => $ex->getCode(),
                'message' => $ex->getMessage(),
                'error_details' => 'on line : '.$ex->getLine().' on file : '.$ex->getFile()
            ], 200);
        }

    }
}

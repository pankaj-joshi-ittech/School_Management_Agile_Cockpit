<?php

namespace App\Http\Controllers\Api\Student;
use App\Repository\StudentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;

class StudentController extends Controller
{
    public function __construct(Request $request,StudentRepository $studentRepository){

        $this->request = $request;

        $this->studentRepository = $studentRepository;
    }

    public function getStudentDetails(){
        try{
            $getStudent = $this->studentRepository->getData([],'get',[],1);

            if(isset($getStudent)){
                return response()->json([
                    'status' => 'success',
                    'data' => $getStudent
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

    public function getStudentById($student_id){
        try{
            $getStudentWithId =  $this->studentRepository->getData(['id'=> $student_id],'first',[],1);

            if(isset($getStudentWithId)){
                return response()->json([
                    'status' => 'success',
                    'data' => $getStudentWithId
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

    public function deleteStudent($student_id){
        try{
            Student::where('id', $student_id)->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Student Deleted !'
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

    public function createUpdateStudent(){
        try{
            $createUpdateStudent =  $this->studentRepository->createUpdateData(['id' => $this->request->id],$this->request->all());
 
            if(isset($createUpdateStudent)){
                return response()->json([
                 'status' => 'success',
                 'data' => $createUpdateStudent
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

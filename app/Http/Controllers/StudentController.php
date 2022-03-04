<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{

    /**
     * list student details.
     *
     * @param
     * @return json  message, data, statusCode, status
     */
    public function list()
    {
        try {
            $response = Student::has('teacher')->orderBy('id', 'desc')->get();

            if (empty($response->toArray())) {
                throw new \Exception('No results found.');
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong.',
                'error' => $e->getMessage(),
                'statusCode' => 400,
                'status' => 'failed',
                'errorMessages' =>  ['Something went wrong.']
            ], 400);
        }

        return view('studentList')->with(array('response' => $response));
    }
    /**
     * Insert student details.
     *
     * @param
     * @return  
     */
    public function insert(Request $request)
    {
        $teacher = Teacher::select('id', 'ReportingTeacher')->get();

        return view('studentCreate')->with(array('teacher' => $teacher));
    }

    /**
     * create student details.
     *
     * @param
     * @return   message, data, statusCode, status
     */
    public function create(Request $request)
    {
        try {
         
            // check student data is valid
            $error = $this->validateStudent($request);
            if (!empty($error['statusCode']) == 400) return response()->json($error, 400);

            $response = Student::create([
                'Name' => $request->Name,
                'Age' => $request->Age,
                'Gender' => $request->Gender,
                'ReportingTeacherId' => $request->ReportingTeacherId,
            ]);
          
            return redirect('student/list');
        } catch (\Exception $e) {
            $error = [
                'errorMessage' => $e->getMessage(),
                'filePath' => $e->getFile(),
                'lineNumber' => $e->getLine(),
            ];

            return response()->json([
                'message' => 'response creation failed.',
                'error' => $error,
                'statusCode' => 400,
                'status' => 'failed',
                'errorMessages' =>  [$error]
            ], 400);
        }
    }

    /**
     * edit student details.
     *
     * @param
     * @return json  message, data, statusCode, status
     */
    public function edit(Request $request, int $studentId)
    {

        $student = Student::find($studentId);

        if (empty($student)) {
            return response()->json([
                'message' => 'student updation failed.',
                'error' => "No results found for update `{$studentId}`.",
                'statusCode' => 400,
                'status' => 'failed',
                'errorMessages' =>  ["No results found for update `{$studentId}`."]
            ], 400);
        }

        $teacher = Teacher::select('id', 'ReportingTeacher')->get();

        return view('studentEdit')->with(array('student' => $student, 'teacher' => $teacher));
    }

    /**
     * Update student details.
     *
     * @param
     * @return json  message, data, statusCode, status
     */
    public function update(Request $request, int $studentId)
    {
        try {

            $studentResult = Student::find($studentId);

            if (empty($studentResult)) {
                return response()->json([
                    'message' => 'student updation failed.',
                    'error' => "No results found for update `{$studentId}`.",
                    'statusCode' => 400,
                    'status' => 'failed',
                    'errorMessages' =>  ["No results found for update `{$studentId}`."]
                ], 400);
            }

            // check student data is valid
            $error = $this->validatestudent($request);
            if (!empty($error['statusCode']) == 400) return response()->json($error, 400);

            $studentResponse = tap($studentResult)->update([
                'Name' => $request->Name,
                'Age' => $request->Age,
                'Gender' => $request->Gender,
                'ReportingTeacherId' => $request->ReportingTeacherId,
            ]);

            return redirect('student/list');
        } catch (\Exception $e) {
            $error = [
                'errorMessage' => $e->getMessage(),
                'filePath' => $e->getFile(),
                'lineNumber' => $e->getLine(),
            ];

            return response()->json([
                'message' => 'student updation failed.',
                'error' => $error,
                'statusCode' => 400,
                'status' => 'failed',
                'errorMessages' =>  [$error]
            ], 400);
        }
    }


    /**
     * Delete student details by studentId.
     *
     * @param
     * @return json  message, response, statusCode, status
     */
    public function delete(int $studentId)
    {
        try {
            $studentResult = student::find($studentId);

            if (empty($studentResult)) {
                return response()->json([
                    'message' => 'student deletion failed.',
                    'error' => "No results found for delete `{$studentId}`.",
                    'statusCode' => 400,
                    'status' => 'failed',
                    'errorMessages' =>  ["No results found for delete `{$studentId}`."]
                ], 400);
            }

            $deletedResponse = tap($studentResult)->delete();

            return redirect('student/list');
        } catch (\Exception $e) {
            $error = [
                'errorMessage' => $e->getMessage(),
                'filePath' => $e->getFile(),
                'lineNumber' => $e->getLine(),
            ];

            return response()->json([
                'message' => 'student deletion failed.',
                'error' => $error,
                'statusCode' => 400,
                'status' => 'failed',
                'errorMessages' =>  [$error]
            ], 400);
        }
    }

    /**
     * check student data is valid
     *
     * @param $request
     * @return json  message, statusCode, status
     */
    public function validateStudent($request)
    {
        $data = $request->all();

        $validator = Validator::make(
            $data,
            [

                'Name' => 'required|max:255|string',
                'Age' => 'required|integer',
                'Gender' => 'required|string',
                'ReportingTeacherId' => 'required',

            ]
        );

        if ($validator->fails()) {
            $error = [
                'message' => 'student creation failed.',
                'error' => $validator->errors(),
                'statusCode' => 400,
                'status' => 'failed',
                'errorMessages' =>  $validator->errors()->all()
            ];
            return $error;
        }
    }
}

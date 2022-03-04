<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentMarks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentMarksController extends Controller
{
    /**
     * list StudentMarks details.
     *
     * @param
     * @return json  message, data, statusCode, status
     */
    public function list()
    {
        try {

            $response = StudentMarks::has('student')->orderBy('id', 'desc')->get();

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

        return view('studentMarkList')->with(array('response' => $response));
    }
    /**
     * Insert StudentMarks details.
     *
     * @param
     * @return  
     */
    public function insert(Request $request)
    {
        $student = Student::select('id', 'Name')->get();

        return view('studentMarksFrom')->with(array('student' => $student));
    }

    /**
     * create StudentMarks details.
     *
     * @param
     * @return   message, data, statusCode, status
     */
    public function create(Request $request)
    {
        try {

            $error = $this->validateStudentMarks($request);
            if (!empty($error['statusCode']) == 400) return response()->json($error, 400);

            $response = StudentMarks::create([
                'studentId' => $request->studentId,
                'termSelection' => $request->termSelection,
                'maths' => $request->maths,
                'science' => $request->science,
                'history' => $request->history,
            ]);

            return redirect('marks/list');
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
     * edit StudentMarks details.
     *
     * @param
     * @return json  message, data, statusCode, status
     */
    public function edit(Request $request, int $StudentMarksId)
    {

        $StudentMarks = StudentMarks::find($StudentMarksId);

        if (empty($StudentMarks)) {
            return response()->json([
                'message' => 'StudentMarks updation failed.',
                'error' => "No results found for update `{$StudentMarksId}`.",
                'statusCode' => 400,
                'status' => 'failed',
                'errorMessages' =>  ["No results found for update `{$StudentMarksId}`."]
            ], 400);
        }

        $student = Student::select('id', 'Name')->get();

        return view('markEdit')->with(array('StudentMarks' => $StudentMarks, 'student' => $student));
    }

    /**
     * Update StudentMarks details.
     *
     * @param
     * @return json  message, data, statusCode, status
     */
    public function update(Request $request, int $StudentMarksId)
    {
        try {


            $StudentMarks = StudentMarks::find($StudentMarksId);

            if (empty($StudentMarks)) {
                return response()->json([
                    'message' => 'StudentMarks updation failed.',
                    'error' => "No results found for update `{$StudentMarksId}`.",
                    'statusCode' => 400,
                    'status' => 'failed',
                    'errorMessages' =>  ["No results found for update `{$StudentMarksId}`."]
                ], 400);
            }

            // check StudentMarks data is valid
            $error = $this->validateStudentMarks($request);
            if (!empty($error['statusCode']) == 400) return response()->json($error, 400);

            $StudentMarksResponse = tap($StudentMarks)->update([
                'studentId' => $request->studentId,
                'termSelection' => $request->termSelection,
                'maths' => $request->maths,
                'science' => $request->science,
                'history' => $request->history,
            ]);

            return redirect('marks/list');
        } catch (\Exception $e) {
            $error = [
                'errorMessage' => $e->getMessage(),
                'filePath' => $e->getFile(),
                'lineNumber' => $e->getLine(),
            ];

            return response()->json([
                'message' => 'StudentMarks updation failed.',
                'error' => $error,
                'statusCode' => 400,
                'status' => 'failed',
                'errorMessages' =>  [$error]
            ], 400);
        }
    }


    /**
     * Delete StudentMarks details by StudentMarksId.
     *
     * @param
     * @return json  message, response, statusCode, status
     */
    public function delete(int $StudentMarksId)
    {
        try {
            $StudentMarksResult = StudentMarks::find($StudentMarksId);

            if (empty($StudentMarksResult)) {
                return response()->json([
                    'message' => 'StudentMarks deletion failed.',
                    'error' => "No results found for delete `{$StudentMarksId}`.",
                    'statusCode' => 400,
                    'status' => 'failed',
                    'errorMessages' =>  ["No results found for delete `{$StudentMarksId}`."]
                ], 400);
            }

            $deletedResponse = tap($StudentMarksResult)->delete();

            return redirect('marks/list');
        } catch (\Exception $e) {
            $error = [
                'errorMessage' => $e->getMessage(),
                'filePath' => $e->getFile(),
                'lineNumber' => $e->getLine(),
            ];

            return response()->json([
                'message' => 'StudentMarks deletion failed.',
                'error' => $error,
                'statusCode' => 400,
                'status' => 'failed',
                'errorMessages' =>  [$error]
            ], 400);
        }
    }

    /**
     * check StudentMarks data is valid
     *
     * @param $request
     * @return json  message, statusCode, status
     */
    public function validateStudentMarks($request)
    {
        $data = $request->all();

        $validator = Validator::make(
            $data,
            [
                'studentId' => 'required',
                'termSelection' => 'required|max:255|string',
                'maths' => 'required|integer',
                'science' => 'required|integer',
                'history' => 'required|integer'


            ]
        );

        if ($validator->fails()) {
            $error = [
                'message' => 'StudentMarks creation failed.',
                'error' => $validator->errors(),
                'statusCode' => 400,
                'status' => 'failed',
                'errorMessages' =>  $validator->errors()->all()
            ];
            return $error;
        }
    }
}

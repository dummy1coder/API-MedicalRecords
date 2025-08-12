<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MedicalRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicalrecords = MedicalRecord::latest()->get();
        
        if (is_null($medicalrecords->first())) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No medicalrecord found!',
            ], 200);
        }

        $response = [
            'status' => 'success',
            'message' => 'MedicalRecords are retrieved successfully.',
            'data' => $medicalrecords,
        ];

        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'diagnosis'=> 'required|string|',
            'medicines'=> 'required|string|',
            'tests'=>'required|string|',
            'allergies'=>'required|string|',
            'immunizations'=>'required|string|',
            'treatmentplan'=>'required|string|',
        ]);

        if($validate->fails()){  
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error!',
                'data' => $validate->errors(),
            ], 403);    
        }

        $medicalrecord = MedicalRecord::create($request->all());

        $response = [
            'status' => 'success',
            'message' => 'MedicalRecord is added successfully.',
            'data' => $medicalrecord,
        ];

        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $medicalrecord = MedicalRecord::find($id);
  
        if (is_null($medicalrecord)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'MedicalRecord is not found!',
            ], 200);
        }

        $response = [
            'status' => 'success',
            'message' => 'MedicalRecord is retrieved successfully.',
            'data' => $medicalrecord,
        ];
        
        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required'
        ]);

        if($validate->fails()){  
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error!',
                'data' => $validate->errors(),
            ], 403);
        }

        $medicalrecord = MedicalRecord::find($id);

        if (is_null($medicalrecord)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'MedicalRecord is not found!',
            ], 200);
        }

        $medicalrecord->update($request->all());
        
        $response = [
            'status' => 'success',
            'message' => 'MedicalRecord is updated successfully.',
            'data' => $medicalrecord,
        ];

        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $medicalrecord = MedicalRecord::find($id);
  
        if (is_null($medicalrecord)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Medicalrecord is not found!',
            ], 200);
        }

        MedicalRecord::destroy($id);
        return response()->json([
            'status' => 'success',
            'message' => 'MedicalRecord is deleted successfully.'
            ], 200);
    }

    /**
     * Search by a MedicalRecord name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        $medicalrecords = MedicalRecord::where('name', 'like', '%'.$name.'%')
            ->latest()->get();

        if (is_null($medicalrecords->first())) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No medicalrecord found!',
            ], 200);
        }

        $response = [
            'status' => 'success',
            'message' => 'MedicalRecord are retrieved successfully.',
            'data' => $medicalrecords,
        ];

        return response()->json($response, 200);
    }
}
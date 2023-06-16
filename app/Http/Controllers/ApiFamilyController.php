<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;

class ApiFamilyController extends Controller
{
    public function index()
    {
        $families = Family::all();

        return response()->json([
            'data' => $families,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required'
        ]);

        $family = Family::create($request->all());

        return response()->json([
            'message' => 'Family created successfully',
            'data' => $family,
        ], 201);
    }

    public function show($id)
    {
        $family = Family::find($id);

        if (!$family) {
            return response()->json([
                'message' => 'Family not found',
            ], 404);
        }

        return response()->json([
            'data' => $family,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required'
        ]);

        $family = Family::find($id);

        if (!$family) {
            return response()->json([
                'message' => 'Family not found',
            ], 404);
        }

        $family->update($request->all());

        return response()->json([
            'message' => 'Family updated successfully',
            'data' => $family,
        ]);
    }

    public function destroy($id)
    {
        $family = Family::find($id);

        if (!$family) {
            return response()->json([
                'message' => 'Family not found',
            ], 404);
        }

        $family->delete();

        return response()->json([
            'message' => 'Family deleted successfully',
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    function index()
    {
        $families = Family::get();

        return view('index', [
            'families' => $families,
        ]);
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required'
        ]);
        Family::create($request->all());
        return back()->with('success', 'success 😊');
    }

    function show($id)
    {

        return view('show', [
            'person' => Family::whereId($id)->first(),
            'families' => Family::get(),
        ]);

    }

    function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required'
        ]);
        Family::whereId($id)->update($request->all());
        return back()->with('success', 'success 😊');
    }

    function destroy($id)
    {
        Family::where('id', $id)->delete();
        return back()->with('success', 'success 😊');
    }
}

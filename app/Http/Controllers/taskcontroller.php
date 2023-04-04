<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {



        $tasks = DB::table('tasks')->get();
        // return view('with-controller.contact', compact('tasks'));

        return view('file.task', compact('tasks'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        DB::table('tasks')->insert([
            // 'name' => $_POST['name'],
            'name' => $request->name,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource
     */
    public function update(Request $request, string $id)
    {

        $tasks = DB::table('tasks')->where('id', $id)->get();

        DB::table('tasks')
            ->where('id', $id)
            ->update([
                'name' => $request->name
            ]);
        return view('front.update_task', compact('tasks'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('tasks')->where('id', $id)->delete();

        return redirect()->back();
    }
}

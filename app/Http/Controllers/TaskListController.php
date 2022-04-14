<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\{Request,Response};
use Illuminate\Support\Facades\Validator;

class TaskListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response(
            TaskList::with('category')
                ->get()
                ->jsonSerialize(), 
                Response::HTTP_OK)
            ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make(
            $request->all(),
            [
                'title' => 'required|max:255',
                'category_id' => 'required',
            ]
        )->validated();

        TaskList::create([
            'title' => $request->title,
            'is_active'=> true,
            'category_id' => $request->category_id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskList  $taskList
     * @return \Illuminate\Http\Response
     */
    public function show(TaskList $taskList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskList  $taskList
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskList $taskList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaskList  $taskList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskList $taskList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskList  $taskList
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        TaskList::destroy($id);
    }
}

<?php

namespace App\Http\Controllers;

use File;
use Exception;
use App\Models\Car;
use App\Models\Blog;
use App\Models\User;
use App\Models\CarImages;
use App\Models\CarRequest;
use App\Models\Notification;
use App\Models\ToolCategory;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Bool_;
use App\Http\Controllers\Controller;
use App\DataTables\ToolCategoryDataTable;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ToolCategoryDataTable $dataTable)
    {
        
        return $dataTable->render('pages.category.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            ToolCategory::create([
                'created_by' => auth()->user()->id ?? '',
                'title' => $request->title ?? '',
            ]);

            toastr()->success('Created Successfully');

            return redirect()->route('category.index');
        } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $blog = ToolCategory::find($id);
            return view('pages.category.show', compact('blog'));
        } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $blog = ToolCategory::find($id);

            return response()->json($blog);

       } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function categoryUpdate(Request $request)
    {
        try {
            $updatedRow = ToolCategory::find($request->updateId);
            $updatedRow->update([
                'title' => $request->title ?? '',
            ]);
        } catch (Exception $e) {
            toastr()->error($e->getMessage());
        }
        toastr()->success('Update Successfully');

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $imgRecord = ToolCategory::find($id);

            $imgRecord->delete();

            toastr()->success('Delete Successfully');

            return redirect()->route('category.index');

       } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

   
}

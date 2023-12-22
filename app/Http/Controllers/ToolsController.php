<?php

namespace App\Http\Controllers;

use File;
use Exception;
use App\Models\Car;
use App\Models\Blog;
use App\Models\Tool;
use App\Models\User;
use App\Models\CarImages;
use App\Models\CarRequest;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\DataTables\ToolsDataTable;
use PhpParser\Node\Expr\Cast\Bool_;
use App\Http\Controllers\Controller;
use Goutte\Client;

class ToolsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ToolsDataTable $dataTable)
    {
        
        return $dataTable->render('pages.tools.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $tool = Tool::find($id);
            return view('pages.tools.show', compact('tool'));
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
            $tool = Tool::find($id);

            if($tool->status == 'Activate')
            {
                $tool->update([
                    'status' => 'Deactivate'
                ]);
            }
            else{
                $tool->update([
                    'status' => 'Activate'
                ]);
            }
            toastr()->success('Update Successfully');
            return redirect()->back();
       } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function blogUpdate(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       //
    }

   
}

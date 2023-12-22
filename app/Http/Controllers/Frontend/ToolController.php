<?php

namespace App\Http\Controllers\Frontend;

use File;
use Exception;
use App\Models\Tool;
use App\Models\User;
use App\Models\ToolUser;
use App\Models\ToolsImage;
use App\Models\ToolCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ToolController extends Controller
{
    public function getForm()
    {
        // $user = User::find(1);
        // dd($user->tools()->wherePivot('filter', 'ss')->get());
        if(auth()->user())
        {
            $categories = ToolCategory::get();
            return view('frontend.add_new_tool', compact('categories'));
        } else {
            toastr()->error('First Login Then Submit New Tools');
            return redirect()->back();
        }
       
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'tool_categories_id' => ['required'],
            'description' => ['required'],
            'use_case1' => ['required'],
            'use_case2' => ['required'],
            'use_case3' => ['required'],
            'tags' => ['required'],
            'price' => ['required'],
            'website_link' => ['required'],
        ]);

        try {

            $newRecord = Tool::create([
                        'title' => $request->title ?? '',
                        'tool_categories_id' => $request->tool_categories_id ?? '',
                        'description' => $request->description ?? '',
                        'use_case1' => $request->use_case1 ?? '',
                        'use_case2' => $request->use_case2 ?? '',
                        'use_case3' => $request->use_case3 ?? '',
                        'tags' => $request->tags ?? '',
                        'price' => $request->price ?? '',
                        'website_link' => $request->website_link ?? '',
                    ]);

            if (!empty($request->images[0])) {
                foreach ($request->images as $image) {

                    $imgpath = public_path('images/');

                    $imageName = $image->getClientOriginalName();
                    $image->move($imgpath, $imageName);

                    ToolsImage::create([
                        'tool_id' => $newRecord->id ?? '',
                        'images' => $imageName ?? ''
                    ]);
                }
            }

            toastr()->success('Created Successfully');

            return redirect()->back();

        } catch (Exception $e) {
            
            toastr()->error($e);

            return redirect()->back();
        }
    }

    public function favorteTool(Request $request)
    {

        $isExist = ToolUser::where('tool_id', $request->toolId)->where('user_id', auth()->user()->id)->first();

        if($isExist) {
            return response()->json('false');
        } else {
            ToolUser::create([
                'tool_id' => $request->toolId,
                'user_id' => auth()->user()->id,
                'filter' => 'favorte_tool',
            ]);
            return response()->json('true');
        }
    }
}

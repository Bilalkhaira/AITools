<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Tool;
use App\Models\ToolsImage;
use App\Models\ToolCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // $tools = Tool::with('images')->where('status', 'Activate')->paginate(3);
        $tools = Tool::with('images')->where('status', 'Activate')->get();
        $categories = ToolCategory::get();
        return view('frontend.home', compact(['tools', 'categories']));
    }

    public function filterTools(Request $request)
    {
        
        $tools = Tool::where('price', $request->filter)->orWhere('tool_categories_id', $request->filter)->get();

        foreach($tools as $key=>$tool){
            $image = ToolsImage::where('tool_id', $tool->id)->first();
            $tools[$key]['imgUrl'] = asset('images/frontend/').'/'.$image->images;
        }
        
        return response()->json($tools);
    }

    public function filterByInput(Request $request)
    {
        $tools = Tool::where('title', 'LIKE', '%' . $request->filter . '%')
                    ->orWhere('description', 'LIKE', '%' . $request->filter . '%')
                    ->orWhere('use_case1', 'LIKE', '%' . $request->filter . '%')
                    ->orWhere('use_case3', 'LIKE', '%' . $request->filter . '%')
                    ->orWhere('use_case3', 'LIKE', '%' . $request->filter . '%')
                    ->get();
                    
        foreach($tools as $key=>$tool){
            $image = ToolsImage::where('tool_id', $tool->id)->first();
            $tools[$key]['imgUrl'] = asset('images/frontend/').'/'.$image->images;
        }
        
        return response()->json($tools);
    }
}

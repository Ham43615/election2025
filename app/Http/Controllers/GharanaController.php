<?php

namespace App\Http\Controllers;

// use App\Enums\StatusEnum;
// use App\Http\Requests\Categories\AddCategoryRequest;
// use App\Http\Requests\Categories\CategoriesRequest;
// use App\Http\Requests\Categories\DeleteCategoryRequest;
// use App\Http\Requests\Categories\EditCategoryRequest;
// use App\Http\Resources\ResourceCategory;
// use App\Http\Resources\ResourceFeature;
// use App\Models\Category;
use App\Models\DB1;

// use App\Repositories\CategoryRepo;
// use App\Repositories\FeatureRepo;
use Illuminate\Http\Request;
// use Yajra\DataTables\DataTables;

class GharanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $gharana_array = explode(",", $request->gharana);

        $models = DB1::all();
        if($request->gharana && $request->block){
            $models = DB1::whereIn('gharana',$gharana_array)->where('block',$request->block)->orderBy('order')->get();
        }
        // dd($model);
        return view('gharana',compact('models'));

    }

    public function multi_cnic(Request $request)
    {
        $cnic_array = explode(",", $request->cnic);


        $models = DB1::whereIn('cnic',$cnic_array)->orderBy('order')->get();

        // dd($model);
        return view('gharana',compact('models'));

    }


    public function search(Request $request)
    {
        // dd($request->gharana);

        $models = DB1::distinct()->pluck('block');



        // dd($model);
        return view('search',compact('models'));

    }



    public function cnic(Request $request)
    {
        $models = DB1::where('cnic',$request->cnic)->orderBy('order')->get();
        if(count($models)){
            $models = DB1::where('block',$models[0]["block"])->where('gharana',$models[0]["gharana"])->orderBy('order')->get();
        }
        return view('gharana',compact('models'));

    }

}

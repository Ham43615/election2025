<?php

namespace App\Http\Controllers;
// use Yajra\DataTables\Facades\DataTables;
// use DataTables;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;


use App\Models\DB2;
use Carbon\Carbon;

use Illuminate\Http\Request;


class GharanaController1 extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $gharana_array = explode(",", $request->gharana);

        $models = DB2::where('block',$request->block)->orderBy('order')->get();
        if($request->gharana && $request->block){
            $models = DB2::whereIn('gharana',$gharana_array)->where('block',$request->block)->orderBy('order')->get();
        }
        // dd($model);
        return view('latest_gharana',compact('models'));

    }



    


    public function multi_cnic(Request $request)
    {
        $cnic_array = explode(",", $request->cnic);


        $models = DB2::whereIn('cnic',$cnic_array)->orderBy('order')->get();
        DB2::whereIn('cnic',$cnic_array)->orderBy('order')
        ->update(['status' => 1,'updated_at'=>Carbon::now()]);
        // dd($model);
        return view('latest_gharana',compact('models'));

    }


    public function search(Request $request)
    {
        // dd($request->gharana);
       

        $options = DB2::distinct()->pluck('block');


        // dd($model);
        return view('search1',compact('options'));

    }



    public function cnic(Request $request)
    {
        $models = DB2::where('cnic',$request->cnic)->orderBy('order')->get();
        if(count($models)){
            $models = DB2::where('block',$models[0]["block"])
            ->where('gharana',$models[0]["gharana"])
            ->orderBy('order') ->get();

            DB2::where('block',$models[0]["block"])->where('gharana',$models[0]["gharana"])
            ->orderBy('order')->update(['status' => 1,'updated_at'=>Carbon::now()]);

        }
        return view('latest_gharana',compact('models'));

    }



    public function cnicBlock(Request $request)
    {
         $models = DB2::where('block',$request->block_code)
            ->where('gharana',$request->gharana)
            ->orderBy('order') ->get();
         
        return view('latest_gharana',compact('models'));

    }

    public function getData( )
    {
        // $product = DB2::distinct()->pluck('block');

        $counts = DB2::select('block',
        DB2::raw('SUM(CASE WHEN gender =  0  THEN 1 ELSE 0 END) AS male_count'),
        DB2::raw('SUM(CASE WHEN gender =  1  THEN 1 ELSE 0 END) AS female_count'),
        DB2::raw('SUM(CASE WHEN gender =  1 AND status=1 THEN 1 ELSE 0 END) AS female_count_status'),
        DB2::raw('SUM(CASE WHEN gender =  0 AND status=1 THEN 1 ELSE 0 END) AS male_count_status'))->groupBy('block')->get();

        // $counts_status = DB2::select('block',
        // DB2::raw('SUM(CASE WHEN gender =  0 AND status=1 THEN 1 ELSE 0 END) AS male_count'),
        // DB2::raw('SUM(CASE WHEN gender =  1 AND status=1  THEN 1 ELSE 0 END) AS female_count'))->groupBy('block')->get();



        $totalRecords = DB2::count();
        $total_issue_vote = DB2::where('status',1)->count();
        $total_vote_male = DB2::where('gender',0)->count();
        $total_vote_female = DB2::where('gender',1)->count();
        $issue_vote_male = DB2::where('status',1)->where('gender',0)->count();
        $issue_vote_female = DB2::where('status',1)->where('gender',1)->count();
        // $total_issue_vote = DB2::where('status',1)->count();


        $stat = [
            'totalrecords' => $totalRecords,
            'total_issue_vote' => $total_issue_vote,
            'total_vote_male' => $total_vote_male,
            'total_vote_female' => $total_vote_female,
            'issue_vote_male' => $issue_vote_male,
            'issue_vote_female' => $issue_vote_female
        ];

        return response()->json(['counts'=>$counts,'stat'=>$stat]);

        // return Response()->json($product);
    }

    public function test($id){

        $models = DB2::where('block',$id)->where('status',0)->orWhereNull('status')->orderBy('order')->get();
        return view('latest_gharana',compact('models'));
    }
}

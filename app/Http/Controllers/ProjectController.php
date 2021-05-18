<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Bid;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProjectController extends Controller
{

    public function showactiveproject()
    {
        $date = Carbon::now();
        $data = project::where('status', 'active')->where($date, '>=', 'tanggal_akhir_bid')->orderBy('created_at', 'DESC')->get();
        return response($data, 201);
    }
    public function showonprogressproject()
    {
        $data = project::where('status', 'on progress')->orderBy('created_at', 'DESC')->get();
        return response($data, 201);
    }
    public function showdoneproject()
    {
        $data = project::where('status', 'done')->orderBy('created_at', 'DESC')->get();
        return response($data, 201);
    }
    public function createBid(Request $request)
    {
        $bid = new bid;
        $bid->user_id = $request->input('user_id');
        $bid->project_id = $request->input('project_id');
        $bid->harga_tawar = $request->input('harga_tawar');
        $bid->save();
        return response($bid, 201);
    }

    public function updateBid(Request $request)
    {
        $bid_id = $request->id;
        bid::where('id', $bid_id)->update([
            'user_id' => $request->input('user_id'),
            'project_id' => $request->input('project_id'),
            'harga_tawar' => $request->input('harga_tawar'),
        ]);
        return response(200);
    }
    public function deleteBid(Request $request)
    {
        $bid = bid::find($request->id);
        $bid->forceDelete();
        return response('bid Deleted', 200);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\teknisi  $teknisi
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\teknisi  $teknisi
     * @return \Illuminate\Http\Response
     */
    public function bid()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\teknisi  $teknisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\teknisi  $teknisi
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
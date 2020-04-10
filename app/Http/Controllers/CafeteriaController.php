<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kaiin;
use App\Models\Menu;
use App\Models\Uriage;
use DB;

class CafeteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = new Menu();
        $menuData = $menu->all();

        return response()->json(['menuData' => $menuData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $kid = $request->input('kid');
        $menuData = $request->input('menuData');
        $today = now();

        $uriage = new Uriage();
        foreach ($menuData as $data){
            if($data['kosu'] != 0){
                $uriage->create(['hi' => $today,'kid' => $kid,'mid' => $data['mid'],'kosu' => $data['kosu']]);
            }
        }

        return response()->json(['result' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($mid)
    {
        $menu = new Menu();
        $menuData = $menu->find($mid);

        return response()->json(['menuData' => $menuData]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $gid)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($gid)
    {
    }

    public function orderHistory($kid)
    {
        $uriage = new Uriage();
//        $historyData = $uriage
//            ->join('menu', 'menu.mid', '=', 'uriage.mid')
//            ->join('kaiin', 'kaiin.kid', '=', 'uriage.kid')
//            ->select(DB::raw('SUM(kosu) AS sumKosu,SUM(price*kosu) AS sumPrice,menu.mid,mname'))
//            ->where('kaiin.kid', '=', $kid)
//            ->groupBy('menu.mid','mname')
//            ->get();

        $historyData = $uriage
            ->join('menu', 'menu.mid', '=', 'uriage.mid')
            ->join('kaiin', 'kaiin.kid', '=', 'uriage.kid')
            ->where('kaiin.kid', '=', $kid)
            ->orderBy('hi', 'asc')
            ->orderBy('mname', 'desc')
            ->get();

        return response()->json(['historyData' => $historyData]);
    }
}
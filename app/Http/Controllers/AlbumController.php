<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
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
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $all_singer = Album::select('singer')->distinct()->get();

        return view('browse', compact('all_singer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        //
    }

    /**
     * Provide get most viewed and best saled album list to home page
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $sale = Album::select('coverimg_file', 'album_name')->limit(3)->orderBy('salenum', 'desc')->get();
        $view = Album::select('coverimg_file', 'album_name')->limit(3)->orderBy('viewnum', 'desc')->get();

        return view('home')->with('bestSale', $sale)->with('mostView', $view);
    }

    public function query()
    {
        
        if(isset($_GET['singer']) && isset($_GET['rank']) &&  isset($_GET['newest']))
        {
            $queryObj = Album::select('id', 'coverimg_file', 'album_name', 'singer', 'release', 'price');

            if($_GET['singer'] !== 'all'){
                $queryObj = $queryObj->where('singer', $_GET['singer']);
            }

            if($_GET['rank'] != '0' && ($_GET['rank'] == '1' || $_GET['rank'] == '2')){
                $queryObj = $queryObj->orderBy(($_GET['rank'] == '1')?'salenum':'viewnum', 'desc' );
            }

            $queryObj = $queryObj->orderBy('release', ($_GET['newest'] == '1')?'desc' : 'asc');

            $albumList = $queryObj->get();
        
            //dd($albumList[0]['singer']);
            if(count($albumList) == 0){
                abort(404);
            }

            return view('browseList', compact('albumList'));
        }
        else
            abort(403);
    }
}

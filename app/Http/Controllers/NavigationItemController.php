<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\NavigationItemResource;
use App\Models\NavigationItem;

class NavigationItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $navigation = NavigationItem::join('navigations','navigations.id','=','navigation_items.navigation_id')
        ->get([
            'navigations.name',
            'navigation_items.type',
            'navigation_items.type',
            'navigation_items.page_id',
            'navigation_items.url',
            'navigation_items.icon',
            'navigation_items.target',
            'navigation_items.parent_id',
            'navigation_items.position',
            'navigation_items.status',
            'navigation_items.css_class',
            'navigation_items.css_id'

        ]);
        return NavigationItemResource::collection($navigation);
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
        $navigation_item = new NavigationItem();
        $navigation_item->navigation_id = $request->navigation_id;
        $navigation_item->type = $request->type;
        $navigation_item->page_id = $request->page_id;
        $navigation_item->url = $request->url;
        $navigation_item->icon = $request->icon;
        $navigation_item->target = $request->target;
        $navigation_item->parent_id = $request->parent_id;
        $navigation_item->position = $request->position;
        $navigation_item->status = $request->status;
        $navigation_item->css_class = $request->css_class;
        $navigation_item->css_id = $request->css_id;


        if($navigation_item->save())
        {
            return new NavigationItemResource($navigation_item);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $navigation_item = NavigationItem::findOrFail($id);
        $navigation_item->navigation_id = $request->navigation_id;
        $navigation_item->type = $request->type;
        $navigation_item->page_id = $request->page_id;
        $navigation_item->url = $request->url;
        $navigation_item->icon = $request->icon;
        $navigation_item->target = $request->target;
        $navigation_item->parent_id = $request->parent_id;
        $navigation_item->position = $request->position;
        $navigation_item->status = $request->status;
        $navigation_item->css_class = $request->css_class;
        $navigation_item->css_id = $request->css_id;


        if($navigation_item->save())
        {
            return new NavigationItemResource($navigation_item);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $navigation_item = NavigationItem::findOrFail($id);
        if($navigation_item->delete())
        {
            echo "Successfully delete";
        }
    }
}

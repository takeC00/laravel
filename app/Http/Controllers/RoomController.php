<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Controllers\InterventionImage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $rooms = Room::all();
      return view('rooms.index')
        ->with('rooms', $rooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomRequest $request)
    {
      $filename=$request->image->getClientOriginalName();
      $img=$request->image->storeAs('',$filename, 'public'); 
      
      //Create使う場合
      Room::create([
        'name' => $request->name,
        'price' => $request->price,
        'introduction' => $request->introduction,
        'adress' => $request->adress,
        'image' => $img
      ]);

      //New->save する場合
      //$room = new Room;
      //$room->fill(
      //$request->safe(['name', 'price', 'introduction', 'adress', 'image'])
      //)->save();

      return redirect()
        ->route('rooms.index')
        ->with('feedback.success', "部屋の登録が完了しました");
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    { 
      return view('rooms.edit', ['room'=>$room]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRoomRequest $request, Room $room)
    {
      $filename=$request->image->getClientOriginalName();
      $img=$request->image->storeAs('',$filename, 'public'); 

      $room->name =$request->name;
      $room->price =$request->price;
      $room->introduction =$request->introduction;
      $room->adress =$request->adress;
      $room->image = $img;

      $room->save();

      //$room = Room::find($id);
      //$room->fill(
      //$request->safe(['name', 'price', 'introduction', 'adress', 'image'])
      //)->save();

      return redirect()
        ->route('rooms.index')
        ->with('feedback.success', "部屋の編集が完了しました");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
      $room->delete();
      return redirect()->route('rooms.index')->with('success', '削除完了しました');
    }
};
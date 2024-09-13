<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
class PeopleController extends Controller
{
    public function getAllPeoples() {
        // logic to get all People goes here
        $peoples = People::get()->toJson(JSON_PRETTY_PRINT);
        return response($peoples, 200);
      }
  
      public function createPeople(Request $request) {
        // logic to create a People record goes here
        $people = new People;
        $people->name = $request->name;
        $people->email = $request->email;
        $people->save();
    
        return response()->json([
            "message" => "people record created"
        ], 201);
      }
  
      public function getPeople($id) {
        // logic to get a People record goes here
        if (People::where('id', $id)->exists()) {
            $people = People::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($people, 200);
          } else {
            return response()->json([
              "message" => "People not found"
            ], 404);
          }
      }
  
      public function updatePeople(Request $request, $id) {
        // logic to update a People record goes here
        if (People::where('id', $id)->exists()) {
            $people = People::find($id);
            $people->name = is_null($request->name) ? $people->name : $request->name;
            $people->email = is_null($request->email) ? $people->course : $request->email;
            $people->save();
    
            return response()->json([
                "message" => "records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "People not found"
            ], 404);
            
        }
      }
  
      public function deletePeople ($id) {
        // logic to delete a People record goes here

        if(People::where('id', $id)->exists()) {
            $people = People::find($id);
            $people->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "People not found"
            ], 404);
          }
      }
}

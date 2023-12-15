<?php

namespace App\Http\Controllers\Api;

use App\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();

        if($teams->count() > 0){
            return response()->json([
                'status' => '200',
                'teams' => $teams
            ], 200);
        } else {
            return response()->json([
                'status' => '404',
                'message' => 'No teams found'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:2555',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => '422',
                'errors' => $validator->errors()
            ], 422);
        }else{
            $team = Team::create([
                'name' => $request->name,
                'description' => $request->description
            ]);

            if($team){
                return response()->json([
                    'status' => '200',
                    'message' => 'Team created successfully',
                ], 200);
            } else {
                return response()->json([
                    'status' => '500',
                    'message' => 'Team creation failed'
                ], 500);
            }
        }
    }

    public function show($id)
    {
        $team = Team::find($id);

        if($team){
            return response()->json([
                'status' => '200',
                'team' => $team
            ], 200);
        } else {
            return response()->json([
                'status' => '404',
                'message' => 'Team not found'
            ], 404);
        }
    }

    public function edit($id)
    {
        $team = Team::find($id);

        if($team){
            return response()->json([
                'status' => '200',
                'team' => $team
            ], 200);
        } else {
            return response()->json([
                'status' => '404',
                'message' => 'Team not found'
            ], 404);
        }
    }

    public function update(Request $request,int $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:2555',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => '422',
                'errors' => $validator->errors()
            ], 422);
        }else{
            $team = Team::find($id);

            if($team){
                $team->update([
                    'name' => $request->name,
                    'description' => $request->description
                ]);
    
                    return response()->json([
                        'status' => '200',
                        'message' => 'Team updated successfully',
                    ], 200);
            }else {
                return response()->json([
                    'status' => '500',
                    'message' => 'Team update failed'
                ], 500);
            }
        }
    }
    
    // public function destroy($id)
    // {
    //     $team = Team::find($id);

    //     if($team){
    //         $team->delete();

    //         return response()->json([
    //             'status' => '200',
    //             'message' => 'Team deleted successfully',
    //         ], 200);
    //     } else {
    //         return response()->json([
    //             'status' => '404',
    //             'message' => 'Team deletion failed'
    //         ], 404);
    //     }
    // }
}

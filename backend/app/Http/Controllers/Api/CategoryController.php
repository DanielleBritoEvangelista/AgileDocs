<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        if($categories->count() > 0){
            return response()->json([
                'status' => '200',
                'categories' => $categories
            ], 200);
        } else {
            return response()->json([
                'status' => '404',
                'message' => 'No categories found'
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
                'status' => '400',
                'errors' => $validator->errors()
            ], 422);
        }else{
            $category = Category::create([
                'name' => $request->name,
                'description' => $request->description
            ]);

            if($category){
                return response()->json([
                    'status' => '200',
                    'message' => 'Category created successfully',
                ], 200);
            } else {
                return response()->json([
                    'status' => '500',
                    'message' => 'Category creation failed'
                ], 500);
            }
        }
    }

    public function show($id)
    {
        $category = Category::find($id);

        if($category){
            return response()->json([
                'status' => '200',
                'category' => $category
            ], 200);
        } else {
            return response()->json([
                'status' => '404',
                'message' => 'Category not found'
            ], 404);
        }
    }

    public function edit($id)
    {
        $category = Category::find($id);

        if($category){
            return response()->json([
                'status' => '200',
                'category' => $category
            ], 200);
        } else {
            return response()->json([
                'status' => '404',
                'message' => 'Category not found'
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
                'status' => '400',
                'errors' => $validator->messages()
            ], 422);
        }else{

            $category = Category::find($id);

            if($category){
                $category->update([
                    'name' => $request->name,
                    'description' => $request->description
                ]);
    
                    return response()->json([
                        'status' => '200',
                        'message' => 'Category updated successfully',
                    ], 200);
            }else {
                return response()->json([
                    'status' => '500',
                    'message' => 'Category update failed'
                ], 500);
            }
        }
    }

    // public function destroy($id)
    // {
    //     $category = Category::find($id);

    //     if($category){
    //         $category->delete();

    //         return response()->json([
    //             'status' => '200',
    //             'message' => 'Category deleted successfully',
    //         ], 200);
    //     } else {
    //         return response()->json([
    //             'status' => '404',
    //             'message' => 'Category deletion failed'
    //         ], 404);
    //     }
    // }
}
<?php

namespace App\Http\Controllers\Api;

use App\Models\Document;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();

        if($documents->count() > 0){
            return response()->json([
                'status' => '200',
                'documents' => $documents
            ], 200);
        } else {
            return response()->json([
                'status' => '404',
                'message' => 'No documents found'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:2555',
            'category_id' => 'required|exists:categories,id',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => '400',
                'errors' => $validator->errors()
            ], 422);
        }else{
            $document = Document::create([
                'title' => $request->title,
                'content' => $request->content,
                'category_id' => $request->category_id,
            ]);

            if($document){
                return response()->json([
                    'status' => '200',
                    'message' => 'Document created successfully',
                ], 200);
            } else {
                return response()->json([
                    'status' => '500',
                    'message' => 'Document creation failed'
                ], 500);
            }
        }
    }

    public function show($id)
    {
        $document = Document::find($id);

        if($document){
            return response()->json([
                'status' => '200',
                'document' => $document
            ], 200);
        } else {
            return response()->json([
                'status' => '404',
                'message' => 'Document not found'
            ], 404);
        }
    }

    public function edit($id)
    {
        $document = Document::find($id);

        if($document){
            return response()->json([
                'status' => '200',
                'document' => $document
            ], 200);
        } else {
            return response()->json([
                'status' => '404',
                'message' => 'Document not found'
            ], 404);
        }
    }

    public function update(Request $request,int $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:2555',
            'category_id' => 'required|exists:categories,id',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => '422',
                'errors' => $validator->errors()
            ], 422);
        }else{

            $document = Document::find($id);

            if($document){
                $document->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'category_id' => $request->category_id,
                ]);
    
                    return response()->json([
                        'status' => '200',
                        'message' => 'Document updated successfully',
                    ], 200);
            }else {
                return response()->json([
                    'status' => '500',
                    'message' => 'Document update failed'
                ], 500);
            }
        }
    }
    
    // public function destroy($id)
    // {
    //     $document = Document::find($id);

    //     if($document){
    //         $document->delete();

    //         return response()->json([
    //             'status' => '200',
    //             'message' => 'Document deleted successfully',
    //         ], 200);
    //     } else {
    //         return response()->json([
    //             'status' => '404',
    //             'message' => 'Document deletion failed'
    //         ], 404);
    //     }
    // }
}

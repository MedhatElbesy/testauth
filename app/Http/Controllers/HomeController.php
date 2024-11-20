<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{


     // Method to handle image upload
public function upload(Request $request)
{
    if ($request->hasFile('upload')) {
        $file = $request->file('upload');

        // Get original file name and extension
        $originalName = $file->getClientOriginalName();
        $fileName = pathinfo($originalName, PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();

        // Generate a new unique file name
        $fileName = $fileName . '_' . time() . '.' . $extension;

        // Store the file in the 'media' folder in the public directory
        $file->move(public_path('media'), $fileName);

        // Get the URL of the uploaded image
        $url = asset('media/' . $fileName);

        // Return the response in CKEditor's expected format
        return response()->json([
            'uploaded' => 1,
            'fileName' => basename($fileName),
            'url' => $url
        ]);
    }

    // Return an error response if no file was uploaded
    return response()->json([
        'uploaded' => 0,
        'error' => ['message' => 'Image upload failed.']
    ]);
}



    // Method to save article
    public function create(Request $request)
    {
        $article = new Article;
        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();

        // Redirect back after saving
        return redirect()->back();
    }

//     public function upload(Request $request)
// {
//     if ($request->hasFile('upload')) {
//         $originalName = $request->file('upload')->getClientOriginalName();
//         $fileName = pathinfo($originalName, PATHINFO_FILENAME);
//         $extension = $request->file('upload')->getClientOriginalExtension();
//         $fileName = $fileName . '_' . time() . '.' . $extension;
//         $request->file('upload')->move(public_path('media'), $fileName);

//         $url = asset('media/' . $fileName);

//         // Return the response in CKEditor's expected format
//         return response()->json([
//             'uploaded' => 1,
//             'fileName' => basename($fileName),
//             'url' => $url
//         ]);
//     }

//     // Return an error response if the upload failed
//     return response()->json(['uploaded' => 0, 'error' => ['message' => 'Image upload failed.']]);
// }

//     public function create(Request $request){
//         $article = new Article;
//         $article->title = $request->title;
//         $article->content = $request->content;
//         $article->save();
//         return redirect()->back();
//     }


    public function show(){
        $article = Article::all();
        return view("show",compact('article'));
    }
}

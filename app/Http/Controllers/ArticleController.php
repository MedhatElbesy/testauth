<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
//    public function index()
// {
//     $articles = Article::all();
//     return view('articles.index', compact('articles'));
// }

// public function create()
// {
//     return view('articles.create');
// }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'title' => 'required|string|max:255',
//             'content' => 'nullable|string',
//             'image' => 'nullable|image|max:2048' // Validating the image
//         ]);

//         // Handle image upload if exists
//         $imagePath = null;
//         if ($request->hasFile('image')) {
//             $imagePath = $request->file('image')->store('article_images', 'public');
//             $contentWithImage = '<img src="' . asset('storage/' . $imagePath) . '" alt="Image"> ' . $request->content;
//         } else {
//             $contentWithImage = $request->content;
//         }

//         $article = Article::create([
//             'title' => $request->title,
//             'content' => $contentWithImage,
//         ]);

//         return response()->json($article, 201);
//     }
// public function edit($id)
// {
//     $article = Article::findOrFail($id);
//     return view('articles.edit', compact('article'));
// }
public function upload(Request $request)
{
    if ($request->hasFile('upload')) {
        $orginName = $request->file('upload')->getClientOriginalName();
        $fileName = pathinfo($orginName,PATHINFO_FILENAME);
        $extention = $request->fill('upload')->getClientOriginalExtension();
        $fileName = $fileName . '_' .time() . '.' . $extention;
        $request->fill('upload')->move(public_path('media'),$fileName);

        $url = asset('media/' . $fileName);

        // Return the response in CKEditor's expected format
        return response()->json([
            'uploaded' => 1,
            'fileName' => basename($fileName),
            'url' => $url
        ]);
    }

    // Return an error response if the upload failed
    return response()->json(['uploaded' => 0, 'error' => ['message' => 'Image upload failed.']]);
}

}

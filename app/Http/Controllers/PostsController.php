<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Posts;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostsController
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Posts::get();
        
        return view('Blogs.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = Posts::get();

        return view('Blogs.create' , compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image'
        ]);
        
        
        if ($request->hasFile('gambar')) {
            
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
        }
        
        $validated['user_id'] = Auth::id();
        $validated['gambar'] = $imageName;

        Posts::create($validated);
        return redirect()->route('blogs.index')->with('Berhasil', 'Blog Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Posts::find($id);
        $excerpts = Str::words($post->isi, 10);
        return view('Blogs.show', compact('post','excerpts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posts $blog)
    {
        $posts = Posts::get();

        if(Auth::id() !== $blog->user_id){
            abort(403);
        }
        return view('Blogs.edit', compact('blog','posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Posts $blog)
    {

        if(Auth::id() !== $blog->user_id){
            abort(403);
        }

        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $imageName = "";
        if ($request->hasFile('gambar')) {
            
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
        }

        
        if (!empty($imageName)) {
            $blog->update(["gambar" => $imageName]);
        }
        
        $blog->update([
             "judul" => $request->judul,
             "isi" => $request->isi,
         ]);

        return redirect()->route('blogs.index')->with('Berhasil', 'Blog Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $blog)
    {

        if(Auth::id() !== $blog->user_id){
            abort(403);
        }

        $blog->delete();
        return redirect()->route('blogs.index')->with('Berhasil', 'Blog Berhasil Dihapus');
    }


}

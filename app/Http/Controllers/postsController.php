<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Embed\Embed;
use Embed\Http\DispatcherInteface;
use Embed\Http\Url;
use Embed\Http\Response;
use Embed\Http\ImageResponse;
use Image;

class postsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return create view
        return view('posts.create');
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
            @csrf;

            $post = new Post;

            $body = $request->input('body');

        if (filter_var($body, FILTER_VALIDATE_URL) === FALSE) {

            $post->title = $request->input('title');

        If($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'images/' . time() . '.' . $image->getClientOriginalExtension();
            $location = public_path($filename);
            Image::make($image)->resize(800,400)->save($location);

            $post->image = $filename;
        };

            $post->body = $request->input('body');

        } else {
            
            $info = Embed::create($body, [
                'min_image_width' => 100,
                'min_image_height' => 100
            ]);

            //Get all providers
            $providers = $info->getProviders();
            //Get the oembed provider
            $oembed = $providers['oembed'];

            $post->title = $oembed->getTitle();

            $post->image = $info->image;

            $post->body = $info->code;
        }

            //dd($post);

            $post->save();

            return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find selected post in database
        $post = Post::find($id);

        // Return show view with data
        return view('posts.show')->withPost($post);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

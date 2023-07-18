<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class SummerController extends Controller
{
    public function create() :View
     {
        return view('summer');
     }
     public function store(Request $request)
     {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $description=$request->input('description');
        $dom = new \DomDocument();
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img){
            $data = $img->getAttribute('src');

            list($type, $data) = explode(';', $data);
            $data = base64_decode($data);

            $image_name= "/upload/" . time().$k.'.png';
            $path = public_path() . $image_name;

            file_put_contents($path, $data);

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }

        $description = $dom->saveHTML();
        $post = Post::create([
            'title' => $request->title,
            'description' => $description
        ]);
     }
}

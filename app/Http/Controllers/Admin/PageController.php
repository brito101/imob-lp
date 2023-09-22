<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CheckPermission;
use App\Helpers\TextProcessor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageRequest;
use App\Models\Image as ModelsImage;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Image;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        CheckPermission::checkAuth('Editar Página');

        $page = Page::first();

        if (!$page) {
            $page = Page::create(
                ['user_id' =>  Auth::user()->id],
            );
        }

        $images = ModelsImage::all();
        $preview = [];
        foreach ($images as $img) {
            $image = url('storage/page/slide/' . $img->photo);
            $preview[] = "<img src='{$image}' class='file-preview-image kv-preview-data' alt='Desert' title='Desert'>";
        }

        return view('admin.page.edit', compact('page', 'preview'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageRequest $request, string $id)
    {
        CheckPermission::checkAuth('Editar Página');
        $page = Page::find($id);
        $data = $request->all();

        $data = ['user_id' => Auth::user()->id];
        $data['benefits_video'] = $request->benefits_video;
        $data['pixel_header'] = $request->pixel_header;
        $data['pixel_body'] = $request->pixel_body;
        $data['keywords'] = $request->keywords;

        $logos = ['logo_header', 'logo_footer'];


        if ($request->slide) {
            ModelsImage::query()->delete();

            $rules = array(
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
            );

            $validator = Validator::make($request->slide, $rules);

            if ($validator) {
                foreach ($request->slide as $key => $img) {
                    $name = $key;
                    $extension = $img->extension();

                    $nameFile = "{$name}.{$extension}";
                    $i['photo'] = $nameFile;
                    $i['user_id'] =  Auth::user()->id;
                    $file = ModelsImage::create($i);
                    $file->save();

                    $destinationPath = storage_path() . '/app/public/page/slide/';

                    if (!file_exists($destinationPath)) {
                        mkdir($destinationPath, 755, true);
                    }

                    $img = Image::make($img);
                    $img->save($destinationPath . '/' . $nameFile);

                    if (!$img) {
                        return redirect()
                            ->back()
                            ->withInput()
                            ->with('error', 'Falha ao fazer o upload da imagem');
                    }
                }
            } else {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Falha ao fazer o upload das imagens do carrossel');
            }
        } else {
            ModelsImage::query()->delete();
        }

        foreach ($logos as $logo) {
            if ($request->hasFile($logo) && $request->file($logo)->isValid()) {
                $name = $logo;

                $imagePath = storage_path() . '/app/public/page/' . $page->$logo;

                if (File::isFile($imagePath)) {
                    unlink($imagePath);
                }

                $extension = $request->$logo->extension();
                $nameFile = "{$name}.{$extension}";

                $data[$logo] = $nameFile;

                $destinationPath = storage_path() . '/app/public/page';

                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 755, true);
                }

                $img = Image::make($request->$logo);
                $img->save($destinationPath . '/' . $nameFile);

                if (!$img) {
                    return redirect()
                        ->back()
                        ->withInput()
                        ->with('error', 'Falha ao fazer o upload da imagem');
                }
            } else {
                $data[$logo] = null;
            }
        }

        $texts = ['hero_text', 'benefits_text', 'features', 'conditions', 'tour', 'progress'];
        foreach ($texts as $text) {
            if ($request->$text) {
                $data[$text] = TextProcessor::store($text, 'page', $request->$text);
            }
        }

        $features = ['two_rooms', 'three_rooms', 'court', 'pool', 'childreen_pool', 'playground', 'party_room', 'gourmet', 'security', 'green_area', 'commerce'];

        foreach ($features as $feat) {
            $data[$feat] = $request->$feat == true ? 1 : 0;
        }

        if ($page->update($data)) {
            return redirect()
                ->route('admin.page.edit')
                ->with('success', 'Edição realizada!');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Erro ao editar!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

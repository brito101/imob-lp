<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CheckPermission;
use App\Helpers\TextProcessor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
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
        $page = Page::firstOrCreate(
            ['user_id' =>  Auth::user()->id],
        );
        return view('admin.page.edit', compact('page'));
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

        $logos = ['logo_header', 'logo_footer'];

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

        $texts = ['hero_text', 'benefits_text', 'conditions', 'tour'];
        foreach ($texts as $text) {
            if ($request->$text) {
                $data[$text] = TextProcessor::store($text, 'page', $request->$text);
            }
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

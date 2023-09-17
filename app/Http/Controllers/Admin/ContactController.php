<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CheckPermission;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use DataTables;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        CheckPermission::checkAuth('Listar Contatos');

        $contacts = Contact::all();

        if ($request->ajax()) {

            $token = csrf_token();

            return Datatables::of($contacts)
                ->addIndexColumn()
                ->addColumn('action', function ($row) use ($token) {
                    $btn = '<a class="btn btn-xs btn-primary mx-1 shadow" title="Editar" href="contacts/' . $row->id . '/edit"><i class="fa fa-lg fa-fw fa-pen"></i></a>' . '<form method="POST" action="contacts/' . $row->id . '" class="btn btn-xs px-0"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="' . $token . '"><button class="btn btn-xs btn-danger mx-1 shadow" title="Excluir" onclick="return confirm(\'Confirma a exclusão deste contato?\')"><i class="fa fa-lg fa-fw fa-trash"></i></button></form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.contacts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        CheckPermission::checkAuth('Criar Contatos');

        return view('admin.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        CheckPermission::checkAuth('Criar Contatos');

        $data = $request->all();

        $contact = Contact::create($data);

        if ($contact->save()) {
            return redirect()
                ->route('admin.contacts.index')
                ->with('success', 'Cadastro realizado!');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao cadastrar!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        CheckPermission::checkAuth('Editar Contatos');

        $contact = Contact::find($id);
        if (!$contact) {
            abort(403, 'Acesso não autorizado');
        }

        return view('admin.contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, $id)
    {
        CheckPermission::checkAuth('Editar Contatos');

        $contact = Contact::find($id);
        if (!$contact) {
            abort(403, 'Acesso não autorizado');
        }

        $data = $request->all();

        if ($contact->update($data)) {

            return redirect()
                ->route('admin.contacts.index')
                ->with('success', 'Atualização realizada!');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao atualizar!');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CheckPermission::checkAuth('Excluir Contatos');

        $contact = Contact::find($id);
        if (!$contact) {
            abort(403, 'Acesso não autorizado');
        }

        if ($contact->delete()) {
            return redirect()
                ->route('admin.contacts.index')
                ->with('success', 'Exclusão realizada!');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Erro ao excluir!');
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TableAuthor;
use App\Models\TableProduct;
use Illuminate\Http\Request;
use PharIo\Manifest\Author;
use Validator;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author = TableAuthor::latest()->paginate(15);
        return view('admin.Author.index', compact('author'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Author.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:table_authors,name'
            ],
            [
                'name.required' => 'Tên không được trống',
                'name.unique' => 'Tên không được trùng',
            ]
        );
        $input = $request->all();
        TableAuthor::create($input);
        return redirect()->route('admin.author')->with('flash_message', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = TableAuthor::find($id);
        return view('admin.author.show')->with([
            'contact' => $contact,
            'id' => $id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = TableAuthor::find($id);
        return view('admin.author.edit')->with([
            'contact' => $contact,
            'id' => $id
        ]);
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
        $contact = TableAuthor::find($id);
        if ($contact->name == $request->name) {
            $input = $request->all();
            $contact->update($input);
            return redirect()->route('admin.author')->with('flash_message', 'Cập nhật thành công !!!');
        } else {
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required|unique:table_authors,name'
                ],
                [
                    'name.required' => 'Tên không được trống',
                    'name.unique' => 'Tên không được trùng',
                ]
            );
            if ($validator->fails()) {
                return view('admin.author.edit')->with([
                    'contact' => $contact,
                    'id' => $id,
                    'nameloi' => $request->name,
                    'loi' => "Tên không được trùng",
                ]);
            } else {
                $input = $request->all();
                $contact->update($input);
                return redirect()->route('admin.author')->with('flash_message', 'Cập nhật thành công !!!');
            }
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
        $contact = TableAuthor::find($id)->delete();
        return redirect()->route('admin.author')->with('flash_message1', 'Xóa thành công !!!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TableCategory;
use Illuminate\Http\Request;

class CategorysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = TableCategory::latest()->paginate(15);
        return view('admin.Category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:table_categories,name'
        ],
        [
            'name.required'=>'Tên không được trống',
            'name.unique'=>'Tên không được trùng',
        ]);
        $input = $request->all();
        TableCategory::create($input);
        toastr()->success('Thêm thành công !!!');
        return redirect()->route('admin.category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = TableCategory::find($id);
        return view('admin.category.show')->with([
            'contact'=>$contact,
            'id'=>$id
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
        $contact = TableCategory::find($id);
        return view('admin.category.edit')->with([
            'contact'=>$contact,
            'id'=>$id
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
        $contact = TableCategory::find($id);
        if ($contact->name == $request->name) {
            $input = $request->all();
            $contact->update($input);
            toastr()->success('Cập nhật thành công !!!');
            return redirect()->route('admin.category');
        } else {
           
            $request->validate(
                [
                    'name' => 'required|unique:table_categories,name'
                ],
                [
                    'name.required' => 'Tên không được trống',
                    'name.unique' => 'Tên không được trùng',
                ]
            );

            $input = $request->all();
            $contact->update($input);
            toastr()->success('Cập nhật thành công !!!');           
            return redirect()->route('admin.category');
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
        $contact = TableCategory::find($id)->delete();
        return redirect()->route('admin.category');
    }
}

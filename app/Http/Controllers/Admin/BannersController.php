<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TableBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = TableBanner::latest()->paginate(15);
        return view('admin.Banner.index',compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Banner.add');
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
            'name'=>'required',
            'type'=>'required',
            'link'=>'required'
        ]);
        $getImages = '';
            if($request->hasFile('photo')){
                //Hàm kiểm tra dữ liệu
                
                $this->validate($request, 
                    [
                        'photo' => 'mimes:jpg,jpeg,png,gif|max:2048',
                    ],			
                    [
                        'photo.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                        'photo.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                    ]
                );
                $anh = $request->file('photo');
                $getImages = time().'-'.$anh->getClientOriginalName();
                $destinationPath = public_path('assets/images/upload/banner');
                $anh->move($destinationPath, $getImages);
            }
            $input = $request->all();
            $input['photo'] = $getImages;
            TableBanner::create($input);
            toastr()->success('Thêm thành công !!!');
        return redirect()->route('admin.banner');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = TableBanner::find($id);
        return view('admin.banner.edit')->with([
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
        $contact = TableBanner::find($id);
            if($request->hasFile('photo')){
                $this->validate($request, 
                    [
                        'photo' => 'mimes:jpg,jpeg,png,gif|max:2048',
                    ],			
                    [
                        'photo.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                        'photo.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                    ]
                );
                $getImages = DB::table('table_banners')->select('photo')->where('id',$id)->get();
                if($getImages[0]->photo != '' && file_exists(public_path('assets/images/upload/banner/'.$getImages[0]->photo)))
                {  
                    unlink(public_path('assets/images/upload/banner/'.$getImages[0]->photo));
                }
                $anh = $request->file('photo');
                $getImages = time().'-'.$anh->getClientOriginalName();
                $destinationPath = public_path('assets/images/upload/banner');
                $anh->move($destinationPath, $getImages);
            }
            $input = $request->all();
            $input['photo'] = $getImages;
            $contact->update($input);
            toastr()->success('Cập nhật thành công !!!');
        return redirect()->route('admin.banner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = TableBanner::find($id);
        $destinationPath = public_path('assets/images/upload/banner/'.$contact->photo);
        if(file_exists($destinationPath)){
            unlink(public_path('assets/images/upload/banner/'.$contact->photo));
        }
        $contact->delete();
        return redirect()->route('admin.banner')->with('flash_message1', 'Xóa thành công !!!');
    }
}

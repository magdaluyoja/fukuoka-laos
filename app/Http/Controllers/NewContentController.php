<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Content;
use App\Attachment;
use Session;



class NewContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Content::orderby("date","desc")->paginate(5);
        $paging = $contents->currentPage()."of".$contents->total();
        return view("admin.contents.index")->with("contents",$contents)->with("paging",$paging);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.contents.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $allowed_types=array(
            'image/jpeg',
            'image/png',
            'application/pdf',
        );

        $this->validate($request, array(
            "date"=>"required|date",
            "title"=>"required|max:255",
            "content_type"=>"required",
        ));

        $content = new Content;
        $content->date = $request->date;
        $content->title = $request->title;
        $content->content_type = $request->content_type;
        $content->contents = $request->contents;
        $content->save();

        $files =  $request->file('pdf_attachment');
        $names = [];
        foreach ($files as $file) {
            $filename = $file->getClientOriginalName();
            $file->move("uploads/".$request->content_type ,$filename);

            $attachment = new Attachment;
            $attachment->content_id = $content->id;
            $attachment->filename = $filename;
            $attachment->save();
        }

        Session::flash("success","新しいコンテンツが正常に保存されました.");
        return redirect()->route("contents.show", $content->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = Content::find($id);
        return view("admin.contents.show")->with("content",$content);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = Content::find($id);
        return view("admin.contents.edit")->with("content",$content);
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
        $content = Content::find($id);
        $this->validate($request, array(
            "date"=>"required|date",
            "title"=>"required|max:255",
            "content_type"=>"required"
        ));


        $content->date = $request->input("date");
        $content->title = $request->input("title");
        $content->content_type = $request->input("content_type");
        $content->contents = $request->input("contents");
        $content->save();

        $files =  $request->file('pdf_attachment');
        if(!is_null($files)){
            $names = [];
            $attachment = Attachment::where('content_id', $id);
            $attachment->delete();
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $file->move("uploads/".$request->content_type ,$filename);

                $attachment = new Attachment;
                $attachment->content_id = $content->id;
                $attachment->filename = $filename;
                $attachment->save();
            }
        }

        //store in the database
        Session::flash("success","コンテンツは正常に更新されました。");
        return redirect()->route("contents.show", $content->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Content::find($id);
        $content->delete();
        Session::flash("success","コンテンツは削除されました。");
        return redirect()->route("contents.index");
    }
}

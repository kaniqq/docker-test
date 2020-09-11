<?php

namespace App\Http\Controllers;
use App\Http\Requests\VideoRequest;
use Illuminate\Http\Request;
use App\Video;
use App\Comment;
class VideoController extends Controller
{
//    新しく動画を追加
    public function videoAdd( VideoRequest $request) {
        Video::create($request->all());
        $category = $request->category;

//        送り元のurlへリダイレクト
        return redirect("/category/$category");
    }
//    動画の削除
    public function videodelete( Request $request) {
//        該当動画のコメントを削除
        Comment::where('video_id',$request->video_id)->delete();
//        該当動画レコードを削除
        Video::where('id',$request->video_id)->delete();
        $category = $request->category;

//        送り元のurlへリダイレクト
        return redirect("/category/$category");
    }
}
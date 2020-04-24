<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoSaveRequest;
use App\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * @param PhotoSaveRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(PhotoSaveRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = storage_path('app/public/images/') . $request->id . '/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);

            $photo = new Photo;
            $photo->profile_id = $request->id;
            $photo->photo_url = 'images/' . $request->id . '/' . $filename;
            $photo->save();

            return response('Your photo succesfull upload');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $path = explode('/storage/', $request->path);
        $profile = Photo::where('photo_url', $path[1]);
        $profile->delete();
        return response('Your photo succesfull delete');
    }
}

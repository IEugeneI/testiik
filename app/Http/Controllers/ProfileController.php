<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileCreateRequest;
use App\Profile;
use Illuminate\Http\Request;
use Storage;

class ProfileController extends Controller
{
    protected $profile;

    /**
     * ProfileController constructor.
     * @param Profile $profile
     */
    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $profiles = $this->profile->with('photos')->get();
        foreach ($profiles as $profile) {
            if (0 == count($profile->photos)) {
                $profile->photos = getUrlToImage('images/default.jpg');
            } else {
                $profile->photos = getUrlToImage($profile->photos[0]['photo_url']);
            }
        }

        return view('welcome')->with(['profiles' => $profiles]);
    }

    /**
     * @param $profile
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($profile)
    {
        $profil = $this->profile->with('photos')->findOrFail($profile);
        if (0 != count($profil->photos)) {
            foreach ($profil->photos as $item) {
                $item['photo_url'] = getUrlToImage($item['photo_url']);
            }
        }

        return view('profile.edit')->with(['profile' => $profil]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * @param ProfileCreateRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(ProfileCreateRequest $request)
    {
        $profile = $this->profile::create($request->all());
        return view('profile.photos')->with(['id' => $profile->id]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\View\View
     */
    public function update(Request $request, $id)
    {
        $profile = $this->profile->findOrFail($id);
        $profile->fill($request->all())->save();
        return $this->index()->with(['status' => 'Profile updated!']);
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function destroy($id)
    {
        $profile = Profile::find($id);
        $profile->delete();
        return $this->index()->with(['status' => 'Profile deleted!']);
    }
}

<?php

namespace App\Http\Controllers\Adminka;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Media;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Traits\MediaTrait;

class ProjectController extends Controller
{
    use MediaTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderByDesc('id')->with('categories')->get();

        return view('dashboard.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('dashboard.projects.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $project = Project::create($request->all());

        //categories
        foreach ($request->categories as $category){
            $project->categories()->attach(['category_id' => $category]);
        }
        //media
        if (is_array($request->media) && count($request->media)>0 ) {
            $this->projectMediaAdd($request->media,$project);
        }

        return redirect()->route('admin.projects.create');
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

    public function media($id)
    {
        $project = Project::with(['media'=>function($query){
                                                $query->orderBy('sort');
                                            }])
                            ->findOrFail($id);

        return view('dashboard.projects.media',compact('project'));
    }

    public function media_destroy($id)
    {
        $media = Media::findOrFail($id);

        $this->mediaDestroy($media->media);

        $media->delete();

        return redirect()->back();
    }

    public function media_add(Request $request,$id)
    {
        $this->validate($request,[
           'media.*' => 'mimes:jpg,jpeg,png,svg'
        ]);

        $project = Project::findOrFail($id);

        if (is_array($request->media) && count($request->media)>0 ) {
            $this->projectMediaAdd($request->media,$project);
        }

        return redirect()->back();
    }

    public function media_sort(Request $request,$id)
    {
        $loop = 0;
        foreach ($request->medias as $media){
            $media_u = Media::findOrFail($media);

            $media_u->update([
                'sort'=> $loop
            ]);
            $loop++;
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
        $project = Project::with('categories')->findOrFail($id);
        $categories = Category::all();

        return view('dashboard.projects.edit',compact('categories','project'));
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
        // return $request;
        $project = Project::find($id)->update($request->all());

        //categoriya
        Project::find($id)->categories()->sync($request->categories);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::with('media')->findOrFail($id);

        foreach ($project->media as $media) {
            $this->mediaDestroy($media->media);
        }

        $project->delete();

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Playlistvideo;
use App\Models\Tag;
use App\Models\Tagvideo;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {
        //

        // $search = $request->search;
        // if(!empty($search)) {
        //     $videos = Video::with('playlist')
        //     ->where('jdl_video', 'like', "%$search%")
        //     ->paginate(10);
        // } else {
        //     $videos = Video::with('playlist')->orderBy('tanggal', 'desc')->paginate(10);
        // }

        $search = $request->search;
        $tagvid = $request->tagvid;

        $query = Video::query();

        if (!empty($search)) {
            $query->where('tagvid', 'like', "%$search%");
        }

        if (!empty($tagvid)) {
            $query->where('sidebar', $tagvid);
        }

        $videos = $query->paginate(10);

        $tagvids = Video::select('tagvid')
                    ->groupBy('tagvid')
                    ->get();

        return view('administrator.video.index', compact(['videos', 'tagvids']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //
        $playlistvideos = Playlistvideo::all();
        $tagvids = Tagvideo::orderBy('nama_tag', 'desc')->get();

        return view('administrator.video.create', compact(['playlistvideos', 'tagvids']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $validated = $request->validate([
            'jdl_video' => 'required|string|max:255',
            'id_playlist' => 'required|exists:playlist,id_playlist', // Tambahkan validasi untuk kategori
            'gbr_video' => 'nullable|file|mimetypes:image/jpeg,image/png,image/jpg,image/gif,video/mp4,video/avi,video/mpeg|max:20480',
            // 'video' => 'nullable',
            'video' => 'required|file|mimetypes:video/mp4,video/avi,video/mpeg|max:20480',
            'youtube' => 'required|url|max:255'
        ]);

        $jdl_video = $request->jdl_video;
        $keterangan = $request->keterangan;
        $gambarName = null;
        $videoName = null;

        $username = $request->username ?: 'admin';

        if($request->hasFile('gbr_video')) {
            $gbr_video = $request->file("gbr_video");
            $gambarName = $gbr_video->getClientOriginalName();
            $gbr_video->move("./foto_video/", $gambarName);
        }

        if($request->hasFile('video')) {
            $video = $request->file("video");
            $videoName = $video->getClientOriginalName();
            $video->move("./video_files/", $videoName);
        }

        if ($request->tagvid !=''){
            $tag_seo = $request->tagvid;
            $tagvid=implode(',',$tag_seo);
        }else{
            $tagvid = '';
        }

        Video::create([
            "jdl_video" => $jdl_video,
            "video_seo" => Str::slug($validated['jdl_video']),
            "id_playlist" => $validated['id_playlist'],
            "gbr_video" => $gambarName,
            "video" => $videoName,
            "keterangan" => $keterangan,
            "youtube" => $validated['youtube'],
            "tagvid" => $tagvid,
            "username" => $username,
            "tanggal" => now(),
            "jam" => now(),
            "hari" => now()->format('l')
        ]);

        return response()->json([
            'url' => route('administrator.video.index'),
            'success' => true,
            'message' => 'Data Video Berhasil Ditambah'
        ]);
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
    public function edit(string $id_video):View
    {
        //
        $videos = Video::where('id_video', $id_video)->firstOrFail();
        $playlistvideos = Playlistvideo::all();
        $tagvids = Tagvideo::all();
        return view('administrator.video.edit', compact(['videos', 'playlistvideos', 'tagvids']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_video)
    {
        //
        // dd($request);
        $validated = $request->validate([
            'jdl_video' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'id_playlist' => 'required|exists:playlist,id_playlist',
            'gbr_video' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'video' => 'nullable',
            'video' => 'nullable|file|mimetypes:video/mp4,video/avi,video/mpeg|max:20480',
            'youtube' => 'required|url|max:255'
        ]);

        $videos = Video::findOrFail($id_video);

        $jdl_video = $request->jdl_video;
        // $gambarName = null;

        $username = $request->username ?: 'admin';

        if ($request->tagvid !=''){
            $tag_seo = $request->tagvid;
            $tagvid=implode(',',$tag_seo);
        }else{
            $tagvid = '';
        }

        if($request->hasFile('gbr_video')) {
            $gbr_video = $request->file("gbr_video");
            $gambarName = $gbr_video->getClientOriginalName();
            $gbr_video->move("./foto_video/", $gambarName);
            $videos->gbr_video = $gambarName;
        }

        if($request->hasFile('video')) {
            $video = $request->file("video");
            $videoName = $video->getClientOriginalName();
            $video->move("./video_files/", $videoName);
        }

        $videos->update([
            "jdl_video" => $jdl_video,
            "video_seo" => Str::slug($validated['jdl_video']),
            "id_playlist" => $request->id_playlist,
            "tagvid" => $tagvid,
            "youtube" => $validated['youtube'],
            "keterangan" => $validated['keterangan'],
            "username" => $username,
            "tanggal" => now(),
            "jam" => now(),
            "hari" => now()->format('l'),
            "is_myskill" => $validated['is_myskill']
        ]);

        return response()->json([
            'url' => route('administrator.video.index'),
            'success' => true,
            'message' => 'Data Video Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_video)
    {
        //
        $videos = Video::findOrFail($id_video);
        $videos->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}

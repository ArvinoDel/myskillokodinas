<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\User;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class RatingController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $jml_rating = $request->jml_rating;

        $query = Rating::query();

        if (!empty($search)) {
            $query->where('jml_rating', 'like', "%$search%");
        }

        if (!empty($jml_rating)) {
            $query->where('jml_rating', $jml_rating);
        }

        $ratings = $query->paginate(10);

        $jml_ratings = Rating::select('jml_rating')
                    ->groupBy('jml_rating')
                    ->get();

        return view('administrator.rating.index', compact(['ratings', 'jml_ratings']));
    }

    public function create()
    {
        $users = User::all();
        $programs = Program::all();
        return view('administrator.rating.create', compact('users', 'programs'));
    }

    public function store(Request $request)
    {
        $jml_rating = $request->jml_rating;


        Rating::create([
            "jml_rating" => $jml_rating,
            "id" => $request->id,
            "id_program" => $request->id_program
        ]);

        return response()->json([
            'url' => route('administrator.rating.index'),
            'success' => true,
            'message' => 'Data Rating Berhasil Ditambah'
        ]);
    }

    public function edit($id_rating)
    {
        $ratings = Rating::findOrFail($id_rating);
        $users = User::all();
        $programs = Program::all();
        return view('administrator.rating.edit', compact('ratings', 'users', 'programs'));
    }

    public function update(Request $request, $id_rating)
    {
        $ratings = Rating::findOrFail($id_rating);

        $jml_rating = $request->jml_rating;

        $ratings->update([
            "id" => $request->id,
            "id_program" => $request->id_program,
            "jml_rating" => $jml_rating,
        ]);


        return response()->json([
            'url' => route('administrator.rating.index'),
            'success' => true,
            'message' => 'Data Rating Berhasil Diperbarui'
        ]);
    }

    public function destroy($id)
    {
        $rating = Rating::findOrFail($id);
        $rating->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
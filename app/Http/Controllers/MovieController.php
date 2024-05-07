<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class MovieController extends Controller
{
    public function movie(Request $request)
    {

        $query = Movie::query();

        // キーワードでの検索
        if ($request->has('keyword') && $request->keyword !== '') {
            $query->where(function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->keyword . '%')
                    ->orWhere('description', 'like', '%' . $request->keyword . '%');
            });
        }

        // 上映状況でフィルタリング
        if ($request->has('is_showing') && $request->is_showing !== 'all') {
            $query->where('is_showing', $request->is_showing);
        }

        $movies = $query->paginate(20);
        return view('movie', ['movies' => $movies]);
    }

    public function movies(Request $request)
    {
        // $adminMovies = Movie::all();
        // return view('admin.movies', ['adminMovies' => $adminMovies]);

        $query = Movie::query();

        // キーワードでの検索
        if ($request->has('keyword') && $request->keyword !== '') {
            $query->where(function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->keyword . '%')
                    ->orWhere('description', 'like', '%' . $request->keyword . '%');
            });
        }

        // 上映状況でフィルタリング
        if ($request->has('is_showing') && $request->is_showing !== 'all') {
            $query->where('is_showing', $request->is_showing);
        }

        $adminMovies = $query->paginate(20);
        return view('admin.movies', ['adminMovies' => $adminMovies]);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:movies|max:255',
            'image_url' => 'required|url',
            'published_year' => 'required|integer',
            'is_showing' => 'sometimes|boolean',
            'description' => 'required'
        ]);

        $movie = new Movie([
            'title' => $request->input('title'),
            'image_url' => $request->input('image_url'),
            'published_year' => $request->input('published_year'),
            'is_showing' => $request->has('is_showing') ? 1: 0,
            'description' => $request->input('description')
        ]);

        if ($movie->save()) {
            return redirect()->route('admin.movies')->with('success', '映画が正常に登録されました。');
        } else {
            return redirect()->route('create')->withErrors('保存に失敗しました。再度お試しください。');
        }
    }

    public function edit($id)
    {
        $movie = Movie::find($id);
        return view('admin.edit', ['movie' => $movie]);
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);

        $request->validate([
            'title' => 'required|unique:movies,title,' . $id . ',id',
            'image_url' => 'required|url',
            'published_year' => 'required|integer',
            'is_showing' => 'sometimes|boolean',
            'description' => 'required'
        ]);

        $movie->update([
            'title' => $request->title,
            'image_url' => $request->image_url,
            'published_year' => $request->published_year,
            'is_showing' => $request->is_showing,
            'description' => $request->description
        ]);

        return redirect()->route('admin.movies')->with('success', '映画が更新されました。');


    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return redirect()->route('admin.movies')->with('success', '映画が正常に削除されました。');
    }

}

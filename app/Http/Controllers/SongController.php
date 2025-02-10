<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSongRequest;
use App\Http\Requests\UpdateSongRequest;
use App\Http\Resources\SongResource;
use App\Http\Resources\SongCollection;
use App\Models\Song;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class SongController extends Controller
{
    public function index()
    {
        return new SongCollection(
            Song::with(['album'])->paginate(12)
        );
    }

    public function store(StoreSongRequest $request)
    {
        $validated = $request->validated();

        $song = Song::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'url' => $validated['url'],
            'album_id' => $validated['albumId'],
            'image' => $validated['image'],
            'user_id' => Auth::id(), 
        ]);

        return response()->json([
            'message' => 'Song created successfully',
            'data' => $song->load(['album'])
        ], 201);
    }

    public function show(Song $song)
    {
        return new SongResource(
            $song->load(['album'])
        );
    }

    public function update(UpdateSongRequest $request, Song $song)
    {
        if (Auth::user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $validated = $request->validated();

        $song->fill([
            'name' => $validated['name'] ?? $song->name,
            'description' => $validated['description'] ?? $song->description,
            'url' => $validated['url'] ?? $song->url,
            'album_id' => $validated['albumId'] ?? $song->album_id,
            'image' => $validated['image'] ?? $song->image,
        ])->save();

        return response()->json([
            'message' => 'Song updated successfully',
            'data' =>  new SongResource($song->load(['album']))
        ]);
    }

    public function destroy(Song $song)
    {
        if (Auth::user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $song->delete();

        return response()->json([
            'message' => 'Song deleted successfully'
        ]);
    }

    public function byAlbum($albumId)
    {
        return new SongCollection(
            Song::with(['album'])
                ->where('album_id', $albumId)
                ->get()
        );
    }
}

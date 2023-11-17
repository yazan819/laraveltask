<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Faker\Core\File as FakerFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;



class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        return view('netflix.index', ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('netflix.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'movie_name' => 'required',
            'movie_description' => 'required',
            'movie_gener' => 'required', // Corrected field name
            'movie_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Validate image upload
        ]);

        // Handle image upload
        if ($request->hasFile('movie_img')) {
            $image = $request->file('movie_img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName); // Store the image in the public/images directory

            // Add the image name to the data array
            $data['movie_img'] = $imageName;
        }

        $newFilms = Movie::create($data);
        return redirect(route('netflix.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        return view('netflix.edit', ['movie' => $movie]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $data = $request->validate([
            'movie_name' => 'required',
            'movie_description' => 'required',
            'movie_gener' => 'required',
            'movie_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Allow null or image upload
        ]);

        // Check if a new image file is provided
        if ($request->hasFile('movie_img')) {
            // Delete the existing image file
            $destination_path = 'public/images/' . $movie->movie_img;
            if (File::exists($destination_path)) {
                File::delete($destination_path);
            }

            // Upload the new image file
            $image = $request->file('movie_img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);

            // Update the data array with the new image name
            $data['movie_img'] = $imageName;
        }

        $movie->update($data);
        return redirect(route('netflix.index'))->with('success', 'movie update succesffully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        // Get the path to the image in the storage directory
        $imagePath = 'public/images/' . $movie->movie_img;

        // Check if the image exists in storage before attempting to delete
        if (Storage::disk('local')->exists($imagePath)) {
            // Delete the image from storage
            Storage::disk('local')->delete($imagePath);
        }

        $movie->delete();
        return redirect(route('netflix.index'))->with('success', 'movie delete succesffully');
    }
}

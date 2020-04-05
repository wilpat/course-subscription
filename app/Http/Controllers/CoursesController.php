<?php

namespace App\Http\Controllers;

use App\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Courses::paginate(10);
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function show(Courses $course)
    {
        return view('courses.course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit(Courses $courses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courses $courses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courses $course)
    {
        //
    }

    /**
     * Display an episode of this course
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function episode(Courses $course, $episodeNumber)
    {
        $video = $course->videos()->where('episode_number', $episodeNumber)->first();

        $nextVideo = $course->videos()->where('episode_number', $episodeNumber+1)->first();
        $nextVideoUrl = $nextVideo->url ?? null;

        $breadCrumbs = [
            [
                'text' => 'Browse',
                'href' => route('courses.index')
            ],
            [
                'text' => $course->title,
                'href' => route('course.show', $course)
            ],
            [
                'text' => $video->title,
                'active' => true
            ]
        ];

        return view('courses.course.episode', compact('course', 'video', 'nextVideoUrl', 'breadCrumbs'));
    }
}

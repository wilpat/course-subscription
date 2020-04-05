<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::paginate(10);
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
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('courses.course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }

    /**
     * Display an episode of this course
     *
     * @param  \App\Course  $course
     * @param  String  $episodeNumber
     * @return \Illuminate\Http\Response
     */
    public function episode(Course $course, $episodeNumber)
    {
        $episode = $course->episodes()->where('episode_number', $episodeNumber)->first();

        $nextEpisode = $course->episodes()->where('episode_number', $episodeNumber+1)->first();
        $nextEpisodeUrl = $nextEpisode->url ?? null;

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
                'text' => $episode->title,
                'active' => true
            ]
        ];

        return view('courses.course.episode.show', compact('course', 'episode', 'nextEpisodeUrl', 'breadCrumbs'));
    }
}

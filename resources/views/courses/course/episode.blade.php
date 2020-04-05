@extends('layouts.app')

@section('content')
    <b-container>
        <section>
        <h1>Video player</h1>
        <b-breadcrumb :items="{{json_encode($breadCrumbs)}}"></b-breadcrumb>
        <video-player :next-video-url=`{{$nextVideoUrl}}` :video="{{$video}}" ></video-player>
        </section>
        <section class="mb-5 pt-5 text-center">
            <a href="#" class="text-decoration-none" style="color:black">
                <b-card class="mb-2 overflow-hidden" no-body>
                    <b-row no-gutters>
                        <b-col>
                            <h3 class="pt-3">
                                <strong>About this episode</strong>
                            </h3>
                            <b-card-body title="{{$video->title}}">
                                <b-card-text>
                                    {{ $video->description }}
                                </b-card-text>
                            </b-card-body>
                        </b-col>
                    </b-row>
                </b-card>
            </a>
        </section>
        <section class="mb-5">
            <h3 class="mb-3 text-center">Episodes</h3>
            <episode :videos="{{ $course->videos }}"></episode>
        </section>
    </b-container>
@endsection

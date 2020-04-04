@extends('layouts.app')

@section('content')
    <b-container>
        <section>
            <b-jumbotron>
                <template v-slot:header> {{$course->title}} </template>
                <template v-slot:lead> {{$course->description}} </template>

                <hr class="my-4">

                <b-button variant="primary" href="#"> Start Course </b-button>
                <b-button variant="success" href="#"> Subscribe </b-button>
            </b-jumbotron>
        </section>

        <section class="mb-5">
            <h3 class="mb-3 text-center">Episodes</h3>
            <episode :videos="{{ $course->videos }}"></episode>
        </section>
    </b-container>
@endsection

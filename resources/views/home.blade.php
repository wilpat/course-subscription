@extends('layouts.app')

@section('content')
<div class="container">
    <section>
        <div>
            <b-jumbotron header="Courses App" lead="Netflix for your mind's education">
            <b-button variant="primary" href="{{ route('courses.index') }}">Browse Courses</b-button>
            </b-jumbotron>
        </div>
    </section>

    <section>
        <div>
            <b-card-group deck>
                @foreach($featuredCourses as $course)
                {{-- <a href="{{ route('course.show', $course) }}" class="text-decoration-none" style="color:black"> --}}
                        <b-card title="{{ $course->title }}" img-src="{{$course->image}}" img-alt="Image" img-top>
                                <b-card-text>
                                    @php $excerpt = \Str::words($course->description, 10) @endphp
                                    {!! $excerpt !!}
                                </b-card-text>
                                <template v-slot:footer>
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </template>
                        </b-card>
                    {{-- </a> --}}
                @endforeach

            </b-card-group>
        </div>
    </section>
    <h3 class="my-3 text-center">Choose a plan that fits your needs.</h3>
    <pricing></pricing>
</div>
@endsection

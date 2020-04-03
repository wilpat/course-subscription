@extends('layouts.app')

@section('content')
<div class="container">
    <section>
        <div>
            <b-jumbotron header="BootstrapVue" lead="Bootstrap v4 Components for Vue.js 2">
                <p>For more information visit website</p>
            <b-button variant="primary" href="{{ route('courses.index') }}">Browse Courses</b-button>
            </b-jumbotron>
        </div>
    </section>

    <section>
        <div>
            <b-card-group deck>
                @foreach($featuredCourses as $course)
                    <b-card title="{{ $course->title }}" img-src="https://picsum.photos/300/300/?image=41" img-alt="Image" img-top>
                        <b-card-text>
                            {{ \Str::words($course->description, 10) }}
                        </b-card-text>
                        <template v-slot:footer>
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </template>
                    </b-card>
                @endforeach

            </b-card-group>
        </div>
    </section>
    <h3 class="my-3 text-center">Choose a plan that fits your needs.</h3>
    <pricing></pricing>
</div>
@endsection

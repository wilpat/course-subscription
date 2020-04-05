@extends('layouts.app')

@section('content')
<div class="container">
    <b-container>
        <section class="mb-5">
            <div>
                <b-row>
                    @foreach($courses as $course)
                        <b-col cols="4" class="mb-4">
                            <b-card title="{{ $course->title }}" img-src="https://picsum.photos/300/300/?image=41" img-alt="{{ $course->title }}" class="text-center" img-top>
                                <b-card-text>
                                    {{ \Str::words($course->description, 10) }}
                                </b-card-text>
                                <template v-slot:footer>
                                    <b-button href="{{ route('course.show', $course) }}" variant="primary">
                                        Play
                                    </b-button>
                                </template>
                            </b-card>
                        </b-col>
                    @endforeach
                </b-row>
            </div>
        </section>
    </b-container>
</div>
@endsection

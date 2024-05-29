@extends('layouts.app')

@section('content')
    <h2>Available Classes</h2>
    @foreach ($classrooms as $classroom)
        <div>
            <h3>{{ $classroom->name }}</h3>
            @foreach ($classroom->timetables as $timetable)
                <p>{{ $timetable->day_of_week }}: {{ $timetable->start_time }} - {{ $timetable->end_time }}</p>
            @endforeach
        </div>
    @endforeach
@endsection

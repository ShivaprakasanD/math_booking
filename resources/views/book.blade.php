@extends('layouts.app')

@section('content')
    <h2>Book a Class</h2>
    <form action="{{ route('book') }}" method="POST">
       <!-- // @csrf -->
        <div>
            <label>Classroom:</label>
            <input type="text" name="classroom" required>
        </div>
        <div>
            <label>Slot (YYYY-MM-DD HH:MM:SS):</label>
            <input type="text" name="slot" required>
        </div>
        <button type="submit">Book</button>
    </form>
@endsection

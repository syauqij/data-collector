@extends('layouts.app')

@section('header')
    @section('page_title', 'Forms')
    @include('partials.header')
@endsection

@section('content')
    <div class="px-4 py-6 sm:px-0">
        <a href="{{ route('form.create') }}" class="bg-blue-500 
            text-white px-4 py-3 rounded"> Create </a>
    </div>
@endsection
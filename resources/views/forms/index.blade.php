@extends('layouts.app')

@section('page_title', 'Forms')
@section('header')
    @section('page_header')
        <h1 class="text-3xl font-bold mr-4">Forms</h1>
        <a href="{{ route('form.create') }}" class="bg-red-700 
        text-white px-4 py-3 font-medium mt-1 rounded"> New Form </a>
    @endsection
    @include('partials.header')
@endsection

@section('content')
    @if ($forms->count())
        @foreach ($forms as $form)
            <div class="py-2">
                <a class="text-xl font-bold text-blue-500 mb-4"
                href="{{route('form.submit', $form->id)}}"> {{$form->title}} </a>
                <p class="text-gray-600">{{$form->desc}}</p>
                <p class="text-gray-500">{{$form->user->name}}</p>
            </div>
        @endforeach
    @else     
        There is no forms available.
    @endif
@endsection
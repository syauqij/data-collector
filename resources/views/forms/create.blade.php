@extends('layouts.app')

@section('content')

<div class="flex justify-center">
    <div class="bg-white p-6 rounded-lg w-full sm:w-10/12 lg:w-8/12">
        @livewire('create-form')
    </div>
</div>

@endsection
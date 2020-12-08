@extends('layouts.app')

@section('page_title')
    {{$form->title}}
@endsection

@section('content')

<div class="flex justify-center">
    <div class="bg-white p-6 rounded-lg w-full sm:w-10/12 lg:w-8/12">
        <form action="{{ route('form.submit', $form['_id']) }}" method="POST">
        @csrf

        <!-- Title -->
        <div class="flex flex-wrap -mx-3 mb-3">
            <div class="w-full px-3 text-4xl font-bold">
                {{ $form->title }}
            </div>
        </div>

        <!-- Description -->
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                {{ $form->desc}}
            </div>
        </div>

        <!-- Display fields -->
        @foreach ($form->fields as $field)
            @if ($field['type'] == "text")
                <div class="font-bold mb-2">
                    {{ $field['question'] }}
                </div>

                 <!--Text Answer -->
                @if (isset($field['long_text']))
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full px-3">
                        <textarea class="block w-full bg-gray-100 border border-gray-200 py-3 px-4 mb-3 
                        leading-tight focus:bg-white" id="answer-short" placeholder="Enter an answer"></textarea>
                    </div>
                </div>
                @else
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full px-3">
                        <input class="block w-full bg-gray-100 border border-gray-200 py-3 px-4 mb-3 
                        leading-tight focus:bg-white" id="answer-long" placeholder="Enter an answer">
                    </div>
                </div>
                @endif
            @endif

            @if ($field['type'] == "choice")
                <div class="font-bold mb-2">
                    {{ $field['question'] }}
                </div>

                <!--Text Answer -->
                @if (isset($field['long_text']))
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full px-3">
                        <textarea class="block w-full bg-gray-100 border border-gray-200 py-3 px-4 mb-3 
                        leading-tight focus:bg-white" id="answer" placeholder="Enter an answer"></textarea>
                    </div>
                </div>
                @else
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full px-3">
                        <input class="block w-full bg-gray-100 border border-gray-200 py-3 px-4 mb-3 
                        leading-tight focus:bg-white" id="answer" placeholder="Enter an answer">
                    </div>
                </div>
                @endif

                @foreach ($field['options'] as $option)
                    @if (isset($option))
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-6/12 px-3 mb-6 md:mb-0">
                            <input type="radio" class="bg-gray-100 h-5 w-5 border-2 mr-4"> 
                            Option {{ $option }}
                        </div>
                    </div>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- Submit Form-->
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-3 mt-5 rounded font-medium float-right">Submit</button>
        </div>

        </form>
    </div>
</div>

@endsection
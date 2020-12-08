@extends('layouts.app')

@section('content')

<div class="flex justify-center">
    <div class="bg-white p-6 rounded-lg w-full sm:w-10/12 lg:w-8/12">
        <form action="{{ route('form.create') }}" method="POST">
        @csrf

        <!-- Title -->
        <div class="flex flex-wrap -mx-3">
            <div class="w-full px-3">
                <input class="block w-full bg-gray-100 text-gray-700 border border-gray-200 py-3 px-4 mb-3 
                leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('title') border-red-500
                @enderror" type="text" name="title" id="title" placeholder="Enter form title" value="{{ old('title', 'Untitled form') }}">
            </div>

            @error('title')
                <div class="w-full px-3 text-red-500 text-sm mb-3">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Description -->
        <div class="flex flex-wrap -mx-3">
            <div class="w-full px-3">
                <input class="block w-full bg-gray-100 text-gray-700 border border-gray-200 py-3 px-4 mb-3 
                leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('desc') border-red-500
                @enderror" type="text" name="desc" id="desc" placeholder="Enter a description" value="{{ old('desc') }}">
            </div>

            @error('desc')
                <div class="w-full px-3 text-red-500 text-sm mb-3">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Add Fields Buttons-->
        <div class="mt-4 mb-10">
            <button type="button" class="bg-blue-500 text-white px-4 py-3 font-medium">Add new</button>
            <button type="button" class="bg-gray-500 text-white px-4 py-3 font-medium">Text</button>
            <button type="button" class="bg-gray-500 text-white px-4 py-3 font-medium">Choice</button>
        </div>

        <!-- Text Field-->

        <!-- Type -->
        <input type="hidden" name="fields[0][type]" value="text" >

        <!-- Text Question -->
        <div class="flex flex-wrap -mx-3">
            <div class="w-full px-3">
                <input class="block w-full bg-gray-100 text-gray-700 border border-gray-200 py-3 px-4 mb-3 
                leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('choice.0.question') border-red-500
                @enderror" type="text" name="fields[0][question]" id="fields.0.question" placeholder="Enter question title here"
                value="{{ old('fields.0.question', 'Question 1') }}">
            </div>

            @error('fields.0.question')
                <div class="w-full px-3 text-red-500 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!--Text Answer -->
        <div class="flex flex-wrap -mx-3">
            <div class="w-full px-3">
                <input class="block w-full bg-gray-200 border border-gray-200 py-3 px-4 mb-3 
                leading-tight" disabled="disabled" id="answer-short" placeholder="Enter an answer">
            </div>
        </div>

        <div class="flex flex-wrap -mx-3">
            <div class="w-full px-3">
                <textarea class="block w-full bg-gray-200 border border-gray-200 py-3 px-4 mb-3 
                leading-tight" disabled="disabled" id="answer-long" placeholder="Enter an answer"></textarea>
            </div>
        </div>

        <!-- Min & Max Char-->
        <div class="flex flex-wrap -mx-3 mb-2">
            <div class="w-3/4 md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="min-char">
                Min Characters
                </label>
                <input class="block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 
                leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('choice.0.question') border-red-500
                @enderror" type="text" name="fields[0][min_char]" id="fields.0.min_char" placeholder="Set minimum characters"
                value="{{ old('fields.0.min_char') }}">

                @error('fields.0.min_char')
                    <div class="w-full px-3 text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="w-3/4 md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="max-char">
                Max Characters
                </label>
                <input class="block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 
                leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('choice.0.question') border-red-500
                @enderror" type="text" name="fields[0][max_char]" id="fields.0.max_char" placeholder="Set maximum characters"
                value="{{ old('fields.0.max_char') }}">

                @error('fields.0.max_char')
                    <div class="w-full px-3 text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        
        <hr/>
        
        <!-- Text Field Option-->
        <div class="mb-6 text-right">
            <label class="inline-flex items-center mt-3">
                <input class="form-checkbox h-5 w-5 text-gray-600" name="fields[0][long_text]" type="checkbox" 
                {{ old('fields.0.long_text') ? 'checked' : '' }}>
                <span class="ml-2 text-gray-700 mr-6">Long Text</span>
            </label>
            <label class="inline-flex items-center mt-3">
                <input class="form-checkbox h-5 w-5 text-gray-600" name="fields[0][required]" type="checkbox"
                {{ old('fields.0.required') ? 'checked' : '', 'checked'}}>
                <span class="ml-2 text-gray-700">Required</span>
            </label>
        </div>

        <!-- Text Field-->

        <!-- Type -->
        <input type="hidden" name="fields[1][type]" value="text" >

        <!-- Text Question -->
        <div class="flex flex-wrap -mx-3">
            <div class="w-full px-3">
                <input class="block w-full bg-gray-100 text-gray-700 border border-gray-200 py-3 px-4 mb-3 
                leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('choice.1.question') border-red-500
                @enderror" type="text" name="fields[1][question]" id="fields.1.question" placeholder="Enter question title here"
                value="{{ old('fields.1.question', 'Question 2') }}">
            </div>

            @error('fields.1.question')
                <div class="w-full px-3 text-red-500 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!--Text Answer -->
        <div class="flex flex-wrap -mx-3">
            <div class="w-full px-3">
                <input class="block w-full bg-gray-200 border border-gray-200 py-3 px-4 mb-3 
                leading-tight" disabled="disabled" id="answer-short" placeholder="Enter an answer">
            </div>
        </div>

        <div class="flex flex-wrap -mx-3">
            <div class="w-full px-3">
                <textarea class="block w-full bg-gray-200 border border-gray-200 py-3 px-4 mb-3 
                leading-tight" disabled="disabled" id="answer-long" placeholder="Enter an answer"></textarea>
            </div>
        </div>

        <!-- Min & Max Char-->
        <div class="flex flex-wrap -mx-3 mb-2">
            <div class="w-3/4 md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="min-char">
                Min Characters
                </label>
                <input class="block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 
                leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('choice.1.question') border-red-500
                @enderror" type="text" name="fields[1][min_char]" id="fields.1.min_char" placeholder="Set minimum characters"
                value="{{ old('fields.1.min_char') }}">

                @error('fields.1.min_char')
                    <div class="w-full px-3 text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="w-3/4 md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="max-char">
                Max Characters
                </label>
                <input class="block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 
                leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('choice.1.question') border-red-500
                @enderror" type="text" name="fields[1][max_char]" id="fields.1.max_char" placeholder="Set maximum characters"
                value="{{ old('fields.1.max_char') }}">

                @error('fields.1.max_char')
                    <div class="w-full px-3 text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        
        <hr/>
        
        <!-- Text Field Option-->
        <div class="mb-6 text-right">
            <label class="inline-flex items-center mt-3">
                <input class="form-checkbox h-5 w-5 text-gray-600" name="fields[1][long_text]" type="checkbox" 
                {{ old('fields.1.long_text') ? 'checked' : '' }}>
                <span class="ml-2 text-gray-700 mr-6">Long Text</span>
            </label>
            <label class="inline-flex items-center mt-3">
                <input class="form-checkbox h-5 w-5 text-gray-600" name="fields[1][required]" type="checkbox"
                {{ old('fields.1.required') ? 'checked' : '', 'checked'}}>
                <span class="ml-2 text-gray-700">Required</span>
            </label>
        </div>
        
        <!-- Choice Field-->

        <!-- Type -->
        <input type="hidden" name="fields[2][type]" value="choice" >

        <!-- Choice Question -->
        <div class="flex flex-wrap -mx-3">
            <div class="w-full px-3">
                <input class="block w-full bg-gray-100 text-gray-700 border border-gray-200 py-3 px-4 mb-3 
                leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('choice.2.question') border-red-500
                @enderror" type="text" name="fields[2][question]" id="fields.2.question" placeholder="Enter question title here"
                value="{{ old('fields.2.question', 'Question 3') }}">
            </div>

            @error('fields.2.question')
                <div class="w-full px-3 text-red-500 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!--Choice Options -->
        <div class="flex flex-wrap -mx-3 mb-2">
            <div class="w-full md:w-6/12 px-3 mb-6 md:mb-0">
                <input type="radio" class="bg-gray-100 h-5 w-5 border-2 mr-4">
                <input class="w-10/12 bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 
                leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('fields.2.options.0') border-red-500
                @enderror" type="text" name="fields[2][options][]" id="fields.2.options.0" placeholder="Enter name for this option"
                value="{{ old('fields.2.options.0') }}">

                @error('fields.2.options.0')
                    <div class="w-full px-3 text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="w-full md:w-6/12 px-3 mb-6 md:mb-0">
                <input type="radio" class="bg-gray-100 h-5 w-5 border-2 mr-4">
                <input class="w-10/12 bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 
                leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('fields.2.options.1') border-red-500
                @enderror" type="text" name="fields[2][options][]" id="fields.2.options.1" placeholder="Enter name for this option"
                value="{{ old('fields.2.options.1') }}">

                @error('fields.2.options.1')
                    <div class="w-full px-3 text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-2">
            <div class="w-full md:w-6/12 px-3 mb-6 md:mb-0">
                <input type="radio" class="bg-gray-100 h-5 w-5 border-2 mr-4">
                <input class="w-10/12 bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 
                leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('fields.2.options.2') border-red-500
                @enderror" type="text" name="fields[2][options][]" id="fields.2.options.2" placeholder="Enter name for this option"
                value="{{ old('fields.2.options.2') }}">

                @error('fields.2.options.2')
                    <div class="w-full px-3 text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="w-full md:w-6/12 px-3 mb-6 md:mb-0">
                <input type="radio" class="bg-gray-100 h-5 w-5 border-2 mr-4">
                <input class="w-10/12 bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 
                leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('fields.2.options.3') border-red-500
                @enderror" type="text" name="fields[2][options][]" id="fields.2.options.3" placeholder="Enter name for this option"
                value="{{ old('fields.2.options.3') }}">

                @error('fields.2.options.3')
                    <div class="w-full px-3 text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <hr/>
        
        <!-- Text Field Option-->
        <div class="mb-6 text-right">
            <label class="inline-flex items-center mt-3">
                <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" name="fields[2][required]"
                {{ old('fields.2.required') ? 'checked' : '', 'checked'}}>
                <span class="ml-2 text-gray-700">Required</span>
            </label>
        </div>

        <!-- Submit Form-->
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Create</button>
        </div>

        </form>
    </div>
</div>

@endsection
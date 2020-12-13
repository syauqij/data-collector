<div>
<form action="{{ route('form.create') }}" method="POST">
    @csrf

    <!------------- Title ----------------------->
    <div class="flex flex-wrap -mx-3">
        <div class="w-full px-3">
            <input class="block w-full bg-gray-100 text-gray-700 border border-gray-200 py-3 px-4 mb-3 
                        leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    type="text"
                    name="title" 
                    placeholder="Enter form title" 
                    value="{{ old('title', 'Untitled form') }}">
        </div>

        @error('title')
            @include('partials.error_message')
        @enderror
    </div>

    <!------------- Description ------------------>
    <div class="flex flex-wrap -mx-3">
        <div class="w-full px-3">
            <input class="block w-full bg-gray-100 text-gray-700 border border-gray-200 py-3 px-4 mb-3
                        leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
                    type="text" 
                    name="desc"
                    placeholder="Enter a description" 
                    value="{{ old('desc') }}">
        </div>
    </div>

    <!------------- Add Fields Buttons ------------>
    <div class="mt-4 mb-6 text-right">
        <button wire:click.prevent="addField('text')"
                class="bg-gray-600 text-white hover:bg-red-600 pr-4 pl-3 py-3 font-medium">
            + Text
        </button>
        <button wire:click.prevent="addField('option')"
                class="bg-gray-600 text-white hover:bg-red-600 pr-4 pl-3 py-3 font-medium">
            + Option
        </button>
    </div>

    <!------------- Added Fields ------------------->
    @foreach ($formFields as $indexField => $field)
    
    <div class="my-12">
        <?php $fieldType = $field['type'] ?>
        
        <!-- Field Order -->
        <input type="hidden" name="fields[{{$indexField}}][order]" value="text" >

        @if ($fieldType == 'text')
            <!-- Type -->
            <input type="hidden" name="fields[{{$indexField}}][type]" value="text" >
            
            <!-- Text Question -->
            <div class="flex flex-wrap -mx-3">
                <div class="w-full px-3">
                    <input class="block w-full bg-gray-100 text-gray-700 border border-gray-200 py-3 px-4 mb-3 
                                leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
                            wire:model="formFields.{{$indexField}}.question"
                            name="fields[{{$indexField}}][question]" 
                            type="text" 
                            placeholder="Enter question title here">
                </div>
            </div>

            <!--Text Answer -->
            <div class="flex flex-wrap -mx-3">
                <div class="w-full px-3">
                    <input class="block w-full bg-gray-200 border border-gray-200 py-3 px-4 mb-3 
                            leading-tight" 
                            disabled="disabled" 
                            placeholder="Enter an answer">
                </div>
            </div>

            <!-- Min & Max Char-->
            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-3/4 md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="min-char">
                        Min Characters
                    </label>
                    <input class="block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 
                                leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
                            wire:model="formFields.{{$indexField}}.min_char"
                            name="fields[{{$indexField}}][min_char]" 
                            type="text" 
                            placeholder="Set minimum characters">
                </div>
                <div class="w-3/4 md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="max-char">
                        Max Characters
                    </label>
                    <input class="block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 
                                leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
                            wire:model="formFields.{{$indexField}}.max_char"
                            name="fields[{{$indexField}}][max_char]" 
                            type="text" 
                            placeholder="Set maximum characters">
                </div>
            </div>
            
            <hr/>
            
            <!-- Text Field Option-->
            <div class="mb-6 flex justify-between">
                <div class="mt-3">
                    <label class="inline-flex items-center mt-3">
                        <input class="form-checkbox h-5 w-5 text-gray-600" 
                                wire:model="formFields.{{$indexField}}.long_text"
                                name="fields[{{$indexField}}][long_text]" 
                                type="checkbox">
                        <span class="ml-2 text-gray-700 mr-6">Long Text</span>
                    </label>
                    <label class="inline-flex items-center mt-3">
                        <input class="form-checkbox h-5 w-5 text-gray-600" 
                                wire:model="formFields.{{$indexField}}.required"
                                name="fields[{{$indexField}}][required]" 
                                type="checkbox">
                        <span class="ml-2 text-gray-700">Required</span>
                    </label>
                </div>
                <div class="inline-flex items-center mt-3">
                    <a class="bg-red-500 text-white px-3 py-2" 
                        wire:click.prevent="removeField({{$indexField}})"
                        href="#">
                        Delete
                    </a>
                </div>
            </div>            
        @endif
        
        @if ($fieldType == 'option')

            <!-- Type -->
            <input type="hidden" name="fields[{{$indexField}}][type]" value="choice" >

            <!-- Choice Question -->
            <div class="flex flex-wrap -mx-3">
                <div class="w-full px-3">
                    <input class="block w-full bg-gray-100 text-gray-700 border border-gray-200 py-3 px-4 mb-3 
                            leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model="formFields.{{$indexField}}.question"
                            name="fields[{{$indexField}}][question]" 
                            type="text" 
                            placeholder="Enter question title here">
                </div>
            </div>

            <!--Choice Options -->
            <div class="flex flex-wrap -mx-3 mb-2">
                @foreach ($field['options'] as $indexAnswer => $option)
                <div class="inline-flex items-center w-9/12 mx-3 my-2">
                    <input type="radio" class="bg-gray-200 h-5 w-5 border-2 mr-4" disabled="disabled">
                    <input class="w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 
                            leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model="formFields.{{$indexField}}.options.{{$indexAnswer}}"
                            name="fields[{{$indexField}}][options][]"
                            type="text" 
                            placeholder="Enter name for this option">
                </div>
                <div class="inline-flex items-center">
                    <a class="bg-red-500 text-white px-3 py-2" 
                        href="#" 
                        wire:click.prevent="removeAnswer({{$indexField}},{{$indexAnswer}})">
                        Delete
                    </a>
                </div>
                @endforeach
            </div>

            <hr/>
            
            <!-- Text Field Option-->
            <div class="mb-6 flex justify-between">
                <div class="mt-3">
                    <label class="inline-flex items-center mt-3">
                        <input class="form-checkbox h-5 w-5 text-gray-600" 
                                wire:model="formFields.{{$indexField}}.required"
                                name="fields[{{$indexField}}][required]" 
                                type="checkbox">
                        <span class="ml-2 text-gray-700">Required</span>
                    </label>
                </div>
                <div class="inline-flex items-center mt-3">
                    <a class="bg-gray-500 text-white px-3 py-2 mr-3" 
                        wire:click.prevent="addAnswer({{$indexField}})"
                        href="#">
                        + Answer
                    </a>
                    <a class="bg-red-500 text-white px-3 py-2" 
                        wire:click.prevent="removeField({{$indexField}})"
                        href="#">
                        Delete
                    </a>
                </div>
            </div>

        @endif
    </div>
    @endforeach
    
    <!-- Submit Form-->
    <div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Create</button>
    </div>
</form>
</div>

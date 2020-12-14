<div>
<form wire:submit.prevent="submit" action="{{ route('form.create') }}" method="POST">
    @csrf

    <div class="mb-6 py-6 px-4 hover:bg-gray-200">
        <!------------- Title ----------------------->
        <div class="flex flex-wrap -mx-3">
            <div class="w-full px-3">
                <input class="block w-full bg-gray-100 text-gray-700 border border-gray-300 py-3 px-4 mb-3 
                            leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        wire:model.lazy="title"
                        name="title" 
                        type="text"
                        placeholder="Enter form title">
            </div>
            @error('title') @include('partials.error_message') @enderror
        </div>

        <!------------- Description ------------------>
        <div class="flex flex-wrap -mx-3">
            <div class="w-full px-3">
                <input class="block w-full bg-gray-100 text-gray-700 border border-gray-300 py-3 px-4
                            leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
                        wire:model.lazy="description"
                        name="description"
                        type="text" 
                        placeholder="Enter a description">
            </div>
            @error('description') @include('partials.error_message') @enderror
        </div>
    </div>

    <!------------- Add Fields Buttons ------------>
    <div class="px-4 text-right">
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
    @foreach ($fields as $indexField => $field)
    
    <div class="my-6 py-6 px-4 hover:bg-gray-200">
        <?php 
            $fieldType = $field['type'];
            $questionId = "fields." . $indexField . ".question";
            $minCharId = "fields." . $indexField . ".min_char";
            $maxCharId = "fields." . $indexField . ".max_char";
        ?>
        
        <!-- Field Order -->
        <input type="hidden" name="fields[{{$indexField}}][order]" value="text" >

        @if ($fieldType == 'text')
            <!-- Type -->
            <input type="hidden" name="fields[{{$indexField}}][type]" value="text" >
            
            <!-- Text Question -->
            <div class="flex flex-wrap -mx-3">
                <div class="w-full px-3">
                    <input class="block w-full bg-gray-100 text-gray-700 border border-gray-300 py-3 px-4 mb-3 
                                leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
                            wire:model="{{$questionId}}"
                            name="fields[{{$indexField}}][question]" 
                            type="text" 
                            placeholder="Enter question title here">
                </div>
                @error("$questionId") @include('partials.error_message') @enderror
            </div>

            <!--Text Answer -->
            @if ($field['long_text'] == 'on')
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full px-3">
                        <textarea class="block w-full bg-gray-300 border border-gray-300 py-3 px-4 mb-3"
                                rows="3"
                                disabled="disabled"
                                placeholder="Enter an answer"></textarea>
                    </div>
                </div>
            @else
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full px-3">
                        <input class="block w-full bg-gray-300 border border-gray-300 py-3 px-4 mb-3" 
                                disabled="disabled"
                                placeholder="Enter an answer">
                    </div>
                </div>
            @endif

            <!-- Min & Max Char-->
            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-3/4 md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="min-char">
                        Min Characters
                    </label>
                    <input class="block w-full bg-gray-100 text-gray-700 border border-gray-300 rounded py-3 px-4 
                                leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
                            wire:model="{{$minCharId}}"
                            name="fields[{{$indexField}}][min_char]" 
                            type="text" 
                            placeholder="Set minimum characters">
                </div>
                
                <div class="w-3/4 md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="max-char">
                        Max Characters
                    </label>
                    <input class="block w-full bg-gray-100 text-gray-700 border border-gray-300 rounded py-3 px-4 
                                leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
                            wire:model="{{$maxCharId}}"
                            name="fields[{{$indexField}}][max_char]" 
                            type="text" 
                            placeholder="Set maximum characters">
                </div>
            </div>
            @error("$minCharId") @include('partials.error_message') @enderror
            @error("$maxCharId") @include('partials.error_message') @enderror
            
            <hr/>
            
            <!-- Text Field Option-->
            <div class="flex justify-between">
                <div class="mt-3">
                    <label class="inline-flex items-center mt-3">
                        <input class="form-checkbox h-5 w-5 text-gray-600" 
                                wire:model="fields.{{$indexField}}.long_text"
                                name="fields[{{$indexField}}][long_text]" 
                                type="checkbox">
                        <span class="ml-2 text-gray-700 mr-6">Long Text</span>
                    </label>
                    <label class="inline-flex items-center mt-3">
                        <input class="form-checkbox h-5 w-5 text-gray-600" 
                                wire:model="fields.{{$indexField}}.required"
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
                    <input class="block w-full bg-gray-100 text-gray-700 border border-gray-300 py-3 px-4 mb-3 
                            leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model="{{$questionId}}"
                            name="fields[{{$indexField}}][question]" 
                            type="text" 
                            placeholder="Enter question title here">
                </div>
                @error("$questionId") @include('partials.error_message') @enderror
            </div>

            <!--Option Answer -->
            <div class="flex flex-wrap -mx-3 mb-2">
                @foreach ($field['options'] as $indexAnswer => $option)
                    <?php $answerId = "fields." . $indexField . ".options." . $indexAnswer;?>

                    <div class="inline-flex items-center w-9/12 mx-3 my-2">
                        @if ($field['multiple'] == 'on')
                            <input class="h-5 w-5 border-2 mr-4" type="checkbox" disabled="disabled">
                        @else
                            <input type="radio" class="h-5 w-5 border-2 mr-4" disabled="disabled">
                        @endif

                        <input class="w-full bg-gray-100 text-gray-700 border border-gray-300 rounded py-3 px-4 
                                leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                wire:model="{{$answerId}}"
                                name="fields[{{$indexField}}][options][]"
                                type="text" 
                                placeholder="Enter name for this option">
                    </div>
                    <div class="inline-flex items-center">
                        @if ($loop->count > 1)
                        <a class="bg-red-500 text-white px-3 py-2" 
                            href="#" 
                            wire:click.prevent="removeAnswer({{$indexField}},{{$indexAnswer}})">
                            X
                        </a>
                        @endif
                        @if ($loop->last)
                        <a class="bg-gray-500 text-white px-3 py-2 mx-2" 
                            wire:click.prevent="addAnswer({{$indexField}})"
                            href="#">
                            + Answer
                        </a>
                        @endif
                    </div>
                    @error("$answerId") @include('partials.error_message') @enderror
                @endforeach
            </div>

            <hr/>
            
            <!-- Text Field Option-->
            <div class="mb-6 flex justify-between">
                <div class="mt-3">
                    <label class="inline-flex items-center mt-3">
                        <input class="form-checkbox h-5 w-5 text-gray-600" 
                                wire:model="fields.{{$indexField}}.multiple"
                                name="fields[{{$indexField}}][multiple]" 
                                type="checkbox">
                        <span class="ml-2 text-gray-700 mr-6">Multiple</span>
                    </label>
                    <label class="inline-flex items-center mt-3">
                        <input class="form-checkbox h-5 w-5 text-gray-600" 
                                wire:model="fields.{{$indexField}}.required"
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
    </div>
    @endforeach
    
    <!-- Submit Form-->
    <div>
        <button type="submit"
            @if ($errors->any())
                class="bg-gray-500 text-white px-4 py-3 rounded font-medium w-full"
                disabled="disabled"
            @else
                class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full"
            @endif
            > Create
        </button>
    </div>
</form>
</div>

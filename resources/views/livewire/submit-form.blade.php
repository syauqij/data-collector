<div>
    <form wire:submit.prevent="submit" action="{{ route('submission.create', $form->id) }}" method="POST">
        @csrf
        
        <!-- Title & Description-->
        <div class="py-6 px-4">
            <div class="text-3xl font-bold">
                {{ $form->title }}
            </div>

            @isset($form->desc)
                <p class=" text-gray-500 mt-5">
                    {{ $form->desc }}
                </p>
            @endisset
        </div>

        <!-- Form Fields -->
        <div class="mb-6 px-4">
            @foreach ($form->fields as $field)
            
            <div class="font-bold">
                {{ $field['question']}}
            </div>

            <?php 
                $fieldType = $field['type'];
            ?>

            @if ($fieldType == 'text')
                @if ($field['long_text'] == 'on')
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full px-3">
                            <textarea class="block w-full bg-gray-100 border border-gray-300 py-3 px-4 mb-3"
                                    rows="3"
                                    placeholder="Enter an answer"></textarea>
                        </div>
                    </div>
                @else
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full px-3">
                            <input class="block w-full bg-gray-100 border border-gray-300 py-3 px-4 mb-3"
                                    placeholder="Enter an answer">
                        </div>
                    </div>
                @endif
            @endif

            @if ($fieldType == 'option')

                @foreach ($field['answers'] as $indexAnswer => $option)
                <div class="inline-flex items-center w-9/12 mx-3 my-2">
                    @if ($field['multiple'] == 'on')
                        <input class="h-5 w-5 border-2 mr-4" type="checkbox" disabled="disabled">
                    @else
                        <input type="radio" class="h-5 w-5 border-2 mr-4" disabled="disabled">
                    @endif
                    {{$option}}
                </div>
                @endforeach

                
            @endif

            @endforeach
        </div>

        <div class="py-2 px-4">

                <!-- Submit Form-->
                <button type="submit"
                        class="bg-gray-500 text-white px-4 py-3 rounded font-medium w-full"
                        disabled="disabled">
                        Submit
                </button>
        </div>

    </form>
</div>

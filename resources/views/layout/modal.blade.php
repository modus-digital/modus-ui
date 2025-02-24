@php
    use Illuminate\Support\Str;

    $id = $id ?? 'modal_'.Str::random(10);

    $sizeClass = match($size) {
        'sm' => 'max-w-md w-full',
        'lg' => 'max-w-4xl w-full',
        'xl' => 'max-w-7xl w-full',
        default => 'max-w-lg w-full',
    };

@endphp

<div id="{{ $id }}" tabindex="-1" class="fixed top-0 left-0 right-0 bottom-0 z-50 hidden w-full h-full bg-gray-900/50 backdrop-blur-sm">
    <div class="flex items-center justify-center min-h-full p-4 w-full">
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700 w-full {{ $sizeClass }}">
            <!-- Modal header -->
            <div class="flex items-center {{ $title ? 'justify-between' : 'justify-end' }} p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                @if($title)
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                        {{ $title }}
                    </h3>
                @endif

                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="{{ $id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                {{ $slot }}
            </div>

            <!-- Modal footer -->
            @isset($footer)
                <div class="flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                    {{ $footer }}
                </div>
            @else
                <div class="flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="{{ $id }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                    <button data-modal-hide="{{ $id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                </div>
            @endisset
        </div>
    </div>
</div>

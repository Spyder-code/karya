@if ($paginator->hasPages())
    <div class="pb-5">
        <ul class="flex justify-center">
            <li class="">
               {{-- Pagination Elements --}}
               @foreach ($elements as $element)
               {{-- "Three Dots" Separator --}}
               @if (is_string($element))
                   <span aria-disabled="true">
                       <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                   </span>
               @endif

               {{-- Array Of Links --}}
               @if (is_array($element))
                   @foreach ($element as $page => $url)
                       @if ($page == $paginator->currentPage())
                           <span aria-current="page">
                               <span class="mx-3 px-3 py-2 bg-gray-200 text-gray-700 hover:bg-blue-500 hover:text-white relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5">{{ $page }}</span>
                           </span>
                       @else
                           <a href="{{ $url }}" class="mx-3 px-3 py-2 bg-gray-200 text-gray-700 hover:bg-blue-500 hover:text-white rounded-lg relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                               {{ $page }}
                           </a>
                       @endif
                   @endforeach
               @endif
           @endforeach
            </li>
        </ul>
    </div>
@endif

@props(['sortBy', 'sortAsc', 'sortField'])

@if ($sortBy == $sortField)
    @if ($sortAsc)
        <span class="w-4 h-4 ml-2">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
        </span>    
    @endif
    @if (!$sortAsc)
        <span class="w-4 h-4 ml-2">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </span>  
    @endif
@endif 
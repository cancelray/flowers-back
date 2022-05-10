<style>
    
</style>

<div class="pagination">
    <nav>
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="disabled">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="active">{{ $page }}</span>
                    @else
                        <span><a href="{{ $url }}">{{ $page }}</a></span>
                    @endif
                @endforeach
            @endif
        @endforeach
    </nav>
</div>
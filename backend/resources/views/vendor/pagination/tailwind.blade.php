@if ($paginator->hasPages())
<nav class="pagination" role="navigation" aria-label="Paginación">
    @if ($paginator->onFirstPage())<span class="pagination-link disabled">← Anterior</span>@else<a class="pagination-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">← Anterior</a>@endif
    <div class="pagination-pages">
        @foreach ($elements as $element)
            @if (is_string($element))<span class="pagination-link disabled">{{ $element }}</span>@endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())<span class="pagination-link current" aria-current="page">{{ $page }}</span>@else<a class="pagination-link" href="{{ $url }}">{{ $page }}</a>@endif
                @endforeach
            @endif
        @endforeach
    </div>
    @if ($paginator->hasMorePages())<a class="pagination-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Siguiente →</a>@else<span class="pagination-link disabled">Siguiente →</span>@endif
</nav>
@endif

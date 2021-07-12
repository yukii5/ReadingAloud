<link href="{{ asset('css/preview.css') }}" rel="stylesheet">


@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
      <!-- 最初のページへのリンク -->
      <li class="page-item {{ $paginator->onFirstPage() ? ' disabled' : '' }}">
        <a class="page-link" href="{{ $paginator->url(1) }}"><< 最初へ</a>
      </li>

      <!-- 前のページへのリンク -->
      <li class="page-item {{ $paginator->onFirstPage() ? ' disabled' : '' }}">
        <a class="page-link bg-info" href="{{ $paginator->previousPageUrl() }}">< 前へ</a>
      </li>

      <!-- ページネーション要素 -->
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif
        @endforeach

        
        {{-- Next Page Link --}}
        <!-- 次のページへのリンク -->
        <li class="page-item {{ $paginator->currentPage() == $paginator->lastPage() ? ' disabled' : '' }}">
          <a class="page-link" href="{{ $paginator->nextPageUrl() }}">次へ ></a>
        </li>
        
        {{-- Last Page Link --}}
        <!-- 最後のページへのリンク -->
        <li class="page-item {{ $paginator->currentPage() == $paginator->lastPage() ? ' disabled' : '' }}">
          <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">最後へ >></a>
        </li>
        
        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <!-- // 現在のページ -->
                    <li class="active" aria-current="page"><span>&nbsp;{{ $page }}</span></li>
                    <!-- // 現在のページと最後の総ページの間の「/」 -->
                    &nbsp;/&nbsp;
                    <!-- // 総ページ数（＝最後のページ） -->
                    <li class="active" aria-current="page"><span>{{ $paginator->lastPage() }}&nbsp;</span></li>
                @endif
            @endforeach
        @endif
    </ul>
@endif
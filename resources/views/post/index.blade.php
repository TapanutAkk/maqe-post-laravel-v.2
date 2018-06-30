@extends ('layout')

@section ('content')

<div class="post-header">
    <h1>MAQE Forums</h1>
    <h2>Subtitle</h2>
    <h3>Posts</h3>
</div>

<ul class="post-page">
    @for ($i = $page['first']; $i <= $page['final']; $i++)
    <li>
        <div class="row">
            <div class="col-2 post-img">
                <img src="{{ $posts[$i-1]['image_url'] }}" alt="{{ $posts[$i-1]['title'] }}">
            </div>
            <div class="col-8">
            <h3 class="post-title">{{ $posts[$i-1]['title'] }}</h3>
            <p>{{ $posts[$i-1]['body'] }}</p>
            <p class="post-last-date"><i class="far fa-clock"></i> {{ $posts[$i-1]['last_date'] }}</p>
            </div>
            <div class="col-2 author-blog">
                <img class="author-img" src="{{ $posts[$i-1]['author_avatar_url'] }}" alt="{{ $posts[$i-1]['author_name'] }}">
                <p class="author-name">{{ $posts[$i-1]['author_name'] }}</p>
                <p class="author-role">{{ $posts[$i-1]['author_role'] }}</p>
                <p class="author-place"><i class="fas fa-map-marker-alt"></i> {{ $posts[$i-1]['author_place'] }}</p>
            </div>
        </div>
    </li>
    @endfor
</ul>

<div class="post-paging">  
    <?php $count_page = ceil(count($posts)/8); ?>

    @if ($page['now'] > 1)
    <a href="/page/{{ $page['now']-1 }}">Previous</a>
    @endif

    @for ($page_at = 1; $page_at <= $count_page; $page_at++)
        <a 
        @if ($page['now'] == $page_at)
        class="active"
        @endif
        href="/page/{{ $page_at }}">{{ $page_at }}</a>
    @endfor

    @if ($page['now'] < $count_page)
       <a href="/page/{{ $page['now']+1 }}">Next</a>
    @endif

</div>

@endsection


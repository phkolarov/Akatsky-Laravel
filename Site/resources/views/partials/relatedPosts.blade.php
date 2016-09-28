<div id="relatedPostsWrapper">

    <div id="relatedPostHeader">Сходни публикации</div>
    <div id="relatedPostsContent">

        <div id="relatedPostsLeft">
            <i class="fa fa-chevron-left" aria-hidden="true"></i>
        </div>
        <div id="relatedPosts">
            <ul>
                @foreach($relatedPosts as $relatedPost)
                    <li>
                        <a href="test">
                            @if(isset($relatedPost['thumbnail_article_uri']))
                                <img class="relatedThumbnail" src="images/articles/thumbnails/{{$relatedPost['thumbnail_article_uri']}}">
                             @else
                                <img class="relatedThumbnail"  src="images/videos/thumbnails/{{$relatedPost['thumbnail_video_uri']}}">
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>

        </div>
        <div id="relatedPostsRight">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </div>
    </div>
</div>

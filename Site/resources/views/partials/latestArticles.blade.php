<div id="latestArticles">

    @if(count($articles)> 0)
       <h4>Последни статии</h4>
    <ul>
        @foreach($articles as $article)

            <li>
               <a href="article/{{$article['id']}}/{{$article['title']}}">
                   <h5>{{$article['title']}}</h5>
                   <img class="articleThumbnail" src="images/articles/thumbnails/{{$article['thumbnail_article_uri']}}">
               </a>
            </li>
        @endforeach
    </ul>
    @endif

</div>
<div id="categoriesWrapper">

    <h4>Категории</h4>
    <ul>
        @foreach($categories as $category)
            <li><a href="videos/{{$category['nameEn']}}"><h5>{{$category['name']}}</h5></a></li>
        @endforeach

    </ul>
</div>


{

    function checkForFavorite(id, type) {
        if (localStorage[type]) {
            let tempObj = JSON.parse(localStorage[type]);
            let favArray = tempObj[type];

            let indexOfFavoriteElement = favArray.indexOf(id);

            if (indexOfFavoriteElement >= 0) {
                $('#addToFavorites>span,.fa.fa-star').css({
                    'color': '#f26827'
                });
                $('#addToFavorites>span').text('премахни от любими ');
            }
        }
    }

    function addRemoveFavorite(id, type) {
        let favorites = {};
        favorites[type] = [];

        if (localStorage[type]) {

            let tempObj = JSON.parse(localStorage[type]);
            let favArray = tempObj[type];

            let indexOfFavoriteElement = favArray.indexOf(id);

            if (indexOfFavoriteElement < 0) {

                favArray.push(id);

                $('#addToFavorites>span,.fa.fa-star').css({
                    'color': '#f26827'
                });
                $('#addToFavorites>span').text('премахни от любими ');

            } else {
                favArray.splice(indexOfFavoriteElement, 1);
                $('#addToFavorites>span,.fa.fa-star').css({
                    'color': 'white'
                });

                $('#addToFavorites>span').text('добави в любими ');
            }
            favorites[type] = favArray;
        } else {
            console.log()
            favorites[type].push(id);

            $('#addToFavorites>span,.fa.fa-star').css({
                'color': '#f26827'
            });
            $('#addToFavorites>span').text('премахни от любими ');
        }
        localStorage[type] = JSON.stringify(favorites);
    }

    function loadFavoriteVideos() {

        var CSRF_TOKEN = $('input[name="_token"]').attr('value');
        if (localStorage.videos && JSON.parse(localStorage.videos).videos.length > 0) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                url: 'favorites/getPublicFavoriteVideos',
                method: 'POST',
                dataType: 'json',
                contentType: 'application/json; charset=utf-8;',
                data: localStorage.videos,
                success: function (data) {

                    let countOfVideoElements = data.length;

                    $('#videoCount').text(countOfVideoElements);

                    for (video of data) {

                        let videoElement = ` <li class="element" id='video_${video['id']}'>
                                            <i class="fa fa-times fa-2x" aria-hidden="true" id='${video['id']}' type='video'></i>
                                            <a href="video/${video['id']}/${video['title']}">
                                                <div class="elementTitleContainer">
                                                    <p>${video['title']}</p>
                                                </div>
                                                <div class="imageWrapper">
                                                   
                                                    <img src="images/videos/thumbnails/${video['thumbnail_video_uri']}">
                                                </div>
                                                <div class="elementDateContainer">
                                                    <p>${video['date_posted']}</p>
                                                </div>
                                            </a>
                                        </li>`;

                        $('#publicFavVideoWrapper').append(videoElement);
                    }
                    $('#publicFavVideoWrapper i').on('click', function () {

                        let videoId = $(this).attr('id');
                        let type = $(this).attr('type');

                        removeFromFavorites(videoId, type);
                    });

                },
                error: function (textStatus, errorThrown) {
                    // Success = false;//doesnt goes here


                }
            });
        } else {
            let videoElement = `<li ><span>Нямате добавени видео клипове</span></li>`;
            $('#publicFavVideoWrapper').append(videoElement);
        }
    }

    function loadFavoriteArticles() {

        var CSRF_TOKEN = $('input[name="_token"]').attr('value');

        if (localStorage.articles && JSON.parse(localStorage.articles).articles.length > 0) {

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                url: 'favorites/getPublicFavoriteArticles',
                method: 'POST',
                dataType: 'json',
                contentType: 'application/json; charset=utf-8;',
                data: localStorage.articles,
                success: function (data) {

                    let countOfVideoElements = data.length;

                    $('#articleCount').text(countOfVideoElements);

                    for (article of data) {

                        let articleElement = ` <li class="element" id='article_${article['id']}'>
                                            <i class="fa fa-times fa-2x" aria-hidden="true" id='${article['id']}' type='article'"></i>
                                            <a href="article/${article['id']}/${article['title']}">
                                                <div class="elementTitleContainer">
                                                    <p>${article['title']}</p>
                                                </div>
                                                <div class="imageWrapper">
                                                    <img src="images/articles/thumbnails/${article['content_image_uri']}">
                                                </div>
                                                <div class="elementDateContainer">
                                                    <p>${article['date_posted']}</p>
                                                </div>
                                            </a>
                                        </li>`;

                        $('#publicFavArticleWrapper').append(articleElement);

                        $('#publicFavArticleWrapper i').on('click', function () {

                            let articleId = $(this).attr('id');
                            let type = $(this).attr('type');

                            removeFromFavorites(articleId, type);
                        });
                    }

                },
                error: function (textStatus, errorThrown) {
                    // Success = false;//doesnt goes here


                }
            });
        } else {
            let articleElement = ` <li ><span>Нямате добавени статии</span></li>`;
            $('#publicFavArticleWrapper').append(articleElement);
        }


    }

    function showHideFavoritePublicCategories() {


        $('#pubFavVideoHeading').on('click', function () {


            $('#publicFavVideoWrapper').slideToggle("slow", function () {

                if ($('#publicFavArticleWrapper').is(':visible'))
                    $('#publicFavArticleWrapper').slideToggle("slow", function () {

                    });
                if ($(this).is(':visible'))
                    $(this).css('display', 'inline-block');

            });
        });


        $('#pubFavArticleHeading').on('click', function () {

            $('#publicFavArticleWrapper').slideToggle("slow", function () {

                if ($('#publicFavVideoWrapper').is(':visible'))
                    $('#publicFavVideoWrapper').slideToggle("slow", function () {

                    });
                if ($(this).is(':visible'))
                    $(this).css('display', 'inline-block');
            });
        });

        $('#pubFavArticleHeading')
    }


    function removeFromFavorites(elementId, type) {

        let videoElementsIds = [];
        let articleElementsIds = [];

        if (localStorage.videos)
            videoElementsIds = JSON.parse(localStorage.videos).videos;

        if (localStorage.articles)
            articleElementsIds = JSON.parse(localStorage.articles).articles;

        if (type == 'video') {

            let indexOfVideoForDelete = videoElementsIds.indexOf(elementId);
            videoElementsIds.splice(indexOfVideoForDelete, 1);
            $('#video_' + elementId).remove();

            if (videoElementsIds.length == 0) {
                let videoElement = `<li ><span>Нямате добавени видео клипове</span></li>`;
                $('#publicFavVideoWrapper').append(videoElement);
                $('#videoCount').text(0);
            }

            localStorage.videos = JSON.stringify({videos: videoElementsIds});

        } else {

            let indexOfArticleForDelete = articleElementsIds.indexOf(elementId);
            articleElementsIds.splice(indexOfArticleForDelete, 1);

            console.log(articleElementsIds);

            $('#article_' + elementId).remove();

            if (articleElementsIds.length == 0) {
                let articleElement = ` <li ><span>Нямате добавени статии</span></li>`;
                $('#publicFavArticleWrapper').append(articleElement);

                $('#articleCount').text(0);
            }
            localStorage.articles = JSON.stringify({articles: articleElementsIds});

        }
    }

}
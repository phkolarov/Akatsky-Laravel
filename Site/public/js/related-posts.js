{
    var leftCounter = 0;
    var rightCounter = 0;
    var maxslide = $('#relatedPosts>ul>li').length - 1;

    $('#relatedPostsLeft').on('click',function () {

        if(rightCounter < 0){
            slideToRight();
            rightCounter++;
            leftCounter--;
        }
    });

    $('#relatedPostsRight').on('click',function () {
        if(leftCounter < maxslide ){
            slideToLeft();
            rightCounter--;
            leftCounter++;
        }

    });

    function slideToLeft() {
        $('#relatedPosts>ul').animate({left: '-=196px'});
    }

    function slideToRight() {
        $('#relatedPosts>ul').animate({left: '+=196px'});
    }
}
{

    let filter = getFilter();
    let option = $('#'+filter);

    if(option.length > 0){
        option.prop('checked', true);
    }


    $('.filterOption>input').on('click',function () {

        $("input[type='checkbox']").prop('checked', false);
        let currentFilter = $(this);
            currentFilter.prop('checked', true);

        let filter = $(this).attr('filter');

        if(filter != getFilter() && filter){
            setTimeout(function () {
                location.href = 'videos/'+ filter;
            },800);
        }else{
            setTimeout(function () {
                location.href = 'videos';
            },800);
        }
    });


    function getFilter() {

        let uri = document.URL.split('/');

        let filter = uri[uri.length - 1];

        if(filter.indexOf('?')){

            let splitedParams = filter.split('?');
            filter = splitedParams[0];
        }
        return filter;
    }

}


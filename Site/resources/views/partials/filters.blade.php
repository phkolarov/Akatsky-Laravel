
    <ul>
        @foreach($filters as $filter)

            <li class="filterOption">
                <input  type="checkbox" id="{{$filter['nameEn']}}" filter="{{$filter['nameEn']}}">
                <label for="{{$filter['nameEn']}}">{{$filter['name']}}</label>
            </li>

        @endforeach
    </ul>

    @section('javascript')
        <script src="{{ asset('js/filters.js') }}"></script>
    @stop
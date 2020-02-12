@if(count($categories)>0)
    <div class="form-control-lg form-inline">
        @foreach($categories as $category)
            @php($i = 0)
            @foreach($checkedCategories as $checkedCategory)
                @if($category->name == $checkedCategory->name)
                    <input style="margin-right: 5px" type="checkbox" name="categories[]" id="{{$category->id}}"
                           value="{{$category->id}}" checked>
                    <label style="margin-right: 10px" for="{{$category->id}}"> {{$category->name}}</label><br>
                    @php($i = 1)
                @endif
            @endforeach
            @if($i == 0)
                <input style="margin-right: 5px" type="checkbox" name="categories[]" id="{{$category->id}}"
                       value="{{$category->id}}">
                <label style="margin-right: 10px" for="{{$category->id}}"> {{$category->name}}</label><br>
            @endif
        @endforeach
    </div>
@endif

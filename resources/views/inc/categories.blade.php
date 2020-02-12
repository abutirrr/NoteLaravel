@if(count($categories)>0)
    <div class="form-control-lg form-inline">
            @foreach($categories as $category)
            <input style="margin-right: 5px" type="checkbox" name="categories[]" id="{{$category->id}}" value="{{$category->id}} ">
            <label style="margin-right: 10px" for="{{$category->id}}"> {{$category->name}}</label><br>
        @endforeach
    </div>
@endif

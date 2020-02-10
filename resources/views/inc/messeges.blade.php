@if(count($errors) > 0)
    <div  class="form-group" style="margin-top: 60px">
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>
        @endforeach
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success" style="margin-top: 60px">
        {{session('success')}}
    </div>
@endif

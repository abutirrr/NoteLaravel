@extends('layouts.app')

@section('content')

    <div style="display: flex;">

        {{--    This is the left div  --}}
        <div style="width: 30%; margin-left: 10px ">
            <div>
                {!! Form::open(['route' => 'search' ,'class'=>'form-inline mt-2 mt-md-0','style'=>'margin-bottom: 10px; margin-left: 5px', 'method' => 'GET']) !!}
                {{Form::Text('search','',['class'=>'form-inline mt-2 mt-md-0','style'=>'margin-right:10px ; width:180px','placeholder'=>'  Search'])}}
                <button class="btn btn-info" type="submit" style=">
                    <a href="{{route('search')}}">Search Notes</a></button>

                <button class="btn-dark" style="padding: 5px ;margin-left: 10px">
                    <a href="{{route('pages.newNote',['id'=>Auth::user()->id])}}">ADD NOTE</a>
                </button>
                {!! Form::close() !!}
            </div>
            <div>
                @if(count($notes) > 0)
                    @foreach($notes as $note)
                        <h4 class="card-header"><a
                                href="{{route('pages.openNote',['id'=>$note->id])}}">{{$note->title}}</a></h4>
                        <p class="alert alert-info">{{$note->description}}</p>
                    @endforeach
                    {{$notes->links()}}

                @else
                    <h4 class="card-header">No Notes Found</h4>
                @endif
            </div>
        </div>
        {{--    This is the right div  --}}
        {{--        <div style="width:60% ;margin-left: 10px;">--}}
        {{--            <div STYLE="display: flex; justify-content: flex-end">--}}
        {{--                <button class="btn-dark" style="padding: 5px ;margin-right: 10px; float: right"><a href=""></a>SAVE--}}
        {{--                </button>--}}
        {{--                <button class="btn-danger" style="padding: 5px ; float: right"><a href=""></a>DELETE</button>--}}
        {{--            </div>--}}
        {{--            <div style="border: solid 1px #e2f0fb ;height: 50%; margin-top: 10px ;background-color: #e2f0fb">--}}
        {{--                <h4 class="card-header">Title</h4>--}}
        {{--                <p class="alert alert-info" style="height:auto">Description</p>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>

@endsection

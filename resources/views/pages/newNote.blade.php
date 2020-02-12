@extends('layouts.app')

@section('content')

    <div style="display: flex;" class="container">
        <div style="width:60% ;">
            <h3>Write a Note</h3>
            {!! Form::open(['route' => 'createNewNote' , 'method' => 'POST']) !!}
            <div class="form-group">
                {{Form::Text('title','',['class'=>'form-control','style'=>'margin-bottom:10px','placeholder'=>'Enter Note Title'])}}
                {{Form::TextArea('description','',['class'=>'form-control','style'=>'width:100% ; resize:none','placeholder'=>'Enter Note Description'])}}
                @include('inc.categories')
                {{Form::submit('SAVE',['class'=>'btn-dark','style'=>'padding: 5px 40px;float: right; margin-top: 10px'])}}
            </div>
                @include('inc.messeges')
            {!! Form::close() !!}
        </div>
    </div>

@endsection

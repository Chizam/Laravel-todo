@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todo app</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if($errors->any())
                        <ul class="list-group mb-3">
                            @foreach($errors->all() as $error)
                                <li class="list-group-item text-danger">
                                    {{ $error }}
                                </li>
                            @endforeach
                        
                        </ul>
                    @endif

                    <form action="{{ route('edit.todo', ['id' => $todo->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" value="{{$todo->title}}">
                        </div>
                        <!--<div class="form-group">
                            <textarea class="form-control" name="description">
                                {{$todo->description}}
                            </textarea>
                        </div> -->
                         <div class="text-center form-group">
                            <button type="submit" class="btn btn-primary btn-md"> Edit </button>
                        </div> 
                    </form>
                </div>
            </div>
            
            
            
            {{-- <div class="row justify-content-center">
            
                <div class="col-md-12">
                    {{ $todos->link() }}
                </div>
            </div> --}}
            
        </div>
    </div>
</div>
@endsection

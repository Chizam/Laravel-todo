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

                    <form action="/store-todo" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="todo title">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="description" placeholder="todo description">
                                
                            </textarea>
                        </div>
                        <div class="text-center form-group">
                            <button type="submit" class="btn btn-primary btn-md"> Create </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="card my-5">
                
                   
                        
                        <table class="table table-bordered">
                            <thead class="table-dark">
                               <tr>
                                <th> Title</th>
                                <th> Todo Description</th>
                                <th>Action </th>
                                
                                </tr> 
                            </thead>
                             @foreach($todos as $todo)
                            <tbody>
                                <tr>
                                    <td> {{$todo->title}} </td>
                                    <td> {{$todo->description}} </td>
                                    <td> <a href="/delete/{{$todo->id}}" class="btn btn-sm float-md-right btn-danger"  
                                    onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                    <a href="/update/{{$todo->id}}" class="btn btn-sm float-md-right btn-primary">Update</a> 
                                    
                                    </td>
                                </tr>
                            </tbody>
                        
                       
                        
                    @endforeach
                     </table>
                
                
            
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

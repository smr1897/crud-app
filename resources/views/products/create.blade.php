@extends('products.layout')

{{-- @section('content')
    <p>hgvjuhyg</p>
@endsection

@section('sidebar')
    @parent
    <h3>lkjihlki</h3>
@endsection     --}}

<div class="row">
    <div class="col-lg-12 margin-tb">

        <div class="pull-left">
            <h2>Add new Product</h2>
        </div>

        <div class="pull-right">
            <a class="btn btn-primary" href="{{route('products.index')}}">Back</a>
        </div>

    </div>

</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!!</strong>Ther are some  problems with your input <br><br>
        <ul>
            @foreach ($errors->all() as $error)

                <li>
                    {{$error}}
                </li>
                
            @endforeach
        </ul>
    </div>
    
@endif

<form action="{{route('products.store')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name : </strong>
                <input type="text" name="name" class="form-control" placeholder="name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detail : </strong>
                <textarea class="form-control" name="detail" placeholder="detail" style="height: 150px"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>    
</form>
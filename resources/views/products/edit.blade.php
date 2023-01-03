@extends('products.layout')

<div class="row">
    <div class="cool-lg-12">
        <div class="pull-left">
            <h2>Edit your products</h2>
        </div>
        <div class="pull-right">
            <a href="{{route('products.index')}}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There are some problems with your input <br><br>
        <ul>
            @foreach ($errors as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
    
@endif

<form action="{{route('products.update',$product->id)}}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name : </strong>
                <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detail : </strong>
                <textarea class="form-control" name="detail"  placeholder="detail" style="height: 150px">{{$product->detail}}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div> 
</form>
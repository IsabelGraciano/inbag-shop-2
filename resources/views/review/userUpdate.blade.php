@extends('layouts.master');
@section('content')


<div class="form-group">
    <label for="title">Title</label>
    <input class="form-control" name="title" placeholder="Title" value={{ $blog->title }}>
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" class="form-control" placeholder="Enter Description" style="width:100%; height=200px"> {{ $blog->description }} </textarea> 
</div>  

<button type="submit" class="btn btn-default">Submit</button> 

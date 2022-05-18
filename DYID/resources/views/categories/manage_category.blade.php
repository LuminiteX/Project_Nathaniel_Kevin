@extends('layouts/app')

@section('content')
    <h1>Manage Category</h1>
    <table style="width:96%">
        <col style="width:2%">
	    <col style="width:70%">
	    <col style="width:20%">
        <tr>
            <th>No</th>
            <th>Category Name</th>
            <th>Action</th>
        </tr>
        @forelse ($data as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td class="btn">
                    <a href="/category/edit/{{$category->id}}" class="updateBtn">Update</a> 

                    <form action="/category/delete/{{$category->id}}" method="POST">
                        @csrf
                        @method("delete")
                        <button type = "submit" class="deleteBtn">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td>No data</td>
                <td>No data</td>
                <td>No data</td>
            </tr>
        @endforelse
    </table>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset("css/manage_category.css") }}">
@endsection
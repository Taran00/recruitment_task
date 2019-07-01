@extends('layouts.master')
@section('content')

<h2>Your news</h2>
<div class="table table-striped">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Active</th>
                <th>Created_at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
	        @foreach($user_news as $one_news)
	            <tr>
	            	<td>{{ $one_news->id }}</td>
	                <td>{{ $one_news->name }}</td>
	                <td>{{ $one_news->shortDescription() }}</td>
	                <td>{{ $one_news->is_active }}</td>
	                <td>{{ $one_news->created_at }}</td>
	                <td>
	                <a href="{{ $one_news->getEditLink() }}" class="btn btn-sm btn-primary mb-2">Edit</a>
	                <a href="{{ $one_news->getDeleteLink() }}" onclick="return confirm('Are you sure you want to delete this news?')" class="btn btn-sm btn-danger mb-2">Delete</a>
	                </td>
	            </tr>
	        @endforeach  
        </tbody>
    </table>
</div>

@endsection

@extends('layouts.master')
@section('content')

<h2>All news (only active)</h2>
<div class="table table-striped">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Author</th>
                <th>Description</th>
                <th>Created_at</th>
            </tr>
        </thead>
        <tbody>
	        @foreach($all_news as $one_news)
	            <tr>
	                <td>{{ $one_news->shortName() }}</td>
	                <td>{{ $one_news->user->email }}</td>
	                <td>{{ $one_news->shortDescription() }}</td>
	                <td>{{ $one_news->created_at }}</td>
	            </tr>
	        @endforeach  
        </tbody>
    </table>
</div>

@endsection

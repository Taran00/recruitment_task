@extends('layouts.master')
@section('content')

<h2>All news</h2>
<div class="table table-striped">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Country</th>
            </tr>
        </thead>
        <tbody>
	        @forelse($all_clients as $one_client)
	            <tr>
	                <td>{{ $one_client->first_name }}</td>
	                <td>{{ $one_client->last_name }}</td>
	                <td>{{ $one_client->email }}</td>
	                <td>{{ $one_client->country }}</td>
	            </tr>
	        @empty
            <tr>
                <td align="center" colspan="5">There are no records yet!</td>
            </tr>
            @endforelse 
        </tbody>
    </table>
</div>

@endsection

@extends('layouts.master')
@section('content')

<h2>All clients</h2>
<div>
<h3>Avaible csv files to set to DB:</h3>
@foreach($array_of_files as $key => $value)
<p>{{ $value }} <a href="{{ route('csv.csvToDb', ['file_name' => $value]) }}"> STORE TO DB </a></p>
@endforeach
</div>
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

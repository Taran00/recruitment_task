@extends('layouts.master')
@section('content')
<div>
<h3>Add new csv file:</h3>
<p>(requirements of CSV FILE HEADER: id, first_name, last_name, email, country)</p>
<form method="POST" action="{{route('csv.storeNewCsv')}}" enctype="multipart/form-data" >
    {{ csrf_field() }}
    <input type="file" id="csv" name="csv" accept='.csv' required>
    <input type="submit" name="submit">
</form>

@if ($errors->has('csv'))
<div class="alert alert-danger alert-dismissible fade show">{{ $errors->first('csv') }}</div>
@endif

<h3>Avaible csv files to set to DB:</h3>
@foreach($array_of_files as $key => $value)
<p>{{ $value }} <a href="{{ route('csv.csvToDb', ['file_name' => $value]) }}"> STORE TO DB </a></p>
@endforeach
</div>
<h2>All clients <a href="#" class="btn btn-danger">TURNCATE CLIENTS TABLE</a></h2>
<div class="table table-striped">
    <table class="table">
        <thead>
            <tr>
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

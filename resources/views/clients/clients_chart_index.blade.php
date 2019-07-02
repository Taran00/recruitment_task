@extends('layouts.master')
@section('content')
<div class="card">
	<div class="card-body">
		<h2 class="card-title">Chart of persons <a href="{{ route('clients.clientsIndex') }}" class="btn btn-success">Back to CSV editor</a></h2>
		<div class="charts">
		    @foreach($grouped_clients as $key => $one_group)
		    <div class="row">
		        <div class="col-sm-1"> {{ $key }} </div>
		        <div class="col-sm-11 row">
		            <div class="charts__chart chart--blue chart--p{{ceil((count($one_group)/$all)*100)}}"></div>
		            <div>{{ count($one_group) }} persons</div>
		        </div>
		    </div>
		    @endforeach
		</div>
	</div>
</div>
@endsection

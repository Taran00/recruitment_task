@extends('layouts.master')
@section('content')

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Task 1</h5>
    <p class="card-text">Create simple news administrator (only for logged users).</p>
    <a href="{{route('news.newsIndex')}}" class="btn btn-primary">NEWS ADMINISTRATOR</a>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Task 2</h5>
    <p class="card-text">CSV controll system (for all users)</p>
    <a href="{{route('clients.clientsIndex')}}" class="btn btn-primary">CSV TASK</a>
  </div>
</div>

@endsection

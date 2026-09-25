@extends('layouts.app')

@section('content')
<div class="card">
    <h1>Taskero</h1>
    <p class="small">Please <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a> to access your dashboard.</p>
</div>
@endsection
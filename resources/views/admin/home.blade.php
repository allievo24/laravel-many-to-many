@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Wordpress</h1>
    <h3>Benvenuto {{Auth::user()->name}}</h3>
</div>
 
    
@endsection
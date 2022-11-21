@extends('layouts.app')

@section('content')
<div class="container">
        <form action="{{ route('email/send') }}" method="POST" enctype ="multipart/form-data">

        @csrf

            <input type="text" name="name">
            <input type="file" name="image">
            <br>
            <input type="submit" value="Submit">
        </form>
</div>
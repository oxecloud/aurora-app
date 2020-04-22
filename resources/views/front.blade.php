@extends('layouts.app')
@section('body_class', 'front-page')
@section('head')
<style>
</style>
@endsection

@section('content')
<div class="container ">
    <header hidden class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">Cover</h3>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link active" href="#">Home</a>
                <a class="nav-link" href="#">Features</a>
                <a class="nav-link" href="#">Contact</a>
            </nav>
        </div>
    </header>

    @guest
    <main role="main" class="inner cover text-center">


    </main>
    @else

        <div class="">


            @if (Auth::user()->id == 1)

                <a href="{{route('users')}}" class="btn btn-secondary">
                    Users
                </a>
            @endif
                <a href="{{route('bill')}}" class="btn btn-secondary">
                    Bill
                </a>
        </div>




    @endguest

    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>#38 Zamora Street, Buag
            <br />Bambang, Nueva Vizcaya 3702 </p>
        </div>
    </footer>


</div>
@endsection

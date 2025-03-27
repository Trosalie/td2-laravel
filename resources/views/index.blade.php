@extends('layouts.app')

@section('content')

<style>
@import '~bootstrap/scss/bootstrap';

.page-title {
    color: #ff5733;
    font-weight: 700;
    margin-bottom: 20px;
}

.sauce-card {
    border-radius: 12px;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px;
    transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    overflow: hidden;

    &:hover {
        transform: translateY(-5px);
        box-shadow: rgba(0, 0, 0, 0.2) 0px 6px 10px;
    }

    .sauce-image {
        width: auto;
        height: 200px;
        object-fit: contain;
        background-color: #fff;
        padding: 10px;
    }

    .card-body {
        text-align: center;
    }

    .btn-modifier {
        background-color: #ff5733;
        border: none;
        padding: 10px 15px;
        border-radius: 8px;
        transition: background-color 0.3s ease-in-out;

        &:hover {
            background-color: darken(#ff5733, 10%);
        }
    }
}

.add-sauce-btn {
    display: block;
    width: max-content;
    margin: 20px auto;
    padding: 12px 20px;
    background-color: #ff5733;
    color: #fff;
    border-radius: 8px;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px;
    transition: background-color 0.3s ease-in-out;

    &:hover {
        background-color: darken(#ff5733, 10%);
    }
}
</style>

<h1 class="text-center page-title">Sauces</h1>

<div class="container">
    <div class="row justify-content-center">
        @foreach ($sauces as $sauce)
        <div class="col-md-3 mb-3">
            <div class="card sauce-card">
                <img class="card-img-top sauce-image" src="{{ asset($sauce->imageUrl) }}" alt="{{ $sauce->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $sauce->name }}</h5>
                    <hr>
                    <p class="card-text" style="padding: 5px;">Chaleur : {{ $sauce->heat }}/10</p>
                    <p class="card-text">{{ $sauce->description }}</p>
                    <hr>
                    <a href="sauces/{{ $sauce->idSauce }}" class="btn btn-secondary">Voir</a>
                    <a href="sauces/edit/{{ $sauce->idSauce }}" class="btn btn-primary btn-modifier">Modifier</a>
                    <a href="sauces/delete/{{ $sauce->idSauce }}" class="btn btn-danger">Supprimer</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<a class="btn add-sauce-btn" href="{{ route('create') }}">Ajouter une sauce</a>
@endsection

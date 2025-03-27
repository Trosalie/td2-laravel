@extends('layouts.app')

<style>
@import '~bootstrap/scss/bootstrap';

.page-title {
    color: #ff5733;
    font-weight: 700;
    margin-bottom: 20px;
}

.sauce-info-container {
    border-radius: 12px;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px;
    padding: 20px;
    background-color: #f8f9fa;
    margin-top: 30px;
}

.sauce-info-container .form-group {
    margin-bottom: 20px;
}

.sauce-info-container strong {
    color: #333;
    font-weight: 600;
    display: inline-block;
    margin-bottom: 5px;
}

.sauce-info-container .sauce-image {
    background-color: #f1f1f1;
    border: 1px solid #ddd;
    border-radius: 8px;
    margin-top: 10px;
    width: auto;
    height: 20rem;
    object-fit: contain;
    padding: 10px;
}

.sauce-info-container .btn-primary {
    background-color: #ff5733;
    border: none;
    padding: 10px 15px;
    border-radius: 8px;
    transition: background-color 0.3s ease-in-out;
    margin-top: 20px;
}

.sauce-info-container .btn-primary:hover {
    background-color: darken(#ff5733, 10%);
}

</style>

@section('content')

<h1 class="text-center page-title">Informations de la Sauce</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 sauce-info-container">
            <div class="form-group">
                <strong>Nom :</strong>
                {{ $sauce->name }}
            </div>
            <div class="form-group">
                <strong>Fabricant :</strong>
                {{ $sauce->manufacturer }}
            </div>
            <div class="form-group">
                <strong>Description :</strong>
                {{ $sauce->description }}
            </div>
            <div class="form-group">
                <strong>Image :</strong><br>
                <img src="{{ asset($sauce->imageUrl) }}" alt="{{ $sauce->name }}" class="sauce-image">
            </div>
            <div class="form-group">
                <strong>Piment principal :</strong>
                {{ $sauce->mainPepper }}
            </div>
            <div class="form-group">
                <strong>Chaleur :</strong>
                {{ $sauce->heat }}
            </div>
            <div class="form-group">
                <a href="{{ route('sauces.index') }}" class="btn btn-primary center">Retour à la liste des sauces</a>
            </div>
        </div>
    </div>
</div>

@endsection

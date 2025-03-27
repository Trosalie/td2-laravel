@extends('layouts.app')

<style>
    .page-title {
        color: #ff5733;
        font-weight: 700;
        margin-bottom: 20px;
    }
    
    .form-group {
        background: #fff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }
    
    .form-control {
        border-radius: 8px;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        font-size: 16px;
    }
    
    
    .heat-slider {
        width: 100%;
        margin-top: 10px;
        accent-color: #ff5733;
    }
    
    #heatValue {
        font-weight: bold;
        color: #ff5733;
    }
    
    .btn-submit {
        display: block;
        width: 100%;
        padding: 12px;
        font-size: 1rem;
        background-color: #ff5733;
        color: #fff;
        border: none;
        border-radius: 8px;
        transition: background-color 0.3s ease-in-out;
    
        &:hover {
            background-color: darken(#ff5733, 10%);
        }
    }
    
    </style>

@section('content')
<form action="{{ route('sauces.update', ['id' => $sauce->idSauce]) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

<h1 class="text-center page-title">Modifier la Sauce : {{ $sauce->name }}</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-group">
                <strong>Identifiant</strong>
                <input type="text" name="idSauce" value="{{ $sauce->idSauce }}" class="form-control" disabled>

                <strong>Créateur</strong>
                <input type="text" name="creator" value="{{ $sauce->userID }}" class="form-control" disabled>

                <strong>Nom de la sauce</strong>
                <input type="text" name="name" value="{{ $sauce->name }}" class="form-control">

                <strong>Fabriquant</strong>            
                <input type="text" name="manufacturer" value="{{ $sauce->manufacturer }}" class="form-control">

                <strong>Description</strong>
                <textarea name="description" class="form-control">{{ $sauce->description }}</textarea>

                <strong>Image</strong>
                <input class="form-control" type="file" id="imageUrl" name="imageUrl" onchange="previewImage(event)">

                <div id="imagePreviewContainer" style="margin-top: 15px;">
                    <img id="imagePreview" src="{{ asset($sauce->imageUrl) }}" alt="Image actuelle" style="max-height: 200px; width: auto;">
                </div>
                <br>

                <strong>Ingrédient principal</strong>
                <input class="form-control" type="text" id="mainPepper" name="mainPepper" value="{{ old('mainPepper', $sauce->mainPepper) }}" required>

                <strong>Chaleur : <span id="heatValue">{{ old('heat', $sauce->heat) }}</span></strong>
                <input class="form-range heat-slider" type="range" id="heat" name="heat" min="0" max="10" value="{{ old('heat', $sauce->heat) }}" oninput="updateHeatValue(this.value)">

                <button type="submit" class="btn btn-primary btn-submit">Mettre à jour la sauce</button>
            </div>
        </div>
    </div>
</div>
</form>

<script>
    function previewImage(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            const imagePreview = document.getElementById('imagePreview');
            const imagePreviewContainer = document.getElementById('imagePreviewContainer');

            imagePreview.src = e.target.result;
            imagePreviewContainer.style.display = 'block';
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    function updateHeatValue(value) {
        document.getElementById('heatValue').textContent = value;
    }
</script>
@endsection
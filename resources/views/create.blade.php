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
<form action="{{ route('sauces.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<h1 class="text-center page-title">Ajouter une sauce</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-group">
                <strong>Email</strong>
                <input class="form-control" type="email" id="userID" name="userID" required>

                <strong>Nom de la sauce</strong>
                <input class="form-control" type="text" id="name" name="name" required>

                <strong>Fabricant</strong>
                <input class="form-control" type="text" id="manufacturer" name="manufacturer" required>

                <strong>Description</strong>
                <textarea class="form-control" id="description" name="description" required></textarea>

                <strong>Image</strong>
                <input class="form-control" type="file" id="imageUrl" name="imageUrl" required onchange="previewImage(event)">
                <div id="imagePreviewContainer" style="display: none; margin-top: 15px;">
                    <img id="imagePreview" src="" alt="Aperçu de l'image" style="max-height: 200px; width: auto;">
                </div>
                <br>

                <strong>Ingrédient principal</strong> 
                <input class="form-control" type="text" id="mainPepper" name="mainPepper" required>

                <strong>Chaleur : <span id="heatValue">5</span></strong>
                <input class="form-range heat-slider" type="range" id="heat" name="heat" min="0" max="10" value="5" oninput="updateHeatValue(this.value)">

                <button type="submit" class="btn btn-primary btn-submit">Ajouter la sauce</button>
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

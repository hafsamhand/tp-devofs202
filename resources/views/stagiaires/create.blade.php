@extends('layouts.app')

@section('content')
    
<div class="m-5 fs-1">Création d'un nouveau stagiaire</div>
<div class="d-flex justify-content-end p-3">
    <a href="/stagiaires" class="btn btn-primary"> Retour</a>
</div>
<div class="p-3">
    <form action="{{ route('stagiaires.store')}}" method="post">
        @csrf

        <div>
            <label for="nom">Nom : </label>
            <input type="text" id="nom" name="nom" class="form-control" required placeholder="Pierre"><br/>
            @error("nom")
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div>
            <label for="prenom">Prenom : </label>
            <input type="text" id="prenom" name="prenom" class="form-control @error('prenom') invalid-feedback @enderror" required placeholder="Jon"><br/>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control @error('email') invalid-feedback @enderror" placeholder="name@example.com" required>
            @error("email")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">enregistrer</button>
    </form>

</div>
@endsection

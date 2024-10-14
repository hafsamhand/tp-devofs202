@extends('layouts.app')

@section('content')
    
<div>Liste des stagiaires</div>
<div class="d-flex justify-content-end p-3">
    <a href="/stagiaires/create" class="btn btn-primary"> créer un nouveau stagiaire</a>
</div>
<div>
    <table class="table">
        <thead>
          <tr>
              <th scope="col">Prenom</th>
              <th scope="col">Nom</th>
              <th scope="col">Email</th>
              <th scope="col">actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($stagiaires as $stagiaire)
                <tr>
                    <td scope="row">{{ $stagiaire['prenom'] }}</td>
                    <td scope="row">{{ $stagiaire['nom'] }}</td>
                    <td scope="row">{{ $stagiaire['email'] }}</td>
                    <td scope="row">
                        <a href="" class="btn btn-info">voir</a>    
                        <a href="" class="btn btn-warning">modifier</a>    
                        <a href="" class="btn btn-danger">Supprimer</a>    
                    </td>
                    
                </tr>
            @endforeach
          
        </tbody>
      </table>
</div>
@endsection

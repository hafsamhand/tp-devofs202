@extends('layouts.app')

@section('content')

    hello
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($absences as $absence)
                <tr>
                    <th scope="row">1</th>
                    <td>{{$absence->nom}}</td>
                    <td>Otto</td>
                    <td></td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
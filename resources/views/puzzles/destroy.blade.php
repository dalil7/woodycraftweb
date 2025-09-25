<!-- resources/views/puzzles/delete.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="text-xl font-bold mb-4">Confirmer la suppression</h2>

        <p class="mb-6">Êtes-vous sûr de vouloir supprimer le puzzle <strong>{{ $puzzle->nom }}</strong> ? Cette action est irréversible.</p>

        <form action="{{ route('puzzles.destroy', $puzzle->id) }}" method="POST">
            @csrf
            @method('DELETE')
            
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Supprimer
            </button>
            <a href="{{ route('puzzles.index') }}" class="ml-4 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Annuler
            </a>
        </form>
    </div>
</div>
@endsection

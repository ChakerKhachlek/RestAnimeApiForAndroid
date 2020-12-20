@extends('admin.layout.admin')
@section('content')
    
<div class="container-fluid">
    <div class="row">
        <div >
            <div class="h1">Manage Animes</div>
            {{-- Calling animes management component (Livewire blade) --}}
            @livewire('manage-animes-component')
           
        </div>
    </div>
</div>

@endsection
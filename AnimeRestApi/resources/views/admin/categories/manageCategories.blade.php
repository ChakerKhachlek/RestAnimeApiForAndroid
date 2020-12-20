@extends('admin.layout.admin')
@section('content')
    
<div class="container-fluid">
    <div class="row">
        <div >
            <div class="h1">Manage Categories</div>
            {{-- Calling categories management component (Livewire blade) --}}
            @livewire('manage-categories-component')
           
        </div>
    </div>
</div>

@endsection
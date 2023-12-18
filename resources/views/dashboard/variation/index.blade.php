@extends('layouts.dashboard')
@section('content')
    @livewire('variation.addsize',['prduct' => $id])
    @livewire('variation.color',['prduct' => $id])
@endsection

@extends('layouts.app')

@section('title', 'Beranda - UPT TIK UNIBA Madura')

@section('content')
    @include('partials.home.hero')
    @include('partials.home.layanan-utama')
    @include('partials.home.google-workspace')
    @include('partials.home.helpdesk-cta')
    @include('partials.home.berita-pengumuman')
@endsection

@extends('frontend.layouts.main')

@section('title')
    {{ __('Chat') }}
@endsection

@section('content')
    <chat :user="{{ json_encode(['id' => auth()->user()->id, 'name' => auth()->user()->name]) }}"></chat>
@endsection



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

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
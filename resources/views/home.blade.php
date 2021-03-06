@extends('layouts.html')

@section('html-content')
    <div class="pt-24 text-blue-100 bg-cover bg-center bg-no-repeat h-full md:h-1/2-screen"
         style="background-image: url({{ $site_image_url }}); min-height: 500px;">
        <div class="flex flex-col mx-10 md:flex-row md:px-10 md:mx-auto items-center"
             style="max-width: 900px;">
            <div class="mb-10 md:mb-0 md:mr-10">
                <img src="{{ asset('img/dimitris-savvopoulos-photo.png') }}" alt="{{ $site_name }} logo" style="width:
                150px; height: 150px; opacity: 0.9">
{{--
    Prioritize header image. Idea stolen from
    https://justmarkup.com/articles/2015-02-02-prioritize-loading-of-background-images/
--}}
                <img src="{{ $site_image_url }}" alt="" style="display: none;">
            </div>
            <div class="text-xl flex-1">
                <p class="mb-2">Hi, I'm Dimitris!</p>
                I'm a <a class="underline" href="https://github.com/dimsav/">web developer</a>
                and indie hacker at <a class="underline" href="https://metabook.gr">metabook</a>,
                and also a Co-organizer of the
                <a class="underline" href="https://laravel.gr">Laravel Athens User group</a>
                and author of
                <a class="underline" href="https://github.com/dimsav/laravel-translatable">
                    Laravel Translatable</a>.
            </div>
        </div>
        <div class="absolute bottom-0 pb-3 w-full text-center opacity-75">
            <svg class="inline" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 30 30">
                <path d="M14.996 23.543c-.539 0-1.074-.207-1.484-.617L.617 10.03a2.098 2.098 0 112.969-2.969l11.41 11.41 11.41-11.41a2.098 2.098 0 112.969 2.97L16.48 22.93a2.11 2.11 0 01-1.484.613zm0 0" />
            </svg>
        </div>
    </div>

    @foreach($blog_posts as $blog_post)
        @include('partials.post-preview', ['blog_post' => $blog_post])
    @endforeach
@endsection

@extends('layouts.post')

@section('post-content')

    <p class="text-xl md:text-2xl px-5 my-12">
        jQuery? Yes, jQuery.
    </p>

    <p class="text-xl md:text-2xl px-5 my-12">
        Before getting used to vue, I was constantly choosing jQuery for new projects, because I
        was quite familiar with it. This made me very fast at launching apps with laravel, since
        blade is enough to create an
        <a href="https://en.wikipedia.org/wiki/Minimum_viable_product">MVP</a>.</p>

    <p class="text-xl md:text-2xl px-5 my-12">
        But, as soon as the projects started growing, more complex functionality was required.
        For me this was the moment to realize jQuery was not enough, especially when I wanted to
        provide the perfect frontend experience to my website's users started doing ajax calls.
    </p>

    <p class="text-xl md:text-2xl px-5 my-12">
        So I wanted to start using vueJs but the challenge was that vue dominates the dom it
        uses. And when vue is there, it doesn't give any air for jQuery to breathe.
    </p>

    <p class="text-xl md:text-2xl px-5 my-12">
        Luckily though, after searching around on the web with my
        <a href="https://twitter.com/janokary">co-founder</a>, we found a solution on how to use
        vueJs into projects with jQuery. My goal is to share this know-how with you.
    </p>

    <p class="text-xl md:text-2xl px-5 my-12">
        One of the things that made it very hard for me to understand on how to couple vueJs
        with jQuery was the fact that vue lives in what we all know as a root component and I
        call a "silo".
    </p>
    <h2 class="font-bold text-xl md:text-2xl px-5 my-12">
        What is a silo?
    </h2>
    <p class="text-xl md:text-2xl px-5 my-12">
        If you have your whole html code wrapped inside a single root component, then you have a
        big big silo belonging to vueJs. I know, this is what tutorials teach. But if this how
        you attempt to "inject" vueJs into a jQuery, that cannot and will not work.
    </p>
    <p class="text-xl md:text-2xl px-5 my-12">
        <span class="italic">But I love root components!</span>
        I hear you say. Patience friend, we will get there.
    </p>
    <p class="text-xl md:text-2xl px-5 my-12">
        One characteristic of vueJs is it absorbs all the window events. Something like a black
        hole. This means that jQuery's
        <span class="inline-block bg-gray-200 rounded px-2
        py-1 font-mono text-sm mx-1">on.('click')</span>
        wouldn't work inside a vue component. Your top navigation and hamburger menu code with
        jQuery would stop work for instance.

    </p>
    <p class="text-xl md:text-2xl px-5 my-12">
        Then,
        <span class="italic">(Hallelujah music in the background)</span>
        we realized we could have multiple vueJs root components into a page. By doing that we
        could limit the scope of anti-social but so beautiful vueJs into smaller black hole
        silos.
    </p>
    <p class="text-xl md:text-2xl px-5 my-12">
        So instead of having one huge root component silo belonging to vueJs, we had to inject
        multiple mini ones we could use here and there. And as long as these did not interact in
        some way with jQuery, happy life could go on.
    </p>

    <p class="text-xl md:text-2xl px-5 my-12">
        Enough with the theory and the sentimentals.
    </p>

    <h2 class="font-bold text-xl md:text-2xl px-5 my-12">
        tl;dr show me da code.
    </h2>

    <p class="text-xl md:text-2xl px-5 my-12">
        On metabook.gr, we wanted to lazy load the book covers. This is the blade code:
    </p>

    <p class="text-xl md:text-2xl px-5 my-12">
        {{ '<lazy-img class="vue-root" src="/image.jpg">' }}
    </p>
    <p class="text-xl md:text-2xl px-5 my-12">
        Of course that won't work unless we tell javascript to load it as a vue component.
    </p>
    <p class="text-xl md:text-2xl px-5 my-12">
        In our app.js we declare that every element witht he class ".vue-root" is a vue root
        component.
    </p>

@component('partials.code')
{{ "import LazyImg from './vue/lazy-img'" }}
{{ 'const vueRootElements = document.querySelectorAll(".js-dom");' }}
{{ 'Array.prototype.forEach.call(vueRootElements, (el) =>' }}
<span class="ml-4">{{ 'new Vue({el, ' }}</span>
<span class="ml-8">{{ 'components: {' }}</span>
<span class="ml-12">{{ 'ImgLazy' }}</span>
{!!  "}}))" !!}
@endcomponent

    <p class="text-xl md:text-2xl px-5 my-12">
        By using the technique above, we were finally able to stop writing new jQuery code and
        write only vueJs code.
    </p>
    <p class="text-xl md:text-2xl px-5 my-12">
        This makes us happy because vueJs is much more fun to work with!
    </p>
    <p class="text-xl md:text-2xl px-5 my-12">
        Thank you for reading this! If you use a different approach, please
        <a href="{{ $twitter_url }}">do share it</a> with me!
    </p>

@endsection
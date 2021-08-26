@include('partials.header')
@php $frontpage = is_front_page() @endphp
<div class="{{ $frontpage ? 'wrapper' : 'container' }}">
    <main class="main">
        @yield('content')
    </main>

    @hasSection('sidebar')
        <aside class="sidebar">
            @yield('sidebar')
        </aside>
    @endif
</div>

@if (!$frontpage)
    @include('partials.footer')
@endif

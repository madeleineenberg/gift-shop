@php $frontpage = is_front_page() @endphp
<header class="{{ $frontpage ? 'banner no-margins' : banner }}">
    <div class="container-fluid">
        <a class="brand" href="{{ home_url('/') }}">
            Holiday present generator
        </a>

        <nav class="nav-primary">
            {{-- @if (has_nav_menu('primary_navigation'))
                {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
            @endif --}}
            @if ($menu_items)

                <ul class="nav-primary__list">
                    @foreach ($menu_items as $key => $item)
                        <li class="nav-primary__list-item">
                            @if ($item->title === 'Cart')
                                <a target="{{ $item->target }}" href="{{ $item->url }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="hidden lg:block m-auto" fill="none"
                                        viewBox="0 0 24 24" width="18" height="auto" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                    </svg>
                                    <span>{{ $item->title }}<span>
                                            <span>(<?php echo WC()->cart->get_cart_contents_count(); ?>)<span>
                                </a>
                            @else <a target="{{ $item->target }}"
                                    href="{{ $item->url }}">{{ $item->title }}</a>
                            @endif
                        </li>
                    @endforeach
                </ul>


            @endif
        </nav>
    </div>
</header>

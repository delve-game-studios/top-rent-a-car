<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            @foreach($adminMenu as $item)
                @if(isset($item['dropdown']))
                    <li class="nav-item nav-dropdown">
                        <a href="javascript:void(0);" class="nav-link nav-dropdown-toggle">
                            <i class="nav-icon text-white {{ $item['icon'] }}"></i>
                            <span>{{ __($item['title']) }}</span>
                        </a>
                        <ul class="nav-dropdown-items">
                            @foreach($item['dropdown'] as $playlist)
                                <li class="nav-item">
                                    <a href="{{ route($item['route'], $playlist) }}" class="nav-link">{{ $playlist->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route($item['route']) }}">
                            <i class="nav-icon {{ $item['icon'] }} text-white"></i>
                            <span>&nbsp;{{ __($item['title']) }}</span>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </nav>
</div>

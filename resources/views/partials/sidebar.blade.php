<aside id="sidebar-wrapper">
    <div class="sidebar-brand text-left pl-3">
        <a href="{{ env('APP_URL') }}" class="d-flex align-items-center">
            <img src="{{ url('images/admin/stisla.svg') }}" class="img-fluid bg-light rounded-circle p-2" width="20%" alt="logo">
            <span class="text-dark ml-2 text-uppercase">{{ env('APP_NAME') }}</span>
        </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm overflow-hidden">
        <a href="{{ env('APP_URL') }}"><img src="{{ url('images/admin/stisla.svg') }}" class="w-75 img-fluid" alt="logo"></a>
    </div>
  
    <ul class="sidebar-menu">
        
        @foreach(App\Models\UserPermissions::where([
                    ['enable', '=', '1'],
                    ['active', '=', '1'],
                    ['order', '=', '0'],
                    ['role_id','=',Auth::user()->role_id],
                ])
                ->orderBy('id', 'asc')
                ->get() as $menu)
  
            @if($menu->group == 0)

            <li class="{{ Route::getCurrentRoute()->uri() == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link"><i class="{{ $menu->icon }}"></i><span>{{ $menu->name }}</span></a>
            </li>
            @else
            
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="{{ $menu->icon }}"></i><span>{{ $menu->name }}</span></a>
                
                <ul class="dropdown-menu">
                    @foreach(App\Models\UserPermissions::where([
                            ['enable', '=', '1'],
                            ['active', '=', '1'],
                            ['order', '<>', '0'],
                            ['group', '=', $menu->group],
                            ['role_id','=',Auth::user()->role_id]
                        ])
                        ->orderBy('order', 'asc')
                        ->get() as $sub)
                    
                    <li><a class="nav-link" href="{{ url($sub->route) }}">{{ $sub->name }}</a></li>
                    @endforeach
                </ul>
            </li>
                
            @endif
        @endforeach
    </ul>
</aside>
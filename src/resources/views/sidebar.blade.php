<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark main-sidebar">
{{--    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">--}}
{{--        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>--}}
{{--        <span class="fs-4">Sidebar</span>--}}
{{--    </a>--}}
{{--    <hr>--}}
    @if (in_array(Route::current()->getName(), ['profile.edit', 'profile.store', 'profile.show']))
        @yield('sidebar.collection')
    @endif


    {{--    @elseif (in_array(Route::current()->getName(), ['profile.show', 'profile']))--}}
    {{--        @yield('sidebar.collection')--}}
{{--@if (current)--}}
{{--    <ul class="nav nav-pills flex-column mb-auto">--}}
{{--        <li class="nav-item side-nav">--}}
{{--            <a href="#" class="nav-link sidebar-nav active" aria-current="page">--}}
{{--                <span>--}}
{{--                    Edit View--}}
{{--                </span>--}}
{{--                <svg class="sidebar-img" xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path></svg>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item side-nav">--}}
{{--            <a href="#" class="nav-link text-white sidebar-nav">--}}
{{--                <span>--}}
{{--                    Detail View--}}
{{--                </span>--}}
{{--                <svg class="sidebar-img" xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM4 19V5h16l.002 14H4z"></path><path d="M6 7h12v2H6zm0 4h12v2H6zm0 4h6v2H6z"></path></svg>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item side-nav">--}}
{{--            <a href="#" class="nav-link text-white sidebar-nav">--}}
{{--                <span>--}}
{{--                    List View--}}
{{--                </span>--}}
{{--                <svg class="sidebar-img" xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M4 6h2v2H4zm0 5h2v2H4zm0 5h2v2H4zm16-8V6H8.023v2H18.8zM8 11h12v2H8zm0 5h12v2H8z"></path></svg>--}}
{{--            </a>--}}
{{--        </li>--}}


{{--        <li>--}}
{{--            <a href="#" class="nav-link text-white">--}}
{{--                Products--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="#" class="nav-link text-white">--}}
{{--                Customers--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--    <hr>--}}
</div>

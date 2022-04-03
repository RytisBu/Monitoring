<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark main-sidebar">
    <ul class="nav nav-pills flex-column mb-auto">
{{--        {{ dd(Route::current()->uri) }}--}}
        @if (
            in_array(Route::current()->getName(), ['profile.edit', 'profile.store', 'profile.show'])
         || in_array(Route::current()->getName(), ['system.edit', 'system.store', 'system.show', 'system.list', 'system.create'])
         || in_array(Route::current()->getName(), ['complaint.edit', 'complaint.store', 'complaint.show', 'complaint.list', 'complaint.create']))
            @yield('sidebar.collection')
        @endif
{{--        @if (in_array(Route::current()->getName(), ['system.edit', 'system.store', 'system.show', 'system.list', 'system.create']))--}}
{{--            @yield('sidebar.collection')--}}
{{--        @endif--}}
{{--        @if (in_array(Route::current()->getName(), ['complaint.edit', 'complaint.store', 'complaint.show', 'complaint.list', 'complaint.create']))--}}
{{--            @yield('sidebar.collection')--}}
{{--        @endif--}}
    </ul>
    <hr>
</div>

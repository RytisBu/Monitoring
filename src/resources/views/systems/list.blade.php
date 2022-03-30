@extends('main')

@section('list.view')

<div class="d-flex flex-column bd-highlight mb-3">
    <table class="table table-striped table-hover">
        <thead>
        <tr class="list-header">
            <th scope="col"><a href="{{ route('system.list', ['name', $orderType]) }}">{{ __('main.name') }}</a></th>
            <th scope="col"><a href="{{ route('system.list', ['created_at', $orderType]) }}">{{ __('main.created_at') }}</a></th>
            <th scope="col"><a href="{{ route('system.list', ['updated_at', $orderType]) }}">{{ __('main.updated_at') }}</a></th>
            <th scope="col"><a href="{{ route('system.list', ['status', $orderType]) }}">{{ __('main.status') }}</a></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($systems as $system)
            <tr>
                <th scope="row">{{ $system->name }}</th>
                <th>{{ $system->created_at }}</th>
                <th>{{ $system->updated_at }}</th>
                <td>{{ $system->status }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-end bd-highlight mb-3">
    {{ $systems->links('pagination::bootstrap-4') }}
</div>

@endsection

@section('sidebar.collection')
    Side panel
@endsection

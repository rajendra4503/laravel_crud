@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>MY CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('item.create') }}"> Create New Item</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($items as $key => $item)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $item->title }}</td>
        <td>{{ str_limit($item->description, $limit = 150, $end = '...') }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('item.show',$item->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('item.edit',$item->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['item.destroy', $item->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>
    <div class="pagination_item">
    {!! $items->render() !!}
    </div>
@endsection
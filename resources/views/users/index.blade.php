@section('plugins.Datatables', true)
@extends('adminlte::page')

 
@section('content')


 
@php
$heads = [
    'ID',
    'Name',
    ['label' => 'Email', 'width' => 40],
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
];

 

$config = [
		'data' => $users,
    
    'order' => [[1, 'asc']],
    'columns' => [null, null, null, ['orderable' => false]],
];


@endphp

@if (session('status'))
    <x-adminlte-alert class="bg-teal text-uppercase" icon="fa fa-bell" title="Done" dismissable>
        {{ session('status') }}
    </x-adminlte-alert>
@endif
<x-adminlte-card title="List of Users" theme="dark" icon="fas fa-lg fa-users">
  <span style="padding:5px;" class="float-right"><a href="{{ url('admin/users/create') }}" class="btn btn-info" theme="info" >Add User </a> </span>
<x-adminlte-datatable id="table1" :heads="$heads">
    @foreach($config['data'] as $row)
        <tr>
            @foreach($row as $cell)
                <td>{!! $cell !!}</td>
            @endforeach
        </tr>
    @endforeach
  </x-adminlte-datatable>
  
</x-adminlte-card>
@stop



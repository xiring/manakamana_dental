@extends('layouts.app')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">All Clients <a href="{{ route('client.create') }}" class="btn btn-rounded btn-outline-primary float-right">Add</a></div>
            <div class="card-body">
                <table id="data-table-list" class="table table-bordered">
                    <thead>
                        <th>S.N</th>
                        <th>Customer Id</th>
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>Mobile Number</th>
                        <th>Blood Group</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @php $n=0; @endphp
                        @foreach($datas as $row)
                            <tr>
                                <td>{{ ++$n }}</td>
                                <td>{{ $row->customer_id }}</td>
                                <td>{{ $row->first_name }}</td>
                                <td>{{ $row->gender }}</td>
                                <td>{{ $row->mobile_number }}</td>
                                <td>{{ $row->blood_group }}</td>
                                <td>
                                        <?=($row->status == 0)?
                                        'Deleted'
                                        :
                                        'Active'
                                    ;?>
                                </td>
                                <td>
                                    @if($row->status == 0)
                                        <a href="{{ route('client.change.status', $row->id) }}" class="btn btn-rounded btn-outline-info">Make Active</a>
                                    @else
                                        <a href="{{ route('client.edit', $row->id) }}"  class="btn btn-rounded btn-outline-info">Edit</a>&nbsp;&nbsp;
                                        <a href="{{ route('client.change.status', $row->id) }}" class="btn btn-rounded btn-outline-danger">Delete</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('customScript')
@endsection

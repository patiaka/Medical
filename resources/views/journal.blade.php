@extends('layouts.app')

@section('content')
<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Recents activities</h1>
    </div>
    <!--//col-auto-->
</div>
<!--//row-->
<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">

                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left" id="myTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>user</th>
                                <th>action</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($rows as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->user->name }} <br>{{ $row->user->email }}</td>
                                <td>{{ $row->libelle }}</td>
                                <td>

                                    <a role="button" href="#"
                                        onclick="deleteConfirmation('{{ route('journal.destroy', $row->id) }}')"
                                        class="btn-sm app-btn-danger">
                                        <i class="fa fa-trash fa-lg text-danger"></i>
                                    </a>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">No journal added</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!--//table-responsive-->

            </div>
            <!--//app-card-body-->
        </div>
        <!--//app-card-->

        <!--//app-pagination-->

    </div>
    <!--//tab-pane-->
</div>
<!--//tab-content-->
<!-- Button trigger modal -->
@endsection
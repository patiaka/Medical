@extends('layouts.app')
@section('content')
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Consultation</h1>
        </div>
        <div class="col-auto">
            <div class="page-utilities">
                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                    <div class="col-auto">
                        <form class="table-search-form row gx-1 align-items-center">
                            <div class="col-auto">
                                <input type="text" id="search-orders" name="searchorders"
                                    class="form-control search-orders" placeholder="Search">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn app-btn-secondary">Search</button>
                            </div>
                        </form>

                    </div><!--//col-->
                    <div class="col-auto">

                        <select class="form-select w-auto">
                            <option selected value="option-1">All</option>
                            <option value="option-2">This week</option>
                            <option value="option-3">This month</option>
                            <option value="option-4">Last 3 months</option>

                        </select>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary" href="{{ route('consultation.create') }}">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                <path fill-rule="evenodd"
                                    d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                            </svg>
                            New Consultation
                        </a>
                    </div>
                </div><!--//row-->
            </div><!--//table-utilities-->
        </div><!--//col-auto-->
    </div><!--//row-->
    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">Consulation id</th>
                                    <th class="cell">Staff id</th>
                                    <th class="cell">First Name</th>
                                    <th class="cell">Last Name</th>
                                    <th class="cell">Job Title</th>
                                    <th class="cell">Consulation Date</th>
                                    <th class="cell">Company</th>
                                    <th class="cell">Department</th>
                                    <th class="cell">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($consultations as $consultation)
                                    <tr>
                                        <td class="cell">{{ $consultation->id }}</td>
                                        <td class="cell"><span
                                                class="truncate">{{ $consultation->employee->staffId }}</span></td>
                                        <td class="cell">{{ $consultation->employee->firstName }}</td>
                                        <td class="cell">{{ $consultation->employee->lastName }}</td>
                                        <td class="cell">{{ $consultation->employee->jobTitle }}</td>
                                        <td class="cell">{{ $consultation->created_at }}</td>
                                        <td class="cell">{{ $consultation->employee->company }}</td>
                                        <td class="cell">{{ $consultation->employee->department->name }}
                                        </td>
                                        {{-- <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td> --}}
                                        <td class="cell"><a class="btn-sm app-btn-secondary"
                                                href="{{ route('consultation.edit', $consultation->id) }}"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                </svg></a>
                                            <a class="btn-sm app-btn-secondary"
                                                href="{{ route('consultation.delete', $consultation->id) }}"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="red" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                                </svg></a>
                                            <a class="btn-sm app-btn-secondary"
                                                href="{{ route('consultation.show', $consultation->id) }}"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                                    <path
                                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                                </svg></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="cell" colspan="7">There is no entries for consultation</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div><!--//table-responsive-->

                </div><!--//app-card-body-->
            </div><!--//app-card-->
            <nav class="app-pagination">
                <div class="justify-content-center">
                    {{ $consultations->links() }}
                </div>
            </nav><!--//app-pagination-->

        </div><!--//tab-pane-->

        <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
            <div class="app-card app-card-orders-table mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">

                        <table class="table mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">Order</th>
                                    <th class="cell">Product</th>
                                    <th class="cell">Customer</th>
                                    <th class="cell">Date</th>
                                    <th class="cell">Status</th>
                                    <th class="cell">Total</th>
                                    <th class="cell"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="cell">#15346</td>
                                    <td class="cell"><span class="truncate">Lorem ipsum dolor sit amet eget volutpat
                                            erat</span></td>
                                    <td class="cell">John Sanders</td>
                                    <td class="cell"><span>17 Oct</span><span class="note">2:16 PM</span></td>
                                    <td class="cell"><span class="badge bg-success">Paid</span></td>
                                    <td class="cell">$259.35</td>
                                    <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                                </tr>

                                <tr>
                                    <td class="cell">#15344</td>
                                    <td class="cell"><span class="truncate">Pellentesque diam imperdiet</span></td>
                                    <td class="cell">Teresa Holland</td>
                                    <td class="cell"><span class="cell-data">16 Oct</span><span class="note">01:16
                                            AM</span></td>
                                    <td class="cell"><span class="badge bg-success">Paid</span></td>
                                    <td class="cell">$123.00</td>
                                    <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                                </tr>

                                <tr>
                                    <td class="cell">#15343</td>
                                    <td class="cell"><span class="truncate">Vestibulum a accumsan lectus sed mollis
                                            ipsum</span></td>
                                    <td class="cell">Jayden Massey</td>
                                    <td class="cell"><span class="cell-data">15 Oct</span><span class="note">8:07
                                            PM</span></td>
                                    <td class="cell"><span class="badge bg-success">Paid</span></td>
                                    <td class="cell">$199.00</td>
                                    <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                                </tr>


                                <tr>
                                    <td class="cell">#15341</td>
                                    <td class="cell"><span class="truncate">Morbi vulputate lacinia neque et
                                            sollicitudin</span></td>
                                    <td class="cell">Raymond Atkins</td>
                                    <td class="cell"><span class="cell-data">11 Oct</span><span class="note">11:18
                                            AM</span></td>
                                    <td class="cell"><span class="badge bg-success">Paid</span></td>
                                    <td class="cell">$678.26</td>
                                    <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                                </tr>

                            </tbody>
                        </table>
                    </div><!--//table-responsive-->
                </div><!--//app-card-body-->
            </div><!--//app-card-->
        </div><!--//tab-pane-->

        <div class="tab-pane fade" id="orders-pending" role="tabpanel" aria-labelledby="orders-pending-tab">
            <div class="app-card app-card-orders-table mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">Order</th>
                                    <th class="cell">Product</th>
                                    <th class="cell">Customer</th>
                                    <th class="cell">Date</th>
                                    <th class="cell">Status</th>
                                    <th class="cell">Total</th>
                                    <th class="cell"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="cell">#15345</td>
                                    <td class="cell"><span class="truncate">Consectetur adipiscing elit</span></td>
                                    <td class="cell">Dylan Ambrose</td>
                                    <td class="cell"><span class="cell-data">16 Oct</span><span class="note">03:16
                                            AM</span></td>
                                    <td class="cell"><span class="badge bg-warning">Pending</span></td>
                                    <td class="cell">$96.20</td>
                                    <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!--//table-responsive-->
                </div><!--//app-card-body-->
            </div><!--//app-card-->
        </div><!--//tab-pane-->
        <div class="tab-pane fade" id="orders-cancelled" role="tabpanel" aria-labelledby="orders-cancelled-tab">
            <div class="app-card app-card-orders-table mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">Order</th>
                                    <th class="cell">Product</th>
                                    <th class="cell">Customer</th>
                                    <th class="cell">Date</th>
                                    <th class="cell">Status</th>
                                    <th class="cell">Total</th>
                                    <th class="cell"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td class="cell">#15342</td>
                                    <td class="cell"><span class="truncate">Justo feugiat neque</span></td>
                                    <td class="cell">Reina Brooks</td>
                                    <td class="cell"><span class="cell-data">12 Oct</span><span class="note">04:23
                                            PM</span></td>
                                    <td class="cell"><span class="badge bg-danger">Cancelled</span></td>
                                    <td class="cell">$59.00</td>
                                    <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                                </tr>

                            </tbody>
                        </table>
                    </div><!--//table-responsive-->
                </div><!--//app-card-body-->
            </div><!--//app-card-->
        </div><!--//tab-pane-->
    </div><!--//tab-content-->
    <!-- Button trigger modal -->


    <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">New Consultation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="" action="{{ route('consultation.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <!-- Staff ID -->
                        <div class="mb-3">
                            <label for="staffId" class="form-label">Staff ID</label>
                            <input type="text" class="form-control" id="staffId" name="staffId" value="">
                        </div>
                        <!-- First Name and Last Name -->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="firstName" name="firstName"
                                            placeholder="Employee First Name" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastName" name="lastName"
                                            placeholder="employee last Name" value="" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Birth Date -->
                        <div class="mb-3">
                            <label for="birthDate" class="form-label">Birth Date</label>
                            <input type="date" class="form-control" id="birthDate" name="birthDate" value="">
                        </div>
                        <!-- Job Title -->
                        <div class="mb-3">
                            <label for="jobTitle" class="form-label">Job Title</label>
                            <input type="text" class="form-control" id="jobTitle" name="jobTitle"
                                placeholder="employee job Title" value="" required>
                        </div>
                        <!-- Company -->
                        <div class="mb-3">
                            <label for="company" class="form-label">Company</label>
                            <select class="form-control" name="company" id="company">
                                <option value=""></option>
                                {{-- @foreach ($companys as $company)
                                <option value="{{ $company }}">{{ $company }}</option>
                            @endforeach --}}
                            </select>
                        </div>
                        <!-- Department -->
                        <div class="mb-3">
                            <label for="department_id" class="form-label">Department</label>
                            <select class="form-control" name="department_id" id="department_id">
                                <option value=""></option>
                                {{-- @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach --}}
                            </select>
                            @error('department_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Date Consultation -->
                        <div class="mb-3">
                            <label for="consultationDate" class="form-label">Consultation Date</label>
                            <input type="date" class="form-control" id="consultationDate" name="consultationDate"
                                value="">
                        </div>
                        <!-- Expatriate/National -->
                        <div class="mb-3">
                            <label for="expatNational" class="form-label">Expatriate/National</label>
                            <select class="form-control" name="expatNational" id="expatNational">
                                <option value="Expatriate">Expatriate</option>
                                <option value="National">National</option>
                            </select>
                        </div>
                        <!-- Staff Family -->
                        <div class="mb-3">
                            <label for="staffFamily" class="form-label">Staff Family</label>
                            <select class="form-control" name="staffFamily" id="staffFamily">
                                <option value=""></option>

                            </select>
                        </div>
                        <!-- Injury -->
                        <div class="mb-3">
                            <label for="injury" class="form-label">Injury</label>
                            <select class="form-control" name="injury" id="injury">
                                <option value=""></option>
                                }
                            </select>
                        </div>
                        <!-- Referral -->
                        <div class="mb-3">
                            <label for="referral" class="form-label">Referral</label>
                            <select class="form-control" name="referral" id="referral">
                                <option value=""></option>
                            </select>
                        </div>
                        <!-- Diagnosis -->
                        <div class="mb-3">
                            <label for="diagnosis" class="form-label">Diagnosis</label>
                            <select class="form-control" name="diagnosis" id="diagnosis">
                                <option value=""></option>

                            </select>
                        </div>
                        <button type="submit" class="btn app-btn-primary" data-bs-dismiss="modal">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

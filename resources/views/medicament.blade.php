@extends('layouts.app')

@section('content')
<!-- Page Header -->
<div class="page-header">
    
</div>
<!-- /Page Header -->

<div class="row">
        <div class="col-lg-12 margin-tb mb-3">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('createDepart') }}">New Departement</a>
            </div>
        </div>
    </div>


<div class="row">
    <div class="col-md-12 d-flex">

    
        <div class="card card-table flex-fill">
            <div class="card-header">
                <h3 class="card-title mb-0">Medicines</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table custom-table mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Code medicament</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Stock</th>
                                <th>Concentration</th>
                                <th>Type</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                      
                    <tr>
                    <td>1</td>
                    <td>111</td>
                    <td>sabah</td>
                    <td>sabah</td> 
                    <td>111</td>
                    <td>sabah</td>
                    <td>sabah</td> 
                    <td>sabah</td> 
            <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle"
                                            data-toggle="dropdown" aria-expanded="false"><i
                                                class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="javascript:void(0)"><i
                                                    class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0)"><i
                                                    class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                    </tr>
                 
                        </tbody>
                    </table>

               
                </div>
            </div>
        
        </div>
    </div>
    
</div>

@endsection

@extends('layouts.app')

@section('content')
<!-- Page Header -->
<div class="page-header">
    
</div>
<!-- /Page Header -->

<div class="row">
        <div class="col-lg-12 margin-tb mb-3">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('patients.create') }}">New Patient</a>
            </div>
        </div>
    </div>


<div class="row">
    <div class="col-md-12 d-flex">

    
        <div class="card card-table flex-fill">
            <div class="card-header">
                <h3 class="card-title mb-0">Patients</h3>
            </div>
            <div class="card-body">
                  
                        <style>
                            th.dt-center, td.dt-center { text-align: center;}
                        </style>
                            <table id="patients-table" class="table table-bordered table-hover table-striped dataTable stripe" 
                            role="grid"aria-describedby="patients-table-info">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('Action')}}</th>
                                        <th>{{__('Id')}}</th>
                                        <th>{{__('Code')}}</th>
                                        <th>{{__('Prénom')}}</th>
                                        <th>{{__('Nom')}}</th>
                                        <th>{{__('Email')}}</th>
                                        <th>{{__('Téléphone')}}</th>
                                        <th>{{__('Numéro CIN')}}</th>
                                        <th>{{__('Date Naiss.')}}</th>
                                        <th>{{__('Ville')}}</th>
                                        <th>{{__('Etat')}}</th>
                        
                                    </tr>
                                </thead>
                                <tbody> 
                                    @foreach ($data as $patients)
                                    <tr>
                                        <td><input type="checkbox" class="check-data" id="{{$patients->id}}" name="{{$patients->id}}"></td>
                                        <td class="btn-group">
                                           null 
                                        </td>
                                        <td>{{$patients->id}}</td>
                                        <td>{{$patients->code_patient}}</td>
                                        <td>{{$patients->first_name}}</td>
                                        <td>{{$patients->second_name}}</td>
                                        <td>{{$patients->email}}</td>
                                        <td>{{$patients->telephone}}</td>
                                        <td>{{$patients->cin_number}}</td>
                                        <td>{{date("d/m/Y",strtotime($patients->date_birthday))}}</td>
                                        <td>{{$patients->city}}</td>      
                                    
                                
                                        @if ($patients->status == 0)
                                            <td><i class="fa fa-times text-danger"></i></td>
                                        @endif
                                        @if ($patients->status == 1)
                                            <td><i class="fa fa-check text-success"></i></td>                                
                                        @endif  
                                    @endforeach
                                </tbody>
                            
                            </table>
                    
                    
            </div>
        
        </div>
    </div>
    
</div>




@endsection

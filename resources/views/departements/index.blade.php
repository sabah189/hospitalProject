@extends('layouts.app')

@section('content')
<!-- Page Header -->
<div class="page-header">
    
</div>
<!-- /Page Header -->

<div class="row">
        <div class="col-lg-12 margin-tb mb-3">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('departements.create') }}">New Patient</a>
            </div>
        </div>
    </div>


<div class="row">
    <div class="col-md-12 d-flex">

    
        <div class="card card-table flex-fill">
            <div class="card-header">
                <h3 class="card-title mb-0">Departements</h3>
            </div>
            <div class="card-body">
                  
                  <style>
                      th.dt-center, td.dt-center { text-align: center;}
                  </style>
                      <table id="departement-table" class="table table-bordered table-hover table-striped dataTable stripe" role="grid"aria-describedby="departement-table-info">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>{{__('Action')}}</th>
                                  <th>{{__('Code')}}</th>
                                  <th>{{__('Nom')}}</th>
                                  <th>{{__('localisation')}}</th>
                                  <th>{{__('Etat')}}</th>
                  
                              </tr>
                          </thead>
                          <tbody> 
                              @foreach ($datadepart as $depart)
                              <tr>
                                  <td><input type="checkbox" class="check-data" id="{{$depart->id}}" name="{{$depart->id}}"></td>
                                  <td class="btn-group">
                                     null 
                                  </td>
                                  
                                  <td>{{$depart->code_depart}}</td>
                                  <td>{{$depart->name}}</td>
                                  <td>{{$depart->localisation}}</td>      
                              
                          
                                  @if ($depart->status == 0)
                                      <td><i class="fa fa-times text-danger"></i></td>
                                  @endif
                                  @if ($depart->status == 1)
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

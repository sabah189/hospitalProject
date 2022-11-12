@extends('layouts.app')

@section('content')
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									
									<li class="breadcrumb-item"><a href="{{ route('departement') }}"> <i class="icon-copy fa fa-users" aria-hidden="true"></i> &nbsp;Return</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add New Departement</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
<form action="" method="post">
 <!-- page title area end -->
    <div class="main-content-inner" >
        <div class="row" align="center">
        <div class="col-12 mt-3"  >
        <div class="card col-sm-12"  style="   margin: 0 auto; ">
        <div class="card-body col-sm-12"  style="   margin: 0 auto; ">            
        <div class="row">
        <div class="col-md-12">    
        <div class="row col-sm-12" style="border: 2px solid #99bcd0;border-radius: 12px;padding: 1%">
                
        <input type="text" class="  form-control mb-3" name="nom" placeholder="Code de departement" >
                    
        <input class="form-control mb-3" type="text" name="prenom" id="example-tel-input" placeholder="Name">
            
        <input class="form-control mb-3" type="text" name="cin" id="example-tel-input" placeholder="Localisation">    
        </div>
        </div>
        </div>             
        <!---------------------- start 3------------------------------------------>
                                                    
        <div class=" col-xs-12 col-sm-12 mt-3 " >
        <input type="submit" class="btn btn-primary btn-lg mt-3 " value="valider" name="ajout" style="width: 50%;">
        </div>
        </div>
        </div>        
        </div>
        </div>
        </div>
   
</form>
</div>
</div>
</div>
@endsection
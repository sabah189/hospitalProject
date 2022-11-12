@extends('layouts.app')

@section('content')
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									
									<li class="breadcrumb-item"><a href="{{ route('patients') }}"> <i class="icon-copy fa fa-users" aria-hidden="true"></i> &nbsp;Return</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add New Patient</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
 
<form method="POST" action="{{ route('patients.store') }}" class="form-horizontal" enctype="multipart/form-data">

            <!-- page title area end -->
<div class="main-content-inner" >
<div class="row" align="center">
              
                    <!-- data table start -->

        <div class="col-12 mt-3"  >
        <div class="card col-sm-12"  style="   margin: 0 auto; ">
        <div class="card-body col-sm-12"  style="   margin: 0 auto; ">
        <div class="row">
        <div class="col-md-12">
        <div class="row col-sm-12" style="border: 2px solid #99bcd0;border-radius: 12px;padding: 1%">

 <!-- First name -->

            <label class="col-sm-2 control-label" for="first_name">{{__('First Name')}}<span style="color:red">*</span></label></label>
            <input type="text" class="  form-control mb-3" name="first_name" required id="first_name"  value="{{ old('first_name') }}" placeholder="First Name" >
            @error('first_name')
            <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
            @enderror
              
 <!-- second name -->

            <label class="col-sm-2 control-label" for="second_name">{{__('Second Name')}}<span style="color:red">*</span></label></label>
            <input class="form-control mb-3" type="text" name="second_name" required id="second_name" value="{{ old('second_name') }}" placeholder="Second Name">
            @error('second_name')
            <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
            @enderror

 <!-- Cin -->

            <label class="col-sm-2 control-label" for="cin_number">{{__('C.I.N')}}</label></label>
            <input class="form-control mb-3" name="cin_number"  id="cin_number" type="text"value="{{ old('cin_number') }}" placeholder="Cin">
            @error('cin_number')
            <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
            @enderror

 <!-- Email -->

            <label class="col-sm-2 control-label" for="email">{{__('Email')}}<span style="color:red">*</span></label></label>
            <input class="form-control mb-3" name="email" id="email" type="email" value="{{ old('email') }}" placeholder="Email">
            @error('email')
            <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
            @enderror

<!-- Telephone -->

            <label class="col-sm-2 control-label" for="telphone">{{__('Téléphone')}}<span style="color:red">*</span></label></label>
            <input class="form-control mb-3" name="telephone" id="telephone" type="tel" value="{{ old('telephone') }}"placeholder="Formats: +212 xx xx xx xx ou 06 x xx xx xx" max="25">
            @error('telephone')
            <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
            @enderror

<!-- Sexe -->
                         
            <label class="col-sm-2 control-label">{{__('Sexe')}}</label>
            <select  class="form-control" name="gender">
            <option selected value="male" {{ (old("gender") == 'male' ? "selected":"") }}>Homme</option>
            <option value="female" {{ (old("gender") == 'female' ? "selected":"") }}>Femme</option>
            </select>
            @error('gender')
            <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
            @enderror
            </div>
   
                            
                                           
</div>
</div>
</div>
                  
                    
<!---------------------- start 2-------------------->


    <div class="row">
    <div class="col-md-12 mt-5">
    <div class="row col-sm-12" style="border: 2px solid #99bcd0;border-radius: 12px;padding: 1%">

<!-- Date de naissance -->

            <label class="col-sm-2 control-label">{{__('Date de naissance')}}</label>
            <input type="date"  max="2030-12-30" class="form-control mb-3" value="{{ old('date_birthday') }}" name="date_birthday" placeholder="Date de naissance">
            @error('date_birthday')
            <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
            @enderror  

<!-- Situation familiale -->

            <label class="col-sm-2 control-label">{{__('Situation familiale')}}</label>
            
            <select class="form-control mb-3" name="family_situation">
            <option selected value="married" {{ (old("family_situation") == 'married' ? "selected":"") }}>Marié</option>
            <option value="single" {{ (old("family_situation") == 'single' ? "selected":"") }}>Célibataire</option>
            </select>
            @error('family_situation')
            <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
            @enderror

<!-- Adresse -->

            <label class="col-sm-2 control-label" for="adress">{{__('Adresse')}}</label></label>
            <input class="form-control mb-3" name="adress"  id="adress" type="text" value="{{ old('adress') }}" placeholder="Adresse">
            @error('adress')
            <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
            @enderror

<!-- City -->

            <label class="col-sm-2 control-label" for="city">{{__('city')}}</label></label>
            <input class="form-control mb-3" name="city"  id="city" type="text" value="{{ old('nationality') }}" placeholder="City">
            @error('city')
            <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
            @enderror
            
<!-- Nationality -->

            <label class="col-sm-2 control-label" for="nationality">{{__('Nationalité')}}</label></label>
            <input class="form-control mb-3" name="adress"  id="adress" type="text" value="{{ old('nationality') }}" placeholder="Adresse">
            @error('nationality')
            <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
            @enderror
   
<!-- Photo -->
                          
            <img name ="profile_display_picture" id ="profile_display_picture" src="/storage/app/public/defaultProfile.png" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <label>Charger une photo</label>
            <input type="file" name="profile_picture" id="profile_picture">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @error('profile_picture')
            <div class="p-1 h6 text-danger"><strong> {{ $message }}</strong></div>
            @enderror
                                            
                           
</div>
</div>
</div>
<!----------------- end 2---------------->

<div class=" col-xs-12 col-sm-12 mt-2 " >
            

                
<input type="submit" class="btn btn-primary btn-lg mt-2 mb-3 " value="valider" name="ajout" style="width: 50%;">


                     


</div>
</div>
</div>
<!-- data table end -->
                 
</div>
</div>
</div>
</div>

<!-- @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Succés</h4>
            {{session()->get('success')}}
        </div>
        @endif
        @if (session()->has('fail'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Erreur !</h4>
 
            {{session()->get('fail')}}
        </div>
        @endif -->
</form>
</div>
</div>
@endsection
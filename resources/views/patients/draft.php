<div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <div id="patients-table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                   <style>
                       th.dt-center, td.dt-center { text-align: center;}
                   </style>
                    <table id="patients-table" class="table table-bordered table-hover table-striped dataTable compact stripe" 
                    role="grid"aria-describedby="patients-table-info">
                        <thead>
                            <tr>
                                <th></th>
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
                                    <td><i class="fas fa-times text-danger"></i></td>
                                @endif
                                @if ($patients->status == 1)
                                    <td><i class="fas fa-check text-success"></i></td>                                
                                @endif  
                            @endforeach
                        </tbody>
                       
                    </table>
                   
                <!-- ACTIVATE / DEACTIVATE DOCTOR  DIALOG  JQUERY UI-->
                <div id="deleteDialog" class="h5" title="Supprimer" hidden>
                     L'action que vous êtes sur le point d'effectuer est irreversible. Etes-vous sûr de vouloir supprimer ?
                    <br><br>
                </div>
                 <!-- END OF DELETE DOCTOR SECTION DIALOG JQUERY UI-->
 
                 <!-- ACTIVATE / DEACTIVATE DOCTOR  DIALOG JQUERY UI-->
                <div id="activateDialog"class="h5" title="Activation de profil" hidden>
                   
                    <br><br>
                </div>
                <!-- END OF ACTIVATE DEACTIVATE SECTION DIALOG JQUERY UI-->
 
                <!-- TRANSFER DEPARTEMENT SECTION DIALOG JQUERY UI-->
                    <div id="transferDialog" class="" title="Tranférer" hidden>
                        <form id="transferForm" method="POST" action="" class="form-horizontal">
                        <!-- /.box-header -->
                        <!-- form start -->
                            @csrf
                            <div class="box-body">
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border h4">Service</legend>
                                    <div class="form-group">
                                            <!-- Departement Name -->
                                        <div class="center-block">
                                            <select class="form-control " name="dept_id" id="dept_id">
                                                @foreach ($departements as $departement)
                                                <option value="{{$departement->id}}">{{ucWords($departement->name)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>
                                </fieldset>
                            </div>
                               
                            <div class="box-footer">
                                <button id="transferSubmit" class="btn btn-sm btn-gen pull-right" type="submit">{{__('Transférer')}}</button>
                                <a href="#" id="transferCancel" onclick="transferClose()" class="btn btn-outl" >{{__('Annuler')}}</a>
                            </div>
                        </form>
                    </div>
                <!-- END OF TRANSFER DEPARTEMENT SECTION DIALOG JQUERY UI-->
                   
               
            </div>
        </div>
    </div>


    <script>

$(function () {
       
       let table= $('#patients-table').DataTable({
           language: {
               search: "_INPUT_",
               searchPlaceholder: "Rechercher..."
           },
           dom: 'Bfrtip',
           'paging': true,
           'lengthChange': true,
           'searching': true,
           'ordering': true,
           'info': true,
           'autoWidth': true,
           "scrollX": true,
           columnDefs: [
               {
               orderable: false,
               className: 'select-checkbox',
               targets:   0
               }
           ],
           select: {
               style:    'os',
               selector: 'td:first-child'
           },
          /*  buttons: [   {
               extend:    'colvis',
               text:      '<i class="fas fa-bars"></i>',
               titleAttr: 'Colonnes',
               className: 'btn-light btn-sm border border-secondary rounded ml-1 mr-5'
           }, 
           {
               extend: 'print',
               text: '<i class="fas fa-print"></i>',
               titleAttr: 'Imprimer',
               className: 'btn-light btn-sm border border-secondary rounded ml-1'
           },
           {
               extend:    'copyHtml5',
               text:      '<i class="fa fa-files-o"></i>',
               titleAttr: 'Copier',
               className: 'btn-light btn-sm border border-secondary rounded ml-1'
           },
           {
               extend:    'excelHtml5',
               text:      '<i class="fa fa-file-excel-o"></i>',
               titleAttr: 'Exporter Excel',
               className: 'btn-light btn-sm border border-secondary rounded ml-1'
           },
           {
               extend:    'pdfHtml5',
               text:      '<i class="fa fa-file-pdf-o"></i>',
               titleAttr: 'Exporter PDF',
               className: 'btn-light btn-sm border border-secondary rounded ml-1'
           }
          
           ],*/
       "columnDefs": [
       {className: "dt-center" , targets: "_all"},
       { "width": "5px", targets: 0}, // checkbox
       { "width": "60px", "targets": 1 }, // action
       { "width": "5px", "targets": 2 }, // id
       { "width": "15px", "targets": 3 }, // Matricule
       { "width": "20px", "targets": 4 }, //first name
       { "width": "20px", "targets": 5 }, //second name
       { "width": "60px", "targets": 6 , render: $.fn.dataTable.render.ellipsis( 12 ) }, // sce
       { "width": "40px", "targets": 7 }, // date_integration
       { "width": "10px", "targets": 8 }, //grade
       { "width": "40px", "targets": 9 }, // email
       { "width": "20px", "targets": 10 }, // telephone
       { "width": "20px", "targets": 11 }, // cin number
     
       ],
        'order': [[ 2, "desc" ]],
       });
          /*  table.buttons().container().insertAfter($('#doctor-table_filter label'));
           $('#patients-table_filter .btn-group .btn').addClass('tableButtons');
           $('#patients-table_filter label,#doctor-table_filter .btn-group').wrapAll( '<div id="dynamic-container"></div>');
           //$('#dynamic-container').css({"display": "flex","justify-content": "space-between"}); */
   });

    </script>

<!------------------------------- ADD FORM ------------------>


<div class="box box-info">
 
    <form method="POST" action="{{route('doctor.store')}}" class="form-horizontal" enctype="multipart/form-data">
           
               
            <div class="row">
                <div class="col-md-3 col-md-offset-1 float-right m-5">
                    <img name ="profile_display_picture" id ="profile_display_picture" src="/storage/uploads/profile_pictures/default.png" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                            <label>Charger une photo</label>
                            <input type="file" name="profile_picture" id="profile_picture">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @error('profile_picture')
                            <div class="p-1 h6 text-danger"><strong> {{ $message }}</strong></div>
                            @enderror
                </div>
 
                    <div class="box-header with-border col-md-4 ml-5">
                        <h2 class="">{{__('Nouveau docteur')}}</h2>
                    </div>
                    <br>
                    @if ($errors->any())
                        <div class="col-md-8">
                            <div class="col-md-1"></div>
                            <div class="form-main-error rounded col-md-7 h5 p-4 text-center" style="background-color:#ffcbc7;color:red;">
                             <h5> <b><i class="fas fa-times"></i></b> &nbsp;&nbsp; &nbsp;&nbsp; Données invalides.  Veuillez rectifier les champs signalant des erreurs. </h5>
                            </div>
                        </div>
                    @endif
                </div>
           
         
            <!-- /.box-header -->
            <!-- form start -->
           
                @csrf
                <div class="box-body">
                      <!-- Test Only -->
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Service et spécialité</legend>
                        <div class="form-group">
 
 
                                <!-- Departement Name -->
                                <label class="col-sm-1 control-label" for="dept_id">{{__('Service')}}<span style="color:red">*</span></label>
 
                                <div class="col-sm-4">
                                    <select class="form-control" name="dept_id" id="dept_id" required>
                                        @foreach ($departements as $departement)
                                        <option value="{{$departement->id}}" {{ (old("dept_id") == $departement->id ? "selected":"") }}>{{ucWords($departement->name)}}</option>
                                        @endforeach
                                    </select>
                                    @error('dept_id')
                                        <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
                                    @enderror
                                </div>
 
                                <label class="col-sm-2 control-label">{{__('Date d\'intégration')}}</label>
                                <div class="col-sm-4">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="date"  max="2030-12-30" class="form-control pull-right"
                                        value="{{ old('date_integration') }}" name="date_integration" placeholder="Date d\'intégration">
                                        @error('date_integration')
                                        <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
                                         @enderror
                                    </div>
                                </div>
 
 
                        </div>
                        <!-- MATRICULE  GRADE & date integration -->
                        <div class="form-group">
                       
                         
                            <label class="col-sm-1 control-label" for="grade">{{__('Grade')}}</label></label>
                            <div class="col-sm-4">
                                <select class="form-control" name="grade"  id="grade" type="text"
                                    placeholder="Grade">
                                    <option selected value="A" {{ (old("grade") == 'A' ? "selected":"") }}>A</option>
                                    <option value="B" {{ (old("grade") == 'B' ? "selected":"") }}>B</option>
                                    <option value="C" {{ (old("grade") == 'C' ? "selected":"") }}>C</option>
                                    <option value="D" {{ (old("grade") == 'D' ? "selected":"") }}>D</option>
                                    <option value="E" {{ (old("grade") == 'E' ? "selected":"") }}>E</option>
                                </select>
                                @error('grade')
                                <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
                                @enderror
                            </div>
 
                         
                        </div>
 
                    </fieldset>
                   
                    <fieldset class="scheduler-border mt-5">
                        <legend class="scheduler-border">Coordonnées générales</legend>
 
                        <div class="form-group ">
                            <label class="col-sm-1 control-label" for="first_name">{{__('Prénom')}}<span style="color:red">*</span></label></label>
 
                            <div class="col-sm-4">
                                <input class="form-control" name="first_name" required id="first_name" type="text"
                                value="{{ old('first_name') }}" placeholder="Prénom">
                                @error('first_name')
                                <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
                                @enderror
                            </div>
                   
                            <label class="col-sm-2 control-label" for="second_name">{{__('Nom')}}<span style="color:red">*</span></label></label>
 
                            <div class="col-sm-4">
                                <input class="form-control" name="second_name" required id="second_name" type="text"
                                value="{{ old('second_name') }}" placeholder="Nom">
                                @error('second_name')
                                <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
                                @enderror
                            </div>
                        </div>
 
                        <!-- Email and phone number -->
 
                        <div class="form-group">
                            <label class="col-sm-1 control-label" for="email">{{__('Email')}}<span
                                    style="color:red">*</span></label></label>
 
                            <div class="col-sm-4">
                                <input class="form-control" name="email" id="email" type="email"
                                value="{{ old('email') }}" placeholder="Email">
                                @error('email')
                                <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
                                @enderror
                            </div>
                       
                            <label class="col-sm-2 control-label" for="telphone">{{__('Téléphone')}}<span
                                    style="color:red">*</span></label></label>
 
                            <div class="col-sm-4">
                                <input class="form-control" name="telephone" id="telephone" type="tel"
                                value="{{ old('telephone') }}"placeholder="Formats: +212 xx xx xx xx ou 06 x xx xx xx" max="25">
                                @error('telephone')
                                <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
                                @enderror
                            </div>
                        </div>
 
                        <!-- ADRESSE & NATIONALITY-->
                        <div class="form-group">
                            <label class="col-sm-1 control-label" for="adress">{{__('Adresse')}}</label></label>
 
                            <div class="col-sm-7">
                                <input class="form-control" name="adress"  id="adress" type="text"
                                value="{{ old('adress') }}" placeholder="Adresse">
                                @error('adress')
                                <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
                                @enderror
                            </div>
 
                            <label class="col-sm-1 control-label" for="nationality">{{__('Nationalité')}}</label></label>
 
                            <div class="col-sm-2">
                                <select class="form-control" name="nationality"  id="nationality" type="text"
                                    placeholder="Nationalité">
                                    @foreach ($countries as $element)
                                         <option value="{{$element->id}}" {{ (old("nationality") == $element->id ? "selected":"") }}>{{ucWords($element->nationality)}}</option>
                                     @endforeach
                                </select>
                                @error('nationality')
                                <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
                                @enderror
                            </div>
                        </div>
 
 
                        <!-- CIN & CiTY -->
                        <div class="form-group">
                           
                            <label class="col-sm-1 control-label" for="cin_number">{{__('C.I.N.')}}</label></label>
 
                            <div class="col-sm-4">
                                <input class="form-control" name="cin_number"  id="cin_number" type="text"
                                value="{{ old('cin_number') }}"   placeholder="Numéro d'identité nationale">
                                @error('cin_number')
                                <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
                                @enderror
                            </div>
 
                            <label class="col-sm-2 control-label" for="city">{{__('Ville')}}</label></label>
 
                            <div class="col-sm-4">
                                <select class="form-control" name="city"  id="city" type="text"
                                    placeholder="Ville">
                                    @foreach ($cities as $element)
                                        <option value="{{$element->id}}" {{ (old("city") == $element->id ? "selected":"") }}>{{ucWords($element->nom_ville)}}</option>
                                    @endforeach
                                </select>
                                @error('city')
                                <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
                                @enderror
                            </div>
 
                        </div>
 
                     
                            <div class="form-group">
                                <label class="col-sm-1 control-label">{{__('Sexe')}}</label>
                                <div class="col-sm-2 mr-0 pr-0">
                                    <select  class="form-control" name="gender">
                                        <option selected value="male" {{ (old("gender") == 'male' ? "selected":"") }}>Homme</option>
                                        <option value="female" {{ (old("gender") == 'female' ? "selected":"") }}>Femme</option>
                                    </select>
                                    @error('gender')
                                    <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
                                    @enderror
                                </div>
 
                                <label class="col-sm-1 control-label">{{__('Date de naissance')}}</label>
                                <div class="col-sm-3">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="date"  max="2030-12-30" class="form-control pull-right"
                                        value="{{ old('date_birthday') }}"    name="date_birthday" placeholder="Date de naissance">
                                        @error('date_birthday')
                                            <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
                                        @enderror
                                    </div>
                                </div>
 
                                <label class="col-sm-2 control-label">{{__('Situation familiale')}}</label>
                                <div class="col-sm-2 mr-0 pr-0">
                                    <select class="form-control" name="family_situation">
                                        <option selected value="married" {{ (old("family_situation") == 'married' ? "selected":"") }}>Marié</option>
                                        <option value="single" {{ (old("family_situation") == 'single' ? "selected":"") }}>Célibataire</option>
                                    </select>
                                    @error('family_situation')
                                    <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
                                    @enderror
                                </div>
 
                            </div>
                   
                    </fieldset>
 
                    <!-- Financialy and administrative identity-->
 
                    <fieldset class="scheduler-border mt-5">
                        <legend class="scheduler-border">Infos. Banque et Mutuelle</legend>
                        <div class="form-group">
 
 
                                <!-- Bank Name -->
                                <label class="col-sm-1 control-label" for="bank_name">{{__('Banque')}}</label>
 
                                <div class="col-sm-4">
                                    <select class="form-control" name="bank_name" id="bank_name">
                                       
                                        <option selected value="awb">Attijariwafa Bank</option>
                                        <option value="cih">CIH</option>
                                        <option value="bmce">BMCE</option>
                                        <option value="bp">Banque Populaire</option>
                                        <option value="sg">Société générale</option>
                                        <option value="bmci">BMCI</option>
                                        <option value="poste">Poste du Maroc</option>
                                        <option value="cm">Crédit du Maroc</option>
                                        <option value="ca">Crédit Agricole</option>
                                        <option value="umnia">Umnia Bank</option>
                                        <option value="cfg">CFG Bank</option>
                                        <option value="arabBank">Arab Bank</option>
                                    </select>
                                    @error('bank_name')
                                    <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
                                    @enderror
                                </div>
 
                                <!-- Bank Account N° -->
 
                                <label class="col-sm-2 control-label" for="bank_account">{{__('Numéro de compte')}}</label></label>
 
                                <div class="col-sm-4">
                                    <input class="form-control" name="bank_account"  id="bank_account" type="text"
                                    value="{{ old('bank_account') }}" placeholder="Numéro de compte">
                                    @error('bank_account')
                                    <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
                                     @enderror
                                </div>
 
                        </div>
                        <!-- Mutuelle t Code signature -->
                        <div class="form-group">
                            <label class="col-sm-1 control-label" for="mutuale_name">{{__('Mutuelle')}}</label></label>
   
                            <div class="col-sm-4">
                                <input class="form-control" name="mutuale_name"  id="mutuale_name" type="text"
                                value="{{ old('mutuale_name') }}"    placeholder="Assurance Mutuelle" >
                                @error('mutuale_name')
                                <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
                                @enderror
                            </div>
 
                            <label class="col-sm-2 control-label" for="code_signature">{{__('Code INP')}}</label></label>
   
                            <div class="col-sm-4">
                                <input class="form-control" name="code_signature"  id="code_signature" type="text"
                                value="{{ old('code_signature') }}"    placeholder="Code INP du médecin">
                                @error('code_signature')
                                <div class="h6 text-danger"><strong> {{ $message }}</strong></div>
                                @enderror
                            </div>
 
                        </div>
 
                    </fieldset>
 
                    <fieldset class="scheduler-border mt-5">
                        <legend class="scheduler-border">Notes et remarques</legend>
                        <div class="form-group">
 
                            <div class="col-sm-11">
                                <textarea class="form-control" name="notes"  id="notes"
                                value="{{ old('notes') }}"    placeholder="Notes" rows = "2"> </textarea>
                                @error('notes')
                                    <div class="p-1 rounded h6 text-danger text-center"><strong>* {{ $message }}</strong></div>
                                @enderror
                            </div>
                        </div>
                    </fieldset>    
                <!-- /.box-body -->
                <div class="box-footer">
                   
                    <button class="btn btn-gen pull-right" type="submit">{{__('Ajouter')}}</button>
                    <div class="pull-left m-3">
                        <a href="{{Route('doctor.index')}}" class="btn btn-sm btn-outl ">
                            <i class="fas fa-arrow-left"></i> Retour
                        </a>
               
                        <a href="" class="btn btn-sm btn-outl ">
                            <i class="fas fa-redo"></i> Actualiser
                        </a>
                    </div>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>









        
        <tbody>
                            <?php use Illuminate\Support\Facades\DB; ?>
 
                            @foreach ($data as $app)
                            <tr>
                                <td><input type="checkbox" class="check-data" id="{{$app->id}}" name="{{$app->id}}"></td>
                                <td class="btn-group">
                                    <div class="dropdown inline">
                                        <a class="btn btn-sm dropdown-toggle" type="button" id="more-options" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-cog menu-icon"></i>
                                        </a>
                                        @if ($app->status == 1  )
                                        <ul class="dropdown-menu" aria-labelledby="more-options">
                                            <li><a href="{{route('doctor.edit',$app->id)}}" class=" {{Active::checkRoute('doctor.edit')}}" title="Modifier"><i class="menu-icon fa fa-edit"></i>  Editer infos</a></li>
                                            <li><a href="#" onclick="dialogTransfer({{$app->id}} , {{$app->dept_id}})" class="{{Active::checkRoute('doctor.transferDepartement')}}" title="Transférer"><i class="menu-icon fa fa-exchange-alt"></i>  Transférer nouveau Sce</a></li>
                                            <li><a href="#"><i class="fas fa-user-injured menu-icon"></i>   Patients consultés</a></li>
                                            <li><a href="#"><i class="fas fa-file-signature menu-icon"></i>   Prise en charges</a></li>
                                            <li><a href="#"><i class="fas fa-procedures menu-icon"></i>   Hospitalisations</a></li>
                                            <li><a href="#"><i class="fas fa-envelope menu-icon"></i> Envoyer un message</a></li>
                                            <li><a href="#" onclick="dialogActivate({{$app->id}})" class=" activateButton {{Active::checkRoute('doctor.status')}}" title="Changer le statut"><i class="menu-icon  fas fa-key pr-2"></i>   Désactiver</a></li>
                                            <li><a href="#" onclick="dialogDelete({{$app->id}})" class=" {{Active::checkRoute('doctor.destroy')}}" title="Supprimer"><i class="text-danger fa fa-trash-alt" ></i>  Supprimer</a></li>
                                        </ul>
                                        @endif
                                        @if ($app->status == 0  )
                                        <ul class="dropdown-menu" aria-labelledby="more-options">
                                            <li><a href="{{route('doctor.edit',$app->id)}}" class=" {{Active::checkRoute('doctor.edit')}}" title="Modifier"><i class="menu-icon fa fa-edit"></i>  Editer infos</a></li>
                                            <li><a href="#" onclick="dialogTransfer({{$app->id}} , {{$app->dept_id}})" class=" {{Active::checkRoute('doctor.transferDepartement')}}" title="Transférer"><i class="menu-icon fa fa-exchange-alt"></i>  Transférer nouveau Sce</a></li>
                                            <li><a href="#"><i class="fas fa-user-injured menu-icon"></i>   Patients consultés</a></li>
                                            <li><a href="#"><i class="fas fa-file-signature menu-icon"></i>   Prise en charges</a></li>
                                            <li><a href="#"><i class="fas fa-procedures menu-icon"></i>   Hospitalisations</a></li>
                                            <li><a href="#"><i class="fas fa-envelope menu-icon"></i> Envoyer un message</a></li>
                                            <li><a href="#" onclick="dialogActivate({{$app->id}})" class="{{Active::checkRoute('doctor.status')}}" title="Changer le statut"><i class="menu-icon  fas fa-key pr-2"></i>  Activer</a></li>
                                            <li><a href="#" onclick="dialogDelete({{$app->id}})" class=" {{Active::checkRoute('doctor.destroy')}}" title="Supprimer"><i class="text-danger fa fa-trash-alt"></i>  Supprimer</a></li>
                                        </ul>
                                        @endif
                                    </div>
                                    <a href="{{route('doctor.show',$app->id)}}" class="btn btn-sm{{Active::checkRoute('doctor.show')}}" title="Consulter" ><i class="fas fa-info-circle menu-icon"></i> </a>
                                    {{-- <a href="{{route('doctor.edit',$app->id)}}" class="btn btn-sm btn-secondary {{Active::checkRoute('doctor.edit')}}" title="Modifier" ><i class="fa fa-edit"></i> </a> --}}
                                </td>
                                <td>{{$app->id}}</td>
                                <td>{{$app->code_interne}}</td>
                                <td>{{$app->first_name}}</td>
                                <td>{{$app->second_name}}</td>
                                <td>Sce. {{ucWords(App\Departement::find($app->dept_id)->name)}}</td>
                                <td>{{date("d/m/Y",strtotime($app->date_integration))}}</td>
                                <td>{{$app->grade}}</td>
                                <td>{{$app->email}}</td>
                                <td>{{$app->telephone}}</td>
                                <td>{{$app->cin_number}}</td>
                                <td>{{date("d/m/Y",strtotime($app->date_birthday))}}</td>
                                <?php
                                    $city = DB::table('cities')->where('id', $app->city)->first();
                                    if($city) {
                                ?>      
                                    <td>{{$city->nom_ville}}</td>      
                                <?php } else { ?>
                                    <td>Non assigné</td>
                                <?php } ?>  
                               
                                <td>{{$app->bank_name}}</td>
                                <td>{{$app->bank_account}}</td>
                                <td>{{$app->mutuale_name}}</td>
                                @if ($app->status == 0)
                                    <td><i class="fas fa-times text-danger"></i></td>
                                @endif
                                @if ($app->status == 1)
                                    <td><i class="fas fa-check text-success"></i></td>                                
                                @endif  
                            @endforeach
                        </tbody>

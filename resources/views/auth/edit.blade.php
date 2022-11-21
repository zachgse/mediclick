@extends('layouts.app')



@section('content')

<script type="text/javascript">
    $(function () {
        $("#role").change(function () {
            if ($(this).val() == "Physician") {
                $("#physicianText").show();
            } else {
                $("#physicianText").hide();
            }
        });
    });
</script>


  
      <div class="col-6"> <!---Start of Form Column -->
      <h2 style="text-align:center"><b>Edit Profile</b></h2>
    
    <!---Start of Form--->
    <div class="card-body">
                    <form method="POST" action="/auth/{{ $user->id }}">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label for="contactNo" class="col-md-4 col-form-label text-md-end">{{ __('Contact Number') }}</label>

                        <div class="col-md-6">
                                <input id="contactNo" type="text" class="form-control @error('contactNo') is-invalid @enderror" name="contactNo" value="{{ $user->contactNo }}"  placeholder="Contact Number">

                                @error('contactNo')
                                    <span class="invalid-feedback" role="alert">    
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                        <div class="col-md-6">
                                    
                                <select name="gender" id="gender" type="text" class="form-control " name="gender" value="{{ $user->gender }}" >
                                    <option value="null" selected> --Select--</option>
                                    <option value="Male"> Male </option>
                                    <option value="Female"> Female </option>
                                </select>     
                               
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="branchAdd" class="col-md-4 col-form-label text-md-end">{{ __('Address (Block, Street No)') }}</label>

                        <div class="col-md-6">
                                <input id="branchAdd" type="text" class="form-control @error('branchAdd') is-invalid @enderror" name="branchAdd" value="{{ $user->branchAdd }}"  placeholder="Block or Street Number">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="city" class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>

                        <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $user->city }}"  placeholder="City">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="barangay" class="col-md-4 col-form-label text-md-end">{{ __('Barangay') }}</label>

                        <div class="col-md-6">
                                <input id="barangay" type="text" class="form-control @error('barangay') is-invalid @enderror" name="barangay" value="{{ $user->barangay }}"  placeholder="Barangay">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="zip" class="col-md-4 col-form-label text-md-end">{{ __('Zip') }}</label>

                        <div class="col-md-6">
                                <input id="zip" type="text" class="form-control @error('zip') is-invalid @enderror" name="zip" value="{{ $user->zip }}"  placeholder="Zip code">

                                @error('zip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr>
                        <div class="row mb-3">
                            <label for="conlastName" class="col-md-4 col-form-label text-md-end">{{ __('Contact Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="conlastName" type="text" class="form-control @error('conlastName') is-invalid @enderror" name="conlastName" value="{{ $user->conlastName }}"  placeholder="Last Name">

                                @error('conlastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="confirstName" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="confirstName" type="text" class="form-control @error('confirstName') is-invalid @enderror" name="confirstName" value="{{ $user->confirstName }}"  placeholder="First Name">

                                @error('confirstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="conmiddleName" class="col-md-4 col-form-label text-md-end">{{ __('Middle Name') }}</label>

                            <div class="col-md-6">
                                <input id="conmiddleName" type="text" class="form-control @error('conmiddleName') is-invalid @enderror" name="conmiddleName" value="{{ $user->conmiddleName }}"  placeholder="Middle Name">

                                @error('conmiddleName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="conConNo" class="col-md-4 col-form-label text-md-end">{{ __('Contact Number') }}</label>

                        <div class="col-md-6">
                                <input id="conConNo" type="text" class="form-control @error('conConNo') is-invalid @enderror" name="conConNo" value="{{ $user->conConNo}}"  placeholder="Contact Number">

                                @error('conConNo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="relationship" class="col-md-4 col-form-label text-md-end">{{ __('Relationship to user') }}</label>

                        <div class="col-md-6">
                                <select name="relationship" id="relationship" type="text" class="form-control " name="relationship" value="{{ $user->relationship }}"  placeholder="Relationship">
                                    <option value="null" selected> --Select--</option>
                                    <option value="Partner"> Partner </option>
                                    <option value="Spouse"> Spouse </option>
                                    <option value="Sibling"> Sibling </option>
                                    <option value="Relative"> Relative </option>
                                </select>     
                               
                            </div>
                        </div>

                    
                
                      

                        <div class="row mb-3"id="physicianText" style="display: none">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Specialization') }}</label>

                            <div class="col-md-6">
                              <select name="specialization" id="specialization" type="text">
                                    <option value=""> --Select-- </option>
                                    <option value="Allergy and immunology"> Allergy and immunology</option>
                                    <option value="Anesthesiology"> Anesthesiology </option>
                                    <option value="Dermatology"> Dermatology</option>
                                    <option value="Diagnostic radiology"> Diagnostic radiology </option>
                                    <option value="Emergency medicine"> Emergency medicine </option>
                                    <option value="Family medicine"> Family medicine </option>
                                    <option value="Internal medicine"> Internal medicine</option>
                                    <option value="Medical genetics"> Medical genetics </option>
                                    <option value="Neurology"> Neurology </option>
                                    <option value="Nuclear medicine"> Nuclear medicine</option>
                                    <option value="Obstetrics and gynecology"> Obstetrics and gynecology </option>
                                    <option value="Ophthalmology"> Ophthalmology</option>
                                    <option value="Pathology"> Pathology </option>
                                    <option value="Pediatrics"> Pediatrics</option>
                                    <option value="Physical medicine and rehabilitation"> Physical medicine and rehabilitation </option>
                                    <option value="Preventive medicine"> Preventive medicine</option>
                                    <option value="Psychiatry"> Psychiatry </option>
                                    <option value="Radiation oncology"> Radiation oncology</option>
                                    <option value="Surgery"> Surgery </option>
                                    <option value="Urology"> Urology</option>

                                </select>    
                     
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                           
                                <button type="submit" class="btn btn-warning">
                                    {{ __('Update') }}
                                </button>
                        
                            </div>
                        </div>
                        
                    </form>
                    
                </div>

        </form>
        
        
        </div> <!--End of Form Column--->
        
      </div>
    </div>
    
  </div>
  </section>



 
@endsection
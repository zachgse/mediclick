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

<div class="container-fluid d-flex justify-content-center" style="margin:auto; text-align:left; padding-top: 2%;">
  <div class="container">
    <div class="row"> <!--Start of Image Column -->
      <div class="col-md-6 col-lg-5 d-none d-md-block">
      <img class="image" class="img-fluid" alt="Responsive image" src="img/page.jpg" width="100%" height="auto">
      </div><!---End of Image Column -->
      <div class="col-6"> <!---Start of Form Column -->
      <h2 style="text-align:center"><b>User Registration</b></h2>
      <p style="text-align:center">Please input valid information</p>
    
    <!---Start of Form--->
    <div class="card-body">
                    <form method="POST" action="{{ route('register') }}"  >
                        @csrf
                        
                        <div class="row mb-3">
                            <label for="lastName" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                            <div class="col-md-8">
                                <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName"  placeholder="Last Name">

                                @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="firstName" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                            <div class="col-md-8">
                                <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" placeholder="First Name">

                                @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="middleName" class="col-md-4 col-form-label text-md-end">{{ __('Middle Name') }}</label>

                            <div class="col-md-8">
                                <input id="middleName" type="text" class="form-control @error('middleName') is-invalid @enderror" name="middleName" value="{{ old('middleName') }}" required autocomplete="middleName" placeholder="Middle Name">

                                @error('middleName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Must have at least 8 characters">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="contactNo" class="col-md-4 col-form-label text-md-end">{{ __('Contact Number') }}</label>

                            <div class="col-md-8">
                                <input id="contactNo" type="number" class="form-control @error('contactNo') is-invalid @enderror" name="contactNo" value="{{ old('contactNo') }}" required autocomplete="contactNo" placeholder="Contact Number">

                                @error('contactNo')
                                    <span class="invalid-feedback" role="alert">    
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                            <div class="col-md-8">
                                <select name="gender" id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender">
                                    <option value=""> --Select-- </option>
                                    <option value="Male"> Male </option>
                                    <option value="Female"> Female </option>
                                </select>     
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="branchAdd" class="col-md-4 col-form-label text-md-end">{{ __('Address (Block, Street No)') }}</label>

                            <div class="col-md-8">
                                <input id="branchAdd" type="text" class="form-control @error('branchAdd') is-invalid @enderror" name="branchAdd" value="{{ old('branchAdd') }}" required autocomplete="branchAdd" placeholder="Block or Street Number">

                                @error('branchAdd')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="city" class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>

                            <div class="col-md-8">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" placeholder="City">

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="barangay" class="col-md-4 col-form-label text-md-end">{{ __('Barangay') }}</label>

                            <div class="col-md-8">
                                <input id="barangay" type="text" class="form-control @error('barangay') is-invalid @enderror" name="barangay" value="{{ old('barangay') }}" required autocomplete="barangay" placeholder="Barangay">

                                @error('barangay')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="zip" class="col-md-4 col-form-label text-md-end">{{ __('Zip') }}</label>

                            <div class="col-md-8">
                                <input id="zip" type="number" class="form-control @error('zip') is-invalid @enderror" name="zip" value="{{ old('zip') }}" required autocomplete="zip" placeholder="Zip code">

                                @error('zip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr>
                        <h6 style="text-align:center">Emergency Contact Person</h6>
                        <br>
                        <div class="row mb-3">
                            <label for="conlastName" class="col-md-4 col-form-label text-md-end">{{ __('Contact Last Name') }}</label>

                            <div class="col-md-8">
                                <input id="conlastName" type="text" class="form-control @error('conlastName') is-invalid @enderror" name="conlastName" value="{{ old('conlastName') }}" required autocomplete="conlastName" placeholder="Last Name">

                                @error('conlastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="confirstName" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                            <div class="col-md-8">
                                <input id="confirstName" type="text" class="form-control @error('confirstName') is-invalid @enderror" name="confirstName" value="{{ old('confirstName') }}" required autocomplete="confirstName" placeholder="First Name">

                                @error('confirstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="conmiddleName" class="col-md-4 col-form-label text-md-end">{{ __('Middle Name') }}</label>

                            <div class="col-md-8">
                                <input id="conmiddleName" type="text" class="form-control @error('conmiddleName') is-invalid @enderror" name="conmiddleName" value="{{ old('conmiddleName') }}" required autocomplete="conmiddleName" placeholder="Middle Name">

                                @error('conmiddleName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="conConNo" class="col-md-4 col-form-label text-md-end">{{ __('Contact Number') }}</label>

                            <div class="col-md-8">
                                <input id="conConNo" type="text" class="form-control @error('conConNo') is-invalid @enderror" name="conConNo" value="{{ old('conConNo') }}" required autocomplete="conConNo" placeholder="Contact Number">

                                @error('conConNo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="relationship" class="col-md-4 col-form-label text-md-end">{{ __('Relationship to user') }}</label>

                            <div class="col-md-8">
                                <select name="relationship" id="relationship" type="text" class="form-control @error('relationship') is-invalid @enderror" name="relationship" value="{{ old('relationship') }}" required autocomplete="relationship" placeholder="Relationship">
                                    <option value=""> --Select-- </option>
                                    <option value="Partner"> Partner </option>
                                    <option value="Spouse"> Spouse </option>
                                    <option value="Sibling"> Sibling </option>
                                    <option value="Relative"> Relative </option>
                                </select>     
                                @error('relationship')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                            </div>
                        </div>

                    
                
                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

                            <div class="col-md-8">
                                <select name="role" id="role" type="text" class="form-control @error('relationship') is-invalid @enderror" name="role" value="{{ old('role') }}" required autocomplete="role" >
                                    <option value=""> --Select-- </option>
                                    <option value="Patient"> Patient </option>
                                    <option value="Clinic Admin"> Clinic Admin </option>
                                    <option value="Physician"> Physician</option>
                                    <option value="Staff"> Staff </option>
                                </select>     
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                            </div>
                        </div>

                        <div class="row mb-3"id="physicianText" style="display: none">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Specialization') }}</label>

                            <div class="col-md-8">
                              <select name="specialization" id="specialization" type="text" class="form-control">
                                    <option value=""> Please Select Specialization</option>
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
                        <div class="col-12">
                         <div class="form-check" style="text-align:center">
                            <input class="form-check-input" type="checkbox" id="gridCheck" required>
                            <label class="form-check-label" for="gridCheck">
                             I agree to the <a class="" href="/termsandconditions" role="button">Terms and Conditions</a> and
                            <a class="" href="/privacypolicies" role="button"> Privacy Policy</a>  of MediClick.
                        </label>
                        </div>
                    </div>
                    <br>
                 
                    <br>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4" style="text-align:center">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('Register') }}
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
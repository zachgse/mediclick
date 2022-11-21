<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


        <title>{{config('app.name', 'MediClick')}}</title>


        <nav class="navbar sticky-top navbar-expand-lg navbar-light shadow-sm p-3 mb-5 bg-body rounded" style="background-color: white;">
            <a class="navbar-brand" href="/home"><img src="{{asset('img/s-logo.png')}} " width="50" height="30"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
              <ul class="navbar-nav">
                
               
               
         
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif


                          
                         <!--Patient User-->
                            @elseif(Auth::user()->role== 'Patient')

                            

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Appointments
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/createApp">Set Appointment <span class="sr-only"></span></a>
                                    <a class="dropdown-item" href="/patientViewAppointments">My Appointments <span class="sr-only"></span></a>
                                    </a>
                                </div>
                            </li>

                            

                            <li class="nav-item ">
                             <a class="nav-link" href="/patientRecord">Access request <span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item ">
                             <a class="nav-link" href="/myRecords">My records<span class="sr-only"></span></a>
                            </li>
                           
              
                          
                           <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->lastName }}
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/profile">My Profile <span class="sr-only"></span></a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                        <!--End of Patient User-->

                        <!--System Admin User-->
                        @elseif(Auth::user()->role== 'System Admin')
                            <li class="nav-item ">
                             <a class="nav-link" href="/sysAd-Dashboard">Dashboard <span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="/sysAd-viewClinics"> Clinics<span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link"href="/sysAd-AuditLogs">Audit Logs<span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link"href="/sysAd-Feedbacks">Feedbacks<span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link"href="/sysAd-Payments">Payments<span class="sr-only"></span></a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->lastName }}
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/profile">My Profile <span class="sr-only"></span></a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                           
                          
                        <!--End of System Admin User-->


                        <!--Nurse User-->
                        @elseif(Auth::user()->role== 'Nurse')
                            <li class="nav-item">
                             <a class="nav-link" href="/createApp">Appointment <span class="sr-only"></span></a>
                            </li>
                            
                            
                           <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->lastName }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                
                                    <a class="nav-link" href="/about">My Profile <span class="sr-only"></span></a>
                                  
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <!--End of Nurse User-->

                        <!--Physician User-->
                        @elseif(Auth::user()->role== 'Physician')
                            @if(Auth::user()->status == '1')

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Patients
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/employeePatientRecords"> My Patient Records <span class="sr-only"></span></a>
                                    <a class="dropdown-item" href="/physician-listPatients">List of all Patients <span class="sr-only"></span></a>
                                    </a>
                                </div>
                            </li>
                            
                            <li class="nav-item ">
                             <a class="nav-link" href="/apply-clinic">Apply clinic <span class="sr-only"></span></a>
                            </li>
                            
                            
                         
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Appointments
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/employeeViewAppointments">My Appointments <span class="sr-only"></span></a>
                                    <a class="dropdown-item"href="/walkInAppointmentList">Walk-in Appointments <span class="sr-only"></span></a>
                                    </a>
                                </div>
                            </li>
                            
                            
              
                           <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->lastName }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/profile">My Profile <span class="sr-only"></span></a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @elseif(Auth::user()->status == '0')
                        
                            <li class="nav-item ">
                             <a class="nav-link" href="/profile">My Profile <span class="sr-only"></span></a>
                        
                            <li class="nav-item ">
                             <a class="nav-link" href="/apply-clinic">Apply clinic <span class="sr-only"></span></a>
                            </li>
                           <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->lastName }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endif
                        <!--End of Physician User-->

                        <!--Staff User-->
                        @elseif(Auth::user()->role== 'Staff')
                        @if(Auth::user()->status == '1')

                            <li class="nav-item">
                                <a class="nav-link" href="/staffPatientRecords"> Patient Records <span class="sr-only"></span></a>
                            </li>



                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Appointments
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/staffViewAppointments">Scheduled Appointments <span class="sr-only"></span></a>
                                    <a class="dropdown-item"href="/walkInAppointmentList_staff">Walk-in Appointments <span class="sr-only"></span></a>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item ">
                             <a class="nav-link" href="/apply-clinic">Apply clinic <span class="sr-only"></span></a>
                            </li>



                            <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->lastName }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/profile">My Profile <span class="sr-only"></span></a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                            </li>
                            @elseif(Auth::user()->status == '0')


                        

                            <li class="nav-item ">
                            <a class="nav-link" href="/profile">My Profile <span class="sr-only"></span></a>

                            <li class="nav-item ">
                            <a class="nav-link" href="/apply-clinic">Apply clinic <span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->lastName }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                            </li>
                            @endif

                        
                        <!--End of Staff User-->

                        <!--Clinic Admin User-->  
                        @elseif(Auth::user()->role== 'Clinic Admin')
                              @if(Auth::user()->status == '1')
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="/clinicAdminDashboard">Dashboard</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="/clinicAdmin-patientRecords"></i> Patient Records</a>
                                </li>
                               

                                
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Users
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/clinicAdminPatientView">Patients</a>
                                        <a class="dropdown-item"href="/clinicAdminPhysicianView">Physicians</a>
                                        <a class="dropdown-item"href="/clinicAdminStaffView">Staff</a>

                                        </a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Appointments
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/viewAppointments">Appointments</a>
                                        <a class="dropdown-item" href="/clinicAdmin-cancelledAppts">Cancelled Appointments</a>
                                        

                                        </a>
                                    </div>
                                </li>

                                @elseif(Auth::user()->status == "0")
                                <li class="nav-item">
                                    <a class="nav-link" href="/pricing">Subscription</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/create">Register Clinic</a>
                                </li>

                                @elseif(Auth::user()->status == "3")
                                <li class="nav-item">
                                    <a class="nav-link" href="/subscriptionaccount"></i> Account</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/pricing">Subscription</a>
                                </li>
                        

                                @endif
  
                  
                           <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->lastName }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/subscriptionaccount"></i> Account</a>
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                               

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                        </ul>
                        <!--End of Clinic Admin User-->
            </div>
          </nav>


</html>
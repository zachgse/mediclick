@extends('layouts.physician')


@section('content')
<div class="row">
    <div class="col-md-6">
      <div class="col-md-12" style="border: 1px solid; border-radius:5px; padding:2%;">
            <h4>Patient Details</h4>
            <hr>
            <div class="row">
            <div class="col"><b>Name</b></div>
            <div class="col">[Last Name][First Name][Middle]</div>
            </div>
            <div class="row">
            <div class="col"><b>Email</b></div>
            <div class="col">[Email]</div>
            </div>
            <div class="row">
            <div class="col"><b>Contact Number</b></div>
            <div class="col">[Contact Number]</div>
            </div>
            <div class="row">
            <div class="col"><b>Gender</b></div>
            <div class="col">[Gender]</div>
            </div>
            <div class="row">
            <div class="col"><b>Address</b></div>
            <div class="col">[Address]</div>
            </div>
        </div>
        <br>
        <div class="col-md-12" style="border: 1px solid; border-radius:5px; padding:2%;">
            <h4>Emergency Contact Details</h4>
            <hr>
            <div class="row">
                <div class="col"><b>Name</b></div>
                <div class="col">[Last Name][First Name][Middle]</div>
            </div>
            <div class="row">
                <div class="col"><b>Email</b></div>
                <div class="col">[Email]</div>
            </div>
            <div class="row">
                <div class="col"><b>Contact Number</b></div>
                <div class="col">[Contact Number]</div>
            </div>
            <div class="row">
                <div class="col"><b>Gender</b></div>
                <div class="col">[Gender]</div>
            </div>
            <div class="row">
                <div class="col"><b>Address</b></div>
                <div class="col">[Address]</div>
            </div>
            <div class="row">
                <div class="col"><b>Reationship to Patient</b></div>
                <div class="col">[Reationship to Patient]</div>
            </div>
    </div>
    </div>
    <div class="col-md-6">
        <div class="col-md-12" style="border: 1px solid; border-radius:5px; padding:2%;">
            <h4 style="text-align: center"><b>Patient Records</b></h4>

            <table class="table table-bordered"></span>
                <thead class="table-light">
                <th>Date of Apppointment</th>
                <th>Clinic</th>
                <th>Physician</th>
                <th>Action</th>
                </thead>
                <tbody>
                    <td>[DD/MM/YR]</td>
                    <td>[Clinic]</td>
                    <td>[Physician]</td>
                    <td>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" style="background-color:beige; color:black;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/viewPhysicianDetails" 
                            data-bs-toggle="modal" data-bs-target="#exampleModal">View Records</a>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div><!--End of Column-->
</div><!--End of Row-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MediClick</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        A request is sent to the Patient in accordance to the <a href="/privacypolicies"> Privacy policy</a>.
      </div>
    </div>
    </div>
    </div>
    


@endsection
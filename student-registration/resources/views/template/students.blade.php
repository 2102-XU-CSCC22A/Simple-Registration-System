@extends('layouts.app')

@section('content')

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <section class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="card-title">Students</h3>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="card-body">
                                <table id="student-table" class="table table-bordered table-hover">
                                    <div class="mb-2">
                                        <div class="row mt-0">
                                            <div class="col-12">
                                                <button class="btn btn-outline-primary mr-1 float-right"  type="button" id="reload-student-table-btn">
                                                <i class="fas fa-sync fa-fw"></i></button>

                                                <button class="btn btn-outline-primary mr-1 float-right" type="button" id="create-student-btn">
                                                <i class="fas fa-plus fa-fw"></i>Create</button>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <tfoot>
                                        <tr>
                                            <th>ID Number</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Program / Course</th>
                                            <th>Year Level</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal fade" role="dialog" aria-hidden="true" tabindex="-1" role="dialog" id="modal-form-student" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog modal-custom" role="document">  
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title card-modal-title"> </h3> 
                                        
                                        <div class="float-right">
                                            <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">
                                            <i class="fas fa-times fa-fw"></i></button>
                                        </div>    
                                    </div>
                                    <div class="container-fluid">
                                        <div class="card-body">
                                            @csrf
                                            <form id="student-form">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="mt-1">
                                                            <label for="last_name">Last Name</label> 
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" id="last_name" name="last_name" required autocomplete="last_name" placeholder="Doe">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-file-signature"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="text-danger">
                                                            <strong id="last-name-error"></strong>
                                                        </span>
                                                        <hr>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="mt-1">
                                                            <label for="first_name">First Name</label> 
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" id="first_name" name="first_name" required autocomplete="first_name" placeholder="John">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-file-signature"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="text-danger">
                                                            <strong id="first-name-error"></strong>
                                                        </span>
                                                        <hr>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="mt-1">
                                                            <label for="middle_name">Middle Name</label>   
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" id="middle_name" name="middle_name" required autocomplete="middle_name" placeholder="McGarret">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-file-signature"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="text-danger">
                                                            <strong id="middle-name-error"></strong>
                                                        </span>
                                                        <hr>
                                                    </div>
                                                    
                                                    <div class="col-md-3">
                                                        <div class="mt-1">
                                                            <label for="suffix">Suffix</label>   
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <select type="text" class="form-control" id="suffix" name="suffix" required autocomplete="suffix">
                                                                <option value=''>- Suffix -</option>
                                                                <option value='Jr.'>Jr.</option>
                                                                <option value='Sr.'>Sr.</option>
                                                                <option value='II'>II</option>
                                                                <option value='III'>III</option>
                                                                <option value='IV'>IV</option>
                                                            </select>   
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-file-signature"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="text-danger">
                                                            <strong id="suffix-error"></strong>
                                                        </span>
                                                        <hr>
                                                    </div>

                                                    <div class="col-md-5">
                                                        <div class="mt-1">
                                                            <label for="id_number">Campus ID</label>   
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" id="id_number" name="id_number" required autocomplete="id_number" placeholder="2000-001122">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-id-badge"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="text-danger">
                                                            <strong id="id-number-error"></strong>
                                                        </span>
                                                        <hr>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="mt-1">
                                                            <label for="birthdate">Birthdate</label>   
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control date-time-picker" id="birthdate" name="birthdate" placeholder="01-Jan-2001"> 
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-birthday-cake"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="text-danger">
                                                            <strong id="birthdate-error"></strong>
                                                        </span>
                                                        <hr>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="mt-1">
                                                            <label for="gender">Gender</label>   
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <select type="text" class="form-control" id="gender" name="gender" required autocomplete="gender" placeholder="McGarret">
                                                                <option value=''>- Gender -</option>
                                                                <option value='1'>Male</option>
                                                                <option value='0'>Female</option>
                                                            </select>
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-venus-mars"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="text-danger">
                                                            <strong id="gender-error"></strong>
                                                        </span>
                                                        <hr>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="mt-1">
                                                            <label for="year_level">Year Level</label>   
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <select type="text" class="form-control" id="year_level" name="year_level" required autocomplete="year_level">
                                                                <option value=''>- Year Level -</option>
                                                                <option value='1'>1st Year</option>
                                                                <option value='2'>2nd Year</option>
                                                                <option value='3'>3rd Year</option>
                                                                <option value='4'>4th Year</option>
                                                                <option value='5'>5th Year</option>
                                                            </select>
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-user-graduate"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="text-danger">
                                                            <strong id="year-level-error"></strong>
                                                        </span>
                                                        <hr>
                                                    </div>

                                                    <div class="col-md-8">
                                                        <div class="mt-1">
                                                            <label for="program">Program</label>   
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" id="course" name="course" required autocomplete="course" placeholder="BS Computer Science">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-graduation-cap"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="text-danger">
                                                            <strong id="course-error"></strong>
                                                        </span>
                                                        <hr>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mt-1">
                                                            <label for="email">Email Address</label>   
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" id="email" name="email" required autocomplete="email" placeholder="doejohn@gmail.com">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-at"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="text-danger">
                                                            <strong id="email-error"></strong>
                                                        </span>
                                                        <hr>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mt-1">
                                                            <label for="phone_no">Phone Number</label>   
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" id="phone_no" name="phone_no" required autocomplete="phone_no" placeholder="09123456789">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-mobile-alt"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="text-danger">
                                                            <strong id="phone-no-error"></strong>
                                                        </span>
                                                        <hr>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mt-1">
                                                            <label for="address">Home Address</label>   
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" id="address" name="address" required autocomplete="address" placeholder="My Home Address">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-address-card"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="text-danger">
                                                            <strong id="address-error"></strong>
                                                        </span>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="card-footer">
                                            <button type="button" id="delete-student-modal-btn" class="btn btn-outline-primary float-left">
                                                <i class="fas fa-trash fa-fw"></i>Delete
                                            </button>
                                            <button type="button" id="save-student-modal-btn" class="btn btn-outline-primary float-right"></button>
                                            <button type="button" id="close-student-modal-btn" class="btn btn-outline-primary float-right mr-2" data-dismiss="modal">
                                                <i class="fas fa-times fa-fw"></i>Cancel
                                            </button>
                                        </div>   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
    
@endsection
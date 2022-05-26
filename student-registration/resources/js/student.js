const Swal = require('sweetalert2')

$(function()   
{
    let student, temp, endpoint;

    $('.date-time-picker').datetimepicker({
        format: 'DD-MMM-YYYY',
        daysOfWeekDisabled: [0, 6],
        allowInputToggle: true
    });

    student = $('#student-table').DataTable({
        processing: true,
        language: {
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>'
        }, 
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
        aaSorting: [],
        ajax:{
            url:'/student/getAll', 
            dataSrc:function(json){
                return json.data;
            },
        },
        columns: [  
            {title: 'ID Number', data: 'id_number', name: 'id_number'},
            {title: 'First Name', data: 'first_name', name: 'first_name'},
            {title: 'Middle Name', data: 'middle_name', name: 'middle_name'},
            {title: 'Last Name', data: 'last_name', name: 'last_name'},
            {title: 'Program / Course', data: 'course', name: 'course'},
            {title: 'Year Level', data: 'year_level', name: 'year_level'},
        ],
    });

    $('#student-table').on('click', 'tbody td', function() {
        let row_tm = ('API row values : ', student.row(this).data());
        let param_id = row_tm.id;
        temp = param_id;

        get_student(param_id);
    });

    function get_student(param_id) {
        endpoint = 'update'

        $('#delete-student-modal-btn').show();

        $('#student-form')[0].reset();
        $('#position-name-error').empty();
        $('#last-name-error').empty();
        $('#first-name-error').empty();
        $('#middle-name-error').empty();
        $('#suffix-error').empty();
        $('#id-number-error').empty();
        $('#birthdate-error').empty();
        $('#gender-error').empty();
        $('#year-level-error').empty();
        $('#course-error').empty();
        $('#email-error').empty();
        $('#phone-no-error').empty();
        $('#address-error').empty();
        
        $.get(`/student/getById/${param_id}`, function(result) {
            $('#id_number').empty().val(result.data.id_number);
            $('#first_name').empty().val(result.data.first_name); 
            $('#middle_name').empty().val(result.data.middle_name);  
            $('#last_name').empty().val(result.data.last_name); 
           
            $('#suffix').val(result.data.suffix); 
            $('#gender').val(result.data.gender); 

            $('#birthdate').empty().val(result.data.birthdate); 
            $('#phone_no').empty().val(result.data.phone_no); 
            $('#email').empty().val(result.data.email); 
            $('#address').empty().val(result.data.address); 
            $('#course').empty().val(result.data.course); 
          
            $('#year_level').val(result.data.year_level); 
        });

        $('.card-modal-title').text('View Student');
        $('#save-student-modal-btn').text('Update').prepend( '<i class="fas fa-check fa-fw"></i>' );;
        $('#modal-form-student').modal('show');
    }

    $('body').on('click', '#create-student-btn', function() {
        endpoint = 'create';
        
        $('#delete-student-modal-btn').hide();

        $('#student-form')[0].reset();
        $('#position-name-error').empty();
        $('#last-name-error').empty();
        $('#first-name-error').empty();
        $('#middle-name-error').empty();
        $('#suffix-error').empty();
        $('#id-number-error').empty();
        $('#birthdate-error').empty();
        $('#gender-error').empty();
        $('#year-level-error').empty();
        $('#course-error').empty();
        $('#email-error').empty();
        $('#phone-no-error').empty();
        $('#address-error').empty();

        $('.card-modal-title').text('Create Student');
        $('#save-student-modal-btn').text('Create').prepend( '<i class="fas fa-check fa-fw"></i>' );
        $('#modal-form-student').modal('show');
    });

    $('body').on('click', '#save-student-modal-btn', function() {
        let param_id = temp
       
        $('#save-student-modal-btn').prop('disabled', true);
        $('#close-student-modal-btn').prop('disabled', true);
       
        if(endpoint == 'create') {
            save_url = '/student/create';
            save_title = 'Sucessfully Created';
            save_message = 'New student has been created.';

            formData = $('#student-form').serializeArray();
        } 
        else {
            save_url = `/student/update/${param_id}`;
            save_title = 'Sucessfully Updated';
            save_message = 'The student has been updated.';

            formData = $('#student-form').serializeArray();
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: save_url,
            data: formData,
        
            success: function() {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: save_title,
                    text: save_message,
                    showConfirmButton: false,
                    timer: 1500
                });

                $('#position-name-error').empty();
                $('#last-name-error').empty();
                $('#first-name-error').empty();
                $('#middle-name-error').empty();
                $('#suffix-error').empty();
                $('#id-number-error').empty();
                $('#birthdate-error').empty();
                $('#gender-error').empty();
                $('#year-level-error').empty();
                $('#course-error').empty();
                $('#email-error').empty();
                $('#phone-no-error').empty();
                $('#address-error').empty();
                
                $('#save-student-modal-btn').prop('disabled', false);
                $('#close-student-modal-btn').prop('disabled', false);

                student.ajax.reload(); 
                $('#modal-form-student').modal('hide');
            },
            error: function(data) {
                var obj = JSON.parse(data.responseText);
                console.log(obj.errors);
                if(obj.errors) {
                    $('#last-name-error').empty().html(obj.errors.last_name);
                    $('#first-name-error').empty().html(obj.errors.first_name);
                    $('#middle-name-error').empty().html(obj.errors.middle_name);
                    $('#suffix-error').empty().html(obj.errors.suffix);
                    $('#id-number-error').empty().html(obj.errors.id_number);
                    $('#birthdate-error').empty().html(obj.errors.birthdate);
                    $('#gender-error').empty().html(obj.errors.gender);
                    $('#year-level-error').empty().html(obj.errors.year_level);
                    $('#course-error').empty().html(obj.errors.course);
                    $('#email-error').empty().html(obj.errors.email);
                    $('#phone-no-error').empty().html(obj.errors.phone_no);
                    $('#address-error').empty().html(obj.errors.address);

                    $('#save-student-modal-btn').prop('disabled', false);
                    $('#close-student-modal-btn').prop('disabled', false);
                }
            },
        });
    });

    $('body').on('click', '#delete-student-modal-btn', function() {
        let param_id = temp

        $('#delete-student-modal-btn').prop('disabled', true);
        
        Swal.fire({
            title: 'Delete Student',
            text: 'Are you sure you want to delete this student?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#C82333',
            confirmButtonText: '<i class="fas fa-check fa-fw"></i> Confirm?',
            cancelButtonColor: '#5A6268',
            cancelButtonText: '<i class="fas fa-times fa-fw"></i> Cancel?',
            reverseButtons: false
        
        }).then((result) => {
            if(result.isConfirmed) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: `/student/delete/${param_id}`,
                    success: function() {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'The student has been deleted.',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        
                        student.ajax.reload(); 
                        $('#modal-form-student').modal('hide');
                    },
                    error: function() {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Error!',
                            text: 'There is an error.',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                });
            } 
            else if(result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    position: 'center',
                    icon: 'info',
                    title: 'Cancelled!',
                    text: 'The student was not deleted.',
                    showConfirmButton: false,
                    timer: 1500
                })
            }

            $('#delete-student-modal-btn').prop('disabled', false);
        });
    });
});
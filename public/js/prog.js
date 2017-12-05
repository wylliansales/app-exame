$(function () {
  var buttonCompanyStore = $('.button-store-company');
  var formCompany = $('#model-store-company').find('form[name="company"]');
  var formCompanyEdit = $('#model-edit-company').find('form[name="companyEdit"]');

    buttonCompanyStore.click(function () {
        formCompany.submit();
  })



  $('.button-edit-company').click(function () {
      $('#model-edit-company').find('form[name="companyEdit"]').submit();
  })

    $('.link-edit-company').click(function () {
        var actionEditCompany = $(this).attr('href');

        $.ajax({
            url  : actionEditCompany,
            data : '',
            beforeSend : '',
            error : function () {
                alert("Error ao tenta fazer a requisição")
            },
            success: function (company) {
                formCompanyEdit.find('input[name="id"]').val(company.id);
                formCompanyEdit.find('input[name="name"]').val(company.name);
                formCompanyEdit.find('input[name="cnpj"]').val(company.cnpj);
                formCompanyEdit.find('input[name="phone"]').val(company.phone);
                formCompanyEdit.find('textarea[name="address"]').val(company.address);
               $('#model-edit-company').modal('show');
            }
        })
        return false;
    })


    var formEmployee = $('#model-store-employee').find('form[name="employee"]');
    var formEmployeeEdit = $('#model-edit-employee').find('form[name="employeeEdit"]');
    var buttonEmployeeStore =$('.button-store-employee');
    buttonEmployeeStore.click(function () {
        formEmployee.submit();
    })
    $('.button-edit-employee').click(function () {
        $('#model-edit-employee').find('form[name="employeeEdit"]').submit();
    })

    $('.link-edit-employee').click(function () {
        var actionEditEmployee = $(this).attr('href');

        $.ajax({
            url  : actionEditEmployee,
            data : '',
            beforeSend : '',
            error : function () {
                alert("Error ao tenta fazer a requisição")
            },
            success: function (employee) {
                formEmployeeEdit.find('input[name="id"]').val(employee.id);
                formEmployeeEdit.find('input[name="name"]').val(employee.name);
                formEmployeeEdit.find('input[name="function"]').val(employee.function);
                formEmployeeEdit.find('input[name="date_of_birth"]').val(employee.date_of_birth);
                $('#model-edit-employee').modal('show');
            }
        })
        return false;
    })


    var formDoctor = $('#model-store-doctor').find('form[name="doctor"]');
    var formDoctorEdit = $('#model-edit-doctor').find('form[name="doctorEdit"]');
    var buttonDoctorStore =$('.button-store-doctor');

    buttonDoctorStore.click(function () {
        formDoctor.submit();
    })
    $('.button-edit-doctor').click(function () {
        $('#model-edit-doctor').find('form[name="doctorEdit"]').submit();
    })

    $('.link-edit-doctor').click(function () {
        var actionEditDoctor = $(this).attr('href');

        $.ajax({
            url  : actionEditDoctor,
            data : '',
            beforeSend : '',
            error : function () {
                alert("Error ao tenta fazer a requisição")
            },
            success: function (doctor) {
                formDoctorEdit.find('input[name="id"]').val(doctor.id);
                formDoctorEdit.find('input[name="name"]').val(doctor.name);
                formDoctorEdit.find('input[name="crm"]').val(doctor.crm);
                $('#model-edit-doctor').modal('show');
            }
        })
        return false;
    })


    var formExam = $('#model-store-exam').find('form[name="exam"]');
    var formExamEdit = $('#model-edit-exam').find('form[name="examEdit"]');
    var buttonExamStore =$('.button-store-exam');

    buttonExamStore.click(function () {
        formExam.submit();
    })
    $('.button-edit-exam').click(function () {
        $('#model-edit-exam').find('form[name="examEdit"]').submit();
    })

    $('.link-edit-exam').click(function () {
        var actionEditExam = $(this).attr('href');

        $.ajax({
            url  : actionEditExam,
            data : '',
            beforeSend : '',
            error : function () {
                alert("Error ao tenta fazer a requisição")
            },
            success: function (exam) {
                formExamEdit.find('input[name="id"]').val(exam.id);
                formExamEdit.find('input[name="name"]').val(exam.name);
                formExamEdit.find('input[name="price"]').val(exam.price);
                formExamEdit.find('textarea[name="description"]').val(exam.description);
                $('#model-edit-exam').modal('show');
            }
        })
        return false;
    })
    var formService = $('#form-service');
    $( "#employee-name-input" ).autocomplete({
        source: 'http://exame.app/employee/show/all',
        select: function (event, ui) {
            var item = ui.item.value;
            $.ajax({
                url: 'http://exame.app/employee/show/name',
                data: 'name='+item,
                success: function (employee) {
                    formService.find('input[name="employee_id"]').val(employee[0].id);
                }
            })
        }
    });

    $('#doctor-name-input').autocomplete({
       source: 'http://exame.app/doctor/show/all',
       select: function (event, ui) {
           var item = ui.item.value;
           $.ajax({
               url: 'http://exame.app/doctor/show/name',
               data: 'name='+item,
               success: function (doctor) {
                   formService.find('input[name="doctor_id"]').val(doctor[0].id);
               }
           })
       }
    });

    $('#exam-name-input').autocomplete({
        source: 'http://exame.app/exam/show/all',
        select: function (event, ui) {
            var item = ui.item.value;
            $.ajax({
                url: 'http://exame.app/exam/show/name',
                data: 'name='+item,
                success: function (exam) {
                    $('#exam_id').val(exam[0].id);
                }
            })
        }
    });

    $('#company-name-input').autocomplete({
        source: 'http://exame.app/company/show/all',
        select: function (event, ui) {
            var item = ui.item.value;
            $.ajax({
                url: 'http://exame.app/company/show/name',
                data: 'name='+item,
                success: function (company) {
                    formService.find('input[name="company_id"]').val(company[0].id);
                }
            })
        }
    });

    $('.button-store-service').click(function () {
        formService.submit();
    })
})
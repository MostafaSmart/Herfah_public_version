
'use strict';
// add new department ajax request
$(function() {
    $("#addDeptForm").submit(function(e) {
    e.preventDefault();
    var formData = new FormData($('#addDeptForm')[0]);
    $.ajax({
        type: 'post',
        enctype: 'multipart/form-data',
        url: routeOfStore,
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        success: function (data) {
            if (data.status == true) {
                Swal.fire({
                    title: 'Good job!',
                    text: data.message,
                    icon: 'success',
                    customClass: {
                    confirmButton: 'btn btn-primary waves-effect waves-light'
                    },
                    buttonsStyling: false
                });
                $("#addDeptForm")[0].reset();
                $('#offcanvasEcommerceCategoryList').offcanvas('hide');

            }},
            error: function (reject) {
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function (key, val) {
                    $("#" + key + "_error").text(val[0]);
                });
            }
        });
    });
});
// edit department ajax request
$(document).on('click', '.edit_btn', function(e) {
    e.preventDefault();
    let id = $(this).attr('id');
    $.ajax({
        url: '/dept/' + id + '/edit',
        method: 'get',
        data: {
            _token: '{{ csrf_token() }}'
        },
        success: function(respon) {
            $("#edit_name").val(respon.D_Name);
            $("#edit_description").val(respon.D_About);
            var imgSrc = '/Files/' + respon.imgcover;
            $("#img_cover").html(
                '<img src="' + imgSrc + '" alt="img" width="100px" class="rounded-circle">');
            $("#dept_id").val(respon.id);
            $("#dept_cover").val(respon.imgcover);
        }
    });
});
// update  department ajax request
$("#editDeptForm").submit(function(e) {
    e.preventDefault();
    let id = $("#dept_id").val();
    var formUpdateData = new FormData($('#editDeptForm')[0]);
    $.ajax({
        type: 'post',
        enctype: 'multipart/form-data',
        url: '/dept/update',
        data: formUpdateData,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'json',
        success: function (data) {
            console.log(id);
            if (data.status == true) {
                Swal.fire({
                    title: 'Good job!',
                    text: data.message,
                    icon: 'success',
                    customClass: {
                    confirmButton: 'btn btn-primary waves-effect waves-light'
                    },
                    buttonsStyling: false
                });
                $("#editDeptForm")[0].reset();
                $('#editCategoryModal').modal('hide');

            }},
            error: function (reject) {
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function (key, val) {
                    $("#" + key + "_error").text(val[0]);
                });
            }
    });
});

// Datatable (jquery)
$(function () {
    // Variable declaration for category list table
    var dt_category_list_table = $('.datatables-category-list');
    if (dt_category_list_table.length) {
        var dt_category = dt_category_list_table.DataTable({
        ajax: {
          url: routeOfFetchDept,
          type: 'GET',
          dataSrc: function (response) {
            return response[dataSrcFetchDept];
        }
        },
        columns: [
          {
              // For Responsive
              data: null,
              className: 'control',
              searchable: false,
              orderable: false,
              responsivePriority: 1,
              // targets: 0,
              render: function (data, type, meta) {
                return null;
              }
            },
            {
              // For Checkboxes
              data: null,
              // targets: 1,
              orderable: false,
              searchable: false,
              responsivePriority: 4,
              checkboxes: true,
              render: function () {
                return '<input type="checkbox" class="dt-checkboxes form-check-input">';
              },
              checkboxes: {
                selectAllRender: '<input type="checkbox" class="form-check-input">'
              }
            },
            {
              // depts name and about and img
              data: null,
              responsivePriority: 4,
              render: function (data, type, meta) {
                // var $name = full['D_Name'],
                var $name = data.D_Name,
                  $about = data.D_About,
                  $image = data.imgcover;
                if ($image) {
                  // For Avatar image
                  var $output =
                    '<img src="Files/' + $image + '" alt="Avatar" class="rounded-circle">';
                } else {
                  // For Avatar badge
                  var stateNum = Math.floor(Math.random() * 6);
                  var states = ['success', 'danger', 'warning', 'info', 'primary', 'secondary'];
                  var $state = states[stateNum],
                    $name = data.D_Name,
                    $initials = $name.match(/\b\w/g) || [];
                  $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                  $output = '<span class="avatar-initial rounded-circle bg-label-' + $state + '">' + $initials + '</span>';
                }
                // Creates full output for row
                var $row_output =
                  '<div class="d-flex justify-content-start align-items-center user-name">' +
                  '<div class="avatar-wrapper">' +
                  '<div class="avatar me-3">' +
                  $output +
                  '</div>' +
                  '</div>' +
                  '<div class="d-flex flex-column">' +
                  '<a href="' +
                  '" class="text-body text-truncate"><span class="fw-medium">' +
                  $name +
                  '</span></a>' +
                  '<small class="text-muted">' +
                  $about +
                  '</small>' +
                  '</div>' +
                  '</div>';
                return $row_output;
              }
            },
            {
              // NumOfWorker
              data: null,
              render: function (data, type, meta) {
                var $NumOfWorker = data.NumOfWorker;
                return '<span class="fw-medium">' + $NumOfWorker + '</span>';
              }
            },
            {
              // Actions
              data: null,
              title: 'Actions',
              searchable: false,
              orderable: false,
              render: function (data, type, meta) {
                var $id = data.id;
                return (
                  '<div class="d-flex align-items-center">' +
                  '<a href="javascript:;" class="text-body edit_btn" id="' + $id + '" data-bs-target="#editCategoryModal" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="ti ti-edit ti-sm me-2"></i></a>' +
                  '<a href="javascript:;" class="text-body delete_btn" id="' + $id + '"><i class="ti ti-trash ti-sm mx-2"></i></a>' +
                  '<a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a>' +
                  '<div class="dropdown-menu dropdown-menu-end m-0">' +
                  '<a href="' +
                  '" class="dropdown-item">View</a>' +
                  '<a href="javascript:;" class="dropdown-item">Suspend</a>' +
                  '</div>' +
                  '</div>'
                );
              }
            }
        ],
          order: [2, 'desc'], //set any columns order asc/desc
        dom:
          '<"card-header d-flex flex-wrap pb-2"' +
          '<f>' +
          '<"d-flex justify-content-center justify-content-md-end align-items-baseline"<"dt-action-buttons d-flex justify-content-center flex-md-row mb-3 mb-md-0 ps-1 ms-1 align-items-baseline"lB>>' +
          '>t' +
          '<"row mx-2"' +
          '<"col-sm-12 col-md-6"i>' +
          '<"col-sm-12 col-md-6"p>' +
          '>',
        lengthMenu: [7, 10, 20, 50, 70, 100], //for length of menu
        language: {
          sLengthMenu: '_MENU_',
          search: '',
          searchPlaceholder: 'بحث'
        },
        // Button for offcanvas
        buttons: [
          {
            text: '<span class="d-none d-sm-inline-block">اضافة خدمة</span><i class="ti ti-plus ti-xs me-0 me-sm-2"></i>',
            className: 'add-new btn btn-primary ms-2 waves-effect waves-light',
            attr: {
              'data-bs-toggle': 'offcanvas',
              'data-bs-target': '#offcanvasEcommerceCategoryList'
            }
          }
        ],
        // For responsive popup
        responsive: {
          details: {
            display: $.fn.dataTable.Responsive.display.modal({
              header: function (row) {
                var data = row.data();
                return 'Details of ' + data[2];
              }
            }),
            type: 'column',
            renderer: function (api, rowIdx, columns) {
              var data = $.map(columns, function (col, i) {
                return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                  ? '<tr data-dt-row="' +
                      col.rowIndex +
                      '" data-dt-column="' +
                      col.columnIndex +
                      '">' +
                      '<td> ' +
                      col.title +
                      ':' +
                      '</td> ' +
                      '<td class="ps-0">' +
                      col.data +
                      '</td>' +
                      '</tr>'
                  : '';
              }).join('');
              return data ? $('<table class="table"/><tbody />').append(data) : false;
            }
          }
        }
      });
      $('.dt-action-buttons').addClass('pt-0');
      $('.dataTables_filter').addClass('me-3 ps-0');
    }
    // Filter form control to default size
    // ? setTimeout used for multilingual table initialization
    setTimeout(() => {
      $('.dataTables_filter .form-control').removeClass('form-control-sm');
      $('.dataTables_length .form-select').removeClass('form-select-sm');
    }, 300);
});
//For form validation
(function () {
  const eCommerceCategoryListForm = document.getElementById('eCommerceCategoryListForm');

  //Add New customer Form Validation
  const fv = FormValidation.formValidation(eCommerceCategoryListForm, {
    fields: {
      categoryTitle: {
        validators: {
          notEmpty: {
            message: 'Please enter category title'
          }
        }
      },
      slug: {
        validators: {
          notEmpty: {
            message: 'Please enter slug'
          }
        }
      }
    },
    plugins: {
      trigger: new FormValidation.plugins.Trigger(),
      bootstrap5: new FormValidation.plugins.Bootstrap5({
        // Use this for enabling/changing valid/invalid class
        eleValidClass: 'is-valid',
        rowSelector: function (field, ele) {
          // field is the field name & ele is the field element
          return '.mb-3';
        }
      }),
      submitButton: new FormValidation.plugins.SubmitButton(),
      // Submit the form when all fields are valid
      // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
      autoFocus: new FormValidation.plugins.AutoFocus()
    }
  });
})
();

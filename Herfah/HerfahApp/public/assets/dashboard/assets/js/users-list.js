/**
 * Page User List
 */

'use strict';

    // Datatable (jquery)
    $(function () {
        let borderColor, bodyBg, headingColor;

        if (isDarkStyle) {
          borderColor = config.colors_dark.borderColor;
          bodyBg = config.colors_dark.bodyBg;
          headingColor = config.colors_dark.headingColor;
        } else {
          borderColor = config.colors.borderColor;
          bodyBg = config.colors.bodyBg;
          headingColor = config.colors.headingColor;
        }

        // Variable declaration for table
        var dt_user_table = $('.datatables-users'),
          select2 = $('.select2'),
          userView = 'app-user-view-account.html',
          roleObj = {
            1: { title: 'admin', class: 'bg-label-warning' },
            2: { title: 'user', class: 'bg-label-success' },
            3: { title: 'worker', class: 'bg-label-secondary' }
          };

        if (select2.length) {
          var $this = select2;
          $this.wrap('<div class="position-relative"></div>').select2({
            placeholder: 'Select Country',
            dropdownParent: $this.parent()
          });
        }

        // Users datatable
        if (dt_user_table.length) {
          var dt_user = dt_user_table.DataTable({
              ajax: {
                  url: routeOfFetchUsers,
                  type: 'GET',
                  dataSrc: function (response) {
                    return response[dataSrcFetchUsers];
                }
                },
            columns: [
              // columns according to JSON
              {
                  // For Responsive
                  data: null,
                  className: 'control',
                  searchable: false,
                  orderable: false,
                  responsivePriority: 1,
                  render: function (data, type, meta) {
                    return null;
                  }
              },
              {
                  // users name and email and img
                  data: null,
                  responsivePriority: 4,
                  render: function (data, type, meta) {
                    // var $name = full['D_Name'],
                      var $f_name = data.name,
                          $l_name = data.l_name,
                          $email = data.email;
                      // For Avatar badge
                      var stateNum = Math.floor(Math.random() * 6);
                      var states = ['success', 'danger', 'warning', 'info', 'primary', 'secondary'];
                      var $state = states[stateNum],
                          $firstName = $f_name,
                           $lastName = $l_name || '',
                           $initials = ($firstName.charAt(0) || '') + ($lastName.charAt(0) || ''),
                          $output = '<span class="avatar-initial rounded-circle bg-label-' + $state + '">' + $initials + '</span>';
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
                      $f_name + ' ' + $l_name +
                      '</span></a>' +
                      '<small class="text-muted">' +
                      $email +
                      '</small>' +
                      '</div>' +
                      '</div>';
                      return $row_output;
                  }
              },
              {
                  // phone_num
                  data: null,
                  render: function (data, type, meta) {
                    var $phone_num = data.PhoneNumber;

                    return '<span class="fw-medium">' + $phone_num + '</span>';
                  }
              },
              {
                  // User Role
                  data: null,
                  render: function (data, type, meta) {
                    var $role = data.Autho;
                    var roleBadgeObj = {
                        0:
                          '<span class="badge badge-center rounded-pill bg-label-secondary w-px-30 h-px-30 me-2"><i class="ti ti-device-laptop ti-sm"></i></span>',
                        1:
                          '<span class="badge badge-center rounded-pill bg-label-warning w-px-30 h-px-30 me-2"><i class="ti ti-user ti-sm"></i></span>',
                        2:
                          '<span class="badge badge-center rounded-pill bg-label-primary w-px-30 h-px-30 me-2"><i class="ti ti-chart-pie-2 ti-sm"></i></span>'
                      };
                      var roleNameObj = {
                        0: 'مدير',
                        1: 'مستخدم',
                        2: 'عامل'
                      };
                      var $roleBadge = roleBadgeObj[$role] || '';
                      var $roleName = roleNameObj[$role] || '';
                    return "<span class='text-truncate d-flex align-items-center'>" + $roleBadge + $roleName + '</span>';          }
              },
              {
                  // birthdate
                  data: null,
                  render: function (data, type, meta) {
                    var $birthdate = data.birthdate;

                    return '<span class="fw-medium">' + $birthdate + '</span>';
                  }
              },
              {
                  // Actions
                  data: null,
                  title: 'Actions',
                  searchable: false,
                  orderable: false,
                  render: function (data, type, meta) {
                      var id = data.id;
                      var viewUserLink = '/user/upgradeToWorker/'+id;
                    //   var viewUserLink = '{{ route("users.upgradeToWorker", ["id" => ":id"]) }}';
                    //   viewUserLink = viewUserLink.replace(':id', id)

                    return (
                      '<div class="d-flex align-items-center">' +
                      '<a href="javascript:;" class="text-body edit_btn" id="' + id + '" data-bs-target="#editCategoryModal" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="ti ti-edit ti-sm me-2"></i></a>' +
                      '<a href="javascript:;" class="text-body delete_btn" id="' + id + '"><i class="ti ti-trash ti-sm mx-2"></i></a>' +
                      '<a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a>' +
                      '<div class="dropdown-menu dropdown-menu-end m-0">' +
                      '<a href=" '+ viewUserLink + '" class="dropdown-item"> View</a>' +
                      '<a href="javascript:;" class="dropdown-item">Suspend</a>' +
                      '</div>' +
                      '</div>'
                    );
                  }
                }
            ],
            order: [[1, 'desc']],
            dom:
              '<"row me-2"' +
              '<"col-md-2"<"me-3"l>>' +
              '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>' +
              '>t' +
              '<"row mx-2"' +
              '<"col-sm-12 col-md-6"i>' +
              '<"col-sm-12 col-md-6"p>' +
              '>',
            language: {
              sLengthMenu: '_MENU_',
              search: '',
              searchPlaceholder: 'بحث...'
            },
            // Buttons with Dropdown
            buttons: [
              {
                extend: 'collection',
                className: 'btn btn-label-secondary dropdown-toggle mx-3 waves-effect waves-light',
                text: '<i class="ti ti-screen-share me-1 ti-xs"></i>تصدير',
                buttons: [
                  {
                    extend: 'print',
                    text: '<i class="ti ti-printer me-2" ></i>طباعة',
                    className: 'dropdown-item',
                    exportOptions: {
                      columns: [1, 2, 3, 4],
                      // prevent avatar to be print
                      format: {
                        body: function (inner, coldex, rowdex) {
                          if (inner.length <= 0) return inner;
                          var el = $.parseHTML(inner);
                          var result = '';
                          $.each(el, function (index, item) {
                            if (item.classList !== undefined && item.classList.contains('user-name')) {
                              result = result + item.lastChild.firstChild.textContent;
                            } else if (item.innerText === undefined) {
                              result = result + item.textContent;
                            } else result = result + item.innerText;
                          });
                          return result;
                        }
                      }
                    },
                    customize: function (win) {
                      //customize print view for dark
                      $(win.document.body)
                        .css('color', headingColor)
                        .css('border-color', borderColor)
                        .css('background-color', bodyBg);
                      $(win.document.body)
                        .find('table')
                        .addClass('compact')
                        .css('color', 'inherit')
                        .css('border-color', 'inherit')
                        .css('background-color', 'inherit');
                    }
                  },
                  {
                    extend: 'csv',
                    text: '<i class="ti ti-file-text me-2" ></i>Csv',
                    className: 'dropdown-item',
                    exportOptions: {
                      columns: [1, 2, 3, 4],
                      // prevent avatar to be display
                      format: {
                        body: function (inner, coldex, rowdex) {
                          if (inner.length <= 0) return inner;
                          var el = $.parseHTML(inner);
                          var result = '';
                          $.each(el, function (index, item) {
                            if (item.classList !== undefined && item.classList.contains('user-name')) {
                              result = result + item.lastChild.firstChild.textContent;
                            } else if (item.innerText === undefined) {
                              result = result + item.textContent;
                            } else result = result + item.innerText;
                          });
                          return result;
                        }
                      }
                    }
                  },
                  {
                    extend: 'excel',
                    text: '<i class="ti ti-file-spreadsheet me-2"></i>Excel',
                    className: 'dropdown-item',
                    exportOptions: {
                      columns: [1, 2, 3, 4],
                      // prevent avatar to be display
                      format: {
                        body: function (inner, coldex, rowdex) {
                          if (inner.length <= 0) return inner;
                          var el = $.parseHTML(inner);
                          var result = '';
                          $.each(el, function (index, item) {
                            if (item.classList !== undefined && item.classList.contains('user-name')) {
                              result = result + item.lastChild.firstChild.textContent;
                            } else if (item.innerText === undefined) {
                              result = result + item.textContent;
                            } else result = result + item.innerText;
                          });
                          return result;
                        }
                      }
                    }
                  },
                  {
                    extend: 'pdf',
                    text: '<i class="ti ti-file-code-2 me-2"></i>Pdf',
                    className: 'dropdown-item',
                    exportOptions: {
                      columns: [1, 2, 3, 4],
                      // prevent avatar to be display
                      format: {
                        body: function (inner, coldex, rowdex) {
                          if (inner.length <= 0) return inner;
                          var el = $.parseHTML(inner);
                          var result = '';
                          $.each(el, function (index, item) {
                            if (item.classList !== undefined && item.classList.contains('user-name')) {
                              result = result + item.lastChild.firstChild.textContent;
                            } else if (item.innerText === undefined) {
                              result = result + item.textContent;
                            } else result = result + item.innerText;
                          });
                          return result;
                        }
                      }
                    }
                  },
                  {
                    extend: 'copy',
                    text: '<i class="ti ti-copy me-2" ></i>Copy',
                    className: 'dropdown-item',
                    exportOptions: {
                      columns: [1, 2, 3, 4],
                      // prevent avatar to be display
                      format: {
                        body: function (inner, coldex, rowdex) {
                          if (inner.length <= 0) return inner;
                          var el = $.parseHTML(inner);
                          var result = '';
                          $.each(el, function (index, item) {
                            if (item.classList !== undefined && item.classList.contains('user-name')) {
                              result = result + item.lastChild.firstChild.textContent;
                            } else if (item.innerText === undefined) {
                              result = result + item.textContent;
                            } else result = result + item.innerText;
                          });
                          return result;
                        }
                      }
                    }
                  }
                ]
              },
              {
                text: '<span class="d-none d-sm-inline-block">اضافة مستخدم جديد</span><i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>',
                className: 'add-new btn btn-primary waves-effect waves-light',
                attr: {
                  'data-bs-toggle': 'offcanvas',
                  'data-bs-target': '#offcanvasAddUser'
                }
              }
            ],
            // For responsive popup
            responsive: {
              details: {
                display: $.fn.dataTable.Responsive.display.modal({
                  header: function (row) {
                    var data = row.data();
                    return 'Details of ' + data['full_name'];
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
                          '<td>' +
                          col.title +
                          ':' +
                          '</td> ' +
                          '<td>' +
                          col.data +
                          '</td>' +
                          '</tr>'
                      : '';
                  }).join('');

                  return data ? $('<table class="table"/><tbody />').append(data) : false;
                }
              }
            },
            initComplete: function () {
              // Adding role filter once table initialized
              this.api()
                .columns(3)
                .every(function () {
                  var column = this;
                  var select = $(
                    '<select id="UserRole" class="form-select text-capitalize"><option value=""> Select Role </option></select>'
                  )
                    .appendTo('.user_role')
                    .on('change', function () {
                      var val = $.fn.dataTable.util.escapeRegex($(this).val());
                      column.search(val ? '^' + val + '$' : '', true, false).draw();
                    });

                  column
                    .data()
                    .unique()
                    .sort()
                    .each(function (d, j) {
                      select.append('<option value="' + d + '">' + d + '</option>');
                    });
                });
              // Adding plan filter once table initialized
              this.api()
                .columns(3)
                .every(function () {
                  var column = this;
                  var select = $(
                    '<select id="UserPlan" class="form-select text-capitalize"><option value=""> Select Plan </option></select>'
                  )
                    .appendTo('.user_plan')
                    .on('change', function () {
                      var val = $.fn.dataTable.util.escapeRegex($(this).val());
                      column.search(val ? '^' + val + '$' : '', true, false).draw();
                    });

                  column
                    .data()
                    .unique()
                    .sort()
                    .each(function (d, j) {
                      select.append('<option value="' + d + '">' + d + '</option>');
                    });
                });
              // Adding status filter once table initialized
              this.api()
                .columns(4)
                .every(function () {
                  var column = this;
                  var select = $(
                    '<select id="FilterTransaction" class="form-select text-capitalize"><option value=""> Select Status </option></select>'
                  )
                    .appendTo('.user_status')
                    .on('change', function () {
                      var val = $.fn.dataTable.util.escapeRegex($(this).val());
                      column.search(val ? '^' + val + '$' : '', true, false).draw();
                    });

                  column
                    .data()
                    .unique()
                    .sort()
                    .each(function (d, j) {
                      select.append(
                        '<option value="' +
                          statusObj[d].title +
                          '" class="text-capitalize">' +
                          statusObj[d].title +
                          '</option>'
                      );
                    });
                });
            }
          });
        }

        // Delete Record
        $('.datatables-users tbody').on('click', '.delete-record', function () {
          dt_user.row($(this).parents('tr')).remove().draw();
        });

        // Filter form control to default size
        // ? setTimeout used for multilingual table initialization
        setTimeout(() => {
          $('.dataTables_filter .form-control').removeClass('form-control-sm');
          $('.dataTables_length .form-select').removeClass('form-select-sm');
        }, 300);
      });
// Validation & Phone mask
(function () {
  const phoneMaskList = document.querySelectorAll('.phone-mask'),
    addNewUserForm = document.getElementById('addNewUserForm');

  // Phone Number
  if (phoneMaskList) {
    phoneMaskList.forEach(function (phoneMask) {
      new Cleave(phoneMask, {
        phone: true,
        phoneRegionCode: 'YE'
      });
    });
  }
  // Add New User Form Validation
  const fv = FormValidation.formValidation(addNewUserForm, {
    fields: {
        userFirstname: {
        validators: {
          notEmpty: {
            message: 'Please enter Firstname '
          }
        }
      },
      userLastname: {
        validators: {
          notEmpty: {
            message: 'Please enter Lastname '
          }
        }
      },
      username: {
        validators: {
          notEmpty: {
            message: 'Please enter username '
          }
        }
      },
      userEmail: {
        validators: {
          notEmpty: {
            message: 'Please enter your email'
          },
          emailAddress: {
            message: 'The value is not a valid email address'
          }
        }
      }
    },
    plugins: {
      trigger: new FormValidation.plugins.Trigger(),
      bootstrap5: new FormValidation.plugins.Bootstrap5({
        // Use this for enabling/changing valid/invalid class
        eleValidClass: '',
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
})();

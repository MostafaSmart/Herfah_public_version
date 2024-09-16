/**
 * App eCommerce Customer Detail - delete customer Script
 */
'use strict';

// Datatable (jquery)
$(function () {
    // Variable declaration for table
    var dt_customer_order = $('.datatables-customer-order'),
      order_details = 'app-ecommerce-order-details.html',
      statusObj = {
        1: { title: 'Ready to  Pickup', class: 'bg-label-info' },
        2: { title: 'Dispatched', class: 'bg-label-warning' },
        3: { title: 'Delivered', class: 'bg-label-success' },
        4: { title: 'Out for delivery', class: 'bg-label-primary' }
      };

    // orders datatable
    if (dt_customer_order.length) {
      var dt_order = dt_customer_order.DataTable({
        ajax: assetsPath + 'json/order-list.json', // JSON file to add data
        columns: [
          // columns according to JSON
          { data: '' },
          { data: 'id' },
          { data: 'order' },
          { data: 'date' },
          { data: 'status' },
          { data: 'spent' },
          { data: ' ' }
        ],
        columnDefs: [
          {
            // For Responsive
            className: 'control',
            searchable: false,
            orderable: false,
            responsivePriority: 2,
            targets: 0,
            render: function (data, type, full, meta) {
              return '';
            }
          },
          {
            // For Checkboxes
            targets: 1,
            orderable: false,
            searchable: false,
            responsivePriority: 3,
            checkboxes: true,
            render: function () {
              return '<input type="checkbox" class="dt-checkboxes form-check-input">';
            },
            checkboxes: {
              selectAllRender: '<input type="checkbox" class="form-check-input">'
            }
          },
          {
            // order order number
            targets: 2,
            responsivePriority: 4,
            render: function (data, type, full, meta) {
              var $id = full['order'];

              return "<a href='" + order_details + "' class='fw-medium'><span>#" + $id + '</span></a>';
            }
          },
          {
            // date
            targets: 3,
            render: function (data, type, full, meta) {
              var date = new Date(full.date); // convert the date string to a Date object
              var formattedDate = date.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
              return '<span class="text-nowrap">' + formattedDate + '</span > ';
            }
          },
          {
            // status
            targets: 4,
            render: function (data, type, full, meta) {
              var $status = full['status'];

              return (
                '<span class="badge ' +
                statusObj[$status].class +
                '" text-capitalized>' +
                statusObj[$status].title +
                '</span>'
              );
            }
          },
          {
            // spent
            targets: 5,
            render: function (data, type, full, meta) {
              var $spent = full['spent'];

              return '<span >' + $spent + '</span>';
            }
          },
          {
            // Actions
            targets: -1,
            title: 'Actions',
            searchable: false,
            orderable: false,
            render: function (data, type, full, meta) {
              return (
                '<div class="text-xxl-center">' +
                '<button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>' +
                '<div class="dropdown-menu dropdown-menu-end m-0">' +
                '<a href="javascript:;" class="dropdown-item">View</a>' +
                '<a href="javascript:;" class="dropdown-item  delete-record">Delete</a>' +
                '</div>' +
                '</div>'
              );
            }
          }
        ],
        order: [[2, 'desc']],
        dom:
          '<"card-header flex-column flex-md-row py-2"<"head-label text-center pt-2 pt-md-0">f' +
          '>t' +
          '<"row mx-4"' +
          '<"col-md-12 col-xl-6 text-center text-xl-start pb-2 pb-lg-0 pe-0"i>' +
          '<"col-md-12 col-xl-6 d-flex justify-content-center justify-content-xl-end"p>' +
          '>',
        lengthMenu: [6, 30, 50, 70, 100],
        language: {
          sLengthMenu: '_MENU_',
          search: '',
          searchPlaceholder: 'Search order'
        },
        // Buttons with Dropdown

        // For responsive popup
        responsive: {
          details: {
            display: $.fn.dataTable.Responsive.display.modal({
              header: function (row) {
                var data = row.data();
                return 'Details of ' + data['order'];
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
        }
      });
      $('div.head-label').html('<h5 class="card-title mb-0 text-nowrap">Orders placed</h5>');
    }

    // Delete Record
    $('.datatables-orders tbody').on('click', '.delete-record', function () {
      dt_order.row($(this).parents('tr')).remove().draw();
    });

    // Filter form control to default size
    // ? setTimeout used for multilingual table initialization
    setTimeout(() => {
      $('.dataTables_filter .form-control').removeClass('form-control-sm');
      $('.dataTables_length .form-select').removeClass('form-select-sm');
    }, 300);
  });

(function () {
  const deleteCustomer = document.querySelector('.delete-customer');

  // Suspend User javascript
  if (deleteCustomer) {
    deleteCustomer.onclick = function () {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert customer!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Delete customer!',
        customClass: {
          confirmButton: 'btn btn-primary me-2 waves-effect waves-light',
          cancelButton: 'btn btn-label-secondary waves-effect waves-light'
        },
        buttonsStyling: false
      }).then(function (result) {
        if (result.value) {
          Swal.fire({
            icon: 'success',
            title: 'Deleted!',
            text: 'Customer has been removed.',
            customClass: {
              confirmButton: 'btn btn-success waves-effect waves-light'
            }
          });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          Swal.fire({
            title: 'Cancelled',
            text: 'Cancelled Delete :)',
            icon: 'error',
            customClass: {
              confirmButton: 'btn btn-success waves-effect waves-light'
            }
          });
        }
      });
    };
  }

  //? Billing page have multiple buttons
  // Cancel Subscription alert
  // Cancel Subscription alert
  const cancelSubscription = document.querySelectorAll('.cancel-subscription');

  // Alert With Functional Confirm Button
  if (cancelSubscription) {
    cancelSubscription.forEach(btnCancle => {
      btnCancle.onclick = function () {
        Swal.fire({
          text: 'Are you sure you would like to cancel your subscription?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes',
          customClass: {
            confirmButton: 'btn btn-primary me-2 waves-effect waves-light',
            cancelButton: 'btn btn-label-secondary waves-effect waves-light'
          },
          buttonsStyling: false
        }).then(function (result) {
          if (result.value) {
            Swal.fire({
              icon: 'success',
              title: 'Unsubscribed!',
              text: 'Your subscription cancelled successfully.',
              customClass: {
                confirmButton: 'btn btn-success waves-effect waves-light'
              }
            });
          } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire({
              title: 'Cancelled',
              text: 'Unsubscription Cancelled!!',
              icon: 'error',
              customClass: {
                confirmButton: 'btn btn-success waves-effect waves-light'
              }
            });
          }
        });
      };
    });
  }
})();

/**
 * app-ecommerce-order-details Script
 */

'use strict';

// Datatable (jquery)

$(function () {
  // Variable declaration for table

  var dt_details_table = $('.datatables-order-details');

  // E-commerce Products datatable
  if (dt_details_table.length) {
    var dt_products = dt_details_table.DataTable({
      ajax: assetsPath + 'json/order-details.json', // JSON file to add data
      columns: [
        // columns according to JSON
        { data: 'categories' },
        { data: 'full_name' },
        { data: 'price' },
        { data: 'qty' },
        { data: '' }
      ],
      columnDefs: [
        {
          // Product name and product info
          targets: 0,
          responsivePriority: 1,
          searchable: false,
          orderable: false,
          render: function (data, type, full, meta) {
            var $name = full['categories'],
              $product_brand = full['category_detail'],
              $image = full['cat_image'];
            if ($image) {
              // For Product image
              var $output =
                '<img src="' +
                assetsPath +
                'img/products/' +
                $image +
                '" alt="product-' +
                $name +
                '" class="rounded-2">';
            } else {
              // For Product badge
              var stateNum = Math.floor(Math.random() * 6);
              var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
              var $state = states[stateNum],
                $name = full['categories'],
                $initials = $name.match(/\b\w/g) || [];
              $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
              $output = '<span class="avatar-initial rounded-2 bg-label-' + $state + '">' + $initials + '</span>';
            }
            // Creates full output for Product name and product_brand
            var $row_output =
              '<div class="d-flex justify-content-start align-items-center text-nowrap">' +
              '<div class="avatar-wrapper">' +
              '<div class="avatar me-2">' +
              $output +
              '</div>' +
              '</div>' +
              '<div class="d-flex flex-column">' +
              '<h6 class="text-body mb-0">' +
              $name +
              '</h6>' +
              '<small class="text-muted">' +
              $product_brand +
              '</small>' +
              '</div>' +
              '</div>';
            return $row_output;
          }
        },
        {
          // Product name and product info
          targets: 1,
          responsivePriority: 1,
          searchable: false,
          orderable: false,
          render: function (data, type, full, meta) {
            var $name = full['full_name'],
              $product_brand = full['email'],
              $image = full['avatar'];
            if ($image) {
              // For Product image
              var $output =
                '<img src="' +
                assetsPath +
                'img/products/' +
                $image +
                '" alt="product-' +
                $name +
                '" class="rounded-2">';
            } else {
              // For Product badge
              var stateNum = Math.floor(Math.random() * 6);
              var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
              var $state = states[stateNum],
                $name = full['categories'],
                $initials = $name.match(/\b\w/g) || [];
              $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
              $output = '<span class="avatar-initial rounded-2 bg-label-' + $state + '">' + $initials + '</span>';
            }
            // Creates full output for Product name and product_brand
            var $row_output =
              '<div class="d-flex justify-content-start align-items-center text-nowrap">' +
              '<div class="avatar-wrapper">' +
              '<div class="avatar me-2">' +
              $output +
              '</div>' +
              '</div>' +
              '<div class="d-flex flex-column">' +
              '<h6 class="text-body mb-0">' +
              $name +
              '</h6>' +
              '<small class="text-muted">' +
              $product_brand +
              '</small>' +
              '</div>' +
              '</div>';
            return $row_output;
          }
        },
        {
          // For Price
          targets: 2,
          searchable: false,
          orderable: false,
          render: function (data, type, full, meta) {
            var $price = full['price'];
            var $output = '<span>$' + $price + '</span>';
            return $output;
          }
        },
        {
          // For Qty
          targets: 3,
          searchable: false,
          orderable: false,
          render: function (data, type, full, meta) {
            var $qty = full['qty'];
            var $output = '<span class="text-body">' + $qty + '</span>';
            return $output;
          }
        },
        {
          // Total
          targets: 4,
          searchable: false,
          orderable: false,
          render: function (data, type, full, meta) {
            var $total = full['qty'] * full['price'];
            var $output = '<h6 class="mb-0">$' + $total + '</h6>';
            return $output;
          }
        }
      ],
      order: [2, ''], //set any columns order asc/desc
      dom: 't',
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
      }
    });
  }
  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 300);
});

//sweet alert
(function () {
  const deleteOrder = document.querySelector('.delete-order');
  // Suspend User javascript
  if (deleteOrder) {
    deleteOrder.onclick = function () {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert order!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Delete order!',
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
            text: 'Order has been removed.',
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

  //for custom year
  function getCurrentYear() {
    var currentYear = new Date().getFullYear();
    return currentYear;
  }

  var year = getCurrentYear();
  document.getElementById('orderYear').innerHTML = year;
})();

<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addcareerssection3btn {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addcareerssection3btn:hover {
        background-color: #45a049;  
    }

    .custom-modal.addcareerssection3 {
      position: fixed;
    z-index: 1050;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;              
    justify-content: center;   
    align-items: center; 
}


.custom-modal1.etstgscareerssection3 {
  position: fixed;
    z-index: 1050;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;              
    justify-content: center;   
    align-items: center; 
}

    .modal-dialog {
        max-width: 800px;
        animation: slideDown 0.5s ease;
    }

  
    @keyframes fadeIn {
        0% { opacity: 0; }
        100% { opacity: 1; }
    }

    @keyframes slideDown {
        0% { transform: translateY(-50px); opacity: 0; }
        100% { transform: translateY(0); opacity: 1; }
    }

    .modal-content {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        width: 100%;
        height: auto;
        text-align: center;
    }
</style>
  </head>
  <body>
    <div class="wrapper">
    @include('admin.sidebar')

      <div class="main-panel">
        @include('admin.header')

        <div class="container">
          <div class="page-inner">
     
            <div class="row">
    
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                       
              <button class="addcareerssection3"
  style="background: linear-gradient(135deg, #4CAF50, #2E7D32); 
         color: white; border: none; padding: 10px 20px; border-radius: 8px; 
         font-size: 14px; font-weight: bold; cursor: pointer; 
         box-shadow: 0 4px 6px rgba(0,0,0,0.2); transition: all 0.3s ease;"
  data-bs-toggle="modal" data-bs-target="#careerssection3Modal">
  Add Row
</button>



                    </div>
                  </div>
                 <div class="card-body">
  <div class="table-responsive">
    <table  class="display table table-striped table-hover careerssection3-table">
      <thead>
        <tr>
          <th>Id</th>
          <th style="white-space: nowrap;">Image</th>
          <th>Main Heading</th>
          <th>Main Paragraph</th>
          <th>Heading</th>
          <th>Paragraph</th>
          <th style="width:10%">Action</th>
        </tr>
      </thead>
      <tbody>
        @php $counter = 1; @endphp
      @foreach($careerssection3s as $careerssection3)
<tr id="careerssection3-row-{{ $careerssection3->id }}">
    <td>{{ $counter }}</td>
    <td class="careerssection3-image">
        @if($careerssection3->image)
            <img src="{{ asset('logos/'.$careerssection3->image) }}" width="80" height="80">
        @endif
    </td>
    <td class="careerssection3-main_heading">{{ $careerssection3->main_heading }}</td>
     @php
        $words = str_word_count($careerssection3->main_paragraph, 2);
        $limitedText = implode(' ', array_slice($words, 0, 5));
        $isTruncated = str_word_count($careerssection3->main_paragraph) > 5;
    @endphp
    <td class="careerssection3-main_paragraph" style="white-space: nowrap" title="{{ $careerssection3->main_paragraph }}">
        {{ $limitedText }}{{ $isTruncated ? ' ...' : '' }}
    </td>
    <td class="careerssection3-heading">{{ $careerssection3->heading }}</td>
    <td class="careerssection3-heading">{{ $careerssection3->heading }}</td>
    @php
        $words = str_word_count($careerssection3->paragraph, 2);
        $limitedText = implode(' ', array_slice($words, 0, 5));
        $isTruncated = str_word_count($careerssection3->paragraph) > 5;
    @endphp
    <td class="careerssection3-paragraph" style="white-space: nowrap" title="{{ $careerssection3->paragraph }}">
        {{ $limitedText }}{{ $isTruncated ? ' ...' : '' }}
    </td>
    <td>
        <div style="display: flex; gap: 6px;">
            <button class="btn btn-sm btn-primary edit-careerssection3-btn" data-careerssection3-id="{{ $careerssection3->id }}" title="Edit careerssection3">
                <i class="fas fa-edit"></i>
            </button>
            <button class="btn btn-sm btn-danger delete-careerssection3-btn" data-careerssection3-id="{{ $careerssection3->id }}" title="Delete careerssection3">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    </td>
</tr>
@php $counter++; @endphp
@endforeach
      </tbody>
    </table>
  </div>
</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        @include('admin.footer')
      </div>
    </div>


    <div class="modal fade" id="careerssection3Modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="careerssection3Form" enctype="multipart/form-data">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Section 1</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
        

<div class="mb-3">
  <label>Image</label>
  <input type="file" name="image" class="form-control" accept="image/*">
</div>

@if($main_heading_count < 1)
<div class="mb-3">
  <label>Main Heading</label>
  <input type="text" name="main_heading" class="form-control">
</div>
@endif

@if($main_paragraph_count < 1)
<div class="mb-3">
  <label>Main Paragraph</label>
  <textarea name="main_paragraph" class="form-control"></textarea>
</div>
@endif

<div class="mb-3">
  <label>Heading</label>
  <input type="text" name="heading" class="form-control">
</div>

<div class="mb-3">
  <label>Paragraph</label>
  <textarea name="paragraph" class="form-control"></textarea>
</div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="editcareerssection3Modal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Section 1</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="editcareerssection3Form" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="careerssection3_id" id="edit_careerssection3_id">

          <div class="mb-3">
  <label>Main Heading</label>
  <input type="text" id="edit_main_heading" name="main_heading" class="form-control">
</div>

<div class="mb-3">
  <label>Main Paragraph</label>
  <textarea id="edit_main_paragraph" name="main_paragraph" class="form-control"></textarea>
</div>
          <div class="mb-3">
            <label>Heading</label>
            <input type="text" name="heading" id="edit_heading" class="form-control">
          </div>

          <div class="mb-3">
            <label>Paragraph</label>
            <textarea name="paragraph" id="edit_paragraph" class="form-control"></textarea>
          </div>

          <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <div id="editImagePreview" class="mt-2"></div>
          </div>

         

          <button type="submit" class="btn btn-primary">Update careerssection3</button>
        </form>
      </div>
    </div>
  </div>
</div>


    
   @include('admin.js')
   @include('admin.ajax')

<script>
$(document).ready(function () {
    $('#careerssection3Form').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        Swal.fire({
            title: 'Saving...',
            text: 'Please wait',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        $.ajax({
            url: "{{ route('careerssection3.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                Swal.close();

                if (res.status === 'success') {
                    Swal.fire('Success', 'careerssection3 added successfully!', 'success');

                    // Use consistent row ID
                    let newRow = `
                        <tr id="careerssection3-row-${res.careerssection3.id}">
                            <td>${$('.table tbody tr').length + 1}</td>
                            <td class="careerssection3-image">
                                ${res.careerssection3.image ? `<img height=100 width=100 src="/logos/${res.careerssection3.image}" />` : ''}
                            </td>
                            <td class="careerssection3-main_heading">${res.careerssection3.main_heading ?? ''}</td>
                            <td class="careerssection3-main_paragraph" style="white-space:nowrap">${res.careerssection3.main_paragraph ?? ''}</td>
                            <td class="careerssection3-heading">${res.careerssection3.heading ?? ''}</td>
                            <td class="careerssection3-paragraph" style="white-space:nowrap">${res.careerssection3.paragraph ?? ''}</td>
                            <td>
                                <div style="display: flex; gap: 6px;">
                                    <button class="btn btn-sm btn-primary edit-careerssection3-btn" 
                                            data-careerssection3-id="${res.careerssection3.id}" title="Edit careerssection3">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-careerssection3-btn" 
                                            data-careerssection3-id="${res.careerssection3.id}" title="Delete careerssection3">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;

                    $('table tbody').append(newRow);
                    $('#careerssection3Modal').modal('hide');
                    $('#careerssection3Form')[0].reset();
                }
            },
            error: function (xhr) {
                Swal.close();
                Swal.fire('Error', 'Something went wrong!', 'error');
            }
        });
    });
});


$(document).on('click', '.edit-careerssection3-btn', function () {
    let id = $(this).data('careerssection3-id');

    Swal.fire({
        title: 'Loading...',
        text: 'Fetching careerssection3 details',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: `/careerssection3/${id}/edit`,
        type: "GET",
        success: function (res) {
            if (res.status === 'success') {
                let careerssection3 = res.careerssection3;

                $('#edit_careerssection3_id').val(careerssection3.id);
                $('#edit_heading').val(careerssection3.heading);
                $('#edit_paragraph').val(careerssection3.paragraph);
                $('#edit_main_heading').val(careerssection3.main_heading);
                $('#edit_main_paragraph').val(careerssection3.main_paragraph);

                if (careerssection3.image) {
                    $('#editImagePreview').html(`<img src="/logos/${careerssection3.image}" width="100">`);
                } else {
                    $('#editImagePreview').html('');
                }


                Swal.close();

                $('#editcareerssection3Modal').modal('show');
            }
        },
        error: function () {
            Swal.fire('Error', 'Could not fetch careerssection3 details', 'error');
        }
    });
});

$('#editcareerssection3Form').submit(function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    Swal.fire({
        title: 'Updating...',
        text: 'Please wait while we update the careerssection3',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: "{{ route('careerssection3.update') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            Swal.close();
            Swal.fire('Updated!', res.message, 'success');

            $('#editcareerssection3Modal').modal('hide');

            let row = $("#careerssection3-row-" + res.careerssection3.id);

            if (row.length) {
                if (res.careerssection3.image) {
                    row.find(".careerssection3-image").html(`<img src="/logos/${res.careerssection3.image}" width="80" height="80">`);
                } else {
                    row.find(".careerssection3-image").html('');
                }

                row.find(".careerssection3-heading").text(res.careerssection3.heading);

                row.find(".careerssection3-main_heading").text(res.careerssection3.main_heading);
                row.find(".careerssection3-main_paragraph").text(res.careerssection3.main_paragraph);

                let words = res.careerssection3.paragraph ? res.careerssection3.paragraph.split(' ') : [];
                let limitedText = words.slice(0, 5).join(' ');
                let isTruncated = words.length > 5;
                row.find(".careerssection3-paragraph")
                   .text(limitedText + (isTruncated ? ' ...' : ''))
                   .attr('title', res.careerssection3.paragraph);
            }
        },
        error: function (xhr) {
            Swal.close();
            Swal.fire('Error', 'Could not update careerssection3', 'error');
        }
    });
});

$(document).on('click', '.delete-careerssection3-btn', function () {
    let id = $(this).data('careerssection3-id');

    Swal.fire({
        title: 'Are you sure?',
        text: "This will permanently delete the careerssection3.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Deleting...',
                text: 'Please wait while the careerssection3 is being deleted.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: `/careerssection3/${id}`,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function (res) {
                    if (res.status === 'success') {
                        Swal.fire('Deleted!', res.message, 'success');
                        $("#careerssection3-row-" + id).fadeOut(500, function () {
                            $(this).remove(); 
                        });
                    }
                },
                error: function () {
                    Swal.fire('Error', 'Could not delete careerssection3.', 'error');
                }
            });
        }
    });
});


</script>

  
</body>
</html>
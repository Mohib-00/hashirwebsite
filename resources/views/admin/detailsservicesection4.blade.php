<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .adddetailsservicesection4btn {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .adddetailsservicesection4btn:hover {
        background-color: #45a049;  
    }

    .custom-modal.adddetailsservicesection4 {
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


.custom-modal1.etstgsdetailsservicesection4 {
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
                       
              <button class="adddetailsservicesection4"
  style="background: linear-gradient(135deg, #4CAF50, #2E7D32); 
         color: white; border: none; padding: 10px 20px; border-radius: 8px; 
         font-size: 14px; font-weight: bold; cursor: pointer; 
         box-shadow: 0 4px 6px rgba(0,0,0,0.2); transition: all 0.3s ease;"
  data-bs-toggle="modal" data-bs-target="#detailsservicesection4Modal">
  Add Row
</button>



                    </div>
                  </div>
                 <div class="card-body">
  <div class="table-responsive">
    <table  class="display table table-striped table-hover detailsservicesection4-table">
      <thead>
        <tr>
          <th>Id</th>
          <th style="white-space: nowrap;">Image</th>
          <th>Heading</th>
          <th>Paragraph</th>
          <th>Slug</th>
          <th style="width:10%">Action</th>
        </tr>
      </thead>
      <tbody>
        @php $counter = 1; @endphp
      @foreach($detailsservicesection4s as $detailsservicesection4)
<tr id="detailsservicesection4-row-{{ $detailsservicesection4->id }}">
    <td>{{ $counter }}</td>
    <td class="detailsservicesection4-image">
        @if($detailsservicesection4->image)
            <img src="{{ asset('logos/'.$detailsservicesection4->image) }}" width="80" height="80">
        @endif
    </td>
    <td class="detailsservicesection4-heading">{{ $detailsservicesection4->heading }}</td>
    @php
        $words = str_word_count($detailsservicesection4->paragraph, 2);
        $limitedText = implode(' ', array_slice($words, 0, 5));
        $isTruncated = str_word_count($detailsservicesection4->paragraph) > 5;
    @endphp
    <td class="detailsservicesection4-paragraph" style="white-space: nowrap" title="{{ $detailsservicesection4->paragraph }}">
        {{ $limitedText }}{{ $isTruncated ? ' ...' : '' }}
    </td>
    <td class="detailsservicesection4-slug">{{ $detailsservicesection4->slug }}</td>
    <td>
        <div style="display: flex; gap: 6px;">
            <button class="btn btn-sm btn-primary edit-detailsservicesection4-btn" data-detailsservicesection4-id="{{ $detailsservicesection4->id }}" title="Edit detailsservicesection4">
                <i class="fas fa-edit"></i>
            </button>
            <button class="btn btn-sm btn-danger delete-detailsservicesection4-btn" data-detailsservicesection4-id="{{ $detailsservicesection4->id }}" title="Delete detailsservicesection4">
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


    <div class="modal fade" id="detailsservicesection4Modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="detailsservicesection4Form" enctype="multipart/form-data">
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

<div class="mb-3">
  <label>Heading</label>
  <input type="text" name="heading" class="form-control">
</div>

<div class="mb-3">
  <label>Paragraph</label>
  <textarea name="paragraph" class="form-control"></textarea>
</div>

<div class="mb-3">
  <label>Link</label>
  <input type="text" name="slug" class="form-control">
</div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="editdetailsservicesection4Modal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Section 1</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="editdetailsservicesection4Form" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="detailsservicesection4_id" id="edit_detailsservicesection4_id">

          <div class="mb-3">
            <label>Heading</label>
            <input type="text" name="heading" id="edit_heading" class="form-control">
          </div>

          <div class="mb-3">
            <label>Paragraph</label>
            <textarea name="paragraph" id="edit_paragraph" class="form-control"></textarea>
          </div>

          <div class="mb-3">
  <label>Link</label>
  <input type="text" id="edit_slug" name="slug" class="form-control">
</div>

          <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <div id="editImagePreview" class="mt-2"></div>
          </div>

         

          <button type="submit" class="btn btn-primary">Update detailsservicesection4</button>
        </form>
      </div>
    </div>
  </div>
</div>


    
   @include('admin.js')
   @include('admin.ajax')

<script>
$(document).ready(function () {
    $('#detailsservicesection4Form').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        Swal.fire({
            title: 'Saving...',
            text: 'Please wait',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        $.ajax({
            url: "{{ route('detailsservicesection4.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                Swal.close();

                if (res.status === 'success') {
                    Swal.fire('Success', 'detailsservicesection4 added successfully!', 'success');

                    // Use consistent row ID
                    let newRow = `
                        <tr id="detailsservicesection4-row-${res.detailsservicesection4.id}">
                            <td>${$('.table tbody tr').length + 1}</td>
                            <td class="detailsservicesection4-image">
                                ${res.detailsservicesection4.image ? `<img height=100 width=100 src="/logos/${res.detailsservicesection4.image}" />` : ''}
                            </td>
                            <td class="detailsservicesection4-heading">${res.detailsservicesection4.heading ?? ''}</td>
                            <td class="detailsservicesection4-paragraph" style="white-space:nowrap">${res.detailsservicesection4.paragraph ?? ''}</td>
                            <td class="detailsservicesection4-slug">${res.detailsservicesection4.slug ?? ''}</td>
                            <td>
                                <div style="display: flex; gap: 6px;">
                                    <button class="btn btn-sm btn-primary edit-detailsservicesection4-btn" 
                                            data-detailsservicesection4-id="${res.detailsservicesection4.id}" title="Edit detailsservicesection4">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-detailsservicesection4-btn" 
                                            data-detailsservicesection4-id="${res.detailsservicesection4.id}" title="Delete detailsservicesection4">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;

                    $('table tbody').append(newRow);
                    $('#detailsservicesection4Modal').modal('hide');
                    $('#detailsservicesection4Form')[0].reset();
                }
            },
            error: function (xhr) {
                Swal.close();
                Swal.fire('Error', 'Something went wrong!', 'error');
            }
        });
    });
});


$(document).on('click', '.edit-detailsservicesection4-btn', function () {
    let id = $(this).data('detailsservicesection4-id');

    Swal.fire({
        title: 'Loading...',
        text: 'Fetching detailsservicesection4 details',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: `/detailsservicesection4/${id}/edit`,
        type: "GET",
        success: function (res) {
            if (res.status === 'success') {
                let detailsservicesection4 = res.detailsservicesection4;

                $('#edit_detailsservicesection4_id').val(detailsservicesection4.id);
                $('#edit_heading').val(detailsservicesection4.heading);
                $('#edit_paragraph').val(detailsservicesection4.paragraph);
                $('#edit_slug').val(detailsservicesection4.slug);
                if (detailsservicesection4.image) {
                    $('#editImagePreview').html(`<img src="/logos/${detailsservicesection4.image}" width="100">`);
                } else {
                    $('#editImagePreview').html('');
                }


                Swal.close();

                $('#editdetailsservicesection4Modal').modal('show');
            }
        },
        error: function () {
            Swal.fire('Error', 'Could not fetch detailsservicesection4 details', 'error');
        }
    });
});

$('#editdetailsservicesection4Form').submit(function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    Swal.fire({
        title: 'Updating...',
        text: 'Please wait while we update the detailsservicesection4',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: "{{ route('detailsservicesection4.update') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            Swal.close();
            Swal.fire('Updated!', res.message, 'success');

            $('#editdetailsservicesection4Modal').modal('hide');

            let row = $("#detailsservicesection4-row-" + res.detailsservicesection4.id);

            if (row.length) {
                if (res.detailsservicesection4.image) {
                    row.find(".detailsservicesection4-image").html(`<img src="/logos/${res.detailsservicesection4.image}" width="80" height="80">`);
                } else {
                    row.find(".detailsservicesection4-image").html('');
                }

                row.find(".detailsservicesection4-heading").text(res.detailsservicesection4.heading);
                row.find(".detailsservicesection4-slug").text(res.detailsservicesection4.slug);

                let words = res.detailsservicesection4.paragraph ? res.detailsservicesection4.paragraph.split(' ') : [];
                let limitedText = words.slice(0, 5).join(' ');
                let isTruncated = words.length > 5;
                row.find(".detailsservicesection4-paragraph")
                   .text(limitedText + (isTruncated ? ' ...' : ''))
                   .attr('title', res.detailsservicesection4.paragraph);
            }
        },
        error: function (xhr) {
            Swal.close();
            Swal.fire('Error', 'Could not update detailsservicesection4', 'error');
        }
    });
});

$(document).on('click', '.delete-detailsservicesection4-btn', function () {
    let id = $(this).data('detailsservicesection4-id');

    Swal.fire({
        title: 'Are you sure?',
        text: "This will permanently delete the detailsservicesection4.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Deleting...',
                text: 'Please wait while the detailsservicesection4 is being deleted.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: `/detailsservicesection4/${id}`,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function (res) {
                    if (res.status === 'success') {
                        Swal.fire('Deleted!', res.message, 'success');
                        $("#detailsservicesection4-row-" + id).fadeOut(500, function () {
                            $(this).remove(); 
                        });
                    }
                },
                error: function () {
                    Swal.fire('Error', 'Could not delete detailsservicesection4.', 'error');
                }
            });
        }
    });
});


</script>

  
</body>
</html>
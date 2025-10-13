<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .adddetailsservicesection3btn {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .adddetailsservicesection3btn:hover {
        background-color: #45a049;  
    }

    .custom-modal.adddetailsservicesection3 {
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


.custom-modal1.etstgsdetailsservicesection3 {
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
                       
              <button class="adddetailsservicesection3"
  style="background: linear-gradient(135deg, #4CAF50, #2E7D32); 
         color: white; border: none; padding: 10px 20px; border-radius: 8px; 
         font-size: 14px; font-weight: bold; cursor: pointer; 
         box-shadow: 0 4px 6px rgba(0,0,0,0.2); transition: all 0.3s ease;"
  data-bs-toggle="modal" data-bs-target="#detailsservicesection3Modal">
  Add Row
</button>



                    </div>
                  </div>
                 <div class="card-body">
  <div class="table-responsive">
    <table  class="display table table-striped table-hover detailsservicesection3-table">
      <thead>
        <tr>
          <th>Id</th>
          <th style="white-space: nowrap;">Image</th>
          <th>Main Heading</th>
          <th>Heading</th>
          <th>Paragraph</th>
          <th>Slug</th>
          <th style="width:10%">Action</th>
        </tr>
      </thead>
      <tbody>
        @php $counter = 1; @endphp
      @foreach($detailsservicesection3s as $detailsservicesection3)
<tr id="detailsservicesection3-row-{{ $detailsservicesection3->id }}">
    <td>{{ $counter }}</td>
    <td class="detailsservicesection3-image">
        @if($detailsservicesection3->image)
            <img src="{{ asset('logos/'.$detailsservicesection3->image) }}" width="80" height="80">
        @endif
    </td>
    <td class="detailsservicesection3-main_heading">{{ $detailsservicesection3->main_heading }}</td>
    <td class="detailsservicesection3-heading">{{ $detailsservicesection3->heading }}</td>
    @php
        $words = str_word_count($detailsservicesection3->paragraph, 2);
        $limitedText = implode(' ', array_slice($words, 0, 5));
        $isTruncated = str_word_count($detailsservicesection3->paragraph) > 5;
    @endphp
    <td class="detailsservicesection3-paragraph" style="white-space: nowrap" title="{{ $detailsservicesection3->paragraph }}">
        {{ $limitedText }}{{ $isTruncated ? ' ...' : '' }}
    </td>
    <td class="detailsservicesection3-slug">{{ $detailsservicesection3->slug }}</td>
    <td>
        <div style="display: flex; gap: 6px;">
            <button class="btn btn-sm btn-primary edit-detailsservicesection3-btn" data-detailsservicesection3-id="{{ $detailsservicesection3->id }}" title="Edit detailsservicesection3">
                <i class="fas fa-edit"></i>
            </button>
            <button class="btn btn-sm btn-danger delete-detailsservicesection3-btn" data-detailsservicesection3-id="{{ $detailsservicesection3->id }}" title="Delete detailsservicesection3">
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


    <div class="modal fade" id="detailsservicesection3Modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="detailsservicesection3Form" enctype="multipart/form-data">
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
<div class="mb-3">
  <label>Heading</label>
  <input type="text" name="heading" class="form-control">
</div>

<div class="mb-3">
  <label>Paragraph</label>
  <textarea name="paragraph" class="form-control"></textarea>
</div>

<div class="mb-3">
  <label>Slug</label>
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

<div class="modal fade" id="editdetailsservicesection3Modal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Section 1</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="editdetailsservicesection3Form" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="detailsservicesection3_id" id="edit_detailsservicesection3_id">

          
          <div class="mb-3">
  <label>Main Heading</label>
  <input type="text" name="main_heading" id="edit_main_heading" class="form-control">
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
  <label>Slug</label>
  <input type="text" id="edit_slug" name="slug" class="form-control">
</div>

          <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <div id="editImagePreview" class="mt-2"></div>
          </div>

         

          <button type="submit" class="btn btn-primary">Update detailsservicesection3</button>
        </form>
      </div>
    </div>
  </div>
</div>


    
   @include('admin.js')
   @include('admin.ajax')

<script>
$(document).ready(function () {
    $('#detailsservicesection3Form').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        Swal.fire({
            title: 'Saving...',
            text: 'Please wait',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        $.ajax({
            url: "{{ route('detailsservicesection3.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                Swal.close();

                if (res.status === 'success') {
                    Swal.fire('Success', 'detailsservicesection3 added successfully!', 'success');

                    // Use consistent row ID
                    let newRow = `
                        <tr id="detailsservicesection3-row-${res.detailsservicesection3.id}">
                            <td>${$('.table tbody tr').length + 1}</td>
                            <td class="detailsservicesection3-image">
                                ${res.detailsservicesection3.image ? `<img height=100 width=100 src="/logos/${res.detailsservicesection3.image}" />` : ''}
                            </td>
                            <td class="detailsservicesection3-main_heading">${res.detailsservicesection3.main_heading ?? ''}</td>
                            <td class="detailsservicesection3-heading">${res.detailsservicesection3.heading ?? ''}</td>
                            <td class="detailsservicesection3-paragraph" style="white-space:nowrap">${res.detailsservicesection3.paragraph ?? ''}</td>
                            <td class="detailsservicesection3-slug">${res.detailsservicesection3.slug ?? ''}</td>
                            <td>
                                <div style="display: flex; gap: 6px;">
                                    <button class="btn btn-sm btn-primary edit-detailsservicesection3-btn" 
                                            data-detailsservicesection3-id="${res.detailsservicesection3.id}" title="Edit detailsservicesection3">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-detailsservicesection3-btn" 
                                            data-detailsservicesection3-id="${res.detailsservicesection3.id}" title="Delete detailsservicesection3">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;

                    $('table tbody').append(newRow);
                    $('#detailsservicesection3Modal').modal('hide');
                    $('#detailsservicesection3Form')[0].reset();
                }
            },
            error: function (xhr) {
                Swal.close();
                Swal.fire('Error', 'Something went wrong!', 'error');
            }
        });
    });
});


$(document).on('click', '.edit-detailsservicesection3-btn', function () {
    let id = $(this).data('detailsservicesection3-id');

    Swal.fire({
        title: 'Loading...',
        text: 'Fetching detailsservicesection3 details',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: `/detailsservicesection3/${id}/edit`,
        type: "GET",
        success: function (res) {
            if (res.status === 'success') {
                let detailsservicesection3 = res.detailsservicesection3;

                $('#edit_detailsservicesection3_id').val(detailsservicesection3.id);
                $('#edit_heading').val(detailsservicesection3.heading);
                $('#edit_paragraph').val(detailsservicesection3.paragraph);
                $('#edit_main_heading').val(detailsservicesection3.main_heading);
                $('#edit_slug').val(detailsservicesection3.slug);

                if (detailsservicesection3.image) {
                    $('#editImagePreview').html(`<img src="/logos/${detailsservicesection3.image}" width="100">`);
                } else {
                    $('#editImagePreview').html('');
                }


                Swal.close();

                $('#editdetailsservicesection3Modal').modal('show');
            }
        },
        error: function () {
            Swal.fire('Error', 'Could not fetch detailsservicesection3 details', 'error');
        }
    });
});

$('#editdetailsservicesection3Form').submit(function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    Swal.fire({
        title: 'Updating...',
        text: 'Please wait while we update the detailsservicesection3',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: "{{ route('detailsservicesection3.update') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            Swal.close();
            Swal.fire('Updated!', res.message, 'success');

            $('#editdetailsservicesection3Modal').modal('hide');

            let row = $("#detailsservicesection3-row-" + res.detailsservicesection3.id);

            if (row.length) {
                if (res.detailsservicesection3.image) {
                    row.find(".detailsservicesection3-image").html(`<img src="/logos/${res.detailsservicesection3.image}" width="80" height="80">`);
                } else {
                    row.find(".detailsservicesection3-image").html('');
                }

                row.find(".detailsservicesection3-heading").text(res.detailsservicesection3.heading);
                row.find(".detailsservicesection3-main_heading").text(res.detailsservicesection3.main_heading);
                row.find(".detailsservicesection3-slug").text(res.detailsservicesection3.slug);

                let words = res.detailsservicesection3.paragraph ? res.detailsservicesection3.paragraph.split(' ') : [];
                let limitedText = words.slice(0, 5).join(' ');
                let isTruncated = words.length > 5;
                row.find(".detailsservicesection3-paragraph")
                   .text(limitedText + (isTruncated ? ' ...' : ''))
                   .attr('title', res.detailsservicesection3.paragraph);
            }
        },
        error: function (xhr) {
            Swal.close();
            Swal.fire('Error', 'Could not update detailsservicesection3', 'error');
        }
    });
});

$(document).on('click', '.delete-detailsservicesection3-btn', function () {
    let id = $(this).data('detailsservicesection3-id');

    Swal.fire({
        title: 'Are you sure?',
        text: "This will permanently delete the detailsservicesection3.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Deleting...',
                text: 'Please wait while the detailsservicesection3 is being deleted.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: `/detailsservicesection3/${id}`,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function (res) {
                    if (res.status === 'success') {
                        Swal.fire('Deleted!', res.message, 'success');
                        $("#detailsservicesection3-row-" + id).fadeOut(500, function () {
                            $(this).remove(); 
                        });
                    }
                },
                error: function () {
                    Swal.fire('Error', 'Could not delete detailsservicesection3.', 'error');
                }
            });
        }
    });
});


</script>

  
</body>
</html>
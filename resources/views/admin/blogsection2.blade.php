<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addblogsection2btn {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addblogsection2btn:hover {
        background-color: #45a049;  
    }

    .custom-modal.addblogsection2 {
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


.custom-modal1.etstgsblogsection2 {
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
                       
              <button class="addblogsection2"
  style="background: linear-gradient(135deg, #4CAF50, #2E7D32); 
         color: white; border: none; padding: 10px 20px; border-radius: 8px; 
         font-size: 14px; font-weight: bold; cursor: pointer; 
         box-shadow: 0 4px 6px rgba(0,0,0,0.2); transition: all 0.3s ease;"
  data-bs-toggle="modal" data-bs-target="#blogsection2Modal">
  Add Row
</button>



                    </div>
                  </div>
                 <div class="card-body">
  <div class="table-responsive">
    <table  class="display table table-striped table-hover blogsection2-table">
      <thead>
        <tr>
          <th>Id</th>
          <th style="white-space: nowrap;">Image</th>
          <th>Main Heading</th>
          <th>Main Paragraph</th>
          <th>Heading</th>
          <th>Paragraph</th>
          <th>Links</th>
          <th style="width:10%">Action</th>
        </tr>
      </thead>
      <tbody>
        @php $counter = 1; @endphp
      @foreach($blogsection2s as $blogsection2)
<tr id="blogsection2-row-{{ $blogsection2->id }}">
    <td>{{ $counter }}</td>
    <td class="blogsection2-image">
        @if($blogsection2->image)
            <img src="{{ asset('logos/'.$blogsection2->image) }}" width="80" height="80">
        @endif
    </td>
    <td class="blogsection2-main_heading">{{ $blogsection2->main_heading }}</td>
    <td class="blogsection2-main_paragraph">{{ $blogsection2->main_paragraph }}</td>
    <td class="blogsection2-heading">{{ $blogsection2->heading }}</td>
    @php
        $words = str_word_count($blogsection2->paragraph, 2);
        $limitedText = implode(' ', array_slice($words, 0, 5));
        $isTruncated = str_word_count($blogsection2->paragraph) > 5;
    @endphp
    <td class="blogsection2-paragraph" style="white-space: nowrap" title="{{ $blogsection2->paragraph }}">
        {{ $limitedText }}{{ $isTruncated ? ' ...' : '' }}
    </td>

    <td class="blogsection2-links">{{ $blogsection2->links }}</td>
    <td>
        <div style="display: flex; gap: 6px;">
            <button class="btn btn-sm btn-primary edit-blogsection2-btn" data-blogsection2-id="{{ $blogsection2->id }}" title="Edit blogsection2">
                <i class="fas fa-edit"></i>
            </button>
            <button class="btn btn-sm btn-danger delete-blogsection2-btn" data-blogsection2-id="{{ $blogsection2->id }}" title="Delete blogsection2">
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


    <div class="modal fade" id="blogsection2Modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="blogsection2Form" enctype="multipart/form-data">
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


<div class="mb-3">
  <label>Links</label>
  <input type="text" name="links" class="form-control">
</div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="editblogsection2Modal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Section 1</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="editblogsection2Form" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="blogsection2_id" id="edit_blogsection2_id">

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
  <label>Links</label>
  <input type="text" id="edit_links" name="links" class="form-control">
</div>

          <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <div id="editImagePreview" class="mt-2"></div>
          </div>

         

          <button type="submit" class="btn btn-primary">Update blogsection2</button>
        </form>
      </div>
    </div>
  </div>
</div>


    
   @include('admin.js')
   @include('admin.ajax')

<script>
$(document).ready(function () {
    $('#blogsection2Form').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        Swal.fire({
            title: 'Saving...',
            text: 'Please wait',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        $.ajax({
            url: "{{ route('blogsection2.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                Swal.close();

                if (res.status === 'success') {
                    Swal.fire('Success', 'blogsection2 added successfully!', 'success');

                    // Use consistent row ID
                    let newRow = `
                        <tr id="blogsection2-row-${res.blogsection2.id}">
                            <td>${$('.table tbody tr').length + 1}</td>
                            <td class="blogsection2-image">
                                ${res.blogsection2.image ? `<img height=100 width=100 src="/logos/${res.blogsection2.image}" />` : ''}
                            </td>
                            <td class="aboutsection3-main_heading">${res.blogsection2.main_heading ?? ''}</td>
                            <td class="aboutsection3-main_paragraph" style="white-space:nowrap">${res.blogsection2.main_paragraph ?? ''}</td>
                            <td class="blogsection2-heading">${res.blogsection2.heading ?? ''}</td>
                            <td class="blogsection2-paragraph" style="white-space:nowrap">${res.blogsection2.paragraph ?? ''}</td>
                            <td class="blogsection2-links" style="white-space:nowrap">${res.blogsection2.links ?? ''}</td>
                            <td>
                                <div style="display: flex; gap: 6px;">
                                    <button class="btn btn-sm btn-primary edit-blogsection2-btn" 
                                            data-blogsection2-id="${res.blogsection2.id}" title="Edit blogsection2">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-blogsection2-btn" 
                                            data-blogsection2-id="${res.blogsection2.id}" title="Delete blogsection2">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;

                    $('table tbody').append(newRow);
                    $('#blogsection2Modal').modal('hide');
                    $('#blogsection2Form')[0].reset();
                }
            },
            error: function (xhr) {
                Swal.close();
                Swal.fire('Error', 'Something went wrong!', 'error');
            }
        });
    });
});


$(document).on('click', '.edit-blogsection2-btn', function () {
    let id = $(this).data('blogsection2-id');

    Swal.fire({
        title: 'Loading...',
        text: 'Fetching blogsection2 details',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: `/blogsection2/${id}/edit`,
        type: "GET",
        success: function (res) {
            if (res.status === 'success') {
                let blogsection2 = res.blogsection2;

                $('#edit_blogsection2_id').val(blogsection2.id);
                $('#edit_main_heading').val(blogsection2.main_heading);
                $('#edit_main_paragraph').val(blogsection2.main_paragraph);
                $('#edit_heading').val(blogsection2.heading);
                $('#edit_paragraph').val(blogsection2.paragraph);
                $('#edit_links').val(blogsection2.links);

                if (blogsection2.image) {
                    $('#editImagePreview').html(`<img src="/logos/${blogsection2.image}" width="100">`);
                } else {
                    $('#editImagePreview').html('');
                }


                Swal.close();

                $('#editblogsection2Modal').modal('show');
            }
        },
        error: function () {
            Swal.fire('Error', 'Could not fetch blogsection2 details', 'error');
        }
    });
});

$('#editblogsection2Form').submit(function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    Swal.fire({
        title: 'Updating...',
        text: 'Please wait while we update the blogsection2',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: "{{ route('blogsection2.update') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            Swal.close();
            Swal.fire('Updated!', res.message, 'success');

            $('#editblogsection2Modal').modal('hide');

            let row = $("#blogsection2-row-" + res.blogsection2.id);

            if (row.length) {
                if (res.blogsection2.image) {
                    row.find(".blogsection2-image").html(`<img src="/logos/${res.blogsection2.image}" width="80" height="80">`);
                } else {
                    row.find(".blogsection2-image").html('');
                }

                row.find(".blogsection2-heading").text(res.blogsection2.heading);
                row.find(".aboutsection3-main_heading").text(res.blogsection2.main_heading);
                row.find(".aboutsection3-main_paragraph").text(res.blogsection2.main_paragraph);
                row.find(".aboutsection3-links").text(res.blogsection2.links);
                let words = res.blogsection2.paragraph ? res.blogsection2.paragraph.split(' ') : [];
                let limitedText = words.slice(0, 5).join(' ');
                let isTruncated = words.length > 5;
                row.find(".blogsection2-paragraph")
                   .text(limitedText + (isTruncated ? ' ...' : ''))
                   .attr('title', res.blogsection2.paragraph);
            }
        },
        error: function (xhr) {
            Swal.close();
            Swal.fire('Error', 'Could not update blogsection2', 'error');
        }
    });
});

$(document).on('click', '.delete-blogsection2-btn', function () {
    let id = $(this).data('blogsection2-id');

    Swal.fire({
        title: 'Are you sure?',
        text: "This will permanently delete the blogsection2.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Deleting...',
                text: 'Please wait while the blogsection2 is being deleted.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: `/blogsection2/${id}`,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function (res) {
                    if (res.status === 'success') {
                        Swal.fire('Deleted!', res.message, 'success');
                        $("#blogsection2-row-" + id).fadeOut(500, function () {
                            $(this).remove(); 
                        });
                    }
                },
                error: function () {
                    Swal.fire('Error', 'Could not delete blogsection2.', 'error');
                }
            });
        }
    });
});


</script>

  
</body>
</html>
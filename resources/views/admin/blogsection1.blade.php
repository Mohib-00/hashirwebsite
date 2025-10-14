<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addblogsection1btn {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addblogsection1btn:hover {
        background-color: #45a049;  
    }

    .custom-modal.addblogsection1 {
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


.custom-modal1.etstgsblogsection1 {
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
                       
              <button class="addblogsection1"
  style="background: linear-gradient(135deg, #4CAF50, #2E7D32); 
         color: white; border: none; padding: 10px 20px; border-radius: 8px; 
         font-size: 14px; font-weight: bold; cursor: pointer; 
         box-shadow: 0 4px 6px rgba(0,0,0,0.2); transition: all 0.3s ease;"
  data-bs-toggle="modal" data-bs-target="#blogsection1Modal">
  Add Row
</button>



                    </div>
                  </div>
                 <div class="card-body">
  <div class="table-responsive">
    <table  class="display table table-striped table-hover blogsection1-table">
      <thead>
        <tr>
          <th>Id</th>
          <th style="white-space: nowrap;">Image</th>
          <th>Heading</th>
          <th>Paragraph</th>
          <th style="width:10%">Action</th>
        </tr>
      </thead>
      <tbody>
        @php $counter = 1; @endphp
      @foreach($blogsection1s as $blogsection1)
<tr id="blogsection1-row-{{ $blogsection1->id }}">
    <td>{{ $counter }}</td>
    <td class="blogsection1-image">
        @if($blogsection1->image)
            <img src="{{ asset('logos/'.$blogsection1->image) }}" width="80" height="80">
        @endif
    </td>
    <td class="blogsection1-heading">{{ $blogsection1->heading }}</td>
    @php
        $words = str_word_count($blogsection1->paragraph, 2);
        $limitedText = implode(' ', array_slice($words, 0, 5));
        $isTruncated = str_word_count($blogsection1->paragraph) > 5;
    @endphp
    <td class="blogsection1-paragraph" style="white-space: nowrap" title="{{ $blogsection1->paragraph }}">
        {{ $limitedText }}{{ $isTruncated ? ' ...' : '' }}
    </td>
    <td>
        <div style="display: flex; gap: 6px;">
            <button class="btn btn-sm btn-primary edit-blogsection1-btn" data-blogsection1-id="{{ $blogsection1->id }}" title="Edit blogsection1">
                <i class="fas fa-edit"></i>
            </button>
            <button class="btn btn-sm btn-danger delete-blogsection1-btn" data-blogsection1-id="{{ $blogsection1->id }}" title="Delete blogsection1">
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


    <div class="modal fade" id="blogsection1Modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="blogsection1Form" enctype="multipart/form-data">
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

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="editblogsection1Modal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Section 1</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="editblogsection1Form" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="blogsection1_id" id="edit_blogsection1_id">

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

         

          <button type="submit" class="btn btn-primary">Update blogsection1</button>
        </form>
      </div>
    </div>
  </div>
</div>


    
   @include('admin.js')
   @include('admin.ajax')

<script>
$(document).ready(function () {
    $('#blogsection1Form').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        Swal.fire({
            title: 'Saving...',
            text: 'Please wait',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        $.ajax({
            url: "{{ route('blogsection1.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                Swal.close();

                if (res.status === 'success') {
                    Swal.fire('Success', 'blogsection1 added successfully!', 'success');

                    // Use consistent row ID
                    let newRow = `
                        <tr id="blogsection1-row-${res.blogsection1.id}">
                            <td>${$('.table tbody tr').length + 1}</td>
                            <td class="blogsection1-image">
                                ${res.blogsection1.image ? `<img height=100 width=100 src="/logos/${res.blogsection1.image}" />` : ''}
                            </td>
                            <td class="blogsection1-heading">${res.blogsection1.heading ?? ''}</td>
                            <td class="blogsection1-paragraph" style="white-space:nowrap">${res.blogsection1.paragraph ?? ''}</td>
                            <td>
                                <div style="display: flex; gap: 6px;">
                                    <button class="btn btn-sm btn-primary edit-blogsection1-btn" 
                                            data-blogsection1-id="${res.blogsection1.id}" title="Edit blogsection1">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-blogsection1-btn" 
                                            data-blogsection1-id="${res.blogsection1.id}" title="Delete blogsection1">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;

                    $('table tbody').append(newRow);
                    $('#blogsection1Modal').modal('hide');
                    $('#blogsection1Form')[0].reset();
                }
            },
            error: function (xhr) {
                Swal.close();
                Swal.fire('Error', 'Something went wrong!', 'error');
            }
        });
    });
});


$(document).on('click', '.edit-blogsection1-btn', function () {
    let id = $(this).data('blogsection1-id');

    Swal.fire({
        title: 'Loading...',
        text: 'Fetching blogsection1 details',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: `/blogsection1/${id}/edit`,
        type: "GET",
        success: function (res) {
            if (res.status === 'success') {
                let blogsection1 = res.blogsection1;

                $('#edit_blogsection1_id').val(blogsection1.id);
                $('#edit_heading').val(blogsection1.heading);
                $('#edit_paragraph').val(blogsection1.paragraph);

                if (blogsection1.image) {
                    $('#editImagePreview').html(`<img src="/logos/${blogsection1.image}" width="100">`);
                } else {
                    $('#editImagePreview').html('');
                }


                Swal.close();

                $('#editblogsection1Modal').modal('show');
            }
        },
        error: function () {
            Swal.fire('Error', 'Could not fetch blogsection1 details', 'error');
        }
    });
});

$('#editblogsection1Form').submit(function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    Swal.fire({
        title: 'Updating...',
        text: 'Please wait while we update the blogsection1',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: "{{ route('blogsection1.update') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            Swal.close();
            Swal.fire('Updated!', res.message, 'success');

            $('#editblogsection1Modal').modal('hide');

            let row = $("#blogsection1-row-" + res.blogsection1.id);

            if (row.length) {
                if (res.blogsection1.image) {
                    row.find(".blogsection1-image").html(`<img src="/logos/${res.blogsection1.image}" width="80" height="80">`);
                } else {
                    row.find(".blogsection1-image").html('');
                }

                row.find(".blogsection1-heading").text(res.blogsection1.heading);

                let words = res.blogsection1.paragraph ? res.blogsection1.paragraph.split(' ') : [];
                let limitedText = words.slice(0, 5).join(' ');
                let isTruncated = words.length > 5;
                row.find(".blogsection1-paragraph")
                   .text(limitedText + (isTruncated ? ' ...' : ''))
                   .attr('title', res.blogsection1.paragraph);
            }
        },
        error: function (xhr) {
            Swal.close();
            Swal.fire('Error', 'Could not update blogsection1', 'error');
        }
    });
});

$(document).on('click', '.delete-blogsection1-btn', function () {
    let id = $(this).data('blogsection1-id');

    Swal.fire({
        title: 'Are you sure?',
        text: "This will permanently delete the blogsection1.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Deleting...',
                text: 'Please wait while the blogsection1 is being deleted.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: `/blogsection1/${id}`,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function (res) {
                    if (res.status === 'success') {
                        Swal.fire('Deleted!', res.message, 'success');
                        $("#blogsection1-row-" + id).fadeOut(500, function () {
                            $(this).remove(); 
                        });
                    }
                },
                error: function () {
                    Swal.fire('Error', 'Could not delete blogsection1.', 'error');
                }
            });
        }
    });
});


</script>

  
</body>
</html>
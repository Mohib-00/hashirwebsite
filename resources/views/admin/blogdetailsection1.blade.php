<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addblogdetailsection1btn {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addblogdetailsection1btn:hover {
        background-color: #45a049;  
    }

    .custom-modal.addblogdetailsection1 {
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


.custom-modal1.etstgsblogdetailsection1 {
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
                       
              <button class="addblogdetailsection1"
  style="background: linear-gradient(135deg, #4CAF50, #2E7D32); 
         color: white; border: none; padding: 10px 20px; border-radius: 8px; 
         font-size: 14px; font-weight: bold; cursor: pointer; 
         box-shadow: 0 4px 6px rgba(0,0,0,0.2); transition: all 0.3s ease;"
  data-bs-toggle="modal" data-bs-target="#blogdetailsection1Modal">
  Add Row
</button>



                    </div>
                  </div>
                 <div class="card-body">
  <div class="table-responsive">
    <table  class="display table table-striped table-hover blogdetailsection1-table">
      <thead>
        <tr>
          <th>Id</th>
          <th style="white-space: nowrap;">Image</th>
          <th>Heading</th>
          <th>Paragraph</th>
          <th>Link</th>
          <th style="width:10%">Action</th>
        </tr>
      </thead>
      <tbody>
        @php $counter = 1; @endphp
      @foreach($blogdetailsection1s as $blogdetailsection1)
<tr id="blogdetailsection1-row-{{ $blogdetailsection1->id }}">
    <td>{{ $counter }}</td>
    <td class="blogdetailsection1-image">
        @if($blogdetailsection1->image)
            <img src="{{ asset('logos/'.$blogdetailsection1->image) }}" width="80" height="80">
        @endif
    </td>
    <td class="blogdetailsection1-heading">{{ $blogdetailsection1->heading }}</td>
    @php
        $words = str_word_count($blogdetailsection1->paragraph, 2);
        $limitedText = implode(' ', array_slice($words, 0, 5));
        $isTruncated = str_word_count($blogdetailsection1->paragraph) > 5;
    @endphp
    <td class="blogdetailsection1-paragraph" style="white-space: nowrap" title="{{ $blogdetailsection1->paragraph }}">
        {{ $limitedText }}{{ $isTruncated ? ' ...' : '' }}
    </td>
    <td class="blogdetailsection1-slug">{{ $blogdetailsection1->slug }}</td>
    <td>
        <div style="display: flex; gap: 6px;">
            <button class="btn btn-sm btn-primary edit-blogdetailsection1-btn" data-blogdetailsection1-id="{{ $blogdetailsection1->id }}" title="Edit blogdetailsection1">
                <i class="fas fa-edit"></i>
            </button>
            <button class="btn btn-sm btn-danger delete-blogdetailsection1-btn" data-blogdetailsection1-id="{{ $blogdetailsection1->id }}" title="Delete blogdetailsection1">
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


    <div class="modal fade" id="blogdetailsection1Modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="blogdetailsection1Form" enctype="multipart/form-data">
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

<div class="modal fade" id="editblogdetailsection1Modal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Section 1</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="editblogdetailsection1Form" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="blogdetailsection1_id" id="edit_blogdetailsection1_id">

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
            <input type="text" name="slug" id="edit_slug" class="form-control">
          </div>

          <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <div id="editImagePreview" class="mt-2"></div>
          </div>

         

          <button type="submit" class="btn btn-primary">Update blogdetailsection1</button>
        </form>
      </div>
    </div>
  </div>
</div>


    
   @include('admin.js')
   @include('admin.ajax')

<script>
$(document).ready(function () {
    $('#blogdetailsection1Form').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        Swal.fire({
            title: 'Saving...',
            text: 'Please wait',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        $.ajax({
            url: "{{ route('blogdetailsection1.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                Swal.close();

                if (res.status === 'success') {
                    Swal.fire('Success', 'blogdetailsection1 added successfully!', 'success');

                    // Use consistent row ID
                    let newRow = `
                        <tr id="blogdetailsection1-row-${res.blogdetailsection1.id}">
                            <td>${$('.table tbody tr').length + 1}</td>
                            <td class="blogdetailsection1-image">
                                ${res.blogdetailsection1.image ? `<img height=100 width=100 src="/logos/${res.blogdetailsection1.image}" />` : ''}
                            </td>
                            <td class="blogdetailsection1-heading">${res.blogdetailsection1.heading ?? ''}</td>
                            <td class="blogdetailsection1-paragraph" style="white-space:nowrap">${res.blogdetailsection1.paragraph ?? ''}</td>
                            <td class="blogdetailsection1-slug" style="white-space:nowrap">${res.blogdetailsection1.slug ?? ''}</td>
                            <td>
                                <div style="display: flex; gap: 6px;">
                                    <button class="btn btn-sm btn-primary edit-blogdetailsection1-btn" 
                                            data-blogdetailsection1-id="${res.blogdetailsection1.id}" title="Edit blogdetailsection1">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-blogdetailsection1-btn" 
                                            data-blogdetailsection1-id="${res.blogdetailsection1.id}" title="Delete blogdetailsection1">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;

                    $('table tbody').append(newRow);
                    $('#blogdetailsection1Modal').modal('hide');
                    $('#blogdetailsection1Form')[0].reset();
                }
            },
            error: function (xhr) {
                Swal.close();
                Swal.fire('Error', 'Something went wrong!', 'error');
            }
        });
    });
});


$(document).on('click', '.edit-blogdetailsection1-btn', function () {
    let id = $(this).data('blogdetailsection1-id');

    Swal.fire({
        title: 'Loading...',
        text: 'Fetching blogdetailsection1 details',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: `/blogdetailsection1/${id}/edit`,
        type: "GET",
        success: function (res) {
            if (res.status === 'success') {
                let blogdetailsection1 = res.blogdetailsection1;

                $('#edit_blogdetailsection1_id').val(blogdetailsection1.id);
                $('#edit_heading').val(blogdetailsection1.heading);
                $('#edit_paragraph').val(blogdetailsection1.paragraph);
                $('#edit_slug').val(blogdetailsection1.slug);

                if (blogdetailsection1.image) {
                    $('#editImagePreview').html(`<img src="/logos/${blogdetailsection1.image}" width="100">`);
                } else {
                    $('#editImagePreview').html('');
                }


                Swal.close();

                $('#editblogdetailsection1Modal').modal('show');
            }
        },
        error: function () {
            Swal.fire('Error', 'Could not fetch blogdetailsection1 details', 'error');
        }
    });
});

$('#editblogdetailsection1Form').submit(function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    Swal.fire({
        title: 'Updating...',
        text: 'Please wait while we update the blogdetailsection1',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: "{{ route('blogdetailsection1.update') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            Swal.close();
            Swal.fire('Updated!', res.message, 'success');

            $('#editblogdetailsection1Modal').modal('hide');

            let row = $("#blogdetailsection1-row-" + res.blogdetailsection1.id);

            if (row.length) {
                if (res.blogdetailsection1.image) {
                    row.find(".blogdetailsection1-image").html(`<img src="/logos/${res.blogdetailsection1.image}" width="80" height="80">`);
                } else {
                    row.find(".blogdetailsection1-image").html('');
                }

                row.find(".blogdetailsection1-heading").text(res.blogdetailsection1.heading);
                row.find(".blogdetailsection1-slug").text(res.blogdetailsection1.slug);

                let words = res.blogdetailsection1.paragraph ? res.blogdetailsection1.paragraph.split(' ') : [];
                let limitedText = words.slice(0, 5).join(' ');
                let isTruncated = words.length > 5;
                row.find(".blogdetailsection1-paragraph")
                   .text(limitedText + (isTruncated ? ' ...' : ''))
                   .attr('title', res.blogdetailsection1.paragraph);
            }
        },
        error: function (xhr) {
            Swal.close();
            Swal.fire('Error', 'Could not update blogdetailsection1', 'error');
        }
    });
});

$(document).on('click', '.delete-blogdetailsection1-btn', function () {
    let id = $(this).data('blogdetailsection1-id');

    Swal.fire({
        title: 'Are you sure?',
        text: "This will permanently delete the blogdetailsection1.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Deleting...',
                text: 'Please wait while the blogdetailsection1 is being deleted.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: `/blogdetailsection1/${id}`,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function (res) {
                    if (res.status === 'success') {
                        Swal.fire('Deleted!', res.message, 'success');
                        $("#blogdetailsection1-row-" + id).fadeOut(500, function () {
                            $(this).remove(); 
                        });
                    }
                },
                error: function () {
                    Swal.fire('Error', 'Could not delete blogdetailsection1.', 'error');
                }
            });
        }
    });
});


</script>

  
</body>
</html>
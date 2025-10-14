<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addblogdetailsection4btn {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addblogdetailsection4btn:hover {
        background-color: #45a049;  
    }

    .custom-modal.addblogdetailsection4 {
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


.custom-modal1.etstgsblogdetailsection4 {
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
                       
              <button class="addblogdetailsection4"
  style="background: linear-gradient(135deg, #4CAF50, #2E7D32); 
         color: white; border: none; padding: 10px 20px; border-radius: 8px; 
         font-size: 14px; font-weight: bold; cursor: pointer; 
         box-shadow: 0 4px 6px rgba(0,0,0,0.2); transition: all 0.3s ease;"
  data-bs-toggle="modal" data-bs-target="#blogdetailsection4Modal">
  Add Row
</button>



                    </div>
                  </div>
                 <div class="card-body">
  <div class="table-responsive">
    <table  class="display table table-striped table-hover blogdetailsection4-table">
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
      @foreach($blogdetailsection4s as $blogdetailsection4)
<tr id="blogdetailsection4-row-{{ $blogdetailsection4->id }}">
    <td>{{ $counter }}</td>
    <td class="blogdetailsection4-image">
        @if($blogdetailsection4->image)
            <img src="{{ asset('logos/'.$blogdetailsection4->image) }}" width="80" height="80">
        @endif
    </td>
    <td class="blogdetailsection4-heading">{{ $blogdetailsection4->heading }}</td>
    @php
        $words = str_word_count($blogdetailsection4->paragraph, 2);
        $limitedText = implode(' ', array_slice($words, 0, 5));
        $isTruncated = str_word_count($blogdetailsection4->paragraph) > 5;
    @endphp
    <td class="blogdetailsection4-paragraph" style="white-space: nowrap" title="{{ $blogdetailsection4->paragraph }}">
        {{ $limitedText }}{{ $isTruncated ? ' ...' : '' }}
    </td>
    <td class="blogdetailsection4-slug">{{ $blogdetailsection4->slug }}</td>
    <td>
        <div style="display: flex; gap: 6px;">
            <button class="btn btn-sm btn-primary edit-blogdetailsection4-btn" data-blogdetailsection4-id="{{ $blogdetailsection4->id }}" title="Edit blogdetailsection4">
                <i class="fas fa-edit"></i>
            </button>
            <button class="btn btn-sm btn-danger delete-blogdetailsection4-btn" data-blogdetailsection4-id="{{ $blogdetailsection4->id }}" title="Delete blogdetailsection4">
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


    <div class="modal fade" id="blogdetailsection4Modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="blogdetailsection4Form" enctype="multipart/form-data">
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

<div class="modal fade" id="editblogdetailsection4Modal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Section 1</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="editblogdetailsection4Form" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="blogdetailsection4_id" id="edit_blogdetailsection4_id">

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

         

          <button type="submit" class="btn btn-primary">Update blogdetailsection4</button>
        </form>
      </div>
    </div>
  </div>
</div>


    
   @include('admin.js')
   @include('admin.ajax')

<script>
$(document).ready(function () {
    $('#blogdetailsection4Form').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        Swal.fire({
            title: 'Saving...',
            text: 'Please wait',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        $.ajax({
            url: "{{ route('blogdetailsection4.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                Swal.close();

                if (res.status === 'success') {
                    Swal.fire('Success', 'blogdetailsection4 added successfully!', 'success');

                    // Use consistent row ID
                    let newRow = `
                        <tr id="blogdetailsection4-row-${res.blogdetailsection4.id}">
                            <td>${$('.table tbody tr').length + 1}</td>
                            <td class="blogdetailsection4-image">
                                ${res.blogdetailsection4.image ? `<img height=100 width=100 src="/logos/${res.blogdetailsection4.image}" />` : ''}
                            </td>
                            <td class="blogdetailsection4-heading">${res.blogdetailsection4.heading ?? ''}</td>
                            <td class="blogdetailsection4-paragraph" style="white-space:nowrap">${res.blogdetailsection4.paragraph ?? ''}</td>
                            <td class="blogdetailsection4-slug">${res.blogdetailsection4.slug ?? ''}</td>
                            <td>
                                <div style="display: flex; gap: 6px;">
                                    <button class="btn btn-sm btn-primary edit-blogdetailsection4-btn" 
                                            data-blogdetailsection4-id="${res.blogdetailsection4.id}" title="Edit blogdetailsection4">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-blogdetailsection4-btn" 
                                            data-blogdetailsection4-id="${res.blogdetailsection4.id}" title="Delete blogdetailsection4">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;

                    $('table tbody').append(newRow);
                    $('#blogdetailsection4Modal').modal('hide');
                    $('#blogdetailsection4Form')[0].reset();
                }
            },
            error: function (xhr) {
                Swal.close();
                Swal.fire('Error', 'Something went wrong!', 'error');
            }
        });
    });
});


$(document).on('click', '.edit-blogdetailsection4-btn', function () {
    let id = $(this).data('blogdetailsection4-id');

    Swal.fire({
        title: 'Loading...',
        text: 'Fetching blogdetailsection4 details',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: `/blogdetailsection4/${id}/edit`,
        type: "GET",
        success: function (res) {
            if (res.status === 'success') {
                let blogdetailsection4 = res.blogdetailsection4;

                $('#edit_blogdetailsection4_id').val(blogdetailsection4.id);
                $('#edit_heading').val(blogdetailsection4.heading);
                $('#edit_paragraph').val(blogdetailsection4.paragraph);
                $('#edit_slug').val(blogdetailsection4.slug);
                if (blogdetailsection4.image) {
                    $('#editImagePreview').html(`<img src="/logos/${blogdetailsection4.image}" width="100">`);
                } else {
                    $('#editImagePreview').html('');
                }


                Swal.close();

                $('#editblogdetailsection4Modal').modal('show');
            }
        },
        error: function () {
            Swal.fire('Error', 'Could not fetch blogdetailsection4 details', 'error');
        }
    });
});

$('#editblogdetailsection4Form').submit(function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    Swal.fire({
        title: 'Updating...',
        text: 'Please wait while we update the blogdetailsection4',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: "{{ route('blogdetailsection4.update') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            Swal.close();
            Swal.fire('Updated!', res.message, 'success');

            $('#editblogdetailsection4Modal').modal('hide');

            let row = $("#blogdetailsection4-row-" + res.blogdetailsection4.id);

            if (row.length) {
                if (res.blogdetailsection4.image) {
                    row.find(".blogdetailsection4-image").html(`<img src="/logos/${res.blogdetailsection4.image}" width="80" height="80">`);
                } else {
                    row.find(".blogdetailsection4-image").html('');
                }

                row.find(".blogdetailsection4-heading").text(res.blogdetailsection4.heading);
                row.find(".blogdetailsection4-slug").text(res.blogdetailsection4.slug);

                let words = res.blogdetailsection4.paragraph ? res.blogdetailsection4.paragraph.split(' ') : [];
                let limitedText = words.slice(0, 5).join(' ');
                let isTruncated = words.length > 5;
                row.find(".blogdetailsection4-paragraph")
                   .text(limitedText + (isTruncated ? ' ...' : ''))
                   .attr('title', res.blogdetailsection4.paragraph);
            }
        },
        error: function (xhr) {
            Swal.close();
            Swal.fire('Error', 'Could not update blogdetailsection4', 'error');
        }
    });
});

$(document).on('click', '.delete-blogdetailsection4-btn', function () {
    let id = $(this).data('blogdetailsection4-id');

    Swal.fire({
        title: 'Are you sure?',
        text: "This will permanently delete the blogdetailsection4.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Deleting...',
                text: 'Please wait while the blogdetailsection4 is being deleted.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: `/blogdetailsection4/${id}`,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function (res) {
                    if (res.status === 'success') {
                        Swal.fire('Deleted!', res.message, 'success');
                        $("#blogdetailsection4-row-" + id).fadeOut(500, function () {
                            $(this).remove(); 
                        });
                    }
                },
                error: function () {
                    Swal.fire('Error', 'Could not delete blogdetailsection4.', 'error');
                }
            });
        }
    });
});


</script>

  
</body>
</html>
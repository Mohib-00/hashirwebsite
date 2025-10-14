<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addblogdetailsection2btn {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addblogdetailsection2btn:hover {
        background-color: #45a049;  
    }

    .custom-modal.addblogdetailsection2 {
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


.custom-modal1.etstgsblogdetailsection2 {
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
                       
              <button class="addblogdetailsection2"
  style="background: linear-gradient(135deg, #4CAF50, #2E7D32); 
         color: white; border: none; padding: 10px 20px; border-radius: 8px; 
         font-size: 14px; font-weight: bold; cursor: pointer; 
         box-shadow: 0 4px 6px rgba(0,0,0,0.2); transition: all 0.3s ease;"
  data-bs-toggle="modal" data-bs-target="#blogdetailsection2Modal">
  Add Row
</button>



                    </div>
                  </div>
                 <div class="card-body">
  <div class="table-responsive">
    <table  class="display table table-striped table-hover blogdetailsection2-table">
      <thead>
        <tr>
          <th>Id</th>
          <th style="white-space: nowrap;">Image</th>
          <th>Heading</th>
          <th>Paragraph</th>
          <th>Point Headings</th>
          <th>Points</th>
          <th>Links</th>
          <th style="width:10%">Action</th>
        </tr>
      </thead>
      <tbody>
        @php $counter = 1; @endphp
      @foreach($blogdetailsection2s as $blogdetailsection2)
<tr id="blogdetailsection2-row-{{ $blogdetailsection2->id }}">
    <td>{{ $counter }}</td>
    <td class="blogdetailsection2-image">
        @if($blogdetailsection2->image)
            <img src="{{ asset('logos/'.$blogdetailsection2->image) }}" width="80" height="80">
        @endif
    </td>
    <td class="blogdetailsection2-heading">{{ $blogdetailsection2->heading }}</td>
    @php
        $words = str_word_count($blogdetailsection2->paragraph, 2);
        $limitedText = implode(' ', array_slice($words, 0, 5));
        $isTruncated = str_word_count($blogdetailsection2->paragraph) > 5;
    @endphp
    <td class="blogdetailsection2-paragraph" style="white-space: nowrap" title="{{ $blogdetailsection2->paragraph }}">
        {{ $limitedText }}{{ $isTruncated ? ' ...' : '' }}
    </td>
    <td class="blogdetailsection2-points_headings">{{ $blogdetailsection2->points_headings }}</td>
    <td class="blogdetailsection2-point">{{ $blogdetailsection2->point }}</td>
    <td class="blogdetailsection2-slug">{{ $blogdetailsection2->slug }}</td>
    <td>
        <div style="display: flex; gap: 6px;">
            <button class="btn btn-sm btn-primary edit-blogdetailsection2-btn" data-blogdetailsection2-id="{{ $blogdetailsection2->id }}" title="Edit blogdetailsection2">
                <i class="fas fa-edit"></i>
            </button>
            <button class="btn btn-sm btn-danger delete-blogdetailsection2-btn" data-blogdetailsection2-id="{{ $blogdetailsection2->id }}" title="Delete blogdetailsection2">
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


    <div class="modal fade" id="blogdetailsection2Modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="blogdetailsection2Form" enctype="multipart/form-data">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Section 6</h5>
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
  <label>Point Heading</label>
  <input type="text" name="points_headings" class="form-control">
</div>

<div class="mb-3">
  <label>Point</label>
  <input type="text" name="point" class="form-control">
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

<div class="modal fade" id="editblogdetailsection2Modal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Section 6</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="editblogdetailsection2Form" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="blogdetailsection2_id" id="edit_blogdetailsection2_id">

          <div class="mb-3">
            <label>Heading</label>
            <input type="text" name="heading" id="edit_heading" class="form-control">
          </div>

           <div class="mb-3">
            <label>Point Heading</label>
            <input type="text" name="points_headings" id="edit_points_headings" class="form-control">
          </div>

           <div class="mb-3">
            <label>Point</label>
            <input type="text" name="point" id="edit_point" class="form-control">
          </div>

          <div class="mb-3">
            <label>Paragraph</label>
            <textarea name="paragraph" id="edit_paragraph" class="form-control"></textarea>
          </div>

          <div class="mb-3">
  <label>Link</label>
  <input type="text" name="slug"  id="edit_slug" class="form-control">
</div>

          <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <div id="editImagePreview" class="mt-2"></div>
          </div>

         

          <button type="submit" class="btn btn-primary">Update blogdetailsection2</button>
        </form>
      </div>
    </div>
  </div>
</div>


    
   @include('admin.js')
   @include('admin.ajax')

<script>
$(document).ready(function () {
    $('#blogdetailsection2Form').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        Swal.fire({
            title: 'Saving...',
            text: 'Please wait',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        $.ajax({
            url: "{{ route('blogdetailsection2.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                Swal.close();

                if (res.status === 'success') {
                    Swal.fire('Success', 'blogdetailsection2 added successfully!', 'success');

                    // Use consistent row ID
                    let newRow = `
                        <tr id="blogdetailsection2-row-${res.blogdetailsection2.id}">
                            <td>${$('.table tbody tr').length + 1}</td>
                            <td class="blogdetailsection2-image">
                                ${res.blogdetailsection2.image ? `<img height=100 width=100 src="/logos/${res.blogdetailsection2.image}" />` : ''}
                            </td>
                            <td class="blogdetailsection2-heading">${res.blogdetailsection2.heading ?? ''}</td>
                            <td class="blogdetailsection2-paragraph" style="white-space:nowrap">${res.blogdetailsection2.paragraph ?? ''}</td>
                            <td class="blogdetailsection2-points_headings">${res.blogdetailsection2.points_headings ?? ''}</td>
                            <td class="blogdetailsection2-point">${res.blogdetailsection2.point ?? ''}</td>
                            <td class="blogdetailsection2-slug">${res.blogdetailsection2.slug ?? ''}</td>
                            <td>
                                <div style="display: flex; gap: 6px;">
                                    <button class="btn btn-sm btn-primary edit-blogdetailsection2-btn" 
                                            data-blogdetailsection2-id="${res.blogdetailsection2.id}" title="Edit blogdetailsection2">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-blogdetailsection2-btn" 
                                            data-blogdetailsection2-id="${res.blogdetailsection2.id}" title="Delete blogdetailsection2">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;

                    $('table tbody').append(newRow);
                    $('#blogdetailsection2Modal').modal('hide');
                    $('#blogdetailsection2Form')[0].reset();
                }
            },
            error: function (xhr) {
                Swal.close();
                Swal.fire('Error', 'Something went wrong!', 'error');
            }
        });
    });
});


$(document).on('click', '.edit-blogdetailsection2-btn', function () {
    let id = $(this).data('blogdetailsection2-id');

    Swal.fire({
        title: 'Loading...',
        text: 'Fetching blogdetailsection2 details',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: `/blogdetailsection2/${id}/edit`,
        type: "GET",
        success: function (res) {
            if (res.status === 'success') {
                let blogdetailsection2 = res.blogdetailsection2;

                $('#edit_blogdetailsection2_id').val(blogdetailsection2.id);
                $('#edit_heading').val(blogdetailsection2.heading);
                $('#edit_paragraph').val(blogdetailsection2.paragraph);
                $('#edit_points_headings').val(blogdetailsection2.points_headings);
                $('#edit_point').val(blogdetailsection2.point);
                $('#edit_slug').val(blogdetailsection2.slug);

                if (blogdetailsection2.image) {
                    $('#editImagePreview').html(`<img src="/logos/${blogdetailsection2.image}" width="100">`);
                } else {
                    $('#editImagePreview').html('');
                }


                Swal.close();

                $('#editblogdetailsection2Modal').modal('show');
            }
        },
        error: function () {
            Swal.fire('Error', 'Could not fetch blogdetailsection2 details', 'error');
        }
    });
});

$('#editblogdetailsection2Form').submit(function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    Swal.fire({
        title: 'Updating...',
        text: 'Please wait while we update the blogdetailsection2',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: "{{ route('blogdetailsection2.update') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            Swal.close();
            Swal.fire('Updated!', res.message, 'success');

            $('#editblogdetailsection2Modal').modal('hide');

            let row = $("#blogdetailsection2-row-" + res.blogdetailsection2.id);

            if (row.length) {
                if (res.blogdetailsection2.image) {
                    row.find(".blogdetailsection2-image").html(`<img src="/logos/${res.blogdetailsection2.image}" width="80" height="80">`);
                } else {
                    row.find(".blogdetailsection2-image").html('');
                }

                row.find(".blogdetailsection2-heading").text(res.blogdetailsection2.heading);

                row.find(".blogdetailsection2-points_headings").text(res.blogdetailsection2.points_headings);
                row.find(".blogdetailsection2-point").text(res.blogdetailsection2.point);
                row.find(".blogdetailsection2-slug").text(res.blogdetailsection2.slug);

                let words = res.blogdetailsection2.paragraph ? res.blogdetailsection2.paragraph.split(' ') : [];
                let limitedText = words.slice(0, 5).join(' ');
                let isTruncated = words.length > 5;
                row.find(".blogdetailsection2-paragraph")
                   .text(limitedText + (isTruncated ? ' ...' : ''))
                   .attr('title', res.blogdetailsection2.paragraph);
            }
        },
        error: function (xhr) {
            Swal.close();
            Swal.fire('Error', 'Could not update blogdetailsection2', 'error');
        }
    });
});

$(document).on('click', '.delete-blogdetailsection2-btn', function () {
    let id = $(this).data('blogdetailsection2-id');

    Swal.fire({
        title: 'Are you sure?',
        text: "This will permanently delete the blogdetailsection2.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Deleting...',
                text: 'Please wait while the blogdetailsection2 is being deleted.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: `/blogdetailsection2/${id}`,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function (res) {
                    if (res.status === 'success') {
                        Swal.fire('Deleted!', res.message, 'success');
                        $("#blogdetailsection2-row-" + id).fadeOut(500, function () {
                            $(this).remove(); 
                        });
                    }
                },
                error: function () {
                    Swal.fire('Error', 'Could not delete blogdetailsection2.', 'error');
                }
            });
        }
    });
});


</script>

  
</body>
</html>
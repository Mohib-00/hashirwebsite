<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addblogdetailsection5btn {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addblogdetailsection5btn:hover {
        background-color: #45a049;  
    }

    .custom-modal.addblogdetailsection5 {
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


.custom-modal1.etstgsblogdetailsection5 {
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
                       
              <button class="addblogdetailsection5"
  style="background: linear-gradient(135deg, #4CAF50, #2E7D32); 
         color: white; border: none; padding: 10px 20px; border-radius: 8px; 
         font-size: 14px; font-weight: bold; cursor: pointer; 
         box-shadow: 0 4px 6px rgba(0,0,0,0.2); transition: all 0.3s ease;"
  data-bs-toggle="modal" data-bs-target="#blogdetailsection5Modal">
  Add Row
</button>



                    </div>
                  </div>
                 <div class="card-body">
  <div class="table-responsive">
    <table  class="display table table-striped table-hover blogdetailsection5-table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Main Heading</th>
          <th>Question</th>
          <th>Answer</th>
          <th>Link</th>
          <th style="width:10%">Action</th>
        </tr>
      </thead>
      <tbody>
        @php $counter = 1; @endphp
      @foreach($blogdetailsection5s as $blogdetailsection5)
<tr id="blogdetailsection5-row-{{ $blogdetailsection5->id }}">
    <td>{{ $counter }}</td>
    <td class="blogdetailsection5-main_heading">{{ $blogdetailsection5->main_heading }}</td>
    <td class="blogdetailsection5-heading">{{ $blogdetailsection5->heading }}</td>
     @php
        $words = str_word_count($blogdetailsection5->paragraph, 2);
        $limitedText = implode(' ', array_slice($words, 0, 5));
        $isTruncated = str_word_count($blogdetailsection5->paragraph) > 5;
    @endphp
    <td class="blogdetailsection5-paragraph" style="white-space: nowrap" title="{{ $blogdetailsection5->paragraph }}">
        {{ $limitedText }}{{ $isTruncated ? ' ...' : '' }}
    </td>
    <td class="blogdetailsection5-slug">{{ $blogdetailsection5->slug }}</td>
    <td>
        <div style="display: flex; gap: 6px;">
            <button class="btn btn-sm btn-primary edit-blogdetailsection5-btn" data-blogdetailsection5-id="{{ $blogdetailsection5->id }}" title="Edit blogdetailsection5">
                <i class="fas fa-edit"></i>
            </button>
            <button class="btn btn-sm btn-danger delete-blogdetailsection5-btn" data-blogdetailsection5-id="{{ $blogdetailsection5->id }}" title="Delete blogdetailsection5">
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


    <div class="modal fade" id="blogdetailsection5Modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="blogdetailsection5Form" enctype="multipart/form-data">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Section 10</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">

          @if($main_heading_count < 1)
          <div class="mb-3">
  <label>Main Heading</label>
  <input type="text" name="main_heading" class="form-control">
</div>
@endif

<div class="mb-3">
  <label>Question</label>
  <input type="text" name="heading" class="form-control">
</div>

<div class="mb-3">
  <label>Answer</label>
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

<div class="modal fade" id="editblogdetailsection5Modal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Section 10</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="editblogdetailsection5Form" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="blogdetailsection5_id" id="edit_blogdetailsection5_id">

          <div class="mb-3">
  <label>Main Heading</label>
  <input type="text" id="edit_main_heading" name="main_heading" class="form-control">
</div>

          <div class="mb-3">
            <label>Question</label>
            <input type="text" name="heading" id="edit_heading" class="form-control">
          </div>

          <div class="mb-3">
            <label>Answer</label>
            <textarea name="paragraph" id="edit_paragraph" class="form-control"></textarea>
          </div>

          <div class="mb-3">
  <label>Link</label>
  <input type="text" id="edit_slug" name="slug" class="form-control">
</div>

         
          <button type="submit" class="btn btn-primary">Update blogdetailsection5</button>
        </form>
      </div>
    </div>
  </div>
</div>


    
   @include('admin.js')
   @include('admin.ajax')

<script>
$(document).ready(function () {
    $('#blogdetailsection5Form').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        Swal.fire({
            title: 'Saving...',
            text: 'Please wait',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        $.ajax({
            url: "{{ route('blogdetailsection5.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                Swal.close();

                if (res.status === 'success') {
                    Swal.fire('Success', 'blogdetailsection5 added successfully!', 'success');

                    // Use consistent row ID
                    let newRow = `
                        <tr id="blogdetailsection5-row-${res.blogdetailsection5.id}">
                            <td>${$('.table tbody tr').length + 1}</td>
                             <td class="blogdetailsection5-main_heading">${res.blogdetailsection5.main_heading ?? ''}</td>
                            <td class="blogdetailsection5-heading">${res.blogdetailsection5.heading ?? ''}</td>
                            <td class="blogdetailsection5-paragraph" style="white-space:nowrap">${res.blogdetailsection5.paragraph ?? ''}</td>
                             <td class="blogdetailsection5-slug">${res.blogdetailsection5.slug ?? ''}</td>
                            <td>
                                <div style="display: flex; gap: 6px;">
                                    <button class="btn btn-sm btn-primary edit-blogdetailsection5-btn" 
                                            data-blogdetailsection5-id="${res.blogdetailsection5.id}" title="Edit blogdetailsection5">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-blogdetailsection5-btn" 
                                            data-blogdetailsection5-id="${res.blogdetailsection5.id}" title="Delete blogdetailsection5">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;

                    $('table tbody').append(newRow);
                    $('#blogdetailsection5Modal').modal('hide');
                    $('#blogdetailsection5Form')[0].reset();
                }
            },
            error: function (xhr) {
                Swal.close();
                Swal.fire('Error', 'Something went wrong!', 'error');
            }
        });
    });
});


$(document).on('click', '.edit-blogdetailsection5-btn', function () {
    let id = $(this).data('blogdetailsection5-id');

    Swal.fire({
        title: 'Loading...',
        text: 'Fetching blogdetailsection5 details',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: `/blogdetailsection5/${id}/edit`,
        type: "GET",
        success: function (res) {
            if (res.status === 'success') {
                let blogdetailsection5 = res.blogdetailsection5;

                $('#edit_blogdetailsection5_id').val(blogdetailsection5.id);
                $('#edit_main_heading').val(blogdetailsection5.main_heading);
                $('#edit_heading').val(blogdetailsection5.heading);
                $('#edit_paragraph').val(blogdetailsection5.paragraph);
                $('#edit_slug').val(blogdetailsection5.slug);

               
                Swal.close();

                $('#editblogdetailsection5Modal').modal('show');
            }
        },
        error: function () {
            Swal.fire('Error', 'Could not fetch blogdetailsection5 details', 'error');
        }
    });
});

$('#editblogdetailsection5Form').submit(function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    Swal.fire({
        title: 'Updating...',
        text: 'Please wait while we update the blogdetailsection5',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: "{{ route('blogdetailsection5.update') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            Swal.close();
            Swal.fire('Updated!', res.message, 'success');

            $('#editblogdetailsection5Modal').modal('hide');

            let row = $("#blogdetailsection5-row-" + res.blogdetailsection5.id);

            if (row.length) {
                

                row.find(".blogdetailsection5-heading").text(res.blogdetailsection5.heading);
                row.find(".blogdetailsection5-slug").text(res.blogdetailsection5.slug);
                row.find(".blogdetailsection5-main_heading").text(res.blogdetailsection5.main_heading);

                let words = res.blogdetailsection5.paragraph ? res.blogdetailsection5.paragraph.split(' ') : [];
                let limitedText = words.slice(0, 5).join(' ');
                let isTruncated = words.length > 5;
                row.find(".blogdetailsection5-paragraph")
                   .text(limitedText + (isTruncated ? ' ...' : ''))
                   .attr('title', res.blogdetailsection5.paragraph);
            }
        },
        error: function (xhr) {
            Swal.close();
            Swal.fire('Error', 'Could not update blogdetailsection5', 'error');
        }
    });
});

$(document).on('click', '.delete-blogdetailsection5-btn', function () {
    let id = $(this).data('blogdetailsection5-id');

    Swal.fire({
        title: 'Are you sure?',
        text: "This will permanently delete the blogdetailsection5.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Deleting...',
                text: 'Please wait while the blogdetailsection5 is being deleted.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: `/blogdetailsection5/${id}`,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function (res) {
                    if (res.status === 'success') {
                        Swal.fire('Deleted!', res.message, 'success');
                        $("#blogdetailsection5-row-" + id).fadeOut(500, function () {
                            $(this).remove(); 
                        });
                    }
                },
                error: function () {
                    Swal.fire('Error', 'Could not delete blogdetailsection5.', 'error');
                }
            });
        }
    });
});


</script>

  
</body>
</html>
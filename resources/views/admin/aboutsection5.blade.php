<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addaboutsection5btn {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addaboutsection5btn:hover {
        background-color: #45a049;  
    }

    .custom-modal.addaboutsection5 {
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


.custom-modal1.etstgsaboutsection5 {
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
                       
              <button class="addaboutsection5"
  style="background: linear-gradient(135deg, #4CAF50, #2E7D32); 
         color: white; border: none; padding: 10px 20px; border-radius: 8px; 
         font-size: 14px; font-weight: bold; cursor: pointer; 
         box-shadow: 0 4px 6px rgba(0,0,0,0.2); transition: all 0.3s ease;"
  data-bs-toggle="modal" data-bs-target="#aboutsection5Modal">
  Add Row
</button>



                    </div>
                  </div>
                 <div class="card-body">
  <div class="table-responsive">
    <table  class="display table table-striped table-hover aboutsection5-table">
      <thead>
        <tr>
          <th>Id</th>
           <th>Question</th>
          <th>Answer</th>
          <th style="width:10%">Action</th>
        </tr>
      </thead>
      <tbody>
        @php $counter = 1; @endphp
      @foreach($aboutsection5s as $aboutsection5)
<tr id="aboutsection5-row-{{ $aboutsection5->id }}">
    <td>{{ $counter }}</td>
     
    <td class="aboutsection5-heading">{{ $aboutsection5->heading }}</td>
    @php
        $words = str_word_count($aboutsection5->paragraph, 2);
        $limitedText = implode(' ', array_slice($words, 0, 5));
        $isTruncated = str_word_count($aboutsection5->paragraph) > 5;
    @endphp
    <td class="aboutsection5-paragraph" style="white-space: nowrap" title="{{ $aboutsection5->paragraph }}">
        {{ $limitedText }}{{ $isTruncated ? ' ...' : '' }}
    </td>
    <td>
        <div style="display: flex; gap: 6px;">
            <button class="btn btn-sm btn-primary edit-aboutsection5-btn" data-aboutsection5-id="{{ $aboutsection5->id }}" title="Edit aboutsection5">
                <i class="fas fa-edit"></i>
            </button>
            <button class="btn btn-sm btn-danger delete-aboutsection5-btn" data-aboutsection5-id="{{ $aboutsection5->id }}" title="Delete aboutsection5">
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


    <div class="modal fade" id="aboutsection5Modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="aboutsection5Form" enctype="multipart/form-data">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Section 5</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
        



<div class="mb-3">
  <label>Question</label>
  <input type="text" name="heading" class="form-control">
</div>

<div class="mb-3">
  <label>Answer</label>
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

<div class="modal fade" id="editaboutsection5Modal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Section 5</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="editaboutsection5Form" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="aboutsection5_id" id="edit_aboutsection5_id">

          <div class="mb-3">
            <label>Question</label>
            <input type="text" name="heading" id="edit_heading" class="form-control">
          </div>

          <div class="mb-3">
            <label>Answer</label>
            <textarea name="paragraph" id="edit_paragraph" class="form-control"></textarea>
          </div>

         

          <button type="submit" class="btn btn-primary">Update aboutsection5</button>
        </form>
      </div>
    </div>
  </div>
</div>


    
   @include('admin.js')
   @include('admin.ajax')

<script>
$(document).ready(function () {
    $('#aboutsection5Form').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        Swal.fire({
            title: 'Saving...',
            text: 'Please wait',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        $.ajax({
            url: "{{ route('aboutsection5.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                Swal.close();

                if (res.status === 'success') {
                    Swal.fire('Success', 'aboutsection5 added successfully!', 'success');

                    // Use consistent row ID
                    let newRow = `
                        <tr id="aboutsection5-row-${res.aboutsection5.id}">
                            <td>${$('.table tbody tr').length + 1}</td>
                            
                            <td class="aboutsection5-heading">${res.aboutsection5.heading ?? ''}</td>
                            <td class="aboutsection5-paragraph" style="white-space:nowrap">${res.aboutsection5.paragraph ?? ''}</td>
                            <td>
                                <div style="display: flex; gap: 6px;">
                                    <button class="btn btn-sm btn-primary edit-aboutsection5-btn" 
                                            data-aboutsection5-id="${res.aboutsection5.id}" title="Edit aboutsection5">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-aboutsection5-btn" 
                                            data-aboutsection5-id="${res.aboutsection5.id}" title="Delete aboutsection5">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;

                    $('table tbody').append(newRow);
                    $('#aboutsection5Modal').modal('hide');
                    $('#aboutsection5Form')[0].reset();
                }
            },
            error: function (xhr) {
                Swal.close();
                Swal.fire('Error', 'Something went wrong!', 'error');
            }
        });
    });
});


$(document).on('click', '.edit-aboutsection5-btn', function () {
    let id = $(this).data('aboutsection5-id');

    Swal.fire({
        title: 'Loading...',
        text: 'Fetching aboutsection5 details',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: `/aboutsection5/${id}/edit`,
        type: "GET",
        success: function (res) {
            if (res.status === 'success') {
                let aboutsection5 = res.aboutsection5;

                $('#edit_aboutsection5_id').val(aboutsection5.id);
                $('#edit_heading').val(aboutsection5.heading);
                $('#edit_paragraph').val(aboutsection5.paragraph);
 
                Swal.close();

                $('#editaboutsection5Modal').modal('show');
            }
        },
        error: function () {
            Swal.fire('Error', 'Could not fetch aboutsection5 details', 'error');
        }
    });
});

$('#editaboutsection5Form').submit(function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    Swal.fire({
        title: 'Updating...',
        text: 'Please wait while we update the aboutsection5',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: "{{ route('aboutsection5.update') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            Swal.close();
            Swal.fire('Updated!', res.message, 'success');

            $('#editaboutsection5Modal').modal('hide');

            let row = $("#aboutsection5-row-" + res.aboutsection5.id);

            if (row.length) {
                 

                row.find(".aboutsection5-heading").text(res.aboutsection5.heading);

                let words = res.aboutsection5.paragraph ? res.aboutsection5.paragraph.split(' ') : [];
                let limitedText = words.slice(0, 5).join(' ');
                let isTruncated = words.length > 5;
                row.find(".aboutsection5-paragraph")
                   .text(limitedText + (isTruncated ? ' ...' : ''))
                   .attr('title', res.aboutsection5.paragraph);
            }
        },
        error: function (xhr) {
            Swal.close();
            Swal.fire('Error', 'Could not update aboutsection5', 'error');
        }
    });
});

$(document).on('click', '.delete-aboutsection5-btn', function () {
    let id = $(this).data('aboutsection5-id');

    Swal.fire({
        title: 'Are you sure?',
        text: "This will permanently delete the aboutsection5.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Deleting...',
                text: 'Please wait while the aboutsection5 is being deleted.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: `/aboutsection5/${id}`,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function (res) {
                    if (res.status === 'success') {
                        Swal.fire('Deleted!', res.message, 'success');
                        $("#aboutsection5-row-" + id).fadeOut(500, function () {
                            $(this).remove(); 
                        });
                    }
                },
                error: function () {
                    Swal.fire('Error', 'Could not delete aboutsection5.', 'error');
                }
            });
        }
    });
});


</script>

  
</body>
</html>
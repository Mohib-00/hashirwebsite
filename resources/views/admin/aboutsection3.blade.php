<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addaboutsection3btn {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addaboutsection3btn:hover {
        background-color: #45a049;  
    }

    .custom-modal.addaboutsection3 {
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


.custom-modal1.etstgsaboutsection3 {
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
                       
              <button class="addaboutsection3"
  style="background: linear-gradient(135deg, #4CAF50, #2E7D32); 
         color: white; border: none; padding: 10px 20px; border-radius: 8px; 
         font-size: 14px; font-weight: bold; cursor: pointer; 
         box-shadow: 0 4px 6px rgba(0,0,0,0.2); transition: all 0.3s ease;"
  data-bs-toggle="modal" data-bs-target="#aboutsection3Modal">
  Add Row
</button>



                    </div>
                  </div>
                 <div class="card-body">
  <div class="table-responsive">
    <table  class="display table table-striped table-hover aboutsection3-table">
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
      @foreach($aboutsection3s as $aboutsection3)
<tr id="aboutsection3-row-{{ $aboutsection3->id }}">
    <td>{{ $counter }}</td>
    <td class="aboutsection3-image">
        @if($aboutsection3->image)
            <img src="{{ asset('logos/'.$aboutsection3->image) }}" width="80" height="80">
        @endif
    </td>
    <td class="aboutsection3-main_heading">{{ $aboutsection3->main_heading }}</td>
     @php
        $words = str_word_count($aboutsection3->main_paragraph, 2);
        $limitedText = implode(' ', array_slice($words, 0, 5));
        $isTruncated = str_word_count($aboutsection3->main_paragraph) > 5;
    @endphp
    <td class="aboutsection3-main_paragraph" style="white-space: nowrap" title="{{ $aboutsection3->main_paragraph }}">
        {{ $limitedText }}{{ $isTruncated ? ' ...' : '' }}
    </td>
    <td class="aboutsection3-heading">{{ $aboutsection3->heading }}</td>
    <td class="aboutsection3-heading">{{ $aboutsection3->heading }}</td>
    @php
        $words = str_word_count($aboutsection3->paragraph, 2);
        $limitedText = implode(' ', array_slice($words, 0, 5));
        $isTruncated = str_word_count($aboutsection3->paragraph) > 5;
    @endphp
    <td class="aboutsection3-paragraph" style="white-space: nowrap" title="{{ $aboutsection3->paragraph }}">
        {{ $limitedText }}{{ $isTruncated ? ' ...' : '' }}
    </td>
    <td>
        <div style="display: flex; gap: 6px;">
            <button class="btn btn-sm btn-primary edit-aboutsection3-btn" data-aboutsection3-id="{{ $aboutsection3->id }}" title="Edit aboutsection3">
                <i class="fas fa-edit"></i>
            </button>
            <button class="btn btn-sm btn-danger delete-aboutsection3-btn" data-aboutsection3-id="{{ $aboutsection3->id }}" title="Delete aboutsection3">
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


    <div class="modal fade" id="aboutsection3Modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="aboutsection3Form" enctype="multipart/form-data">
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

<div class="modal fade" id="editaboutsection3Modal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Section 1</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="editaboutsection3Form" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="aboutsection3_id" id="edit_aboutsection3_id">

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

         

          <button type="submit" class="btn btn-primary">Update aboutsection3</button>
        </form>
      </div>
    </div>
  </div>
</div>


    
   @include('admin.js')
   @include('admin.ajax')

<script>
$(document).ready(function () {
    $('#aboutsection3Form').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        Swal.fire({
            title: 'Saving...',
            text: 'Please wait',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        $.ajax({
            url: "{{ route('aboutsection3.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                Swal.close();

                if (res.status === 'success') {
                    Swal.fire('Success', 'aboutsection3 added successfully!', 'success');

                    // Use consistent row ID
                    let newRow = `
                        <tr id="aboutsection3-row-${res.aboutsection3.id}">
                            <td>${$('.table tbody tr').length + 1}</td>
                            <td class="aboutsection3-image">
                                ${res.aboutsection3.image ? `<img height=100 width=100 src="/logos/${res.aboutsection3.image}" />` : ''}
                            </td>
                            <td class="aboutsection3-main_heading">${res.aboutsection3.main_heading ?? ''}</td>
                            <td class="aboutsection3-main_paragraph" style="white-space:nowrap">${res.aboutsection3.main_paragraph ?? ''}</td>
                            <td class="aboutsection3-heading">${res.aboutsection3.heading ?? ''}</td>
                            <td class="aboutsection3-paragraph" style="white-space:nowrap">${res.aboutsection3.paragraph ?? ''}</td>
                            <td>
                                <div style="display: flex; gap: 6px;">
                                    <button class="btn btn-sm btn-primary edit-aboutsection3-btn" 
                                            data-aboutsection3-id="${res.aboutsection3.id}" title="Edit aboutsection3">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-aboutsection3-btn" 
                                            data-aboutsection3-id="${res.aboutsection3.id}" title="Delete aboutsection3">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;

                    $('table tbody').append(newRow);
                    $('#aboutsection3Modal').modal('hide');
                    $('#aboutsection3Form')[0].reset();
                }
            },
            error: function (xhr) {
                Swal.close();
                Swal.fire('Error', 'Something went wrong!', 'error');
            }
        });
    });
});


$(document).on('click', '.edit-aboutsection3-btn', function () {
    let id = $(this).data('aboutsection3-id');

    Swal.fire({
        title: 'Loading...',
        text: 'Fetching aboutsection3 details',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: `/aboutsection3/${id}/edit`,
        type: "GET",
        success: function (res) {
            if (res.status === 'success') {
                let aboutsection3 = res.aboutsection3;

                $('#edit_aboutsection3_id').val(aboutsection3.id);
                $('#edit_heading').val(aboutsection3.heading);
                $('#edit_paragraph').val(aboutsection3.paragraph);
                $('#edit_main_heading').val(aboutsection3.main_heading);
                $('#edit_main_paragraph').val(aboutsection3.main_paragraph);

                if (aboutsection3.image) {
                    $('#editImagePreview').html(`<img src="/logos/${aboutsection3.image}" width="100">`);
                } else {
                    $('#editImagePreview').html('');
                }


                Swal.close();

                $('#editaboutsection3Modal').modal('show');
            }
        },
        error: function () {
            Swal.fire('Error', 'Could not fetch aboutsection3 details', 'error');
        }
    });
});

$('#editaboutsection3Form').submit(function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    Swal.fire({
        title: 'Updating...',
        text: 'Please wait while we update the aboutsection3',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: "{{ route('aboutsection3.update') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            Swal.close();
            Swal.fire('Updated!', res.message, 'success');

            $('#editaboutsection3Modal').modal('hide');

            let row = $("#aboutsection3-row-" + res.aboutsection3.id);

            if (row.length) {
                if (res.aboutsection3.image) {
                    row.find(".aboutsection3-image").html(`<img src="/logos/${res.aboutsection3.image}" width="80" height="80">`);
                } else {
                    row.find(".aboutsection3-image").html('');
                }

                row.find(".aboutsection3-heading").text(res.aboutsection3.heading);

                row.find(".aboutsection3-main_heading").text(res.aboutsection3.main_heading);
                row.find(".aboutsection3-main_paragraph").text(res.aboutsection3.main_paragraph);

                let words = res.aboutsection3.paragraph ? res.aboutsection3.paragraph.split(' ') : [];
                let limitedText = words.slice(0, 5).join(' ');
                let isTruncated = words.length > 5;
                row.find(".aboutsection3-paragraph")
                   .text(limitedText + (isTruncated ? ' ...' : ''))
                   .attr('title', res.aboutsection3.paragraph);
            }
        },
        error: function (xhr) {
            Swal.close();
            Swal.fire('Error', 'Could not update aboutsection3', 'error');
        }
    });
});

$(document).on('click', '.delete-aboutsection3-btn', function () {
    let id = $(this).data('aboutsection3-id');

    Swal.fire({
        title: 'Are you sure?',
        text: "This will permanently delete the aboutsection3.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Deleting...',
                text: 'Please wait while the aboutsection3 is being deleted.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: `/aboutsection3/${id}`,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function (res) {
                    if (res.status === 'success') {
                        Swal.fire('Deleted!', res.message, 'success');
                        $("#aboutsection3-row-" + id).fadeOut(500, function () {
                            $(this).remove(); 
                        });
                    }
                },
                error: function () {
                    Swal.fire('Error', 'Could not delete aboutsection3.', 'error');
                }
            });
        }
    });
});


</script>

  
</body>
</html>
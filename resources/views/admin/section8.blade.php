<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addsection8btn {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addsection8btn:hover {
        background-color: #45a049;  
    }

    .custom-modal.addsection8 {
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


.custom-modal1.etstgssection8 {
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
                       
              <button class="addsection8"
  style="background: linear-gradient(135deg, #4CAF50, #2E7D32); 
         color: white; border: none; padding: 10px 20px; border-radius: 8px; 
         font-size: 14px; font-weight: bold; cursor: pointer; 
         box-shadow: 0 4px 6px rgba(0,0,0,0.2); transition: all 0.3s ease;"
  data-bs-toggle="modal" data-bs-target="#section8Modal">
  Add Row
</button>



                    </div>
                  </div>
                 <div class="card-body">
  <div class="table-responsive">
    <table  class="display table table-striped table-hover section8-table">
      <thead>
        <tr>
          <th>Id</th>
          <th style="white-space: nowrap;">Image</th>
          <th>Main Paragraph</th>
          <th>Heading</th>
          <th>Paragraph</th>
          <th style="width:10%">Action</th>
        </tr>
      </thead>
      <tbody>
        @php $counter = 1; @endphp
      @foreach($section8s as $section8)
<tr id="section8-row-{{ $section8->id }}">
    <td>{{ $counter }}</td>
    <td class="section8-image">
        @if($section8->image)
            <img src="{{ asset('logos/'.$section8->image) }}" width="80" height="80">
        @endif
    </td>

    @php
        $words = str_word_count($section8->main_paragraph, 2);
        $limitedText = implode(' ', array_slice($words, 0, 5));
        $isTruncated = str_word_count($section8->main_paragraph) > 5;
    @endphp
    <td class="section8-main_paragraph" style="white-space: nowrap" title="{{ $section8->main_paragraph }}">
        {{ $limitedText }}{{ $isTruncated ? ' ...' : '' }}
    </td>


    <td class="section8-heading">{{ $section8->heading }}</td>
    @php
        $words = str_word_count($section8->paragraph, 2);
        $limitedText = implode(' ', array_slice($words, 0, 5));
        $isTruncated = str_word_count($section8->paragraph) > 5;
    @endphp
    <td class="section8-paragraph" style="white-space: nowrap" title="{{ $section8->paragraph }}">
        {{ $limitedText }}{{ $isTruncated ? ' ...' : '' }}
    </td>
    <td>
        <div style="display: flex; gap: 6px;">
            <button class="btn btn-sm btn-primary edit-section8-btn" data-section8-id="{{ $section8->id }}" title="Edit section8">
                <i class="fas fa-edit"></i>
            </button>
            <button class="btn btn-sm btn-danger delete-section8-btn" data-section8-id="{{ $section8->id }}" title="Delete section8">
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


    <div class="modal fade" id="section8Modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="section8Form" enctype="multipart/form-data">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Section 8</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
        

<div class="mb-3">
  <label>Main Paragraph</label>
  <textarea name="main_paragraph" class="form-control"></textarea>
</div>

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

<div class="modal fade" id="editsection8Modal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Section 8</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="editsection8Form" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="section8_id" id="edit_section8_id">

           <div class="mb-3">
            <label>Main Paragraph</label>
            <textarea name="main_paragraph" id="edit_main_paragraph" class="form-control"></textarea>
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

         

          <button type="submit" class="btn btn-primary">Update section8</button>
        </form>
      </div>
    </div>
  </div>
</div>


    
   @include('admin.js')
   @include('admin.ajax')

<script>
$(document).ready(function () {
    $('#section8Form').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        Swal.fire({
            title: 'Saving...',
            text: 'Please wait',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        $.ajax({
            url: "{{ route('section8.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                Swal.close();

                if (res.status === 'success') {
                    Swal.fire('Success', 'section8 added successfully!', 'success');

                    let newRow = `
                        <tr id="section8-row-${res.section8.id}">
                            <td>${$('.table tbody tr').length + 1}</td>
                            <td class="section8-image">
                                ${res.section8.image ? `<img height=100 width=100 src="/logos/${res.section8.image}" />` : ''}
                            </td>
                            <td class="section8-main_paragraph" style="white-space:nowrap">${res.section8.main_paragraph ?? ''}</td>
                            <td class="section8-heading">${res.section8.heading ?? ''}</td>
                            <td class="section8-paragraph" style="white-space:nowrap">${res.section8.paragraph ?? ''}</td>
                            <td>
                                <div style="display: flex; gap: 6px;">
                                    <button class="btn btn-sm btn-primary edit-section8-btn" 
                                            data-section8-id="${res.section8.id}" title="Edit section8">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-section8-btn" 
                                            data-section8-id="${res.section8.id}" title="Delete section8">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;

                    $('table tbody').append(newRow);
                    $('#section8Modal').modal('hide');
                    $('#section8Form')[0].reset();
                }
            },
            error: function (xhr) {
                Swal.close();
                Swal.fire('Error', 'Something went wrong!', 'error');
            }
        });
    });
});


$(document).on('click', '.edit-section8-btn', function () {
    let id = $(this).data('section8-id');

    Swal.fire({
        title: 'Loading...',
        text: 'Fetching section8 details',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: `/section8/${id}/edit`,
        type: "GET",
        success: function (res) {
            if (res.status === 'success') {
                let section8 = res.section8;

                $('#edit_section8_id').val(section8.id);
                $('#edit_heading').val(section8.heading);
                $('#edit_paragraph').val(section8.paragraph);
                $('#edit_main_paragraph').val(section8.main_paragraph);

                if (section8.image) {
                    $('#editImagePreview').html(`<img src="/logos/${section8.image}" width="100">`);
                } else {
                    $('#editImagePreview').html('');
                }


                Swal.close();

                $('#editsection8Modal').modal('show');
            }
        },
        error: function () {
            Swal.fire('Error', 'Could not fetch section8 details', 'error');
        }
    });
});

$('#editsection8Form').submit(function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    Swal.fire({
        title: 'Updating...',
        text: 'Please wait while we update the section8',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: "{{ route('section8.update') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            Swal.close();
            Swal.fire('Updated!', res.message, 'success');

            $('#editsection8Modal').modal('hide');

            let row = $("#section8-row-" + res.section8.id);

            if (row.length) {
                if (res.section8.image) {
                    row.find(".section8-image").html(`<img src="/logos/${res.section8.image}" width="80" height="80">`);
                } else {
                    row.find(".section8-image").html('');
                }

                row.find(".section8-main_paragraph").text(res.section8.main_paragraph);

                row.find(".section8-heading").text(res.section8.heading);

                let words = res.section8.paragraph ? res.section8.paragraph.split(' ') : [];
                let limitedText = words.slice(0, 5).join(' ');
                let isTruncated = words.length > 5;
                row.find(".section8-paragraph")
                   .text(limitedText + (isTruncated ? ' ...' : ''))
                   .attr('title', res.section8.paragraph);
            }
        },
        error: function (xhr) {
            Swal.close();
            Swal.fire('Error', 'Could not update section8', 'error');
        }
    });
});

$(document).on('click', '.delete-section8-btn', function () {
    let id = $(this).data('section8-id');

    Swal.fire({
        title: 'Are you sure?',
        text: "This will permanently delete the section8.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Deleting...',
                text: 'Please wait while the section8 is being deleted.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: `/section8/${id}`,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function (res) {
                    if (res.status === 'success') {
                        Swal.fire('Deleted!', res.message, 'success');
                        $("#section8-row-" + id).fadeOut(500, function () {
                            $(this).remove(); 
                        });
                    }
                },
                error: function () {
                    Swal.fire('Error', 'Could not delete section8.', 'error');
                }
            });
        }
    });
});


</script>

  
</body>
</html>
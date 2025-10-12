<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .adddetailsservicesection2btn {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .adddetailsservicesection2btn:hover {
        background-color: #45a049;  
    }

    .custom-modal.adddetailsservicesection2 {
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


.custom-modal1.etstgsdetailsservicesection2 {
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
                       
              <button class="adddetailsservicesection2"
  style="background: linear-gradient(135deg, #4CAF50, #2E7D32); 
         color: white; border: none; padding: 10px 20px; border-radius: 8px; 
         font-size: 14px; font-weight: bold; cursor: pointer; 
         box-shadow: 0 4px 6px rgba(0,0,0,0.2); transition: all 0.3s ease;"
  data-bs-toggle="modal" data-bs-target="#detailsservicesection2Modal">
  Add Row
</button>



                    </div>
                  </div>
                 <div class="card-body">
  <div class="table-responsive">
    <table  class="display table table-striped table-hover detailsservicesection2-table">
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
      @foreach($detailsservicesection2s as $detailsservicesection2)
<tr id="detailsservicesection2-row-{{ $detailsservicesection2->id }}">
    <td>{{ $counter }}</td>
    <td class="detailsservicesection2-image">
        @if($detailsservicesection2->image)
            <img src="{{ asset('logos/'.$detailsservicesection2->image) }}" width="80" height="80">
        @endif
    </td>
    <td class="detailsservicesection2-heading">{{ $detailsservicesection2->heading }}</td>
    @php
        $words = str_word_count($detailsservicesection2->paragraph, 2);
        $limitedText = implode(' ', array_slice($words, 0, 5));
        $isTruncated = str_word_count($detailsservicesection2->paragraph) > 5;
    @endphp
    <td class="detailsservicesection2-paragraph" style="white-space: nowrap" title="{{ $detailsservicesection2->paragraph }}">
        {{ $limitedText }}{{ $isTruncated ? ' ...' : '' }}
    </td>
    <td class="detailsservicesection2-points_headings">{{ $detailsservicesection2->points_headings }}</td>
    <td class="detailsservicesection2-point">{{ $detailsservicesection2->point }}</td>
    <td class="detailsservicesection2-slug">{{ $detailsservicesection2->slug }}</td>
    <td>
        <div style="display: flex; gap: 6px;">
            <button class="btn btn-sm btn-primary edit-detailsservicesection2-btn" data-detailsservicesection2-id="{{ $detailsservicesection2->id }}" title="Edit detailsservicesection2">
                <i class="fas fa-edit"></i>
            </button>
            <button class="btn btn-sm btn-danger delete-detailsservicesection2-btn" data-detailsservicesection2-id="{{ $detailsservicesection2->id }}" title="Delete detailsservicesection2">
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


    <div class="modal fade" id="detailsservicesection2Modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="detailsservicesection2Form" enctype="multipart/form-data">
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

<div class="modal fade" id="editdetailsservicesection2Modal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Section 6</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="editdetailsservicesection2Form" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="detailsservicesection2_id" id="edit_detailsservicesection2_id">

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

         

          <button type="submit" class="btn btn-primary">Update detailsservicesection2</button>
        </form>
      </div>
    </div>
  </div>
</div>


    
   @include('admin.js')
   @include('admin.ajax')

<script>
$(document).ready(function () {
    $('#detailsservicesection2Form').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        Swal.fire({
            title: 'Saving...',
            text: 'Please wait',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        $.ajax({
            url: "{{ route('detailsservicesection2.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                Swal.close();

                if (res.status === 'success') {
                    Swal.fire('Success', 'detailsservicesection2 added successfully!', 'success');

                    // Use consistent row ID
                    let newRow = `
                        <tr id="detailsservicesection2-row-${res.detailsservicesection2.id}">
                            <td>${$('.table tbody tr').length + 1}</td>
                            <td class="detailsservicesection2-image">
                                ${res.detailsservicesection2.image ? `<img height=100 width=100 src="/logos/${res.detailsservicesection2.image}" />` : ''}
                            </td>
                            <td class="detailsservicesection2-heading">${res.detailsservicesection2.heading ?? ''}</td>
                            <td class="detailsservicesection2-paragraph" style="white-space:nowrap">${res.detailsservicesection2.paragraph ?? ''}</td>
                            <td class="detailsservicesection2-points_headings">${res.detailsservicesection2.points_headings ?? ''}</td>
                            <td class="detailsservicesection2-point">${res.detailsservicesection2.point ?? ''}</td>
                            <td class="detailsservicesection2-slug">${res.detailsservicesection2.slug ?? ''}</td>
                            <td>
                                <div style="display: flex; gap: 6px;">
                                    <button class="btn btn-sm btn-primary edit-detailsservicesection2-btn" 
                                            data-detailsservicesection2-id="${res.detailsservicesection2.id}" title="Edit detailsservicesection2">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-detailsservicesection2-btn" 
                                            data-detailsservicesection2-id="${res.detailsservicesection2.id}" title="Delete detailsservicesection2">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;

                    $('table tbody').append(newRow);
                    $('#detailsservicesection2Modal').modal('hide');
                    $('#detailsservicesection2Form')[0].reset();
                }
            },
            error: function (xhr) {
                Swal.close();
                Swal.fire('Error', 'Something went wrong!', 'error');
            }
        });
    });
});


$(document).on('click', '.edit-detailsservicesection2-btn', function () {
    let id = $(this).data('detailsservicesection2-id');

    Swal.fire({
        title: 'Loading...',
        text: 'Fetching detailsservicesection2 details',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: `/detailsservicesection2/${id}/edit`,
        type: "GET",
        success: function (res) {
            if (res.status === 'success') {
                let detailsservicesection2 = res.detailsservicesection2;

                $('#edit_detailsservicesection2_id').val(detailsservicesection2.id);
                $('#edit_heading').val(detailsservicesection2.heading);
                $('#edit_paragraph').val(detailsservicesection2.paragraph);
                $('#edit_points_headings').val(detailsservicesection2.points_headings);
                $('#edit_point').val(detailsservicesection2.point);
                $('#edit_slug').val(detailsservicesection2.slug);

                if (detailsservicesection2.image) {
                    $('#editImagePreview').html(`<img src="/logos/${detailsservicesection2.image}" width="100">`);
                } else {
                    $('#editImagePreview').html('');
                }


                Swal.close();

                $('#editdetailsservicesection2Modal').modal('show');
            }
        },
        error: function () {
            Swal.fire('Error', 'Could not fetch detailsservicesection2 details', 'error');
        }
    });
});

$('#editdetailsservicesection2Form').submit(function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    Swal.fire({
        title: 'Updating...',
        text: 'Please wait while we update the detailsservicesection2',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: "{{ route('detailsservicesection2.update') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            Swal.close();
            Swal.fire('Updated!', res.message, 'success');

            $('#editdetailsservicesection2Modal').modal('hide');

            let row = $("#detailsservicesection2-row-" + res.detailsservicesection2.id);

            if (row.length) {
                if (res.detailsservicesection2.image) {
                    row.find(".detailsservicesection2-image").html(`<img src="/logos/${res.detailsservicesection2.image}" width="80" height="80">`);
                } else {
                    row.find(".detailsservicesection2-image").html('');
                }

                row.find(".detailsservicesection2-heading").text(res.detailsservicesection2.heading);

                row.find(".detailsservicesection2-points_headings").text(res.detailsservicesection2.points_headings);
                row.find(".detailsservicesection2-point").text(res.detailsservicesection2.point);
                row.find(".detailsservicesection2-slug").text(res.detailsservicesection2.slug);

                let words = res.detailsservicesection2.paragraph ? res.detailsservicesection2.paragraph.split(' ') : [];
                let limitedText = words.slice(0, 5).join(' ');
                let isTruncated = words.length > 5;
                row.find(".detailsservicesection2-paragraph")
                   .text(limitedText + (isTruncated ? ' ...' : ''))
                   .attr('title', res.detailsservicesection2.paragraph);
            }
        },
        error: function (xhr) {
            Swal.close();
            Swal.fire('Error', 'Could not update detailsservicesection2', 'error');
        }
    });
});

$(document).on('click', '.delete-detailsservicesection2-btn', function () {
    let id = $(this).data('detailsservicesection2-id');

    Swal.fire({
        title: 'Are you sure?',
        text: "This will permanently delete the detailsservicesection2.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Deleting...',
                text: 'Please wait while the detailsservicesection2 is being deleted.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: `/detailsservicesection2/${id}`,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function (res) {
                    if (res.status === 'success') {
                        Swal.fire('Deleted!', res.message, 'success');
                        $("#detailsservicesection2-row-" + id).fadeOut(500, function () {
                            $(this).remove(); 
                        });
                    }
                },
                error: function () {
                    Swal.fire('Error', 'Could not delete detailsservicesection2.', 'error');
                }
            });
        }
    });
});


</script>

  
</body>
</html>
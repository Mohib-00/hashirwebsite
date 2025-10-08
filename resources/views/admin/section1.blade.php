<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addbannersbtn {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addbannersbtn:hover {
        background-color: #45a049;  
    }

    .custom-modal.addbanners {
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


.custom-modal1.etstgsbanners {
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
                       
              <button class="addbanner"
  style="background: linear-gradient(135deg, #4CAF50, #2E7D32); 
         color: white; border: none; padding: 10px 20px; border-radius: 8px; 
         font-size: 14px; font-weight: bold; cursor: pointer; 
         box-shadow: 0 4px 6px rgba(0,0,0,0.2); transition: all 0.3s ease;"
  data-bs-toggle="modal" data-bs-target="#bannerModal">
  Add Row
</button>



                    </div>
                  </div>
                 <div class="card-body">
  <div class="table-responsive">
    <table  class="display table table-striped table-hover banner-table">
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
        @foreach($banners as $banner)
          <tr class="banner-row-{{ $banner->id }}">
            <td>{{ $counter }}</td>
            <td class="banner-image">
              @if($banner->image)
                <img src="{{ asset('logos/'.$banner->image) }}" width="80" height="80">
              @endif
            </td>
            <td class="banner-heading">{{ $banner->heading }}</td>
            @php
              $words = str_word_count($banner->paragraph, 2);
              $limitedText = implode(' ', array_slice($words, 0, 5));
              $isTruncated = str_word_count($banner->paragraph) > 5;
            @endphp
            <td class="banner-paragraph" style="white-space: nowrap" title="{{ $banner->paragraph }}">
              {{ $limitedText }}{{ $isTruncated ? ' ...' : '' }}
            </td>
            <td>
              <div style="display: flex; gap: 6px;">
                <button class="btn btn-sm btn-primary edit-banner-btn" data-banner-id="{{ $banner->id }}" title="Edit Banner">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger delete-banner-btn" data-banner-id="{{ $banner->id }}" title="Delete Banner">
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


    <div class="modal fade" id="bannerModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="bannerForm" enctype="multipart/form-data">
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

<div class="modal fade" id="editBannerModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Section 1</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="editBannerForm" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="banner_id" id="edit_banner_id">

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

         

          <button type="submit" class="btn btn-primary">Update Banner</button>
        </form>
      </div>
    </div>
  </div>
</div>


    
   @include('admin.js')
   @include('admin.ajax')

<script>
$(document).ready(function () {
    $('#bannerForm').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        Swal.fire({
            title: 'Saving...',
            text: 'Please wait',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading()
            }
        });

        $.ajax({
            url: "{{ route('banners.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                Swal.close();

                if (res.status === 'success') {
                    Swal.fire('Success', 'Banner added successfully!', 'success');

                    let newRow = `
                        <tr id="banner-${res.banner.id}">
                             <td>${$('.table tbody tr').length + 1}</td>
                           
                            <td id="imageee">
                                ${res.banner.image ? `<img height=100 width=100 src="/logos/${res.banner.image}" />` : ''}
                            </td>
                          
                            <td id="emailll">${res.banner.heading ?? ''}</td>
                            <td id="addreeesss" style="white-space:nowrap">${res.banner.paragraph ?? ''}</td>
                          
<td>
    <div style="display: flex; gap: 6px;">
        <button class="btn btn-sm btn-primary edit-banner-btn" 
                data-banner-id="${res.banner.id}" title="Edit Banner">
            <i class="fas fa-edit"></i>
        </button>

        <button class="btn btn-sm btn-danger delete-banner-btn" 
                data-banner-id="${res.banner.id}" title="Delete Banner">
            <i class="fas fa-trash"></i>
        </button>
    </div>
</td>
                        </tr>
                    `;

                    $('table tbody').append(newRow);
                    $('#bannerModal').modal('hide');
                    $('#bannerForm')[0].reset();
                }
            },
            error: function (xhr) {
                Swal.close();
                Swal.fire('Error', 'Something went wrong!', 'error');
            }
        });
    });
});


$(document).on('click', '.edit-banner-btn', function () {
    let id = $(this).data('banner-id');

    Swal.fire({
        title: 'Loading...',
        text: 'Fetching banner details',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: `/banners/${id}/edit`,
        type: "GET",
        success: function (res) {
            if (res.status === 'success') {
                let banner = res.banner;

                $('#edit_banner_id').val(banner.id);
                $('#edit_heading').val(banner.heading);
                $('#edit_paragraph').val(banner.paragraph);

                if (banner.image) {
                    $('#editImagePreview').html(`<img src="/logos/${banner.image}" width="100">`);
                } else {
                    $('#editImagePreview').html('');
                }


                Swal.close();

                $('#editBannerModal').modal('show');
            }
        },
        error: function () {
            Swal.fire('Error', 'Could not fetch banner details', 'error');
        }
    });
});

$('#editBannerForm').submit(function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    Swal.fire({
        title: 'Updating...',
        text: 'Please wait while we update the banner',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: "{{ route('banners.update') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            Swal.close();

            Swal.fire('Updated!', res.message, 'success');

            $('#editBannerModal').modal('hide');

            let row = $("#banner-row-" + res.banner.id);
             
            if (res.banner.image) {
                row.find(".banner-image").html(`<img src="/logos/${res.banner.image}" width="80">`);
            }
            row.find(".banner-heading").text(res.banner.heading);
            row.find(".banner-paragraph").text(res.banner.paragraph);
           
        },
        error: function (xhr) {
            Swal.close();
            Swal.fire('Error', 'Could not update banner', 'error');
        }
    });
});

$(document).on('click', '.delete-banner-btn', function () {
    let id = $(this).data('banner-id');

    Swal.fire({
        title: 'Are you sure?',
        text: "This will permanently delete the banner.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Deleting...',
                text: 'Please wait while the banner is being deleted.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: `/banners/${id}`,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function (res) {
                    if (res.status === 'success') {
                        Swal.fire('Deleted!', res.message, 'success');
                        $("#banner-row-" + id).fadeOut(500, function () {
                            $(this).remove(); 
                        });
                    }
                },
                error: function () {
                    Swal.fire('Error', 'Could not delete banner.', 'error');
                }
            });
        }
    });
});


</script>

  
</body>
</html>
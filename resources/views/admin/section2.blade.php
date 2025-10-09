<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addslidersbtn {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addslidersbtn:hover {
        background-color: #45a049;  
    }

    .custom-modal.addsliders {
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


.custom-modal1.etstgssliders {
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
                       
              <button class="addslider"
  style="background: linear-gradient(135deg, #4CAF50, #2E7D32); 
         color: white; border: none; padding: 10px 20px; border-radius: 8px; 
         font-size: 14px; font-weight: bold; cursor: pointer; 
         box-shadow: 0 4px 6px rgba(0,0,0,0.2); transition: all 0.3s ease;"
  data-bs-toggle="modal" data-bs-target="#sliderModal">
  Add Row
</button>



                    </div>
                  </div>
                 <div class="card-body">
  <div class="table-responsive">
   <table class="table" id="sliderTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @php $counter = 1; @endphp
        @foreach($sliders as $slider)
        <tr class="slider-row-{{ $slider->id }}" id="slider-{{ $slider->id }}">
            <td>{{ $counter }}</td>
            <td class="slider-image">
                @if($slider->image)
                    <img src="{{ asset('logos/'.$slider->image) }}" width="80" height="80">
                @endif
            </td>
            <td>
                <div style="display: flex; gap: 6px;">
                    <button class="btn btn-sm btn-primary edit-slider-btn" data-slider-id="{{ $slider->id }}" title="Edit slider">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger delete-slider-btn" data-slider-id="{{ $slider->id }}" title="Delete slider">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
        @php $counter++; @endphp
        @endforeach
    </tbody>
</table>

<!-- Add Slider Modal -->
<div class="modal fade" id="sliderModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="sliderForm" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Slider Image</label>
                        <input type="file" name="image" id="slider_image" class="form-control">
                        <img id="slider_image_preview" src="" width="100" height="100" style="display:none;" class="mt-2">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Edit Slider Modal -->
<div class="modal fade" id="editsliderModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="editsliderForm" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="slider_id" id="edit_slider_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Slider Image</label>
                        <input type="file" name="image" id="edit_slider_image" class="form-control">
                        <div id="editImagePreview" class="mt-2"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

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



    
   @include('admin.js')
   @include('admin.ajax')

<script>
$(document).ready(function () {

    // Preview image in Add Slider Modal
    $('#slider_image').on('change', function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#slider_image_preview').attr('src', e.target.result).show();
        };
        reader.readAsDataURL(this.files[0]);
    });

    // Add Slider
    $('#sliderForm').on('submit', function (e) {
        e.preventDefault();
        let formData = new FormData(this);

        Swal.fire({
            title: 'Saving...',
            text: 'Please wait',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        $.ajax({
            url: "{{ route('sliders.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                Swal.close();
                if (res.status === 'success') {
                    Swal.fire('Success', 'Slider added successfully!', 'success');

                    let newRow = `
                        <tr class="slider-row-${res.slider.id}" id="slider-${res.slider.id}">
                            <td>${$('#sliderTable tbody tr').length + 1}</td>
                            <td class="slider-image">
                                ${res.slider.image ? `<img src="/logos/${res.slider.image}" width="80" height="80">` : ''}
                            </td>
                            <td>
                                <div style="display: flex; gap: 6px;">
                                    <button class="btn btn-sm btn-primary edit-slider-btn" data-slider-id="${res.slider.id}" title="Edit slider">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-slider-btn" data-slider-id="${res.slider.id}" title="Delete slider">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;

                    $('table tbody').append(newRow);
                    $('#sliderModal').modal('hide');
                    $('#sliderForm')[0].reset();
                    $('#slider_image_preview').hide();
                }
            },
            error: function () {
                Swal.close();
                Swal.fire('Error', 'Something went wrong!', 'error');
            }
        });
    });

    // Edit Slider - fetch data
    $(document).on('click', '.edit-slider-btn', function () {
        let id = $(this).data('slider-id');

        Swal.fire({
            title: 'Loading...',
            text: 'Fetching slider details',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        $.ajax({
            url: `/sliders/${id}/edit`,
            type: "GET",
            success: function (res) {
                Swal.close();
                if (res.status === 'success') {
                    let slider = res.slider;
                    $('#edit_slider_id').val(slider.id);

                    if (slider.image) {
                        $('#editImagePreview').html(`<img src="/logos/${slider.image}" width="100">`);
                    } else {
                        $('#editImagePreview').html('');
                    }

                    $('#editsliderModal').modal('show');
                }
            },
            error: function () {
                Swal.fire('Error', 'Could not fetch slider details', 'error');
            }
        });
    });

    // Update Slider
    $('#editsliderForm').submit(function (e) {
        e.preventDefault();
        let formData = new FormData(this);

        Swal.fire({
            title: 'Updating...',
            text: 'Please wait while we update the slider',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        $.ajax({
            url: "{{ route('sliders.update') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                Swal.close();
                Swal.fire('Updated!', res.message, 'success');
                $('#editsliderModal').modal('hide');

                // Update table row
                let row = $(".slider-row-" + res.slider.id);
                if (res.slider.image) {
                    row.find(".slider-image").html(`<img src="/logos/${res.slider.image}" width="80" height="80">`);
                } else {
                    row.find(".slider-image").html('');
                }
            },
            error: function () {
                Swal.close();
                Swal.fire('Error', 'Could not update slider', 'error');
            }
        });
    });

    // Delete Slider
    $(document).on('click', '.delete-slider-btn', function () {
        let sliderId = $(this).data('slider-id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/sliders/${sliderId}`,
                    type: "DELETE",
                    data: {_token: '{{ csrf_token() }}'},
                    success: function (res) {
                        if (res.status === 'success') {
                            $(`#slider-${sliderId}`).remove();
                            Swal.fire('Deleted!', 'Slider has been deleted.', 'success');

                            // Re-number table rows
                            $('#sliderTable tbody tr').each(function(index){
                                $(this).find('td:first').text(index + 1);
                            });
                        }
                    }
                });
            }
        });
    });

});

</script>

  
</body>
</html>
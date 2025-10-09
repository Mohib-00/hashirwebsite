<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addsection9btn {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addsection9btn:hover {
        background-color: #45a049;  
    }

    .custom-modal.addsection9 {
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


.custom-modal1.etstgssection9 {
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
                       
              <button class="addsection9"
  style="background: linear-gradient(135deg, #4CAF50, #2E7D32); 
         color: white; border: none; padding: 10px 20px; border-radius: 8px; 
         font-size: 14px; font-weight: bold; cursor: pointer; 
         box-shadow: 0 4px 6px rgba(0,0,0,0.2); transition: all 0.3s ease;"
  data-bs-toggle="modal" data-bs-target="#section9Modal">
  Add Row
</button>



                    </div>
                  </div>
                 <div class="card-body">
  <div class="table-responsive">
    <table  class="display table table-striped table-hover section9-table">
      <thead>
        <tr>
          <th>Id</th>
          <th style="white-space: nowrap;">Image</th>
          <th style="width:10%">Action</th>
        </tr>
      </thead>
      <tbody>
        @php $counter = 1; @endphp
      @foreach($section9s as $section9)
<tr id="section9-row-{{ $section9->id }}">
    <td>{{ $counter }}</td>
    <td class="section9-image">
        @if($section9->image)
            <img src="{{ asset('logos/'.$section9->image) }}" width="80" height="80">
        @endif
    </td>
    
    <td>
        <div style="display: flex; gap: 6px;">
            <button class="btn btn-sm btn-primary edit-section9-btn" data-section9-id="{{ $section9->id }}" title="Edit section9">
                <i class="fas fa-edit"></i>
            </button>
            <button class="btn btn-sm btn-danger delete-section9-btn" data-section9-id="{{ $section9->id }}" title="Delete section9">
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


    <div class="modal fade" id="section9Modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="section9Form" enctype="multipart/form-data">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Section 9</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
        

<div class="mb-3">
  <label>Image</label>
  <input type="file" name="image" class="form-control" accept="image/*">
</div>



        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="editsection9Modal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Section 9</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="editsection9Form" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="section9_id" id="edit_section9_id">

        

          <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <div id="editImagePreview" class="mt-2"></div>
          </div>

         

          <button type="submit" class="btn btn-primary">Update section9</button>
        </form>
      </div>
    </div>
  </div>
</div>


    
   @include('admin.js')
   @include('admin.ajax')

<script>
$(document).ready(function () {
    $('#section9Form').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        Swal.fire({
            title: 'Saving...',
            text: 'Please wait',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

      $.ajax({
    url: "{{ route('section9.store') }}",
    type: "POST",
    data: formData,
    dataType: 'json', // 👈 add this line
    contentType: false,
    processData: false,
    success: function (res) {
        console.log(res); // keep for testing

        Swal.close();

        if (res.status === 'success' && res.section9) {
            Swal.fire('Success', 'Section9 added successfully!', 'success');

            let newRow = `
                <tr id="section9-row-${res.section9.id}">
                    <td>${$('.table tbody tr').length + 1}</td>
                    <td class="section9-image">
                        ${res.section9.image ? `<img height=100 width=100 src="/logos/${res.section9.image}" />` : ''}
                    </td>
                    <td>
                        <div style="display: flex; gap: 6px;">
                            <button class="btn btn-sm btn-primary edit-section9-btn" 
                                    data-section9-id="${res.section9.id}" title="Edit section9">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-danger delete-section9-btn" 
                                    data-section9-id="${res.section9.id}" title="Delete section9">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `;

            $('table tbody').append(newRow);
            $('#section9Modal').modal('hide');
            $('#section9Form')[0].reset();
        } else {
            Swal.fire('Error', 'Invalid response from server', 'error');
        }
    },
    error: function (xhr) {
        Swal.close();
        Swal.fire('Error', 'Something went wrong!', 'error');
        console.error(xhr.responseText);
    }
});

    });
});


$(document).on('click', '.edit-section9-btn', function () {
    let id = $(this).data('section9-id');

    Swal.fire({
        title: 'Loading...',
        text: 'Fetching section9 details',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: `/section9/${id}/edit`,
        type: "GET",
        success: function (res) {
            if (res.status === 'success') {
                let section9 = res.section9;

                $('#edit_section9_id').val(section9.id);
        

                if (section9.image) {
                    $('#editImagePreview').html(`<img src="/logos/${section9.image}" width="100">`);
                } else {
                    $('#editImagePreview').html('');
                }


                Swal.close();

                $('#editsection9Modal').modal('show');
            }
        },
        error: function () {
            Swal.fire('Error', 'Could not fetch section9 details', 'error');
        }
    });
});

$('#editsection9Form').submit(function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    Swal.fire({
        title: 'Updating...',
        text: 'Please wait while we update the section9',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: "{{ route('section9.update') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            Swal.close();
            Swal.fire('Updated!', res.message, 'success');

            $('#editsection9Modal').modal('hide');

            let row = $("#section9-row-" + res.section9.id);

            if (row.length) {
                if (res.section9.image) {
                    row.find(".section9-image").html(`<img src="/logos/${res.section9.image}" width="80" height="80">`);
                } else {
                    row.find(".section9-image").html('');
                }

            }
        },
        error: function (xhr) {
            Swal.close();
            Swal.fire('Error', 'Could not update section9', 'error');
        }
    });
});

$(document).on('click', '.delete-section9-btn', function () {
    let id = $(this).data('section9-id');

    Swal.fire({
        title: 'Are you sure?',
        text: "This will permanently delete the section9.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
           Swal.fire({
    title: 'Deleting...',
    text: 'Please wait while the section9 is being deleted.',
    allowOutsideClick: false,
    didOpen: () => {
        Swal.showLoading();
    }
});


            $.ajax({
                url: `/section9/${id}`,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function (res) {
                    if (res.status === 'success') {
                        Swal.fire('Deleted!', res.message, 'success');
                        $("#section9-row-" + id).fadeOut(500, function () {
                            $(this).remove(); 
                        });
                    }
                },
                error: function () {
                    Swal.fire('Error', 'Could not delete section9.', 'error');
                }
            });
        }
    });
});


</script>

  
</body>
</html>
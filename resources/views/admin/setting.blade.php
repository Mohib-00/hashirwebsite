<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .addsettingbtn {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;            
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-left: auto;
    }

    .addsettingbtn:hover {
        background-color: #45a049;  
    }

    .custom-modal.addsetting {
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


.custom-modal1.etstgssetting {
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
                       
             @php
    use App\Models\Setting;
    $settingsCount = Setting::count();
@endphp

@if ($settingsCount == 0)
    <button class="addsetting"
        style="background: linear-gradient(135deg, #4CAF50, #2E7D32); 
            color: white; border: none; padding: 10px 20px; border-radius: 8px; 
            font-size: 14px; font-weight: bold; cursor: pointer; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.2); transition: all 0.3s ease;"
        data-bs-toggle="modal" data-bs-target="#settingModal">
        Add Row
    </button>
@endif




                    </div>
                  </div>
                 <div class="card-body">
  <div class="table-responsive">
    <table  class="display table table-striped table-hover setting-table">
      <thead>
        <tr>
          <th>Id</th>
          <th style="white-space: nowrap;">Image</th>
          <th>Number</th>
          <th>Email</th>
          <th>section5_heading</th>
          <th>section6_heading</th>
          <th>section8_heading</th>
          <th>section8_paragraph</th>
          <th>section9_heading</th>
          <th>section10_heading</th>
          <th>section11_heading</th>
          <th>footer_paragraph</th>
          <th>location</th>
          <th>facebook_link</th>
          <th>instagram_link</th>
          <th>linkedin_link</th>
          <th>youtube_link</th>
          <th>twitter_link</th>
          <th style="width:10%">Action</th>
        </tr>
      </thead>
      <tbody>
        @php $counter = 1; @endphp
      @foreach($settings as $setting)
<tr id="setting-row-{{ $setting->id }}">
    <td>{{ $counter }}</td>
    <td class="setting-image">
        @if($setting->image)
            <img src="{{ asset('logos/'.$setting->image) }}" width="80" height="80">
        @endif
    </td>
    <td class="setting-number">{{ $setting->number }}</td>
    <td class="setting-email">{{ $setting->email }}</td>
    <td class="setting-section5_heading">{{ $setting->section5_heading }}</td>
    <td class="setting-section6_heading">{{ $setting->section6_heading }}</td>
    <td class="setting-section8_heading">{{ $setting->section8_heading }}</td>
    <td class="setting-section8_paragraph">{{ $setting->section8_paragraph }}</td>
    <td class="setting-section9_heading">{{ $setting->section9_heading }}</td>
    <td class="setting-section10_heading">{{ $setting->section10_heading }}</td>
    <td class="setting-section11_heading">{{ $setting->section11_heading }}</td>
    <td class="setting-footer_paragraph">{{ $setting->footer_paragraph }}</td>
    <td class="setting-location">{{ $setting->location }}</td>
    <td class="setting-facebook_link">{{ $setting->facebook_link }}</td>
    <td class="setting-instagram_link">{{ $setting->instagram_link }}</td>
    <td class="setting-linkedin_link">{{ $setting->linkedin_link }}</td>
    <td class="setting-youtube_link">{{ $setting->youtube_link }}</td>
    <td class="setting-twitter_link">{{ $setting->twitter_link }}</td>
   
    <td>
        <div style="display: flex; gap: 6px;">
            <button class="btn btn-sm btn-primary edit-setting-btn" data-setting-id="{{ $setting->id }}" title="Edit setting">
                <i class="fas fa-edit"></i>
            </button>
            <button class="btn btn-sm btn-danger delete-setting-btn" data-setting-id="{{ $setting->id }}" title="Delete setting">
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


    <div class="modal fade" id="settingModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="settingForm" enctype="multipart/form-data">
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
  <label>number</label>
  <input type="number" name="number" class="form-control">
</div>

<div class="mb-3">
  <label>email</label>
  <input type="email" name="email" class="form-control">
</div>

<div class="mb-3">
  <label>section5_heading</label>
  <input type="text" name="section5_heading" class="form-control">
</div>

<div class="mb-3">
  <label>section6_heading</label>
  <input type="text" name="section6_heading" class="form-control">
</div>

<div class="mb-3">
  <label>section8_heading</label>
  <input type="text" name="section8_heading" class="form-control">
</div>

<div class="mb-3">
  <label>section8_paragraph</label>
  <input type="text" name="section8_paragraph" class="form-control">
</div>

<div class="mb-3">
  <label>section9_heading</label>
  <input type="text" name="section9_heading" class="form-control">
</div>

<div class="mb-3">
  <label>section10_heading</label>
  <input type="text" name="section10_heading" class="form-control">
</div>

<div class="mb-3">
  <label>section11_heading</label>
  <input type="text" name="section11_heading" class="form-control">
</div>

<div class="mb-3">
  <label>footer_paragraph</label>
  <input type="text" name="footer_paragraph" class="form-control">
</div>

<div class="mb-3">
  <label>location</label>
  <input type="text" name="location" class="form-control">
</div>

<div class="mb-3">
  <label>facebook_link</label>
  <input type="text" name="facebook_link" class="form-control">
</div>

<div class="mb-3">
  <label>instagram_link</label>
  <input type="text" name="instagram_link" class="form-control">
</div>

<div class="mb-3">
  <label>linkedin_link</label>
  <input type="text" name="linkedin_link" class="form-control">
</div>

<div class="mb-3">
  <label>youtube_link</label>
  <input type="text" name="youtube_link" class="form-control">
</div>

<div class="mb-3">
  <label>twitter_link</label>
  <input type="text" name="twitter_link" class="form-control">
</div>



        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="editsettingModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Section 1</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="editsettingForm" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="setting_id" id="edit_setting_id">

          <div class="mb-3">
  <label>number</label>
  <input type="number" id="edit_number" name="number" class="form-control">
</div>

<div class="mb-3">
  <label>email</label>
  <input type="email" id="edit_email" name="email" class="form-control">
</div>

<div class="mb-3">
  <label>section5_heading</label>
  <input type="text" id="edit_section5_heading" name="section5_heading" class="form-control">
</div>

<div class="mb-3">
  <label>section6_heading</label>
  <input type="text" id="edit_section6_heading" name="section6_heading" class="form-control">
</div>

<div class="mb-3">
  <label>section8_heading</label>
  <input type="text" id="edit_section8_heading" name="section8_heading" class="form-control">
</div>

<div class="mb-3">
  <label>section8_paragraph</label>
  <input type="text" id="edit_section8_paragraph" name="section8_paragraph" class="form-control">
</div>

<div class="mb-3">
  <label>section9_heading</label>
  <input type="text" id="edit_section9_heading" name="section9_heading" class="form-control">
</div>

<div class="mb-3">
  <label>section10_heading</label>
  <input type="text" id="edit_section10_heading" name="section10_heading" class="form-control">
</div>

<div class="mb-3">
  <label>section11_heading</label>
  <input type="text" id="edit_section11_heading" name="section11_heading" class="form-control">
</div>

<div class="mb-3">
  <label>footer_paragraph</label>
  <input type="text" id="edit_footer_paragraph" name="footer_paragraph" class="form-control">
</div>

<div class="mb-3">
  <label>location</label>
  <input type="text" id="edit_location" name="location" class="form-control">
</div>

<div class="mb-3">
  <label>facebook_link</label>
  <input type="text" id="edit_facebook_link" name="facebook_link" class="form-control">
</div>

<div class="mb-3">
  <label>instagram_link</label>
  <input type="text" id="edit_instagram_link" name="instagram_link" class="form-control">
</div>

<div class="mb-3">
  <label>linkedin_link</label>
  <input type="text" id="edit_linkedin_link" name="linkedin_link" class="form-control">
</div>

<div class="mb-3">
  <label>youtube_link</label>
  <input type="text" id="edit_youtube_link" name="youtube_link" class="form-control">
</div>

<div class="mb-3">
  <label>twitter_link</label>
  <input type="text" id="edit_twitter_link" name="twitter_link" class="form-control">
</div>


          <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <div id="editImagePreview" class="mt-2"></div>
          </div>

         

          <button type="submit" class="btn btn-primary">Update setting</button>
        </form>
      </div>
    </div>
  </div>
</div>


    
   @include('admin.js')
   @include('admin.ajax')

<script>
$(document).ready(function () {
    $('#settingForm').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        Swal.fire({
            title: 'Saving...',
            text: 'Please wait',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        $.ajax({
            url: "{{ route('setting.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                Swal.close();

                if (res.status === 'success') {
                    Swal.fire('Success', 'setting added successfully!', 'success');

                    // Use consistent row ID
                    let newRow = `
                        <tr id="setting-row-${res.setting.id}">
                            <td>${$('.table tbody tr').length + 1}</td>
                            <td class="setting-image">
                                ${res.setting.image ? `<img height=100 width=100 src="/logos/${res.setting.image}" />` : ''}
                            </td>
                            <td class="setting-number">${res.setting.number ?? ''}</td>
                            <td class="setting-email">${res.setting.email ?? ''}</td>
                            <td class="setting-section5_heading">${res.setting.section5_heading ?? ''}</td>
                            <td class="setting-section6_heading">${res.setting.section6_heading ?? ''}</td>
                            <td class="setting-section8_heading">${res.setting.section8_heading ?? ''}</td>
                            <td class="setting-section8_paragraph">${res.setting.section8_paragraph ?? ''}</td>
                            <td class="setting-section9_heading">${res.setting.section9_heading ?? ''}</td>
                            <td class="setting-section10_heading">${res.setting.section10_heading ?? ''}</td>
                            <td class="setting-section11_heading">${res.setting.section11_heading ?? ''}</td>
                            <td class="setting-footer_paragraph">${res.setting.footer_paragraph ?? ''}</td>
                            <td class="setting-location">${res.setting.location ?? ''}</td>
                            <td class="setting-facebook_link">${res.setting.facebook_link ?? ''}</td>
                            <td class="setting-instagram_link">${res.setting.instagram_link ?? ''}</td>
                            <td class="setting-linkedin_link">${res.setting.linkedin_link ?? ''}</td>
                            <td class="setting-youtube_link">${res.setting.youtube_link ?? ''}</td>
                            <td class="setting-twitter_link">${res.setting.twitter_link ?? ''}</td>
                            
                            
                            <td>
                                <div style="display: flex; gap: 6px;">
                                    <button class="btn btn-sm btn-primary edit-setting-btn" 
                                            data-setting-id="${res.setting.id}" title="Edit setting">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-setting-btn" 
                                            data-setting-id="${res.setting.id}" title="Delete setting">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;

                    $('table tbody').append(newRow);
                    $('#settingModal').modal('hide');
                    $('#settingForm')[0].reset();
                }
            },
            error: function (xhr) {
                Swal.close();
                Swal.fire('Error', 'Something went wrong!', 'error');
            }
        });
    });
});


$(document).on('click', '.edit-setting-btn', function () {
    let id = $(this).data('setting-id');

    Swal.fire({
        title: 'Loading...',
        text: 'Fetching setting details',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: `/setting/${id}/edit`,
        type: "GET",
        success: function (res) {
            if (res.status === 'success') {
                let setting = res.setting;

                $('#edit_setting_id').val(setting.id);
                $('#edit_number').val(setting.number);
                $('#edit_email').val(setting.email);
                $('#edit_section5_heading').val(setting.section5_heading);
                $('#edit_section6_heading').val(setting.section6_heading);
                $('#edit_section8_heading').val(setting.section8_heading);
                $('#edit_section8_paragraph').val(setting.section8_paragraph);
                $('#edit_section9_heading').val(setting.section9_heading);
                $('#edit_section10_heading').val(setting.section10_heading);
                $('#edit_section11_heading').val(setting.section11_heading);
                $('#edit_footer_paragraph').val(setting.footer_paragraph);
                $('#edit_location').val(setting.location);
                $('#edit_facebook_link').val(setting.facebook_link);
                $('#edit_instagram_link').val(setting.instagram_link);
                $('#edit_linkedin_link').val(setting.linkedin_link);
                $('#edit_youtube_link').val(setting.youtube_link);
                $('#edit_twitter_link').val(setting.twitter_link);
                if (setting.image) {
                    $('#editImagePreview').html(`<img src="/logos/${setting.image}" width="100">`);
                } else {
                    $('#editImagePreview').html('');
                }


                Swal.close();

                $('#editsettingModal').modal('show');
            }
        },
        error: function () {
            Swal.fire('Error', 'Could not fetch setting details', 'error');
        }
    });
});

$('#editsettingForm').submit(function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    Swal.fire({
        title: 'Updating...',
        text: 'Please wait while we update the setting',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: "{{ route('setting.update') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            Swal.close();
            Swal.fire('Updated!', res.message, 'success');

            $('#editsettingModal').modal('hide');

            let row = $("#setting-row-" + res.setting.id);

            if (row.length) {
                if (res.setting.image) {
                    row.find(".setting-image").html(`<img src="/logos/${res.setting.image}" width="80" height="80">`);
                } else {
                    row.find(".setting-image").html('');
                }

                row.find(".setting-number").text(res.setting.number);
                row.find(".setting-email").text(res.setting.email);
                row.find(".setting-section5_heading").text(res.setting.section5_heading);
                row.find(".setting-section6_heading").text(res.setting.section6_heading);
                row.find(".setting-section8_heading").text(res.setting.section8_heading);
                row.find(".setting-section8_paragraph").text(res.setting.section8_paragraph);
                row.find(".setting-section9_heading").text(res.setting.section9_heading);
                row.find(".setting-section10_heading").text(res.setting.section10_heading);
                row.find(".setting-section11_heading").text(res.setting.section11_heading);
                row.find(".setting-footer_paragraph").text(res.setting.footer_paragraph);
                row.find(".setting-location").text(res.setting.location);
                row.find(".setting-facebook_link").text(res.setting.facebook_link);
                row.find(".setting-instagram_link").text(res.setting.instagram_link);
                row.find(".setting-linkedin_link").text(res.setting.linkedin_link);
                row.find(".setting-youtube_link").text(res.setting.youtube_link);
                row.find(".setting-twitter_link").text(res.setting.twitter_link);
                
            }
        },
        error: function (xhr) {
            Swal.close();
            Swal.fire('Error', 'Could not update setting', 'error');
        }
    });
});

$(document).on('click', '.delete-setting-btn', function () {
    let id = $(this).data('setting-id');

    Swal.fire({
        title: 'Are you sure?',
        text: "This will permanently delete the setting.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Deleting...',
                text: 'Please wait while the setting is being deleted.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: `/setting/${id}`,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function (res) {
                    if (res.status === 'success') {
                        Swal.fire('Deleted!', res.message, 'success');
                        $("#setting-row-" + id).fadeOut(500, function () {
                            $(this).remove(); 
                        });
                    }
                },
                error: function () {
                    Swal.fire('Error', 'Could not delete setting.', 'error');
                }
            });
        }
    });
});


</script>

  
</body>
</html>
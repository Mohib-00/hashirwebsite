<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
 <style>
.table {
  border-radius: 10px;
  overflow: hidden;
}

.table thead {
  background: linear-gradient(135deg, #093945, #0f172a);
  color: #fff;
}

.btn-success {
  background: #16a34a;
  border: none;
  transition: all 0.3s ease;
}

.btn-success:hover {
  background: #22c55e;
}

.badge {
  font-size: 0.85rem;
  padding: 8px 12px;
  border-radius: 8px;
}

#contactSearch {
  box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
  padding: 10px 15px;
  transition: all 0.3s ease;
}

#contactSearch:focus {
  border-color: #00d2ff;
  box-shadow: 0 0 8px rgba(0, 210, 255, 0.4);
}
</style>
   
  </head>
  <body>
    <div class="wrapper">
    @include('admin.sidebar')

      <div class="main-panel">
       @include('admin.header')

        <div class="container mt-5" >
    <h2 class="text-center mb-4" style="margin-top:5%">Job Applications</h2>

    <div class="mb-3 text-end">
        <input type="text" id="contactSearch" class="form-control w-50 d-inline-block" 
               placeholder="Search by name, email, phone or message..."
               style="border-radius: 25px; border: 2px solid #093945;">
    </div>

   <div style="overflow-x: auto; max-width: 100%;">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>CV</th>
        <th>Job Title</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Message</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="contactTableBody">
      @foreach($jobs as $contact)
      <tr id="contactRow{{ $contact->id }}">
        <td>
          @if($contact->cv)
    @php
        $cvPath = 'public/uploads/cv/' . $contact->cv;
        $extension = strtolower(pathinfo($contact->cv, PATHINFO_EXTENSION));
    @endphp

    @if($extension === 'pdf')
        <!-- PDF CV -->
        <a href="{{ asset($cvPath) }}" target="_blank" title="View PDF CV">
            <img src="{{ asset('images/pdf-icon.png') }}" alt="PDF" width="80" height="80">
        </a>
        <br>
        <a href="{{ asset($cvPath) }}" download>Download PDF</a>

    @elseif(in_array($extension, ['doc', 'docx']))
        <!-- Word CV -->
        <a href="{{ asset($cvPath) }}" download title="Download Word CV">
            <img src="{{ asset('images/word-icon.png') }}" alt="Word" width="80" height="80">
        </a>
        <br>
        <a href="{{ asset($cvPath) }}" download>Download Word</a>

    @else
        <!-- Other files -->
        <a href="{{ asset($cvPath) }}" download title="Download CV">
            <img src="{{ asset('images/file-icon.png') }}" alt="CV" width="80" height="80">
        </a>
        <br>
        <a href="{{ asset($cvPath) }}" download>Download CV</a>
    @endif
@endif

        </td>
        <td>{{ $contact->job_title }}</td>
        <td>{{ $contact->name }}</td>
        <td>{{ $contact->email }}</td>
        <td>{{ $contact->phone }}</td>
        <td>{{ $contact->message }}</td>
        <td>
          <span class="badge {{ $contact->status == 'pending' ? 'bg-warning' : 'bg-success' }}">
            {{ ucfirst($contact->status) }}
          </span>
        </td>
        <td class="text-center">
          @if($contact->status == 'pending')
          <button class="btn btn-success btn-sm mark-as-read" data-id="{{ $contact->id }}">
            Mark as Read
          </button>
          @else
          <button class="btn btn-secondary btn-sm" disabled>Completed</button>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</div>

        @include('admin.footer')
      </div>
    </div>

    



    @include('admin.js')
    @include('admin.ajax')

   <script>
$(document).ready(function() {

    $('#contactSearch').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $("#contactTableBody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    $('.mark-as-read').click(function() {
        var id = $(this).data('id');

        Swal.fire({
            title: 'Mark as Read?',
            text: "This will change status to Complete.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, mark it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Processing...',
                    text: 'Please wait...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: "{{ route('jobapplicants.markAsRead') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id
                    },
                    success: function(response) {
                        Swal.close(); 

                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Marked as Read!',
                                text: 'The contact has been marked complete.',
                                timer: 1500,
                                showConfirmButton: false
                            });

                            $('#contactRow' + id).find('td:nth-child(5)')
                                .html('<span class="badge bg-success">Complete</span>');
                            $('#contactRow' + id).find('td:nth-child(6)')
                                .html('<button class="btn btn-secondary btn-sm" disabled>Completed</button>');
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
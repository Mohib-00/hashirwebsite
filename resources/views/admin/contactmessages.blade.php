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
    <h2 class="text-center mb-4" style="margin-top:5%">Contact Messages</h2>

    <div class="mb-3 text-end">
        <input type="text" id="contactSearch" class="form-control w-50 d-inline-block" 
               placeholder="Search by name, email, phone or message..."
               style="border-radius: 25px; border: 2px solid #093945;">
    </div>

    <table class="table table-bordered table-hover shadow-lg">
        <thead class="table-dark text-center">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody id="contactTableBody">
            @foreach($contacts as $contact)
            <tr id="contactRow{{ $contact->id }}">
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
                    url: "{{ route('contacts.markAsRead') }}",
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
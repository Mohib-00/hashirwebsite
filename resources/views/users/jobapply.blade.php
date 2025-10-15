<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HubLine-Solutions Contact Us</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
  <link rel="icon" href="{{ asset('logo2.png') }}">
  @include('users.css')
  <style>
  .form-group {
  margin-bottom: 15px;
}
.error {
  color: red;
  font-size: 13px;
  margin-top: 4px;
  display: block;
}
  </style>
</style>
</head>
<body>

  @include('users.section1')
 


<section class="contact-section">
  <div class="container">
    <div class="contact-wrapper">
      
      <div class="contact-info" data-aos="fade-right">
        <h2>Apply Now</span></h2>
        <p>
          Get in touch with us for collaborations, service inquiries, or support. Our dedicated team is ready to assist you with any questions.
        </p>

        <div class="info-box">
          <div class="icon"><i class="fas fa-phone-alt"></i></div>
          <div>
            <h3>Phone</h3>
            <p><a href="tel:+442031372799">{{$settingssssss->number}}</a></p>
          </div>
        </div>

        <div class="info-box">
          <div class="icon"><i class="fas fa-envelope"></i></div>
          <div>
            <h3>Email</h3>
            <p><a href="mailto:info@cabcallexperts.com">{{$settingssssss->email}}</a></p>
          </div>
        </div>

        <div class="info-box">
          <div class="icon"><i class="fas fa-location"></i></div>
          <div>
            <h3>Location</h3>
            <p>{{$settingssssss->location}}</p>
          </div>
        </div>
      </div>

      <div class="contact-form" data-aos="fade-left">
        <h3>Apply Here</h3>
        <p>Fill out the form below, and our team will respond promptly.</p>

       <form id="jobapplyform" class="form">
  @csrf

  <div class="form-group">
    <input type="file" name="cv" accept=".pdf, image/*" placeholder="Drop Your CV" >
    <small class="error text-danger" id="error-cv"></small>
  </div>

   <div class="form-group">
    <input type="text" name="job_title" placeholder="Job Title">
    <small class="error text-danger" id="error-job_title"></small>
  </div>

  <div class="form-group">
    <input type="text" name="name" placeholder="Your Name" >
    <small class="error text-danger" id="error-name"></small>
  </div>

  <div class="form-group">
    <input type="email" name="email" placeholder="Your Email" >
    <small class="error text-danger" id="error-email"></small>
  </div>

  <div class="form-group">
    <input type="tel" name="phone" placeholder="Your Phone" >
    <small class="error text-danger" id="error-phone"></small>
  </div>

  <div class="form-group">
    <textarea name="message" rows="5" placeholder="Your Message"></textarea>
    <small class="error text-danger" id="error-message"></small>
  </div>

  <button type="submit" class="send-btn">Send Message</button>
</form>

      </div>
    </div>
  </div>
</section>

 


  @include('users.section12')
  @include('users.js')
  @include('ajax')

<script>
$(document).ready(function () {
    $('#jobapplyform').on('submit', function (e) {
        e.preventDefault();

        $('.error').text(''); // clear old errors

        var formData = new FormData(this);

        Swal.fire({
            title: 'Submitting...',
            text: 'Please wait while we process your application.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        $.ajax({
            url: "{{ route('job.apply') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                Swal.close();
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Application Submitted!',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 2500
                    });
                    $('#jobapplyform')[0].reset();
                }
            },
            error: function (xhr) {
                Swal.close();
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        $('#error-' + key).text(value[0]);
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong. Please try again later.',
                    });
                }
            }
        });
    });
});
</script>



  
</body>
</html>

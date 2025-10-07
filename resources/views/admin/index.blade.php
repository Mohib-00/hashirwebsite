<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   
  </head>
  <body>
    <div class="wrapper">
    @include('admin.sidebar')

      <div class="main-panel">
       @include('admin.header')

        <div class="container">
          @include('admin.dashboard')
        </div>

        @include('admin.footer')
      </div>
    </div>

    



    @include('admin.js')
    @include('admin.ajax')

   
  </body>
</html>
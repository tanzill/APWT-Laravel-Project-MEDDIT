<!DOCTYPE html>
<html>
 <head>
  <title>Meddit</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  
    <link href="{{asset('/authentication/css/custom.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container ">
   <h3 align="center">All Users</h3>
   <div class="custombtn"><a href="{{ route('admin.add')}}" class="btn btn-success">Add Admin</a></div>
  
   <div class="custombtn"><a href="{{ route('logout')}}" class="btn btn-danger">Logout</a></div>
   <div class="panel panel-default">
    <div class="panel-body">
        
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
     </div>
     <div class="table-responsive">
      <h3 align="center" color="Green">Total Users : <span id="total_records"></span></h3>
      <div class="text-align-center">      <table class="table table-striped table-bordered" align="center" >
       <thead>
        <tr>
         <th>User ID</th>
         <th>Name</th>
         <th>Phone Number</th>
         <th>Address</th>
         <th>Blood Group</th>
         <th>User Type</th>
         <th>Email</th>
         <th>Action</th>

        </tr>
       </thead>
       <tbody>

       </tbody>
      </table>
     </div>
     </div>

    </div>    
   </div>
  </div>
 </body>
 <footer class="site-footer" id="foot">
        <div class="copyright py-4 text-center">
            <div class="container"><h6>Copyright 
                <br>©Meddit Fall::2020-2021</br></h6></div>
        </div>
        </footer>
</html>


<script>
$(document).ready(function(){
 fetch_data();
 function fetch_data(query = '')
 {
  $.ajax({
   url:"{{ route('live_search.action') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }
 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_data(query);
 });
});
</script>
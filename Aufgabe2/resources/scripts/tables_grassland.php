<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Tables</title>

  <!-- datatable lib -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

  <!-- Datatable CSS -->
  <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

  <!-- jQuery Library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Datatable JS -->
  <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  <!-- Custom fonts for this template -->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  
  <!-- Styles for this page -->  
   <link href="../styles/tables_styles.css" rel="stylesheet">    

 
    
    
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Database Query </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Queries</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="tables_plots.php">Plots</a>
            <a class="collapse-item" href="tables_species.php">Species</a>
            <a class="collapse-item" href="tables_forest.php">Forest</a>
            <a class="collapse-item" href="tables_grassland.php">Grassland</a>
          </div>
        </div>
      </li>

      

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Database modification</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
             <a class="collapse-item" href="login.php"> Login</a>
          </div>
        </div>
      </li>

      
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <div class="topbar-divider d-none d-sm-block"></div>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Grassland</h6>
            </div>
            
              
            <div class="d-flex flex-row justify-content-end ">
  
                <button class="open-button" id="setQuery" onclick="openForm()">Set Query</button>
              <button type="button" id="runQuery" class="btn btn-warning text-white" data-toggle="modal" onclick="runQuery()">
                Run Query
              </button>
                
            </div>
              
                     
             

               <div class="form-popup" id="myForm">
                 <form id="pokus" action="" class="form-container">
                <h1>Set query</h1>

                <label  for="email"><b>plot_Id</b></label>
                 <input id="1_under" type="text" placeholder="<" name="1_under" required>
                 <input id="1_above" type="text" placeholder=">" name="1_above" required>
                   
                <label  for="email"><b>years</b></label>
                 <input id="2_under" type="text" placeholder="<" name="2_under" required>
                 <input id="2_above" type="text" placeholder=">" name="2_above" required>
                   
                <label  for="email"><b>ep_plot_Id</b></label>
                 <input id="3_under" type="text" placeholder="<" name="3_under" required>
                 <input id="3_above" type="text" placeholder=">" name="3_above" required>
                   
                <label  for="email"><b>usef_plot_Id</b></label>
                 <input id="4_under" type="text" placeholder="<" name="4_under" required>
                 <input id="4_above" type="text" placeholder=">" name="4_above" required>
                   
                <label  for="email"><b>species</b></label>
                 <input id="5_under" type="text" placeholder="<" name="5_under" required>
                 <input id="5_above" type="text" placeholder=">" name="5_above" required>
                   
                <label  for="email"><b>cover</b></label>
                 <input id="6_under" type="text" placeholder="<" name="6_under" required>
                 <input id="6_above" type="text" placeholder=">" name="6_above" required>                   
                   


                 <button type="button" class="btn cancel" onclick="setQuery()">Set Query</button>
                 <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                    </form>
                </div>

                <script>
                
                 var one_u = "A";
                 var one_a = "Z";
                 var two_u = 0;
                 var two_a = 5000;
                 var three_u = "A";
                 var three_a = "Z";
                 var four_u = "A";
                 var four_a = "Z";
                 var five_u = "A";
                 var five_a = "Z";
                 var six_u = 0;
                 var six_a = 5000;   
                            
                 function openForm() {
                    document.getElementById("myForm").style.display = "block";
                   }

                 function closeForm() {
                 document.getElementById("myForm").style.display = "none";
                  }
                
                 function setQuery() {
                 one_u = "A";
                 one_a = "Z";
                 two_u = 0;
                 two_a = 5000;
                 three_u = "A";
                 three_a = "Z";
                 four_u = "A";
                 four_a = "Z";
                 five_u = "A";
                 five_a = "Z";
                 six_u = 0;
                 six_a = 5000;  
        
                        
                 if(Boolean(document.getElementById("1_under").value)){
                     one_u = document.getElementById("1_under").value;
                 }
                  
                 if(Boolean(document.getElementById("1_above").value)){    
                 one_a = document.getElementById("1_above").value;}
                     
                 if(Boolean(document.getElementById("2_under").value)){     
                 two_u = document.getElementById("2_under").value;}
                    
                    if(Boolean(document.getElementById("2_above").value)){
                 two_a = document.getElementById("2_above").value;}
                     
                     if(Boolean(document.getElementById("3_under").value)){
                 three_u = document.getElementById("3_under").value;}
                         
                         if(Boolean(document.getElementById("3_above").value)){
                 three_a = document.getElementById("3_above").value;}
                        
                        if(Boolean(document.getElementById("4_under").value)){
                 four_u = document.getElementById("4_under").value;}
                     
                     if(Boolean(document.getElementById("4_above").value)){
                 four_a = document.getElementById("4_above").value;}
                          
                         if(Boolean(document.getElementById("5_under").value)){
                 five_u = document.getElementById("5_under").value;}
                        
                        if(Boolean(document.getElementById("5_above").value)){
                 five_a = document.getElementById("5_above").value;}
                     
                     if(Boolean(document.getElementById("6_under").value)){
                 six_u = document.getElementById("6_under").value;}
                           
                         if(Boolean(document.getElementById("6_above").value)){
                 six_a = document.getElementById("6_above").value;}     
         
 
                  }
 
            
                 </script>    
                
       
              
            <div id="tabellen" class="card-body">
              <div class="table-responsive">
                  
                <table class='display' id="dtable" width="100%" cellspacing="0">
                  <thead class="thead-light">
                    <tr>
                      <th class="th-sm">plot_Id</th>
                      <th class="th-sm">years</th>
                      <th class="th-sm">ep_plot_Id</th>
                      <th class="th-sm">usefulep_plot_Id</th>
                      <th class="th-sm">species</th>
                      <th class="th-sm">cover</th>
                    </tr>
                  </thead>
                </table>
                  
                 
              </div>
                
                
              <script>
                 
                  
                  
               
                function runQuery() {
                    
                            
                  $(document).ready(function() {
         
                  var dataTable = $('#dtable').DataTable({
                      "destroy": true,
                      "ajax": {
                        url: "backend_grassland.php",
                        type: "post",
                        data: {
                          "table": 'grassland',
                          "one_u": one_u,
                          "one_a": one_a,
                          "two_u": two_u,
                          "two_a": two_a,
                          "three_u": three_u,
                          "three_a": three_a,
                          "four_u": four_u,
                          "four_a": four_a,
                          "five_u": five_u,
                          "five_a": five_a,
                          "six_u": six_u,
                          "six_a": six_a                      
                       }
                    }
                  });
                });
                    
                };
              </script>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Visualisation Project 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../js/demo/datatables-demo.js"></script>

</body>

</html>
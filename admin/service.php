<?php include('partials/menu.php');?>

<div class="main-content">
        <div class="wrapper">
       <h2>Manage Services</h2>
       <br> <br> 
      <!--button to add admin-->
      <a href="<?php echo SITEURL;?>admin/add-service.php" class="btn-primary">Add services</a> <br> <br> 


       <table class="tbl-full">
         <tr>
         <th>S.N.</th>
         <th>Full Name</th>
         <th>Username</th>
         <th>Actions</th>
         </tr>

         <tr>
           <td>1</td>
           <td>EAJ Gayan</td>
           <td>Gayan</td>
           <td>
            <a href="#" class="btn-secondary"> Update Admin</a>
            <a href="#" class="btn-danger"> Delete Admin</a>

           </td>
         </tr>
         <tr>
           <td>2</td>
           <td>EAJ Gayan</td>
           <td>Gayan</td>
           <td>
           <a href="#" class="btn-secondary"> Update Admin</a>
           <a href="#" class="btn-danger"> Delete Admin</a>
           </td>
         </tr>
         <tr>
           <td>3</td>
           <td>EAJ Gayan</td>
           <td>Gayan</td>
           <td>
           <a href="#" class="btn-secondary"> Update Admin</a>
           <a href="#" class="btn-danger"> Delete Admin</a>
           </td>
         </tr>
         <tr>
           <td>4</td>
           <td>EAJ Gayan</td>
           <td>Gayan</td>
           <td>
           <a href="#" class="btn-secondary"> Update Admin</a>
           <a href="#" class="btn-danger"> Delete Admin</a>
           </td>
         </tr>
       </table>

        </div>
      </div>
<?php include('partials/footer.php');?>

<style>
  .tbl-full{
    width: 100%;
}

table tr th{
    border-bottom: 1px solid black;
    padding: 1%;
    text-align: left;
}
table tr td{
    padding: 1%;
}

.btn-primary{
    background-color: #1e98ff;
    padding: 1%;
    color: white;
    text-decoration: none;
    font-weight: bold;
}
.btn-primary:hover{
    background-color: #3742fa;

}
.btn-secondary{
    background-color: #7bed9f;
    padding: 1%;
    color: #2C3A47;
    text-decoration: none;
    font-weight: bold;
}
.btn-secondary:hover{
    background-color: #2ed573;
}
.btn-danger{
    background-color: #ff6b81;
    padding: 1%;
    color: white;
    text-decoration: none;
    font-weight: bold;
}
.btn-danger:hover{
    background-color: #ff4757;

}


</style>
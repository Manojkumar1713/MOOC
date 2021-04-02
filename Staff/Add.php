<!DOCTYPE html>
<html lang="en">
<head>
<title>Add Program</title>
  <meta charset="UTF-8">
  <link rel="icon" href="images/kare_icon.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
</head>
<body>
<?php include('./header.html'); ?>

<?php

include "ComplierDetails.php";
if(isset($_POST['submit'])) {
    session_start();
    $com=new ComplierDetails;
    $com->PostData();
}
?>
<div class="container-fluid"> 
<div class="jumbotron" style="background-color: #222d32; padding-top: 5px; padding-bottom: 15px;">
    <h1 style="background-color: white; color: #222d32;">ADD PROGRAM</h1>
</div>

<form action="" method="post">

          <div class="form-group">
            <label>Title</label>

              <input type="text" id ="title" class="form-control" name="title" placeholder="Enter question title" required>

          </div>
         <div class="form-group">
           <label>Question</label>

             <input type="text" id="question" class="form-control" name="question" placeholder="Enter question" required>

         </div>
                 <div class="form-group">
           <label>Input Format</label>
                        <textarea class="form-control" name="format" rows="5" cols="10" placeholder="Enter Input Format" required></textarea>
            <!-- <input type="textarea" rows="10" cols="10" class="form-control" name="sample" placeholder="Enter sample input" required>-->

         </div>
         <div class="form-group">
           <label>Sample Input</label>
                        <textarea class="form-control" name="sample" rows="5" cols="10" placeholder="Enter Sample Input" required></textarea>
            <!-- <input type="textarea" rows="10" cols="10" class="form-control" name="sample" placeholder="Enter sample input" required>-->

         </div>
         <div class="form-group">
           <label>Sample Output</label>
                        <textarea class="form-control" name="output" rows="5" cols="10" placeholder="Enter Sample output" required></textarea>
             <!--<input type="text" class="form-control" name="output" placeholder="Enter sample output" required>-->

         </div>
         <div class="form-group">
           <label>Hidden Testcase 1 Input</label>
                        <textarea class="form-control" name="testcase1" rows="5" cols="10" placeholder="Enter Hidden Testcase 1 Input" required></textarea>
          <!--   <input type="text" class="form-control" name="testcase1" placeholder="Enter Testcase1 Input" required>-->

         </div>
         <div class="form-group">
           <label>Hidden Testcase 1 Output</label>
                        <textarea class="form-control" name="t1out" rows="5" cols="10" placeholder="Enter Hidden Testcase 1 Output" required></textarea>
             <!--<input type="text" class="form-control" name="t1out" placeholder="Enter Testcase1 output" required>-->
           </div>

         <div class="form-group">
           <label>Hidden Testcase 2 Input</label>
                     <textarea class="form-control" name="testcase2" rows="5" cols="10" placeholder="Enter Hidden Testcase 2 Input" required></textarea>
        <!-- <input type="text" class="form-control" name="testcase2" placeholder="Enter Testcase2 Input" required>-->

     </div>
     <div class="form-group">
       <label>Hidden Testcase 2 Output</label>
                <textarea class="form-control" name="t2out" rows="5" cols="10" placeholder="Enter Hidden Testcase 2 Output" required></textarea>
         <!--<input type="text" class="form-control" name="t2out" placeholder="Enter testcase2 output" required>-->

     </div>
     <div class="form-group">
       <label>Assignment Number</label>

         <input type="text" class="form-control" name="assignment" placeholder="Enter Assignment Number Like A1" required>

     </div>
     <div class="form-group">
       <label>Programming Language</label>

         <input type="text" class="form-control" name="language" placeholder="Enter Programming Language" required>

     </div>
     <div class="form-group">    
        <label for="StartDate"><b>Start Date</b></label>
        <input type="datetime-local"  name="StartDate" class="form-control">
        </div>

        <div class="form-group">    
        <label for="StartDate"><b>End Date</b></label>
        <input type="datetime-local"  name="EndDate" class="form-control">
    </div>
     <div>

         <button type="submit" class="btn btn-success " name="submit">Submit</button>

</div>
</form>
          </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
<!--    <script src="./browser_components/jquery/dist/jquery.min.js"></script>

    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="./browser_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

    <script src="./browser_components/js/jquery.slimscroll.js"></script>

    <script src="./browser_components/js/waves.js"></script>

    <script src="./browser_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="./browser_components/counterup/jquery.counterup.min.js"></script>

    <script src="./browser_components/chartist-js/dist/chartist.min.js"></script>
    <script src="./browser_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>

    <script src="./browser_components/jquery-sparkline/jquery.sparkline.min.js"></script>

    <script src="./browser_components/js/custom.min.js"></script>
    <script src="./browser_components/js/dashboard1.js"></script>
    <script src="./browser_components/toast-master/js/jquery.toast.js"></script> -->
<?php include('./footer.html'); ?>

</body>
</html>
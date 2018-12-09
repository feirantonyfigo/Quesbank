<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Template &middot; Bootstrap</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- Le styles -->
      <link href="../assets/css/bootstrap.css" rel="stylesheet">
      <style type="text/css">
         body {
         padding-top: 20px;
         padding-bottom: 40px;
         }
         /* Custom container */
         .container-narrow {
         margin: 0 auto;
         max-width: 700px;
         }
         .container-narrow > hr {
         margin: 30px 0;
         }
         /* Main marketing message and sign up button */
         .jumbotron {
         margin: 60px 0;
         text-align: center;
         }
         .jumbotron h1 {
         font-size: 72px;
         line-height: 1;
         }
         .jumbotron .btn {
         font-size: 21px;
         padding: 14px 24px;
         }
         /* Supporting marketing content */
         .marketing {
         margin: 60px 0;
         }
         .marketing p + h4 {
         margin-top: 28px;
         }
      </style>
      <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
      <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
      <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
      <![endif]-->
      <!-- Fav and touch icons -->
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
      <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
      <link rel="shortcut icon" href="../assets/ico/favicon.png">
   </head>
   <body>
      <?php
         $db = mysql_connect('localhost','root','password')
          or die('Error connecting to MySQL server.');
          @mysql_select_db("test", $con); 
          $sql = "SELECT * FROM test.fill_blank"; 
          $result = mysql_query($sql);
          
         ?>
      <div class="container-narrow">
         <div class="masthead">
            <ul class="nav nav-pills pull-right">
               <li><a href="index.html">Home</a></li>
               <li class="active"><a href="manage.php">Manage</a></li>
               <li><a href="contact.html">Contact</a></li>
            </ul>
            <h3 class="muted">QuesBank</h3>
         </div>
         <hr>
         <input class="form-control" type="text" placeholder="Search by Questions" id="myInput" onkeyup="searchfilter()">
          <input class="form-control" type="text" placeholder="Search by Textbook" id="myInputtwo" onkeyup="searchfiltertwo()">
         <hr>
         <table class="table table-hover" id="myTable">
            <thead>
               <tr>
                  <th style="cursor:pointer;" onclick="sortTable(0)">#</th>
                  <th style="cursor:pointer;" onclick="sortTable(1)">Question</th>
                  <th style="cursor:pointer;" onclick="sortTable(2)">Answer</th>
                  <th style="cursor:pointer;" onclick="sortTable(3)">Date</th>
                  <th style="cursor:pointer;" onclick="sortTable(4)">Difficulty</th>
                  <th style="cursor:pointer;" onclick="sortTable(5)">Textbook</th>
                  <th>Manipulation</th>
               </tr>
            </thead>
            <tbody>
               <? 
                  while( $row = mysql_fetch_array($result))
                  {  
                  $id = $row['idnew_table']; 
                  $question = $row['Questions']; 
                  $answers = $row['Answers']; 
                  $date= $row['Date']; 
                  $diff = $row['Difficulty']; 
                  $book = $row['Textbook']; 
                                  echo "<tr>"; 
                  echo "<td>$id</td>"; 
                  echo "<td>$question</td>"; 
                  echo "<td>$answers</td>";
                  echo "<td>$date</td>"; 
                  echo "<td>$diff</td>"; 
                  echo "<td>$book</td>"; 
                  echo ' <td><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                    Edit
                  </button>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm">Delete</button></td>';
                  }
                  ?>
               </tr>
               <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           <h4 class="modal-title" id="myModalLabel">Delete Question</h4>
                        </div>
                        <div class="modal-body">
                           Are you sure to delete?
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           <button type="button" class="btn btn-danger">Delete</button>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Modal -->
               <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           <h4 class="modal-title" id="myModalLabel">Edit Question</h4>
                        </div>
                        <div class="modal-body">
                           Question
                           <input type="text" placeholder="Questions" value="4">
                           <br>
                           Answer
                           <input type="text" placeholder="Answers">
                           <br>
                           Difficulty
                           <select>
      <option>Hard</option>
      <option>Medium</option>
      <option>Easy</option>
      </select>
      <br>
                           textbook
                           <input type="text" placeholder="Textbook">
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </tbody>
         </table>
         <hr>
         <div class="footer">
            <p>&copy; Air English 2015</p>
         </div>
      </div>
      <!-- /container -->
      <script>
         $('#myModal').on('shown.bs.modal', function () {
           $('#myInput').focus()
         })
         
        
function searchfilter() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value;
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
function searchfiltertwo() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInputtwo");
  filter = input.value;
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];
    if (td) {
      if (td.innerHTML.indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}

function sortTable(k) {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  while (switching) {
    switching = false;
    rows = table.getElementsByTagName("tr");
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("td")[k];
      y = rows[i + 1].getElementsByTagName("td")[k];
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        shouldSwitch= true;
        break;
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
      </script>
      <!-- Le javascript
         ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="../assets/js/jquery.js"></script>
      <script src="../assets/js/bootstrap-transition.js"></script>
      <script src="../assets/js/bootstrap-alert.js"></script>
      <script src="../assets/js/bootstrap-modal.js"></script>
      <script src="../assets/js/bootstrap-dropdown.js"></script>
      <script src="../assets/js/bootstrap-scrollspy.js"></script>
      <script src="../assets/js/bootstrap-tab.js"></script>
      <script src="../assets/js/bootstrap-tooltip.js"></script>
      <script src="../assets/js/bootstrap-popover.js"></script>
      <script src="../assets/js/bootstrap-button.js"></script>
      <script src="../assets/js/bootstrap-collapse.js"></script>
      <script src="../assets/js/bootstrap-carousel.js"></script>
      <script src="../assets/js/bootstrap-typeahead.js"></script>
   </body>
</html>
<?php 
require_once('dbconnect_teste.php');

$data=date("Y-m-d");

echo $data; 

$sql = "SELECT reserva.id,
          reserva.data_inicio,
          reserva.data_fim,
          reserva.id_kit,
          estado.descricao AS descEst
          FROM reserva 
          INNER JOIN estado ON reserva.id_estado = estado.id 
          WHERE (reserva.id_kit = '6' AND estado.descricao = 'Em progresso' AND reserva.data_fim>='$data')
          OR (reserva.id_kit = '6' AND estado.descricao = 'Aceite' AND reserva.data_fim>='$data')
          OR (reserva.id_kit = '6' AND estado.descricao = 'Pendente' AND reserva.data_fim>='$data')";
$result = mysqli_query($mysqli,$sql);
$count = mysqli_num_rows($result);

$i=0;
$n=0;


if($count>=1)
{
  while ($row = $result->fetch_assoc()) {
    
    echo "<br> Data inicial do ciclo ".$i.": ".$row['data_inicio'];
    echo "<br> Data final do ciclo ".$i.": ".$row['data_fim']; 
    $inicio[]=date('Y-m-d', strtotime($row['data_inicio']));
    $final=date('Y-m-d', strtotime($row['data_fim']));
    echo "<br> Data do ciclo ".$i.", posição array ".$n.": ".$inicio[$n];
    

    while($inicio[$n]<$final)
    {
      
      $inicio[] = date('Y-m-d', strtotime($inicio[$n]. ' + 1 days'));
      $n++;
      echo "<br> Data do ciclo ".$i.", posição array ".$n.": ".$inicio[$n];
    }
    $n++;
    echo "<br>";
    $i++;  
  }

}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
  </head>
  <body>



    <p>Date inicio: <input class="datepicker" type="text" id="from_date" readonly="readonly"></p>

    <p>Date fim: <input class="datepicker" type="text" id="to_date" readonly="readonly"></p>



    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <link rel="stylesheet" href="../vendors/jquery-ui-1.12.1.custom/jquery-ui.css">
    
    <script>
    $(document).ready(function(){

      var arrayFromPHP = <?php echo json_encode($inicio); ?>;

      var limite=20;



      $( function() {
        $( "#from_date" ).datepicker();
        $( "#to_date" ).datepicker();
      } );

      $("#from_date").datepicker({
          beforeShowDay: function(date){

            if (!$.datepicker.noWeekends(date)[0])
            return [false, '', '']; 

            var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
            return [ arrayFromPHP.indexOf(string) == -1 ]

          },
          minDate: 2, // to disable past dates (skip if not needed)
          onSelect: function(selectedDate) {
              var date = new Date($("#from_date").val());
              date.setDate(date.getDate() + limite);
              // Set the minDate of 'to' as the selectedDate of 'from'
              $("#to_date").datepicker("option", "minDate", selectedDate);

              //alert("Limite: "+limite+"! Data selecionada: "+selectedDate+"! Data limite: "+date);

              $("#to_date").datepicker("option", "maxDate", date);
              $("#to_date").val('');

          },
          dateFormat: "yy-mm-dd"
        });      

        $("#to_date").datepicker({
          beforeShowDay: function(date){

            if (!$.datepicker.noWeekends(date)[0])
            return [false, '', ''];     

            var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
            return [ arrayFromPHP.indexOf(string) == -1 ] 
          },
          minDate: 2,
          dateFormat: "yy-mm-dd",
          onSelect: function(chosenDate) {

            if ($("#from_date").val()!="" && $("#to_datete").val()!="") {
                var date1 = $("#from_date").val();
                var date2 = $("#to_date").val();


               /* $.each(arrayFromPHP, function (testDate, config) {
                    var date = $.datepicker.parseDate("mm-dd-yy", testDate);
                    if (arrayFromPHP.selectable === false && date1 <= date && date <= date2) {
                        alert("The range contains not selectable dates.");
                        $("#to_date").val("");
                        return false;
                    }
                }); */

                for (var k = 0; k < arrayFromPHP.length; k++) {
                  var date = arrayFromPHP[k];
                    if (date1 <= date && date <= date2) {
                        alert("The range contains not selectable dates.");
                        $("#to_date").val('');
                        return false;
                    }
                }


            }


              //alert(arrayFromPHP);

              

          }

        });

    });
    </script>  
  </body>
</html>


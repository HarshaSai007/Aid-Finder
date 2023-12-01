<?php
include 'connect.php';

$id = $_GET['popupid'];
$sql = "select * from `agent_info` where id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$agent_id = $row['agent_id'];
$agent_name = $row['agent_name'];
$gender = $row['gender'];
$blood_group = $row['blood_group'];
$email = $row['email'];
$mobile = $row['mobile'];

// if (isset($row) && is_array($row)) {
//     $agent_id = $row['agent_id'];
//     $agent_name = $row['agent_name'];
//     $gender = $row['gender'];
//     $blood_group = $row['blood_group'];
//     $email = $row['email'];
//     $mobile = $row['mobile'];

//     $agentDetailsHtml = "<p>Agent ID: $agent_id</p><p>Agent Name: $agent_name</p>";
//     echo '<button class="view-button" onclick="openModal(\''.htmlspecialchars($agentDetailsHtml).'\')">View</button>';
// } else {
    
//     echo 'No agent data available.';

// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <script>

        var modal = document.getElementById("agentDetailsModal");
        var closeButton = document.querySelector(".close");

        function openModal(agentDetails) {
            var modalContent = document.getElementById("agentDetails");
            modalContent.innerHTML = agentDetails;
            modal.style.display = "block";
        }

        function closeModal() {
            modal.style.display = "none";
        }

        closeButton.addEventListener("click", closeModal);

        window.addEventListener("click", function (event) {
            if (event.target === modal) {
                closeModal();
            }
        });

        document.getElementById("viewButton").addEventListener("click", function () {

            var agentDetails = "<p>Agent Name: John Doe</p><p>Email: john@example.com</p>";
            openModal(agentDetails);
        });

    </script>
</head>

<body>

    <div id="agentDetailsModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Agent Details</h2>
            <div id="agentDetails">

            </div>
        </div>
    </div>

</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>QR Code Generator</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <style>
        body {
            margin: 0;
            background-color: darkcyan;
        }
        #bac{
            text-decoration:none;
            color:black;
            border:2px solid black;
            border-radius:6px;
            padding:6px;
        }
        #bac:hover{
            background-color:rgb(21, 207, 207);
            color:white;
        }
    </style>
</head>
<body>
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12"> 
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <!-- form user info -->
                        <div class="card card-outline-secondary">
                            <div class="card-header">
                                <h3 class="mb-0">User Information</h3>
                            </div>
                            <?php
                            $full_name = "Babaji Technical";
                            $email = "email@gmail.com";
                            $insurance_company = "ABC Insurance";
                            $license_card_no = "123456789";
                            $previous_citations = "None";
                            $insurance_status = "Active";

                            if (isset($_POST["btnsubmit"])) {
                                $full_name = $_POST["full_name"];
                                $email = $_POST["email"];
                                $insurance_company = $_POST["insurance_company"];
                                $license_card_no = $_POST["license_card_no"];
                                $previous_citations = $_POST["previous_citations"];
                                $insurance_status = $_POST["insurance_status"];
                            }
                            ?>
                            <div class="card-body">
                                <form autocomplete="off" class="form" role="form" action="index.php" method="post">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Full Name</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" value="<?php echo $full_name;?>" name="full_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="email" value="<?php echo $email;?>" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Insurance Company</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" value="<?php echo $insurance_company;?>" name="insurance_company">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">License Card Number</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" value="<?php echo $license_card_no;?>" name="license_card_no">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Previous Citations</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" value="<?php echo $previous_citations;?>" name="previous_citations">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Insurance Status</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" value="<?php echo $insurance_status;?>" name="insurance_status">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                        <div class="col-lg-9">
                                            <input class="btn btn-primary" type="submit" name="btnsubmit" value="Generate QR Code">
                                        </div>
                                    </div>
                                </form>
                                <?php
                                include "phpqrcode/qrlib.php";
                                $PNG_TEMP_DIR = 'temp/';
                                if (!file_exists($PNG_TEMP_DIR))
                                    mkdir($PNG_TEMP_DIR);

                                $filename = $PNG_TEMP_DIR . 'test.png';

                                if (isset($_POST["btnsubmit"])) {
                                    $codeString = "Full Name: " . $_POST["full_name"] . "\n";
                                    $codeString .= "Email: " . $_POST["email"] . "\n";
                                    $codeString .= "Insurance Company: " . $_POST["insurance_company"] . "\n";
                                    $codeString .= "License Card Number: " . $_POST["license_card_no"] . "\n";
                                    $codeString .= "Previous Citations: " . $_POST["previous_citations"] . "\n";
                                    $codeString .= "Insurance Status: " . $_POST["insurance_status"];

                                    $filename = $PNG_TEMP_DIR . 'test' . md5($codeString) . '.png';

                                    QRcode::png($codeString, $filename);

                                    echo '<img src="' . $PNG_TEMP_DIR . basename($filename) . '" /><hr/>';
                                }
                                ?>
                            </div>
                        </div><!-- /form user info -->
                    </div>
                </div>
            </div><!--/col-->
        </div><!--/row-->
    </div><!--/container-->
    <a href="logout2.php" id="bac">Back</a>
</body>
</html>

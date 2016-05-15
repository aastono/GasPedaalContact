<?php
session_start();
include 'php/connectDB.php';

if (!isset($_SESSION['userSession'])) {
    header("Location: index.php");
}
include 'php/CRUD.php';

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Welcome - <?php echo $userRow['email']; ?></title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#datepicker").datepicker({dateFormat: 'yy-mm-dd'});
        });
    </script>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img style="margin-top: -11px;" src="img/logo.jpg" width="40" height="40"></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $userRow['username']; ?>
                    </a></li>
                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
            </ul>
        </div>
    </div>
</nav>


<div id="form">
    <div class="jumbotron center-block" style="width: 70%; border-radius: 15px;">
        <h3 style="text-align: center;"><?php if (isset($_GET['edit'])) {
                echo 'Edit a Contact';
            } else {
                echo 'Add New Contact';
            } ?></h3>
        <form method="post">
            <div class="center-block" style="min-width: 170px; width: 30%;">
                <input style="margin-bottom: 5px;" class="center-block form-control" maxlength="40" required onfocus="this.placeholder = ''" type="text"
                       name="phoneName"
                       placeholder="Caller Name"
                       value="<?php if (isset($_GET['edit'])) echo $getROW['phoneName']; ?>"/>

                <input style="margin-bottom: 5px;" class="center-block form-control" maxlength="40" required onfocus="this.placeholder = ''" type="text"
                       name="phoneNumber"
                       placeholder="Phone Number"
                       value="<?php if (isset($_GET['edit'])) echo $getROW['phoneNumber']; ?>"/>

                <input style="margin-bottom: 5px;" class="center-block form-control" maxlength="40" onfocus="this.placeholder = ''"
                       type="text"
                       name="notes"
                       placeholder="Notes" value="<?php if (isset($_GET['edit'])) echo $getROW['notes']; ?>">
                </input>

                <input style="margin-bottom: 5px;" class="center-block form-control" required onfocus="this.placeholder = ''" type="text" name="timeOfCall"
                       id="datepicker"
                       placeholder="Date of Call"
                       value="<?php if (isset($_GET['edit'])) echo $getROW['timeOfCall']; ?>">


                <?php
                if (isset($_GET['edit'])) {
                    ?>
                    <button class="btn btn-info center-block" type="submit" name="update"
                            style="max-width: 170px !important; margin-top: 20px;">Update
                    </button>
                    <?php
                } else {
                    ?>
                    <button class="btn btn-success center-block" type="submit" name="save"
                            style="max-width: 170px !important; margin-top: 20px;">Save
                    </button>
                    <?php
                }
                ?>


            </div>
        </form>
    </div>

    <div class="input-group" style="margin-bottom: 20px;width: 40%;margin-left: 30%;z-index:1;">
        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
        <input aria-describedby="basic-addon1" type="text" id="filter" class="form-control" placeholder="Search Contacts"/>
    </div>


    <div id="postswrapper">
        <div class="table-responsive" style="align-content: center; overflow-x: auto;">
            <table class="table table-striped" width="100%" cellspacing="0" style="word-wrap: break-word;">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Date</th>
                    <th>Notes</th>
                    <th></th>
                    <th></th>
                    <th>PDF</th>
                    <th>Send by Email</th>
                </tr>
                </thead>
                <?php
                $res = $conn->query("SELECT * FROM contacts WHERE userID= '" . mysqli_real_escape_string($conn, $_SESSION['userSession']) . "' ORDER BY timeOfCall DESC");

                while ($row = $res->fetch_array()) {
                    ?>


                    <tbody class="searchable">
                    <tr>
                        <td class="col-xs-2 col-md-2"><?php echo $row['phoneName']; ?></td>
                        <td class="col-xs-1 col-md-1"><?php echo $row['phoneNumber']; ?></td>
                        <td class="col-xs-1 col-md-1"><?php echo $row['timeOfCall']; ?></td>
                        <td class="col-xs-3 col-md-3"><?php echo $row['notes']; ?></td>
                        <td class="col-xs-1 col-md-1"><a role="button" class="btn btn-block btn-warning"
                                                         href="?edit=<?php echo $row['id']; ?>"><span
                                    class="glyphicon glyphicon-pencil" onclick="showadd()"></span></a></td>
                        <td class="col-xs-1 col-md-1"><a role="button" class="btn btn-block btn-danger"
                                                         href="?del=<?php echo $row['id']; ?>"
                                                         onclick="return confirm('Are you sure?')"><span
                                    class="glyphicon glyphicon-trash"></span></a></td>
                        <td class="col-xs-1 col-md-1">
                            <form action="php/form.php" method="post" target="_blank">
                                <input type="text" value="<?php echo $row['phoneName']; ?>" name="nameForPDF"
                                       style="display: none;">
                                <input type="text" value="<?php echo $row['phoneNumber']; ?>" name="numberForPDF"
                                       style="display: none;">
                                <input type="text" value="<?php echo $row['timeOfCall']; ?>" name="timeForPDF"
                                       style="display: none;">
                                <input type="text" value="<?php echo $row['notes']; ?>" name="notesForPDF"
                                       style="display: none;">
                                <button type="submit" class="btn btn-block btn-default"><span
                                        class="glyphicon glyphicon-save-file"></span></button>
                            </form>
                        </td>
                        <td class="col-xs-3 col-md-3">
                            <form action="php/attachment.php" method="post">
                                <input type="text" value="<?php echo $row['phoneName']; ?>" name="nameForPDF"
                                       style="display: none;">
                                <input type="text" value="<?php echo $row['phoneNumber']; ?>" name="numberForPDF"
                                       style="display: none;">
                                <input type="text" value="<?php echo $row['timeOfCall']; ?>" name="timeForPDF"
                                       style="display: none;">
                                <input type="text" value="<?php echo $row['notes']; ?>" name="notesForPDF"
                                       style="display: none;">
                                <div class="input-group">
                                    <input type="text" class="clearinput" name="recipient" placeholder="Email Address"
                                           required/>
                            <span class="input-group-btn">
                                <button type="submit" class="attachment btn btn-block btn-success"><span
                                        class="glyphicon glyphicon-send"></span></button>
                            </span>
                                </div>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                    <?php
                }

                ?>
            </table>
        </div>
    </div>
</div>
</body>

<script type="text/javascript">


    $(document).ready(function() {
        (function ($) {

            $('#filter').keyup(function () {

                var rex = new RegExp($(this).val(), 'i');
                $('.searchable tr').hide();
                $('.searchable tr').filter(function () {
                    return rex.test($(this).text());
                }).show();

            })

        }(jQuery));
    });



    $(".attachment").click(function () {
        $.ajax({
            type: "POST",
            url: 'attachment.php',
            data: $(this).parents().serialize(),
            success: function (data) {
                window.alert("Sent!");
                $(".clearinput").val("");
            },
            error: function (jqXHR, text, error) {
                window.alert("Error");
            }
        });
        return false;
    });


    //    $(window).scroll(function()
    //    {
    //        if($(window).scrollTop() == $(document).height() - $(window).height())
    //        {
    //            $('div#loadmoreajaxloader').show();
    //            $.ajax({
    //                url: "loadmore.php",
    //                success: function(html)
    //                {
    //                    if(html)
    //                    {
    //                        $("#postswrapper").append(html);
    //                        $('div#loadmoreajaxloader').hide();
    //                    }else
    //                    {
    //                        $('div#loadmoreajaxloader').html('<p>No more posts to show.</p>');
    //                    }
    //                }
    //            });
    //        }
    //    });
</script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</html>



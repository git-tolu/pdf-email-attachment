<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pdf Genration</title>
    <link rel="stylesheet" href="bootstrap.min.css" />
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
</head>

<body>
    <div class="container d-flex justify-content-center align-item-center text-center" style="width: 100vw; height: 100vh;">
        <div class="card d-flex justify-content-center align-item-center text-center" style="max-width: 500px;">
            <form method="POST" id="pdf" class="d-flex justify-content-center align-item-center text-center">
                <div class="form-group ">
                    <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                    <div class="col-sm-1-12">
                        <input type="text" class="form-control" name="inputName" id="inputName" placeholder="fname">
                    </div>
                </div>
                <div class="form-group">
                    <label for=""></label>
                    <input type="email" class="form-control" name="inputEmail" placeholder="email">
                </div>
                <div class="form-group">
                    <label for=""></label>
                    <input type="password" class="form-control" name="inputPassword" placeholder="password">
                </div>
                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button id="pdfBTN" type="submit" name="action" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="spinner-border"></div>
    <script>
        $(document).ready(function() {
            $("#pdfBTN").click(function(e) {
                e.preventDefault();
                $("#pdfBTN").html("please wait ...");
                $.ajax({
                    type: "POST",
                    url: "action.php",
                    data: $("#pdf").serialize() + '&action=pdf',
                    success: function(response) {
                        console.log(response)
                        $("#pdfBTN").text("Submit");
                    }
                });
            });
        })
    </script>
</body>

</html>
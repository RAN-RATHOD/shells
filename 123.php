<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple PHP File Uploader</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .upload-container {
            text-align: center;
            padding: 40px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }
        input[type="file"] {
            margin-top: 10px;
            padding: 10px;
        }
        input[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
        }
        p {
            margin-top: 20px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="upload-container">
        <h1>PHP File Uploader</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" /><br />
            <input type="submit" value="Upload File" name="submit" />
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $targetDir = "/home/site/wwwroot/wwwroot/";
            $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;

            // Check if file was selected
            if (!empty($_FILES["fileToUpload"]["name"])) {
                // Check if file was uploaded without errors
                if ($_FILES["fileToUpload"]["error"] === 0) {
                    // Attempt to move the uploaded file to the target directory
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
                        echo "<p>File uploaded successfully to: " . htmlspecialchars($targetFile) . "</p>";
                    } else {
                        echo "<p>Error: There was an error uploading your file.</p>";
                    }
                } else {
                    echo "<p>Error: File upload error. Code: " . $_FILES["fileToUpload"]["error"] . "</p>";
                }
            } else {
                echo "<p>Please select a file to upload.</p>";
            }
        }
        ?>
    </div>
</body>
</html>

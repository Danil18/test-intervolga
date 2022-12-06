<div style="margin-left: 10%; margin-top: 50px">
  <form action="#" method="post" enctype="multipart/form-data">
    <input type="file" name="file" placeholder="Выберите файл" value="">
    <br/>
    <br/>
    <input type="submit" name="submit" value="Сохранить">
  </form>
</div>

<?php
    function checkFilename($filename){
        $blacklist = array(".php", ".phtml", ".php3", ".php4");
        foreach ($blacklist as $item) {
            if(preg_match("/$item\$/i", $filename)) {
              die("<div style='margin-left: 10%'>Access denied</div>");
            }
        }
    }
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        checkFilename($_FILES['file']['name']);
        if (is_uploaded_file($_FILES["file"]["tmp_name"])) {
            if (!is_dir($_SERVER['DOCUMENT_ROOT'] . "/upload/")) {
              mkdir($_SERVER['DOCUMENT_ROOT'] . "/upload/", 0644);
            }
            $content = file($_FILES["file"]["tmp_name"], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            for ($i = 0; $i < count($content); $i++) {
                checkFilename($content[$i]);
                $oneFileInfo = explode(",", quotemeta(htmlspecialchars($content[$i])));
                if (count($oneFileInfo) == 2) {
                    $name = explode (".", $oneFileInfo[0]);
                    $extensionFile = $name[count($name) - 1];
                    if (strlen($extensionFile) <= 5) {
                      $filename = $_SERVER['DOCUMENT_ROOT'] . "/upload/" . ($i+1) .".". trim($name[1]);
                      file_put_contents($filename, $oneFileInfo[1]);
                    }
                }
            }
            echo "<div style='margin-left: 10%'><b>Success</b></div>";
        }
    }
 ?>

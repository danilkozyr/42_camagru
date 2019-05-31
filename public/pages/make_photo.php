<?php require_once('../../private/initialize.php'); ?>
<?php $page_title = 'Camagru Home'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php

    print_r ($_COOKIE);
    // if (isset($_GET['action']) && $_GET['action'] === "save") {
            // $html = "<!doctype html>";
            // $doc=new DOMDocument();
            // $doc->loadHTML("<img id=\"photo\" src=\"../images/default.png\" alt=\"default\">");
        

            // echo $doc->saveHTML();
            // $tag = $doc->getElementsByID('photo');
        
            // echo $tag;
        
        //     $tags = $doc->getElementsByTagName('img');
        
        //     foreach ($tags as $tag) {
            //         echo $tag->getAttribute('src');
            //     }
            
            //     print_r($_POST);
            
            //     die;
            
            //     // $tags = $doc->getElementsByTagName('img');
            
            //     // foreach ($tags as $tag) {
                //         //    echo $tag->getAttribute('src');
                //     // }
                
                //     // echo $doc->saveHTML();
                
                
                //     // $xml=simplexml_import_dom($doc); // just to make xpath more simple
                //     // $images=$xml->xpath('//img');
                //     // foreach ($images as $img) {
                    //     //     echo $img['src'] . ' ' . $img['alt'] . ' ' . $img['title'];
                    //     // }    
        // }
?>

<div class="booth">
    <video id="video" width="600" height="450"></video>
    <a href="#" id="capture" class="booth-button"><p class="text_custom">take photo</p></a>
    <canvas id="canvas"  width="600" height="450"></canvas>
    <img id="photo" src="../images/default.png" alt="default" width="600" height="450">
    <a href="#" id="save" class="booth-button last_elem"><p class="text_custom">save photo</p></a>
</div>

<script src="../js/photo.js"></script>

<?php include(SHARED_PATH . '/footer.php'); ?>

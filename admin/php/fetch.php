<head>
    <script type="text/javascript" src="/admin/assets/ckeditor/ckeditor.js"></script>
</head>

<?php

	global $con;

    require_once __DIR__ . '/../../vendor/autoload.php';

//    $con = new MysqliDb('localhost', 'root', '!MySql8?.', 'ozsoy_izolasyon');
$con = new MysqliDb('localhost', 'brhmzsyc_admin', '!lW99&Z#aufU', 'brhmzsyc_ozsoy_izolasyon');
	
	if(isset($_POST["action"])){
        
		if($_POST["action"] == "duzenle"){
			
            $id = $_POST["id"];

            global $con;
            
            $sql = $con->rawQuery("SELECT * FROM page_texts WHERE id = '$id' ");
            $result = $sql[0];
	 
			if(isset($_POST["id"])){
                echo '
                    <form role="form" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Sayfa Düzenle</h4>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="description"><img class="scale-with-grid" src="/images/flags/tr.png"> İçerik</label>
                                <textarea class="form-control" id="editor1" name="text-tr" placeholder="Açıklama">'.$result["texttr"].'</textarea>
                                <input type="text" class="form-control" name="id" value="'.$id.'" style="display:none;">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Kapat</button>
                            <button class="btn btn-success" type="submit" name="duzenle">Güncelle</button>
                        </div>
                    </form>
                ';
			}
        }

	}

?>


<script>
        
    // CKEDITOR.replace() metodu ile CKEditor editörü olacak texarea etiketi ayarlanır.
    
    // Bu hali ile CKEditor varsayılan ayarlarla görüntülenecektir.
    
    CKEDITOR.replace( 'editor1' );
    CKEDITOR.replace( 'editor2' );
    CKEDITOR.replace( 'editor3' );
    CKEDITOR.replace( 'editor4' );
    CKEDITOR.replace( 'editor5' );
    
</script>
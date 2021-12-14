<?php
require("../_config/connect.php");
require("funct/function.php");
session_start();
if(isset($_GET['thread'])&& $_GET['thread'] !="")
{
    $id_thread=$_GET['thread'];
}
$thread=query("SELECT * FROM posting WHERE id_thread='$id_thread'");


if(isset($_POST["post"])) {
    $user_id = $_SESSION["id"];
    $thread_id = $_GET["thread"];
    $parent = $_POST["parent"];
    $konten = $_POST["komentar"];

    $query = "INSERT INTO komentar (konten, id_user, thread_id, parent) VALUES (
        '$konten',
        '$user_id',
        '$thread_id',
        '$parent'
    )";

    $result = mysqli_query($conn, $query);

    if($result){
        $_SESSION["sukses"] = "Komentar berhasil ditambahkan";
    } else {
        echo mysqli_error($result);
    }

}

if(isset($_POST["balas"])) {
    $user_id = $_SESSION["id"];
    $thread_id = $_GET["thread"];
    $parent = $_POST["parent"];
    $konten = $_POST["komentar"];

    $query = "INSERT INTO komentar (konten, id_user, thread_id, parent) VALUES (
        '$konten',
        '$user_id',
        '$thread_id',
        '$parent'
    )";

    $result = mysqli_query($conn, $query);

    if($result){
        $_SESSION["sukses"] = "Komentar berhasil ditambahkan";
    } else {
        echo mysqli_error($result);
    }

}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TECH CORNER  | Thread</title>
    <!-- Icon CDN untuk Modal dan Header -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Boostrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- CSS Eksternal -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/thread.css">
    <!-- Bar Icon -->
    <link rel="shortcut icon" href="asset/icon.png" type="image/x-icon">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Yeseva+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- CDN Font Awesome -->
    <script src="https://use.fontawesome.com/57879be922.js"></script>   
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<?php include('layout/navbar.php'); ?>

<!-- Main Content -->
<div class="container mb-3 mt-3 align-self-center">
    <div class="main-content">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="all.php">All</a></li>

              <?php foreach($thread as $data):?>
                <li class="breadcrumb-item"><a href="#"><?=$data['kategori']?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$data['judul']?></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?=$data['judul']?>
                        </h5>
                        <img src="assets/img/pict1.png" width="200px" class="card-img-top">
                        <p>
                            <?=$data['konten']?>
                        </p>


                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="col-6 col-md-4">
            <div class="card">
                <img src="https://i.pinimg.com/736x/41/81/0a/41810acd7e15633293a7c6c0309c11e5.jpg" class="card-img-top">
                <a class="btn btn-outline-success" href="buat.php" role="button">
                    <i>Tulis Thread</i>
                </a>
            </div>
        </div>
    </div>


    <!-- Komentar -->
    <div class="row mb-3 mt-3">
        <div class="col-md-8 bootstrap snippets">
            <?php if(isset($_SESSION["login"])) : ?>
                <div class="panel">
                    <div class="panel-body">
                        <div class="d-flex align-items-center flex-shrink-0 me-3">
                            <div class="mx-3">
                                <img width="50px" src="assets/img/icon.png" alt="">
                            </div>
                            <div class="d-flex flex-column fw-bold">
                                <a href="#" class="btn-link text-semibold media-heading box-inline">Johndoe</a>
                                <div class="small text-muted">member</div>
                            </div>
                        </div>     
                        <br>
                        <div><p>Comments <i class="fa fa-comments-o"></i></p></div>
                        <!-- form komentar -->
                        <form method="POST" action="" id="form-komentar">
                            <input type="hidden" name="parent" value="0">
                            <textarea class="form-control" rows="2" name="komentar" id="komentar" placeholder="Bagaimana pendapatmu?"></textarea>
                            <div class="mar-top clearfix">
                                <button class="btn btn-sm btn-success pull-right" type="submit" name="post"><i class="fa fa-pencil fa-fw"></i>Post</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif; ?>


            <div class="panel">
                <div class="panel-body">
                    <!-- LOOPING KOMENTAR PARENT -->
                    <?php 

                    $thread_id = $_GET["thread"];
                    $result1 = query("SELECT * FROM komentar WHERE thread_id = '$thread_id' AND parent = 0");

                    foreach ($result1 as $komen) :
                        ?>
                        <?php 
                        $id_user = $komen['id_user'];
                        $rows = query("SELECT * FROM users WHERE id_user = $id_user LIMIT 1");

                        foreach($rows as $row) :
                            ?>
                            <div class="media-block">
                                <a class="media-left" href="#"><img class="img-circle img-sm mr-3" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar1.png"></a>
                                <div class="media-body">
                                    <div class="d-flex flex-column fw-bold">
                                        <a href="#" class="btn-link text-semibold media-heading box-inline"><?= $row['username']; ?></a>
                                        <div class="small text-muted"><?= $row['level']; ?></div>
                                    </div>
                                <?php endforeach; ?>

                                <?= $komen['konten']; ?>
                                <div class="pad-ver">
                                    <div class="btn-group">
                                        <a class="btn" href=""><i class="fa fa-thumbs-up"></i></a>
                                        <a class="btn" href=""><i class="fa fa-thumbs-down"></i></a>
                                    </div>
                                    <button class="btn btn-outline-success btn-sm balas"><i class="fa fa-share"></i> Balas</button>
                                </div>
                                <hr>
                                <?php 
                                $thread_id = $_GET["thread"];
                                $parent = $komen['id'];
                                $query2 = "SELECT * FROM komentar WHERE thread_id = '$thread_id' AND parent = $parent";
                                $result2 = mysqli_query($conn, $query2);
                                ?>
                                <div class="mb-3" id="toggle-balasan">
                                    <span>Lihat <?= mysqli_num_rows($result2); ?> Balasan</span> <i class="fa fa-angle-down"></i>
                                </div>


                                <?php foreach ($result2 as $balas) : ?>

                                    <!-- Balasan Komentar Parents (child) -->
                                    <?php
                                    $id_user = $balas['id_user'];
                                    $users = query("SELECT * FROM users WHERE id_user = $id_user");

                                    foreach($users as $user) :
                                        ?>
                                        <div class="media-block">
                                            <a class="media-left" href="#"><img class="img-circle img-sm mr-3" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar2.png"></a>
                                            <div class="media-body">
                                                <div class="d-flex flex-column fw-bold">
                                                    <a href="#" class="btn-link text-semibold media-heading box-inline"><?= $user['username']; ?></a>
                                                    <div class="small text-muted"><?= $user['level']; ?></div>
                                                </div>
                                            <?php endforeach; ?>


                                            <p><?= $balas['konten']; ?></p>
                                            <div class="pad-ver">
                                                <div class="btn-group">
                                                    <a class="btn" href=""><i class="fa fa-thumbs-up"></i></a>
                                                    <a class="btn" href=""><i class="fa fa-thumbs-down"></i></a>
                                                </div>
                                                <button class="btn btn-outline-success btn-sm balas"><i class="fa fa-share"></i> Balas</button>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                                <!-- form balas -->
                                <form method="POST" action="" id="form-balas" style="display:none;">
                                    <input type="hidden" name="parent" value="<?= $komen['id']; ?>">
                                    <textarea class="form-control" rows="2" name="komentar" id="balas" placeholder="Balas komentar"></textarea>
                                    <div class="mar-top clearfix">
                                        <button class="btn btn-sm btn-success pull-right" type="submit" name="balas"><i class="fa fa-pencil fa-fw"></i>balas</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?> 
                </div>

            </div> 
            <div>
                <!-- Pagination -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</div>
</div>
<script>
    $(document).ready(function(){
        $('.balas').click(function(){
            $("#form-balas").toggle('slide');
        })
    });
</script>

<script src="assets\ckeditor5-build-classic\ckeditor.js"></script>
<script src="assets\ckfinder\ckfinder.js"></script>
<script>
    ClassicEditor
    .create( document.querySelector( '#komentar'), {
        ckfinder: {
            uploadUrl: 'http://localhost/techcorner/forum/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
        },
        toolbar: {
            items: [
            'heading',
            '|',
            'alignment',                                               
            'bold',
            'italic',
            'link',
            'bulletedList',
            'numberedList',
            'CKFinder',
            'uploadImage',
            'blockQuote',
            'undo',
            'redo'
            ]
        },

    } )
    .catch( error => {
        console.error( error );
    } );

    ClassicEditor
    .create( document.querySelector( '#balas'), {
        ckfinder: {
            uploadUrl: 'http://localhost/techcorner/forum/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
        },
        toolbar: {
            items: [
            'heading',
            '|',
            'alignment',                                               
            'bold',
            'italic',
            'link',
            'bulletedList',
            'numberedList',
            'CKFinder',
            'uploadImage',
            'blockQuote',
            'undo',
            'redo'
            ]
        },

    } )
    .catch( error => {
        console.error( error );
    } );

</script>

<?php include('layout/footer.php'); ?>
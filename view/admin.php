<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location:../index.php');
}
require '../model/User.php';
$user = new User();
$data = $user->selectUser('user');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="../assets/font/fontawesome/css/all.css" rel="stylesheet">
</head>

<body>
<div class="container-fluid" style="padding-right:0px;
        padding-left:0px;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="../proses/logout.php">logout</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../proses/logout.php">logout</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div style="background-color: " class="container">
        <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h4 class="card-title">Admin</h4>
                <p class="card-text"><a href="" data-toggle="modal" data-target="#exampleModal"><i class="far fa-plus-square"> Add</i></a></p>
                <div class="table-responsive">
                    <table style="overflow-y:hidden " class="table table-hover">
                        <thead class="table-dark">
                        <tr>
                            <th scope="col">no</th>
                            <th scope="col">Nama Depan</th>
                            <th scope="col">Nama Belakang</th>
                            <th scope="col">Email</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Status</th>
                            <th scope="col">aksi</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        foreach ($data as $key) {
                            ?>
                            <tr>
                                <th scope='row'>1</th>
                                <td><?= $key['nama_dpn'] ?></td>
                                <td><?= $key['nama_blk'] ?></td>
                                <td><?= $key['email'] ?></td>
                                <td><?= $key['tgl_lahir'] ?></td>
                                <td><?= $key['jk'] ?></td>
                                <td><?= $key['status'] ?></td>
                                <td>
                                    <a style="margin-right:30px"
                                       href="<?= '../proses/delete.php?id_user=' . $key['id'] ?>"><i
                                                class="far fa-trash-alt"></i></i></a>
                                    <a href=""><i class="far fa-edit"></i></a>
                                </td>
                            </tr>
                            <?php
                        } ?>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <label for="">Nama Depan</label>
                            <input type="text" class="form-control" name="" id="" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Belakang</label>
                            <input
                                type="text"
                                class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input
                                type="email"
                                class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label mr-5">
                                <input type="radio" class="form-check-input" name="jk" id="" value="laki-laki"
                                       checked>
                                laki-laki
                            </label>
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="jk" id="" value="perempuan"
                                       checked>
                                perempuan
                            </label>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col">
                                        <label for=""></label>
                                        <select class="form-control" name="" id="tgl">
                                                <?php
                                                for ($i=1; $i < 32; $i++) {
                                                    echo "<option value=".$i.">".$i."</option>";
                                                }
                                                ?>
                                        </select>
                                </div>
                                <div class="col">
                                    <label for=""></label>
                                    <select class="form-control" name="bln" id="">
                                        <option value="1">januari</option>
                                        <option value="2">februari</option>
                                        <option value="3">maret</option>
                                        <option value="4">april</option>
                                        <option value="5">mei</option>
                                        <option value="6">juni</option>
                                        <option value="7">juli</option>
                                        <option value="8">agustus</option>
                                        <option value="9">september</option>
                                        <option value="10">oktober</option>
                                        <option value="11">november</option>
                                        <option value="12">september</option>
                                    </select>
                                </div>
                                <div class="col">
                                        <label for=""></label>
                                        <select class="form-control" name="" id="">
                                            <?php
                                            $datenow = intval(date("Y"));
                                            for ($i=1900; $i <= $datenow; $i++) {
                                                echo "<option value=".$i.">".$i."</option>";
                                            }
                                            ?>
                                        </select>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Reset</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
</body>

</html>
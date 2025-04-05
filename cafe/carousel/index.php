<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <script src="../assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <title>Cafe A-plus - รายการสินค้า</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .thumbnail {
            border: 1px solid #dee2e6;
            border-radius: .5rem;
            padding: 1rem;
            background-color: white;
            transition: transform 0.2s;
        }
        .thumbnail:hover {
            transform: scale(1.05);
        }
    </style>
    <link href="carousel.css" rel="stylesheet">
</head>
<body>
    <header data-bs-theme="dark">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Cafe A-plus</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">หน้าหลัก</a></li>
                        <li class="nav-item"><a class="nav-link" href="view_order.php">คำสั่งซื้อ</a></li>
                        <li class="nav-item"><a class="nav-link" href="basket.php">ตะกร้าสินค้า</a></li>
                    </ul>
                    <div class="d-flex align-items-center justify-content-center">
                        <form class="d-flex me-2" role="search" action="index.php" method="get">
                            <input id="searchInput" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="kw" style="width: 500px; height: 40px;">
                            <button class="btn btn-outline-success" type="submit" style="height: 40px;">Search</button>
                        </form>
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://png.pngtree.com/png-vector/20231229/ourlarge/pngtree-draw-cute-cup-of-coffee-with-little-heart-for-valentine-png-image_11311154.png" alt="" width="32" height="32" class="rounded-circle me-2">
                                <strong>Admin</strong>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                                <li><a class="dropdown-item" href="login.php">login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-4">
        <?php
        include("connectdb.php");
        ?>

<!-- แสดงหมวดหมู่สินค้า -->
<div style="text-align: center; margin: 10px 0; padding: 50px 0; background-image: url('https://as1.ftcdn.net/v2/jpg/08/54/55/12/1000_F_854551267_dKzE0zdgKpHVZL55UXcopJnn1UA3T7IA.jpg'); background-size: cover; background-position: center; width: 100%; height: 60vh; border: 2px solid #ccc; position: relative;">
    <div style="position: absolute; bottom: 10px; left: 0; right: 0; text-align: center;">
        <h2 style="color: white; font-size: 50px;">รายการสินค้าทั้งหมด</h2>
        <?php
        $sql2 = "SELECT * FROM category";
        $rs2 = mysqli_query($conn, $sql2);
        while ($data2 = mysqli_fetch_array($rs2, MYSQLI_BOTH)) {
            ?>
            <a href="index.php?pt=<?= $data2['c_id']; ?>" class="btn btn-info" style="margin: 5px; font-size: 18px; padding: 10px 20px;"><?= $data2['c_name']; ?></a> |
        <?php } ?>
    </div>
</div>






        <br>

        <div class="row">
        <?php
        $kw = isset($_GET['kw']) ? $_GET['kw'] : '';
        $pt = isset($_GET['pt']) ? $_GET['pt'] : '';

        $s = $pt ? "AND (c_id = '$pt')" : "";

        $sql = "SELECT * FROM product WHERE (p_name LIKE '%$kw%' OR p_detail LIKE '%$kw%') $s";
        $rs = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_array($rs, MYSQLI_BOTH)) {
            ?>
            <div class="col-md-4 mb-4">
                <div class="thumbnail text-center">
                  <img src="images/<?= $data['p_id'] . '.' . $data['p_ext']; ?>" class="img-fluid" style="width: 200px;">
                  <div class="caption mt-2">
                    <h4><?= $data['p_name']; ?></h4>
                        <h5><?= number_format($data['p_price'], 0); ?> บาท</h5>
                        <p><a href="basket.php?id=<?= $data['p_id']; ?>" class="btn btn-info" role="button">หยิบลงตะกร้า</a></p>
                    </div>
                </div>
            </div>
            <?php
        } // end while

        mysqli_close($conn);
        ?>
        </div>
    </main>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

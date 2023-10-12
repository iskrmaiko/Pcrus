<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCRUS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <h3 class="text-center text-light bg-info p-2">PC R US</h3>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <h5>Filter Product</h5>
                    <hr>

                    <h6 class="text-info">Select Brand</h6>
                    <ul class="list-group">
                        <?php
                        $sql = "SELECT DISTINCT brand FROM products ORDER BY brand";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <li class="list-group-item">
                                <div class="form-check">
                                    <label for="" class="form-check-label">
                                        <input type="checkbox" class="form-check-input product-check" value="<?= $row['brand']; ?>" id="brand"> <?= $row['brand']; ?>
                                    </label>
                                </div>
                            </li><?php } ?>
                    </ul>

                    <h6 class="text-info">Select HDD</h6>
                    <ul class="list-group">
                        <?php
                        $sql = "SELECT DISTINCT hdd FROM products ORDER BY hdd";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <li class="list-group-item">
                                <div class="form-check">
                                    <label for="" class="form-check-label">
                                        <input type="checkbox" class="form-check-input product-check" value="<?= $row['hdd']; ?>" id="hdd"> <?= $row['hdd']; ?>
                                    </label>
                                </div>
                            </li><?php } ?>
                    </ul>

                    <h6 class="text-info">Select RAM</h6>
                    <ul class="list-group">
                        <?php
                        $sql = "SELECT DISTINCT ram FROM products ORDER BY ram";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <li class="list-group-item">
                                <div class="form-check">
                                    <label for="" class="form-check-label">
                                        <input type="checkbox" class="form-check-input product-check" value="<?= $row['ram']; ?>" id="ram"> <?= $row['ram']; ?>
                                    </label>
                                </div>
                            </li><?php } ?>
                    </ul>

                    <h6 class="text-info">Select Processor</h6>
                    <ul class="list-group">
                        <?php
                        $sql = "SELECT DISTINCT processor FROM products ORDER BY processor";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <li class="list-group-item">
                                <div class="form-check">
                                    <label for="" class="form-check-label">
                                        <input type="checkbox" class="form-check-input product-check" value="<?= $row['processor']; ?>" id="processor"> <?= $row['processor']; ?>
                                    </label>
                                </div>
                            </li><?php } ?>
                    </ul>

                    <h6 class="text-info">Select Screen size</h6>
                    <ul class="list-group">
                        <?php
                        $sql = "SELECT DISTINCT screen_size FROM products ORDER BY screen_size";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <li class="list-group-item">
                                <div class="form-check">
                                    <label for="" class="form-check-label">
                                        <input type="checkbox" class="form-check-input product-check" value="<?= $row['screen_size']; ?>" id="screen_size"> <?= $row['screen_size']; ?>
                                    </label>
                                </div>
                            </li><?php } ?>
                    </ul>

                </div>


                <div class="col-lg-9">
                    <h5 class="text-center" id="textChange">All Products</h5>
                    <hr>
                    <div class="row" id="result">
                        <?php
                        $sql = "SELECT * FROM products";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) { ?>
                            <div class="col-md-3 mb-2">
                                <div class="card-deck">
                                    <div class="card border-secondary">
                                        <img src="<?= $row['product_image']; ?>" class="card-img-top" alt="">
                                        <div class="card-body">
                                            <h4 class="card-title"><?= $row['product_name']; ?></h4>
                                            <h4 class="card-title text-danger">Price: <?= $row['product_price']; ?>/-</h4>
                                            <p>
                                                RAM: <?= $row['ram']; ?> <br>
                                                HDD: <?= $row['hdd']; ?> <br>
                                                Processor: <?= $row['processor']; ?> <br>
                                                Screen Size: <?= $row['screen_size']; ?> <br>
                                                OS: <?= $row['os']; ?> <br>
                                            </p>
                                            <a href="#" class="btn btn-info btn-block view-details" data-product-id="<?= $row['product_id']; ?>">View Details</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".product-check").click(function() {
                var action = 'data';
                var brand = get_filter_text('brand');
                var ram = get_filter_text('ram');
                var hdd = get_filter_text('hdd');
                var processor = get_filter_text('processor');
                var screen = get_filter_text('screen_size');
                var os = get_filter_text('os');

                $.ajax({
                    url: 'action.php',
                    method: 'POST',
                    data: {
                        action: action,
                        brand: brand,
                        ram: ram,
                        hdd: hdd,
                        processor: processor,
                        screen: screen,
                        os: os
                    },
                    success: function(response) {
                        $('#result').html(response);
                        $('#textChange').text('Filtered Products');
                    }
                })

            });

            $(".view-details").click(function(e) {
                e.preventDefault(); 
                var productId = $(this).data('product-id');

                
                $.ajax({
                    url: 'action.php',
                    method: 'POST',
                    data: {
                        action: 'view_details',
                        product_id: productId
                    },
                    success: function(response) {
                        $('#result').html(response);
                    }
                });
            });

            $('#result').on('click', '.view-details', function(e) {
                e.preventDefault(); 
                var productId = $(this).data('product-id'); 

              
                $.ajax({
                    url: 'action.php',
                    method: 'POST',
                    data: {
                        action: 'view_details',
                        product_id: productId
                    },
                    success: function(response) {
                        $('#result').html(response);
                    }
                });
            });


            function get_filter_text(text_id) {
                var filterData = [];
                $('#' + text_id + ':checked').each(function() {
                    filterData.push($(this).val());
                });
                return filterData;
            }
        })
    </script>
</body>

</html>